
@extends('layouts.app', ['title' => $product->name.'｜作品登録｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>{{$product->name}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu/">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/product">作品登録</a></li>
						<li>{{$product->name}}</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						登録内容
					</h3>
					<div class="prod_box">
						<ul class="tag_li">
							@foreach($product->tags as $tag)
							<li>{{$tag->name}}</li>
							@endforeach
						</ul>
						<p class="prod_name">
							{{$product->name}}
						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/{{$product->image}}" alt="">
						</div>
						<div class="txt">
							<pre>{{$product->detail}}</pre>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($product->sub_img1)<img src="/upload/profile/{{$product->sub_img1}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($product->annotation01)) !!}
							</p>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($product->sub_img2)<img src="/upload/profile/{{$product->sub_img2}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($product->annotation02)) !!}
							</p>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($product->sub_img3)<img src="/upload/profile/{{$product->sub_img3}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($product->annotation03)) !!}
							</p>
						</div>
						<dl class="price_box">
							<dt>
								参考価格
							</dt>
							<dd>
								{{number_format($product->price)}}円（入力がないと非表示になります）
							</dd>
						</dl>
						<div class="data_box">
							@if($product->status==1)<p>公開状況：公開</p>@endif
							@if($product->status==2)<p>公開状況：非公開</p>@endif
							@if($product->via==1)<p>制作経由：ai-jewelly</p>@endif
							@if($product->via==2)<p>制作経由：ai-jewelly以外</p>@endif
						</div>
					</div>
					<p class="btn_mt btn_mb">
						<a href="/jewellermenu/product/edit/{{$product->id}}" class="btn01">
							<span>登録作品を編集する</span>
						</a>
					</p>
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