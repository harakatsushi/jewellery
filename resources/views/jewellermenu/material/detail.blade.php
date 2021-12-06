
@extends('layouts.app', ['title' => $material->name.'｜素材・デザイン登録｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>{{$material->name}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu/">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/material">素材・デザイン登録</a></li>
						<li>{{$material->name}}</li>
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
							@foreach($material->tags as $tag)
							<li>{{$tag->name}}</li>
							@endforeach
						</ul>
						<p class="prod_name">
							{{$material->name}}
						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/{{$material->image}}" alt="">
						</div>
						<div class="txt">
							<pre>{{$material->detail}}</pre>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($material->sub_img1)<img src="/upload/profile/{{$material->sub_img1}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($material->annotation01)) !!}
							</p>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($material->sub_img2)<img src="/upload/profile/{{$material->sub_img2}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($material->annotation02)) !!}
							</p>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								@if($material->sub_img3)<img src="/upload/profile/{{$material->sub_img3}}" alt="">@endif
							</div>
							<p>
								{!! nl2br(htmlspecialchars($material->annotation03)) !!}
							</p>
						</div>
						<dl class="price_box">
							<dt>
								参考価格
							</dt>
							<dd>
								{{number_format($material->price)}}円（入力がないと非表示になります）
							</dd>
						</dl>
						<div class="data_box">
							@if($material->status==1)<p>公開状況：公開</p>@endif
							@if($material->status==2)<p>公開状況：非公開</p>@endif
							@if($material->via==1)<p>制作経由：ai-jewelly</p>@endif
							@if($material->via==2)<p>制作経由：ai-jewelly以外</p>@endif
						</div>
					</div>
					<p class="btn_mt btn_mb">
						<a href="/jewellermenu/material/edit/{{$material->id}}" class="btn01">
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