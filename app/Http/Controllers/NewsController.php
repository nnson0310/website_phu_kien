<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Tags;
use App\Models\NewsTags;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\TagsRequest;
use App\Http\Requests\NewsRequest;
use Session;
use DB;

class NewsController extends Controller
{
    //
    public function addNews(){
        $tags = Tags::all();
        return view('admin.news.add_news', compact('tags'));
    }

    public function addTags(){
        return view('admin.news.add_tags');
    }

    public function createTags(TagsRequest $request){
        $tags = new Tags;
        $tags->name = $request->tags_name;
        $tags->status = $request->tags_status;
        $result = $tags->save();

        if($result){
            return redirect()->back()->with('success', 'Đã tạo thẻ bài viết mới thành công');
        }
    }

    public function listNews(){
        $all_news = News::all();
        $news = News::orderBy('id', 'ASC')->paginate(3);
        $count_all = $all_news->count();
        $count = $news->count();

        return view('admin.news.list_news', compact('news', 'count', 'count_all'));
    }

    public function storeNews(NewsRequest $request){
        $title = $request->title;
        $content = $request->content;
        $status = $request->status;

        //xử lý ảnh
        $get_image = $request->file('images');
        $fileExtension = $get_image->getClientOriginalExtension();
        $fileName = $get_image->getClientOriginalName();
        $fileRealName = current(explode('.',$fileName));
        $images = $fileRealName.rand(0,99).'.'.$fileExtension;
        $get_image->move('public/backend/uploads/news/', $images);

        $news = News::create([
            'title' => $title,
            'images' => $images,
            'content' => $content,
            'status' => $status,
        ]);

        $news_id = $news->id;
        $tags_id = $request->tags_id;
        foreach($tags_id as $key => $tag_id){
            NewsTags::create([
                'news_id' => $news_id,
                'tags_id' => $tag_id
            ]);
        }
        Session::flash('success', 'Đã thêm tin tức thành công');
        return redirect()->route('add_news');
    }

    public function unhideNews($news_id){
        $news = News::find($news_id);
        $news->status = 1;
        $news->save();
        return redirect()->back()->with('success', 'Đổi trạng thái tin tức thành công');
    }

    public function hideNews($news_id){
        $news = News::find($news_id);
        $news->status = 0;
        $news->save();
        return redirect()->back()->with('success', 'Đổi trạng thái tin tức thành công');
    }

    public function deleteNews($id){
        News::destroy($id);
        return response()->json(['success' => 'Xóa tin tức thành công']);
    }

    public function editNews($id){
        $news = News::find($id);
        $tags = Tags::all();
        return view('admin.news.edit_news', compact('news', 'tags'));
    }

    public function updateNews(NewsRequest $request){
        $id = $request->id;
        $news = News::find($id);
        if($news->images && !$request->hasFile('images')){
            
        }
        
    }

    public function recycleNews(){
        $all_news = News::onlyTrashed()->get();
        $news = News::onlyTrashed()->paginate(3);
        $count_all = $all_news->count();
        $count = $news->count();
        return view('admin.news.recycle_news', compact('news', 'count', 'count_all'));
    }

    public function restoreNews($id){
        $news = News::withTrashed()->find($id)->restore();
        return redirect()->back()->with('message', 'Đã khôi phục tin tức thành công');
    }

    public function forceDeleteNews($id){
        News::withTrashed()->find($id)->forceDelete();
        return response()->json(['success' => 'Đã xóa tin tức thành công.']);
    }

    /////////////////////////Tags

    public function listTags(){
        $all_tags = Tags::all();
        $tags = Tags::paginate(3);
        $count_all = $all_tags->count();
        $count = $tags->count();
        return view('admin.news.list_tags', compact('tags', 'count', 'count_all'));
    }

    public function deleteTags($tags_id){
        Tags::where('id', $tags_id)->delete();
        return redirect()->back()->with('message', 'Đã xóa tags thành công');
    }

    public function recycleTags(){
        $all_tags = Tags::onlyTrashed()->get();
        $tags = Tags::onlyTrashed()->paginate(3);
        $count_all = $all_tags->count();
        $count = $tags->count();
        return view('admin.news.recycle_tags', compact('tags', 'count', 'count_all'));
    }

    public function restoreTags($tags_id){
        $tags = Tags::withTrashed()->find($tags_id)->restore();
        return redirect()->back()->with('message', 'Đã khôi phục tags thành công');
    }

    public function forceDeleteTags($tags_id){
        $tags = Tags::withTrashed()->find($tags_id)->forceDelete();
        return redirect()->back()->with('message', 'Đã xóa tags này vĩnh viễn. Thao tác này không thể quay lại.');
    }

    public function unhideTags($tags_id){
        $tags = Tags::find($tags_id);
        $tags->status = 1;
        $query = $tags->save();

        if($query){
            return redirect()->route('list_tags')
            ->with('message', 'Cập nhật trạng thái thẻ thành công');
        }
    }

    public function hideTags($tags_id){
        $tags = Tags::find($tags_id);
        $tags->status = 0;
        $query = $tags->save();

        if($query){
            return redirect()->route('list_tags')
            ->with('message', 'Cập nhật trạng thái thẻ thành công');
        }
    }

}
