@extends('layouts.app', ['title' => 'お問い合わせ'])

@section('content')


		<div id="page_tit">
			<div class="container">
				<h2>お問い合わせ</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>お問い合わせ</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_col1">
			<main id="cont_main">
				<section id="sec" class="mid_sec">
					<h3 class="tit_big02">
						送信完了
					</h3>
					<div class="txt_box">
						<p>
							お問い合わせ誠にありがとうございます。<br>
							ご入力いただいたメールアドレス宛に控えのメールを送信いたしました。
						</p>
						<p>
							回答が必要なものに関しましてはご入力いただいたメールアドレス宛に、運営よりご回答を3営業日以内にご回答を差し上げますので少々お待ちください。
						</p>
					</div>
					<p class="btn_mt">
						<a href="/" class="btn01 mode_back">
							ai-jewwely TOPへ
						</a>
					</p>
				</section>
				<!--/sec-->
			</main>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection