@extends('layouts.app', ['title' => $user->name.'さん｜ユーザー'])

@section('content')


		<div id="page_tit">
			<div class="container">
				<h2>ユーザー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>{{$user->name}}さん</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<h3 class="tit_big02">
						{{$user->name}}さん
					</h3>
					<div class="profile_box">
						<div class="profile_top">
							<div class="data">
								<div class="left">
									<div class="img_box mode_thum">
										@if($user->image)
										<img src="/upload/profile/{{$user->image}}" alt="">
										@else
										<img src="/assets/images/user/common_user.jpg" alt="">
										@endif
									</div>
									<div class="data">
										<span>{{$user->name}}</span>
									</div>
								</div>
								<div class="right">
									<div class="evaluation">
										<dl class="transaction">
											<dt>
												取引実績
											</dt>
											<dd>
												<div><span class="fs">{{$user->eva_cnt}}</span>件</div>
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
												{{$user->ave_evaluation}}

												@if($user->ave_evaluation)
												<div class="star_box">
													<img src="/assets/images/mymenu/ico-star_{{$user->ave_evaluation}}.svg" alt="">
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
								<pre>{{$user->comment}}</pre>
							</dd>
						</dl>
					</div>
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
									<a href="/jeweller/detail/{{$evaluation->user->id}}">
										<div class="img_box mode_thum">
											@if($evaluation->user->image)
											<img src="/upload/profile/{{$evaluation->user->image}}" alt="">
											@else
											<img src="/assets/images/jeweller/img01.jpg" alt="">
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
				<dl class="menu_box">
					<dt>
						ユーザー情報
					</dt>
					<dd>
						<div class="data">
							<div class="img_box">
								@if($user->image)
										<img src="/upload/profile/{{$user->image}}" alt="">
										@else
										<img src="/assets/images/user/common_user.jpg" alt="">
										@endif
							</div>
							<p class="name">
								{{$user->name}}
							</p>
						</div>
						<ul class="nav_menu">
							<li><a href="/user/detail/{{$user->id}}#pagetop">{{$user->name}}さんのプロフィールTOP</a></li>
							<li><a href="/user/detail/{{$user->id}}#sec_evaluation">直近の評価</a></li>
						</ul>
					</dd>
				</dl>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection