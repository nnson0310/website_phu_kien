@extends('sidebar')

@section('main_content')

<div id="account-page">
	<div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
            <li><a href="#">Trang Chủ</a></li>
            <li class="active">Thông tin tài khoản</li>
            </ol>
        </div>
        @if (Session::has('success'))
            <div style="font-size: 30px" class="alert alert-info">{{ Session::get('success') }}</div>
        @endif
		<div style="border: 1px solid #e5e5e5; padding: 20px 15px" class="account-box">
			<div class="row">
				<div class="col-md-9">
					<div class="details-account">
                        <div class="box-content">
                            <div class="row">
                                <form id="form_submit" method="POST" action="{{ route('update_profile') }}" id="formUpdateInfoUser" enctype="multipart/form-data">
                                    {{ @csrf_field() }}
                                    <input name="user_id" type="hidden" value="{{ $user->user_id }}">
                                    <div class="col-md-7">
                                        <label for="username" class="label-register">UserName <span class="red">*</span></label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="UserName"  autocapitalize="words" value="{{ $user->username }}">
                                        <br>
                                        <label for="phone" class="label-register">Phone</label>
                                        <input name="phone" type="text" placeholder="Phone" class="form-control" value="{{ $user->phone }}">
                                        <br>
                                        <label for="email" class="label-register">Email</label>
                                        <input name="email" type="email" placeholder="Email" class="form-control" value="{{ $user->email }}">
                                        <br>
                                        <input type="checkbox" id="changePassword"> <label for="ChangePassword" class="label-register">Thay đổi mật khẩu </label>
                                        <br>
                                        <div style="display: none" id="blockPassword">
                                            <label for="password" class="label-register">Mật khẩu mới <span class="red">*</span></label>
                                            <input onfocus="this.value=''" type="password" name="password" id="password" placeholder="Password" class="form-control">
                                            <br>
                                            <label for="password_confirm" class="label-register">Xác nhận lại mật khẩu <span class="red">*</span></label>
                                            <input onfocus="this.value=''" type="password" name="password_confirm" id="password_confirm" placeholder="Password Confirm" class="form-control ">
                                        </div>
                                        <br>
                                        <p>
                                            <input name="submit" type="submit" value="Cập nhật" class="btn btn-warning">
                                        </p>
                                    </div>
                                    <div class="col-md-offset-1 col-md-3">
                                        <div class="upload-image">
                                            @if ($user->avatar)
                                            <img id="preview" src="{{ asset('public/frontend/images/user/'.$user->avatar) }}" title="Thu Minh" alt="Thu Minh">
                                            @else
                                            <img id="preview" src="{{ asset('public/frontend/images/user/avatar.png') }}" title="Thu Minh" alt="Thu Minh">
                                            @endif
                                            <input id="avatar" name="avatar" type="file" accept="image/*" class="custom-file-input">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
    $('#changePassword').on('click', function(){
        if( $('#blockPassword').is(':hidden')){
            $('#blockPassword').show();
        }
        else{
            $('#blockPassword').hide();
        }
    });
</script>

<script type="text/javascript">
    function previewImg(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#avatar').change(function(){
        previewImg(this);
    });
</script>

<script type="text/javascript">
    $('#form_submit').on('submit', function(){
        if($('#password').val() != $('#password_confirm').val()){
            alert('Xác nhận mật khẩu mới chưa trùng khớp. Xin vui lòng thử lại');
            return false;
        }
    });
</script>

@endsection
