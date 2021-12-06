


<?php $__env->startSection('content'); ?>

	
		<!-- /#g_nav -->

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2><?php echo e($infomation->title, false); ?></h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li><a href="/operationmenu/news">お知らせ</a></li>
						<li><?php echo e($infomation->title, false); ?></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						お知らせ詳細
					</h3>
					<div class="news_box">
						<time><?php echo e($infomation->yyyymmdd, false); ?></time>
						<p class="tit"><?php echo e($infomation->title, false); ?></p>
						<pre><?php echo e($infomation->detail, false); ?></pre>
					</div>
					<div class="data_box">
						<p>公開状況：<?php if($infomation->status==1): ?>公開 <?php else: ?> 非公開 <?php endif; ?></p>
						<p>対象：<?php if($infomation->type==1): ?>ジュエラー <?php elseif($infomation->type==2): ?> ユーザー <?php else: ?> ジュエラー・ユーザー <?php endif; ?></p>
					</div>
					<p class="btn_mt btn_mb">
						<a href="/operationmenu/news/edit/<?php echo e($infomation->id, false); ?>" class="btn01">
							<span>編集する</span>
						</a>
					</p>
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
<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => $infomation->title.'｜お知らせ｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/news/detail.blade.php ENDPATH**/ ?>