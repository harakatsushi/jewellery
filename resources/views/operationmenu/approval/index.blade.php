
@extends('layouts.app', ['title' => '運営ユーザー承認｜運営メニュー','css'=>'mymenu'])

@section('content')
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});
	function chgSt(id,st){
		 $.ajax({
		    url: '/operationmenu/user/status',
		    type: 'post',
		    dataType: 'json',
		    // フォーム要素の内容をハッシュ形式に変換
		    data: "id="+id+"&st="+st,
		    timeout: 5000,
		  })
		  .done(function(data) {
		      // 通信成功時の処理を記述
		  })
		  .fail(function() {
		      // 通信失敗時の処理を記述
		  });
	}


</script>

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>運営ユーザー承認</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>運営ユーザー承認</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						運営ユーザー
					</h3>
					<ul class="favo_li mode_prod">
						@foreach($users as $user)
						<li>
							<div class="img_box mode_thum">
								@if($user->image)
				                <img src="/upload/profile/{{Auth::user()->image}}" alt="">
				                @else 
				                <img src="/assets/images/operation/operation_icon.jpg" alt="">
                				@endif
								
							</div>
							<div class="release">
								<button class="btn_release @if($user->status==1)active @endif " onclick="chgSt({{$user->id}},1)">承認</button>
								<button class="btn_release @if($user->status==0)active @endif " onclick="chgSt({{$user->id}},0)">非承認</button>
							</div>
							<div class="data">
								<p>{{$user->name}}</p>
								<p>Eメール：{{$user->email}}</p>
							</div>
						</li>
						@endforeach

					</ul>
					<nav class="pager">
{{ $users->appends(request()->input())->render() }}
					</nav>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_favo-->
			</main>
			<!--/#cont_main-->
			<aside id="cont_aside" class="mode_menu">
				@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection