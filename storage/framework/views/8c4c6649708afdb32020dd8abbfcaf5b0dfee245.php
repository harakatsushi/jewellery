


<?php $__env->startSection('content'); ?>

		
		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィール編集完了</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/home/">マイメニュー</a></li>
						<li>プロフィール編集完了</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<h3 class="tit_big02">
						完了
					</h3>
					<div class="txt_box">
						<p>プロフィールが変更されました。</p>
						<p class="btn_mt">
							<a href="/home" class="btn01 mode_back">
								マイメニューTOPへ
							</a>
						</p>
					</div>
				</section>
				<!--/#my_profile-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
<?php echo $__env->make('layouts.my_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'プロフィール編集完了｜','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/mymenu/profile/complete.blade.php ENDPATH**/ ?>