@extends('layouts.app', ['title' => '運営会社'])

@section('content')

		<div id="page_tit">
			<div class="container">
				<h2>運営会社</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="../index.html">ai-jewelly TOPページ</a></li>
						<li>運営会社</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_col1">
			<main id="cont_main">
				<div class="read">
					<div class="txt_box">
						<div class="img_box">
							<img src="../assets/images/company/read_img01.jpg" alt="">
						</div>
						<p>
							ジュエリー業界は何かと閉鎖的であるために、ハードルが高いものと思われがちです。<br>
							ai-jewellyは作りたい人と作る人をマッチングし「皆様のジュエリーに関わる想いを実現させる」たくさんの人が関われる業界初のサービスです。
						</p>
						<p>
							ai-jewellyを通じてオリジナルジュエリーをもっと身近に、そしてジュエリーに関わる全ての人の想いが実現できる様尽力いたします。
						</p>
					</div>
				</div>

				<section id="sec_terms" class="mid_sec">
					<h3 class="tit_big">
						会社概要
					</h3>
					<div class="table_style">
						<dl>
							<dt>
								会社名
							</dt>
							<dd>
								株式会社 RAIN
							</dd>
						</dl>
						<dl>
							<dt>
								代表者
							</dt>
							<dd>
								石川 正道
							</dd>
						</dl>
						<dl>
							<dt>
								主要取引先
							</dt>
							<dd>
								みずほ銀行<br>
								東京シティ信用金庫
							</dd>
						</dl>
						<dl>
							<dt>
								設立
							</dt>
							<dd>
								2015年12月4日
							</dd>
						</dl>
						<dl>
							<dt>
								本社
							</dt>
							<dd>
								東京都台東区千束1-11-11
							</dd>
						</dl>
						<dl>
							<dt>
								電話番号
							</dt>
							<dd>
								<a href="tel:00-0000-0000">00-0000-0000</a>
							</dd>
						</dl>
						<dl>
							<dt>
								メールアドレス
							</dt>
							<dd>
								info@ai-jewelly.com
							</dd>
						</dl>
					</div>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
			</main>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->

@endsection