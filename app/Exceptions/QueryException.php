<?php

namespace App\Exceptions;

use Exception;

class QueryException extends Exception
{
    //
    public function report(){
        \Log::debug('Không tìm thấy kết quả truy vấn tương ứng');
    }

    public function render($request){
        return response()->view('errors.custom');
    }
}
