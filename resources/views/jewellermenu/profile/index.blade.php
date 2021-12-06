
@extends('layouts.app', ['title' => 'プロフィール｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィール</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>プロフィール</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<h3 class="tit_big02">
						現在の登録情報
					</h3>
					<div class="profile_box">
						<div class="profile_top">
							<div class="data">
								<div class="left">
									<div class="img_box mode_thum">
										@if($user->image)
										<img src="/upload/profile/{{$user->image}}" alt="">
										@else
										<img src="/assets/images/jeweller/img01.jpg" alt="">
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
												<div><span class="fs">5</span>件</div>
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
								<pre>{{$user->comment}}</pre>
							</dd>
						</dl>
						<div class="table_style">
							<dl>
								<dt>
									業界経験歴
								</dt>
								<dd>
									{{$user->year}}年
								</dd>
							</dl>
							<dl>
								<dt>
									メインジャンル
								</dt>
								<dd>
									{{$user->genre->name}}
								</dd>
							</dl>
							<dl>
								<dt>
									サブジャンル
								</dt>
								<dd>
									<ul>
										@foreach($user->genres as $genre)
										<li>{{$genre->name}}</li>
										@endforeach
									</ul>
								</dd>
							</dl>
							<dl>
								<dt>
									登録メールアドレス
								</dt>
								<dd>
									{{$user->email}}
								</dd>
							</dl>
							<dl>
								<dt>
									報酬振込先
								</dt>
								<dd>
									@if($user->bank_name && $user->bank_branch_name && $user->bank_type &&  $user->bank_number)

									<p>{{$user->bank_name}}銀行</p>
									<p>{{$user->bank_branch_name}}支店</p>
									<p>{{$user->bank_type}}</p>
									<p>{{$user->bank_number}}</p>
									@else
									振込先が登録されていません。<br>
									<a href="/jewellermenu/profile/edit">プロフィール編集</a>より登録をしてください。

									@endif

								</dd>
							</dl>
						</div>
					</div>
					<p class="btn_mt btn_mb">
						<a href="/jewellermenu/profile/edit" class="btn01">
							<span>プロフィールを編集する</span>
						</a>
					</p>
				</section>
				<!--/#my_profile-->
				<section id="my_evaluation" class="mid_sec">
					<h3 class="tit_big02">
						あなたの評価
					</h3>
					<ul class="mail_li mode_evaluation">
						<li>
							<dl>
								<dt>
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
					</ul>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_evaluation-->
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