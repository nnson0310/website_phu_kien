@extends('admin_layout')

@section('main_content')
<h3 id="dashboard-title">Chào mừng bạn đến với trang quản trị</h3>
{!! $chart->container() !!}
{!! $chart->script() !!}
@endsection
	