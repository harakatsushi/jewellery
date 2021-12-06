


<?php $__env->startSection('content'); ?>

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>運営ユーザー招待</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>運営ユーザー招待</li>
					</ul>
				</nav>
			</div>
		</div>
		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<form action="" method="post"><?php echo csrf_field(); ?>
						<h3 class="tit_big02">
							運営ユーザー招待
						</h3>
						<div class="profile_box">

							          <?php if(count($errors) > 0): ?>
				          <div class="error_txt txt_box">
				              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				              <p class="tac"> <?php echo $error; ?></p>
				              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				          </div>
				          <?php endif; ?>
							<div class="table_style mode_contact">
								<dl>
									<dt class="req">
										Eメールアドレス
									</dt>
									<dd>
										<input type="email" name="email" value="" required="required">
									</dd>
								</dl>
							</div>
						</div>
						<p class="btn_mt btn_mb">
							<input type="submit" class="btn01" value="投稿する">
						</p>
						<p class="btn_mt">
							<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
								BACK
							</a>
						</p>
					</form>
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
<?php echo $__env->make('layouts.app', ['title' => '運営ユーザー招待｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/invitation/index.blade.php ENDPATH**/ ?>