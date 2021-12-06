@extends('layouts.app', ['title' =>$material->name .'｜素材・デザイン一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'])

@section('content')


	

		<div id="page_tit">
			<div class="container">
				<h2>{{$material->name}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/{{$jeweller->id}}">{{$jeweller->name}}</a></li>
						<li><a href="/jeweller/{{$jeweller->id}}/material">作品一覧</a></li>
						<li>{{$material->name}}</li>
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
							@foreach($material->tags as $tag)
							<li>{{$tag->name}}</li>
							@endforeach
						</ul>
						<p class="prod_name">
							{{$material->name}}
						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/{{$material->image}}" alt="{{$material->name}}">
						</div>
						<div class="txt">
							<pre>{{$material->detail}}</pre>
						</div>
@if($material->sub_img1)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$material->sub_img1}}" alt="{{$material->name}}">
							</div>
							<p>
								{{$material->annotation01}}
							</p>
						</div>
						@endif
						@if($material->sub_img2)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$material->sub_img2}}" alt="{{$material->name}}">
							</div>
							<p>
								{{$material->annotation02}}
							</p>
						</div>
						@endif
						@if($material->sub_img3)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$material->sub_img3}}" alt="{{$material->name}}">
							</div>
							<p>
								{{$material->annotation03}}
							</p>
						</div>
						@endif
						@if($material->price)
						<dl class="price_box">
							<dt>
								参考価格
							</dt>
							<dd>
								{{number_format($material->price)}}円@if($material->price_option==2) ～ @endif
							</dd>
						</dl>
						@endif
					</div>
					<p class="btn_mt btn_mb">
						<a href="/mymenu/message/detail/material/{{$material->id}}" class="btn01">
							<span>このアイテムについて相談する</span>
						</a>
					</p>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_evaluation" class="mid_sec">
					<h3 class="tit_big02">
						このアイテムの直近の評価（最新5件）
					</h3>
					@if(!$evaluations)
					<p>
						評価はまだありません。
					</p>
					@else
					<ul class="mail_li mode_evaluation">
						@foreach($evaluations as $evaluation)
						<li>

							
							<dl>
								<dt>
									<a href="/user/detail/{{$evaluation->user_id}}">
										<div class="img_box mode_thum">
											@if($evaluation->user->image)
											<img src="/upload/profile/{{$evaluation->user->image}}" alt="{{$evaluation->user->name}}">
											@else
											<img src="/assets/images/user/common_user.jpg" alt="">
											@endif
										</div>
										<span>{{$evaluation->user->name}}</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<!-- <p class="tit">
												案件名案件名案件名
											</p> -->
											<div class="time">
												<time datatime="{{$evaluation->created_at}}">{{$evaluation->created_at}}</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">{{$evaluation->star}}</span><img src="/assets/images/mymenu/ico-star_{{$evaluation->star}}.svg" alt="">
										</div>
										<p class="txt">
											{{$evaluation->comment}}
										</p>
									</div>
								</dd>
							</dl>
						</li>
						@endforeach	
					</ul>
					@endif
					<p class="btn_mt btn_mb">
						<a href="/mymenu/message/detail/material/{{$material->id}}" class="btn01">
							<span>このアイテムについて相談する</span>
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