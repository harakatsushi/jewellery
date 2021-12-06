
@extends('layouts.app', ['title' => 'プロフィール｜運営メニュー','css'=>'mymenu'])

@section('content')



		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィール</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>プロフィール</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section class="mid_sec">
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
										<img src="/assets/images/operation/operation_icon.jpg" alt="">
										@endif
									</div>
									<div class="data">
										<span>{{$user->name}}</span>
									</div>
								</div>
							</div>
						</div>
						<div class="table_style">
							<dl>
								<dt>
									登録メールアドレス
								</dt>
								<dd>
									{{$user->email}}
								</dd>
							</dl>
						</div>
						<p class="btn_mt btn_mb">
							<a href="/operationmenu/profile/edit" class="btn01">
								<span>プロフィールを編集する</span>
							</a>
						</p>
					</div>
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

				@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection
</html>