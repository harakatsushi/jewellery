@extends('layouts.app', ['title' => 'メニュー登録｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

		<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});
	function chgSt(id,st){
		 $.ajax({
		    url: '/jewellermenu/menu/status',
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
				<h2>メニュー登録</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>s
						<li>メニュー登録</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="new_post">
					<a href="/jewellermenu/menu/new_post" class="btn01">新規登録</a>
				</div>
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						登録済みメニュー一覧
					</h3>
					<ul class="favo_li mode_prod">
						@foreach($menus as $menu)
						<li>
							<div class="img_box mode_thum">
								@if($menu->image)
								<img src="/upload/profile/{{$menu->image}}" alt="">

								@endif
								
							</div>
							<div class="release">
								<button class="btn_release @if($menu->status==1) active @endif" onclick="chgSt({{$menu->id}},1)">公開</button>
								<button class="btn_release @if($menu->status==2) active @endif" onclick="chgSt({{$menu->id}},2)">非公開</button>

							</div>
							<div class="data">
								<a href="/jewellermenu/menu/detail/{{$menu->id}}"><span>{{$menu->name}}</span></a>
							</div>
						</li>
						@endforeach
					</ul>
					<nav class="pager">
						 {{ $menus->appends(request()->input())->render() }}
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
				@include('layouts.jeweller_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection
</html>