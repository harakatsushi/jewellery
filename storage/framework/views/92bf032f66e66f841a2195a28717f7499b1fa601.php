

<?php $__env->startSection('content'); ?>

	
		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>進捗管理</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">ジュエラーメニュー</a></li>
						<li>進捗管理</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						進捗管理一覧（絞り込み後は条件がここに入ります）
					</h3>
					<ul class="news_li">
						<li class="wait_contract">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="wait_payment">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="wait_shipping">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="wait_check">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="wait_assessment">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="fix">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="fix">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="fix">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="fix">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
						<li class="fix">
							<time datetime="2020/00/00">2020/00/00</time>
							<a href="./detail.html">案件名案件名</a>
						</li>
					</ul>
					<nav class="pager">
						<ul>
							<li class="active">
								<a href="">
									&laquo;
								</a>
							</li>
							<li class="active">
								<a href="">
									1
								</a>
							</li>
							<li>
								<a href="">
									2
								</a>
							</li>
							<li>
								<a href="">
									3
								</a>
							</li>
							<li>
								<a href="">
									4
								</a>
							</li>
							<li>
								<a href="">
									5
								</a>
							</li>
							<li>
								<a href="">
									&raquo;
								</a>
							</li>
						</ul>
					</nav>
					<nav class="pager">
						<ul>
							<li>
								<a href="">
									&laquo;
								</a>
							</li>
							<li>
								<a href="">
									6
								</a>
							</li>
							<li>
								<a href="">
									7
								</a>
							</li>
							<li class="active">
								<a href="">
									8
								</a>
							</li>
							<li>
								<a href="">
									9
								</a>
							</li>
							<li>
								<a href="">
									10
								</a>
							</li>
							<li>
								<a href="">
									&raquo;
								</a>
							</li>
						</ul>
					</nav>
					<nav class="pager">
						<ul>
							<li>
								<a href="">
									&laquo;
								</a>
							</li>
							<li>
								<a href="">
									11
								</a>
							</li>
							<li>
								<a href="">
									12
								</a>
							</li>
							<li>
								<a href="">
									13
								</a>
							</li>
							<li>
								<a href="">
									14
								</a>
							</li>
							<li class="active">
								<a href="">
									15
								</a>
							</li>
							<li class="active">
								<a href="">
									&raquo;
								</a>
							</li>
						</ul>
					</nav>
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
				<dl class="menu_box narrow_box tag_dl">
					<dt>
						絞り込み表示
					</dt>
					<dd>
						<form action="./index.html">
							<ul class="nav_menu">
								<li>
									<label>
										<input type="checkbox" name="tag_type" value="契約前"> 契約前
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="tag_type" value="仮払い承認待ち"> 仮払い承認待ち
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="tag_type" value=" 発送待ち"> 発送待ち
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="tag_type" value=" 検収待ち"> 検収待ち
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="tag_type" value=" 評価待ち"> 評価待ち
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="tag_type" value=" 納品済み"> 納品済み
									</label>
								</li>
							</ul>
							<p class="btn_mt">
								<input type="submit" class="btn01" value="検索する">
							</p>
							<p class="btn_mt">
								<a href="./index.html" class="fs">
									全て表示
								</a>
							</p>
						</form>
					</dd>
				</dl>
				<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts.app', ['title' => '進捗管理｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/progress/index.blade.php ENDPATH**/ ?>