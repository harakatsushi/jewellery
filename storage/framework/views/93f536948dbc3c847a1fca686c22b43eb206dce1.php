


<?php $__env->startSection('content'); ?>


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>お知らせ</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>お知らせ</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="new_post">
					<a href="/operationmenu/news/new_post" class="btn01">新規投稿</a>
				</div>
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						お知らせ
					</h3>
					<!--
<div class="begin_order txt_box">
<p>現在お知らせはありません。</p>
</div>
-->
					<!--/「begin_order」-->
					<div class="txt_box">
						<ul class="news_li">
							<?php $__currentLoopData = $infomations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infomation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li class="<?php if($infomation->status==1): ?>released <?php endif; ?> <?php if($infomation->type==1): ?>juweller <?php elseif($infomation->type==2): ?> user <?php else: ?> juweller user <?php endif; ?>">
								<time datetime="<?php echo e($infomation->yyyymmdd, false); ?>"><?php echo e($infomation->yyyymmdd, false); ?></time>
								<a href="/operationmenu/news/detail/<?php echo e($infomation->id, false); ?>"><?php echo e($infomation->title, false); ?></a>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</ul>
					</div>
					<!--/「begin_order」-->
					<nav class="pager">
						 <?php echo e($infomations->appends(request()->input())->render(), false); ?>

						
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
<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'お知らせ｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/news/index.blade.php ENDPATH**/ ?>