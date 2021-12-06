
@extends('layouts.app', ['title' => '運営ユーザー招待｜運営メニュー','css'=>'mymenu'])

@section('content')



		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>運営ユーザー招待</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>運営ユーザー招待</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<form action="./complete.html" method="post">
						<h3 class="tit_big02">
							完了
						</h3>
						<div class="txt_box">
							<p>招待が送信されました。</p>
							<p>登録後は「非承認」になっていますので、「運営ユーザー承認」から承認してください。</p>
							<p class="btn_mt">
								<a href="/operationmenu" class="btn01 mode_back">
									運営メニューTOPへ
								</a>
							</p>
						</div>
					</form>
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