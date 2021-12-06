@extends('layouts.app', ['title' => $jeweller->name.'さん｜在籍ジュエラー｜ジュエラーメニュー'])

@section('content')

	

		<div id="page_tit">
			<div class="container">
				<h2>在籍ジュエラー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li>{{$jeweller->name}}さん</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<h3 class="tit_big02">
						{{$jeweller->name}}さん
					</h3>
					<div class="profile_box">
						<div class="profile_top">
							<div class="data">
								<div class="left">
									<div class="img_box mode_thum">
										@if($jeweller->image)<img src="/upload/profile/{{$jeweller->image}}" alt="">
										@else
										<img src="/assets/images/jeweller/img01.jpg" alt="">
										@endif
									</div>
									<div class="data">
										<span>{{$jeweller->name}}</span>
									</div>
								</div>
								<div class="fav_box">
									<button class="btn_favo mode02  @if($bookmarks && $bookmarks->contains('item_id',$jeweller->id)) active @endif"  onclick="addBookmark('jeweller',{{$jeweller->id}})">
										
										@if($bookmarks && $bookmarks->contains('item_id',$jeweller->id)) 
										<span class="pos_txt" >お気に入りに登録済</span> 

										@else
										<span class="neg_txt" >お気に入りに登録</span>
										@endif

									</button>
								</div>
								<div class="right">
									<div class="evaluation">
										<dl class="transaction">
											<dt>
												取引実績
											</dt>
											<dd>
												<<div><span class="fs">{{$jeweller->eva_cnt}}</span>件</div>
											</dd>
										</dl>
										<dl class="transaction">
											<dt>
												完了率
											</dt>
											<dd>
												<div><span class="fs">100</span>%</div>
											</dd>
										</dl>
										<dl class="point">
											<dt>
												総合評価
											</dt>
											<dd>
												{{$jeweller->ave_evaluation}}

												@if($jeweller->ave_evaluation)
												<div class="star_box">
													<img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
												</div>
												@endif
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
						<dl class="comment">
							<dt>
								コメント：
							</dt>
							<dd>
								<pre>{{$jeweller->comment}}</pre>
							</dd>
						</dl>
						<div class="table_style">
							<dl>
								<dt>
									業界経験歴
								</dt>
								<dd>
									{{$jeweller->year}}年
								</dd>
							</dl>
							<dl>
								<dt>
									メインジャンル
								</dt>
								<dd>
									{{$jeweller->genre->name}}
								</dd>
							</dl>
							<dl>
								<dt>
									サブジャンル
								</dt>
								<dd>
									<ul>
										@foreach($jeweller->genres as $genre)
										<li>{{$genre->name}}</li>
										@endforeach
									</ul>
								</dd>
							</dl>
						</div>
					</div>
				</section>
				<!--/sec-->
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						作品
					</h3>
					<ul class="prod_li mode02">
						@foreach($products as $product)
						@if($product->status==1)
						<li><button onclick="addBookmark('product',{{$product->id}})" class="btn_favo mode_s @if($product_bookmarks && $product_bookmarks->contains('item_id',$product->id)) active @endif"></button><a href="/jeweller/product/detail/{{$product->id}}"><img src="/upload/profile/{{$product->image}}" alt="{{$product->name}}"></a></li>
						@endif
						@endforeach
					</ul>
					<p class="btn_mt">
						<a href="/jeweller/{{$jeweller->id}}/product/" class="btn01">
							<span>作品一覧へ</span>
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						メニュー
					</h3>
					<ul class="item_box mode_menu">
						@foreach($menus as $menu)
						@if($menu->status==1)
						<li>
							<button onclick="addBookmark('menu',{{$menu->id}})" class="btn_favo mode_s @if($menu_bookmarks && $menu_bookmarks->contains('item_id',$menu->id)) active @endif"></button>
							<a href="/jeweller/menu/detail/{{$menu->id}}">
								<div class="img_box mode_thum">
									<img src="/upload/profile/{{$menu->image}}" alt="{{$menu->name}}">
									<div class="data">
										<ul class="tag_li">
											<li class="price">{{number_format($menu->price)}}円{{$menu->name}}</li>
										</ul>
										<p class="txt">{{$menu->detail}}</p>
									</div>
								</div>
							</a>
						</li>
						@endif
						@endforeach
						
					</ul>
					<p class="btn_mt">
						<a href="/jeweller/{{$jeweller->id}}/menu/" class="btn01">
							<span>メニュー一覧へ</span>
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_material" class="mid_sec">
					<h3 class="tit_big02">
						素材・デザイン
					</h3>
					<ul class="item_box mode_material">
						@foreach($materials as $material)
						@if($menu->status==1)
						<li>
							<button  onclick="addBookmark('material',{{$material->id}})" class="btn_favo mode_s @if($material_bookmarks && $material_bookmarks->contains('item_id',$material->id)) active @endif"></button>
							<a href="/jeweller/material/detail/{{$material->id}}">
								<div class="img_box mode_thum">
									<img src="/upload/profile/{{$material->image}}" alt="{{$material->name}}">
								</div>
								<div class="data">
									<ul class="tag_li">
										<li>{{$material->name}}</li>
									</ul>
									<p class="txt">{{$material->detail}}</p>
								</div>
							</a>
						</li>
						@endif
						@endforeach
						
					</ul>
					<p class="btn_mt">
						<a href="/jeweller/{{$jeweller->id}}/material" class="btn01">
							<span>素材・デザイン一覧へ</span>
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_evaluation" class="mid_link">
					<h3 class="tit_big02">
						直近の評価（最新10件）
					</h3>
										@if($evaluations->count()<1)
					<p>
						評価はまだありません。
					</p>
					@else
					<ul class="mail_li mode_evaluation">
						@foreach($evaluations as $evaluation)
						<li>
							<dl>
								<dt>
									<a href="/user/detail/{{$evaluation->user->id}}">
										<div class="img_box mode_thum">
											@if($evaluation->user->image)
											<img src="/upload/profile/{{$evaluation->user->image}}" alt="">
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
											<p class="tit">
												@if($evaluation->message->order) {{$evaluation->message->order->name}} @endif
											</p>
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
						
				</section>
				<!--/sec-->
				<p class="btn_mt">
					<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
						BACK
					</a>
				</p>
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
@include('layouts.jeweller_front_menu')
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection