


<?php $__env->startSection('content'); ?>



		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィール</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>プロフィール</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section class="mid_sec">
					<h3 class="tit_big02">
						現在の登録情報
					</h3>
					<div class="profile_box">
						<div class="profile_top">
							<div class="data">
								<div class="left">
									<div class="img_box mode_thum">
										<?php if($user->image): ?>
										<img src="/upload/profile/<?php echo e($user->image, false); ?>" alt="">
										<?php else: ?>
										<img src="/assets/images/operation/operation_icon.jpg" alt="">
										<?php endif; ?>
									</div>
									<div class="data">
										<span><?php echo e($user->name, false); ?></span>
									</div>
								</div>
							</div>
						</div>
						<div class="table_style">
							<dl>
								<dt>
									登録メールアドレス
								</dt>
								<dd>
									<?php echo e($user->email, false); ?>

								</dd>
							</dl>
						</div>
						<p class="btn_mt btn_mb">
							<a href="/operationmenu/profile/edit" class="btn01">
								<span>プロフィールを編集する</span>
							</a>
						</p>
					</div>
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

				<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts.app', ['title' => 'プロフィール｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/profile/index.blade.php ENDPATH**/ ?>