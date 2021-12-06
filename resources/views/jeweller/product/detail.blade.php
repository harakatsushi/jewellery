
@extends('layouts.app', ['title' =>$product->name .'｜作品一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'])

@section('content')


		

		<div id="page_tit">
			<div class="container">
				<h2>{{$product->name}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/{{$jeweller->id}}">{{$jeweller->name}}</a></li>
						<li><a href="/jeweller/{{$jeweller->id}}/product">作品一覧</a></li>
						<li>{{$product->name}}</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
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
							<img src="/upload/profile/{{$product->image}}" alt="{{$product->name}}">
						</div>
						<div class="txt">
							<pre>{{$product->detail}}</pre>
						</div>
						@if($product->sub_img1)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$product->sub_img1}}" alt="{{$product->name}}">
							</div>
							<p>
								{{$product->annotation01}}
							</p>
						</div>
						@endif
						@if($product->sub_img2)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$product->sub_img2}}" alt="{{$product->name}}">
							</div>
							<p>
								{{$product->annotation02}}
							</p>
						</div>
						@endif
						@if($product->sub_img3)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$product->sub_img3}}" alt="{{$product->name}}">
							</div>
							<p>
								{{$product->annotation03}}
							</p>
						</div>
						@endif
						@if($product->price)
						<dl class="price_box">
							<dt>
								参考価格
							</dt>
							<dd>
								{{number_format($product->price)}}円 @if($product->price_option==2) ～ @endif
							</dd>
						</dl>
						@endif
						<div class="data_box">
							@if($product->via==1)<p>制作経由：ai-jewelly</p>@endif
							@if($product->via==2)<p>制作経由：ai-jewelly以外</p>@endif
						</div>
					</div>
					<p class="btn_mt">
						<a href="/jeweller/{{$jeweller->id}}/menu" class="btn01">
							<span>メニュー一覧へ</span>
						</a>
					</p>
					<p class="btn_mt">
						<a href="/jeweller/{{$jeweller->id}}/material" class="btn01">
							<span>素材・デザイン一覧へ</span>
						</a>
					</p>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
@include('layouts.jeweller_front_menu')
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->

@endsection