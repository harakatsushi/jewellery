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
						入力内容確認
					</h3>
					<div class="txt_box">
						<p>
							ご入力いただいた内容に誤りがなければ「送信する」を押してください。
						</p>
					</div>

					<form action="/contact/end" method="post">@csrf
						<div class="table_style mode_contact btn_mt">
							<dl>
								<dt class="req">
									お名前
								</dt>
								<dd>
									{{request()->input("name")}}
									<input type="hidden" class="name" value="">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									メールアドレス
								</dt>
								<dd>
									{{request()->input("email")}}
									<input type="hidden" class="email" value="">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									お問い合わせ内容
								</dt>
								<dd>
									<pre>{{request()->input("detail")}}</pre>
									<textarea name="txt" class="resize hidden"></textarea>
								</dd>
							</dl>
							<p class="btn_mt">
								<input type="submit" value="送信する" class="btn01">
							</p>
						</div>
					</form>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
			</main>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection