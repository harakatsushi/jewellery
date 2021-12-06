
@extends('layouts.app', ['title' => '作品登録｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

		<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});
	function chgSt(id,st){
		 $.ajax({
		    url: '/jewellermenu/product/status',
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
				<h2>作品登録</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>作品登録</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="new_post">
					<a href="/jewellermenu/product/new_post" class="btn01">新規登録</a>
				</div>
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						登録済み作品一覧
					</h3>
					@if($products->count()<1)

<div class="error_txt txt_box">
<p class="tac">登録済みの作品はありません。</p>
</div>

@else
					<ul class="favo_li mode_prod">
						@foreach($products as $product)
						<li>
							<div class="img_box mode_thum">
								@if($product->image)
								<img src="/upload/profile/{{$product->image}}" alt="">

								@endif
								
							</div>
							<div class="release">
								<button class="btn_release @if($product->status==1) active @endif" onclick="chgSt({{$product->id}},1)">公開</button>
								<button class="btn_release @if($product->status==2) active @endif" onclick="chgSt({{$product->id}},2)">非公開</button>

							</div>
							<div class="data">
								<a href="/jewellermenu/product/detail/{{$product->id}}"><span>{{$product->name}}</span></a>
							</div>
						</li>
						@endforeach
						
					</ul>
					<nav class="pager">
						 {{ $products->appends(request()->input())->render() }}
					</nav>
					@endif
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