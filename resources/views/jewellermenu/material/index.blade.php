
@extends('layouts.app', ['title' => '素材・デザイン登録｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

		<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});
	function chgSt(id,st){
		 $.ajax({
		    url: '/jewellermenu/material/status',
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
				<h2>素材・デザイン登録</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>素材・デザイン登録</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="new_post">
					<a href="/jewellermenu/material/new_post" class="btn01">新規登録</a>
				</div>
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						登録済み素材・デザイ一覧
					</h3>
					<!--
<div class="error_txt txt_box">
<p class="tac">登録済みの作品はありません。</p>
</div>
-->
					<ul class="favo_li mode_prod">
						@foreach($materials as $material)
						<li>
							<div class="img_box mode_thum">
								@if($material->image)
								<img src="/upload/profile/{{$material->image}}" alt="">

								@endif
								
							</div>
							<div class="release">
								<button class="btn_release @if($material->status==1) active @endif" onclick="chgSt({{$material->id}},1)">公開</button>
								<button class="btn_release @if($material->status==2) active @endif" onclick="chgSt({{$material->id}},2)">非公開</button>

							</div>
							<div class="data">
								<a href="/jewellermenu/material/detail/{{$material->id}}"><span>{{$material->name}}</span></a>
							</div>
						</li>
						@endforeach
						
					</ul>
					<nav class="pager">
						 {{ $materials->appends(request()->input())->render() }}
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