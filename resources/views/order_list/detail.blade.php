@extends('layouts.app', ['title' =>$order->name. '｜公開依頼一覧｜'])

@section('content')


		<div id="page_tit">
			<div class="container">
				<h2>{{$order->name}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/order_liste">公開依頼一覧</a></li>
						<li>{{$order->name}}</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<div class="search_conditions mid_sec">
					<p class="tit">検索条件</p>
					<dl>
						<dt>
							募集期限：
						</dt>
						<dd>
							{{$order->limit_date1}}
						</dd>
					</dl>
					<dl>
						<dt>
							納期：
						</dt>
						<dd>
							{{$order->limit_date2}}
						</dd>
					</dl>
				</div>
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						公開依頼詳細
					</h3>
					<div class="prod_box">
						<ul class="tag_li">
							<li class="cate">{{$order->category->name}}</li>
										@foreach($order->tags as $tag)
										<li>{{$tag->name}}</li>
										@endforeach
						</ul>
						<!-- <p class="beginner">
							珍しい素材のジュエリーがつくりたい
						</p> -->
						<p class="prod_name">
							{{$order->name}}
						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/{{$order->image}}" alt="">
						</div>
						<div class="txt">
							<pre>{{$order->detail}}</pre>
						</div>
						@if($order->sub_img1)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$order->sub_img1}}" alt="{{$order->name}}">
							</div>
							<p>
								{{$order->annotation01}}
							</p>
						</div>
						@endif
						@if($order->sub_img2)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$order->sub_img2}}" alt="{{$order->name}}">
							</div>
							<p>
								{{$order->annotation02}}
							</p>
						</div>
						@endif
						@if($order->sub_img3)
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/{{$order->sub_img3}}" alt="{{$order->name}}">
							</div>
							<p>
								{{$order->annotation03}}
							</p>
						</div>
						@endif
						<dl class="price_box">
							<dt>
								制作希望価格
							</dt>
							<dd>
								{{number_format($order->price)}}円
							</dd>
						</dl>
					</div>
					<p class="btn_mt">
						<a href="/jewellermenu/message/detail/order/{{$order->id}}" class="btn01">
							<span>この案件に応募する</span>
						</a>
					</p>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_history-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
				<dl class="menu_box narrow_box">
					<dt>
						ユーザー情報
					</dt>
					<dd>
						<div class="data">
							<div class="img_box">
								<img src="/upload/profile/{{$order->user->image}}" alt="">
							</div>
							<p class="name">
								{{$order->user->name}}
							</p>
						</div>
						<ul class="nav_menu">
							<li><a href="/user/detail/{{$order->user->id}}">{{$order->user->name}}さんのプロフィール</a></li>
						</ul>
						<p class="btn_mt">
							<a href="/jewellermenu/message/detail/order/{{$order->id}}" class="btn01">
								<span>この案件に応募する</span>
							</a>
						</p>
					</dd>
				</dl>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection