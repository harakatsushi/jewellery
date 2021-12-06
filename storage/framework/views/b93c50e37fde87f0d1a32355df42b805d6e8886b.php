

<?php $__env->startSection('content'); ?>



		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>発注履歴</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/mymenu">マイメニュー</a></li>
						<li>発注履歴</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						発注履歴
					</h3>
					<!--
<div class="begin_order txt_box">
<p>現在発注はしておりません。</p>
<a href="" class="disp_b btn_mt mode_s">初めての発注はこちらから</a>
</div>
-->
					<!--/「begin_order」-->
					<div class="order_box txt_box">
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
					</div>
					<!--/「begin_order」-->
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
				<!--/#my_history-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
				<?php echo $__env->make('layouts.my_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => '発注履歴｜マイメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/mymenu/orderhistory/index.blade.php ENDPATH**/ ?>