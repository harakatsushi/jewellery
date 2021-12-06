
@extends('layouts.app', ['title' => '退会完了','css'=>'mymenu'])

@section('content')


		
		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>退会完了</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="./index.html">ai-jewelly TOPページ</a></li>
						<li>退会完了</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container">
			<main id="cont_main">
				<section id="my_profile" class="sec_area">
					<form action="./complete.html">
						<h3 class="tit_big02">
							完了
						</h3>
						<div class="txt_box">
							<p>退会が完了しました。<br>ご利用ありがとうございました。</p>
							<p>またのご利用をお待ちしております。</p>
							<p class="btn_mt">
								<a href="/" class="btn01 mode_back">
									ai-jewellyサイトTOPへ
								</a>
							</p>
						</div>
					</form>
				</section>
				<!--/#my_profile-->
			</main>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection