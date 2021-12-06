


<?php $__env->startSection('content'); ?>

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>メッセージ</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>メッセージ</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_message" class="mid_sec">
					<h3 class="tit_big02">
						メッセージ
					</h3>
					<!--
<div class="error_txt txt_box">
<p class="tac">メッセージはありません。</p>
</div>
-->
					<ul class="mail_li">
						<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<dl>
								<dt>
									<?php if($message->messageLists->last()->send_type=='jeweller'): ?>
									<a href="/jeweller/profile/<?php echo e($message->messageLists->last()->user->id, false); ?>">
										<div class="img_box mode_thum">
											<?php if($message->messageLists->last()->user->image): ?>
											<img src="/upload/profile/<?php echo e($message->messageLists->last()->user->image, false); ?>" alt="">
											<?php else: ?>
											<img src="/assets/images/jeweller/img01.jpg" alt="">
											<?php endif; ?>
										</div>
										<span><?php echo e($message->messageLists->last()->user->name, false); ?></span>
									</a>
									<?php else: ?>
									<a href="/user/detail/<?php echo e($message->messageLists->last()->user->id, false); ?>">
										<div class="img_box mode_thum">
											<?php if($message->messageLists->last()->user->image): ?>
											<img src="/upload/profile/<?php echo e($message->messageLists->last()->user->image, false); ?>" alt="">
											<?php else: ?>
											<img src="/assets/images/user/common_user.jpg" >
											<?php endif; ?>
										</div>
										<span><?php echo e($message->messageLists->last()->user->name, false); ?></span>
									
										</a>
									<?php endif; ?>
								</dt>
								<dd>
									<div class="flag">
										<?php if($message->messageLists->last()->send_type=='jeweller'): ?>
											<?php if(!$message->messageLists->last()->j_read_flg): ?>
											<img src="/assets/images/mymenu/ico-unread02.svg" alt="">
											<?php elseif($message->messageLists->last()->j_read_flg==1): ?>
											<img src="/assets/images/mymenu/ico-read02.svg" alt="">
											<?php else: ?>
											<img src="/assets/images/mymenu/ico-replay02.svg" alt="">
											<?php endif; ?>

										<?php else: ?>
											<?php if(!$message->messageLists->last()->u_read_flg): ?>
											<img src="/assets/images/mymenu/ico-unread02.svg" alt="">
											<?php elseif($message->messageLists->last()->u_read_flg==1): ?>
											<img src="/assets/images/mymenu/ico-read02.svg" alt="">
											<?php else: ?>
											<img src="/assets/images/mymenu/ico-replay02.svg" alt="">
											<?php endif; ?>
										<?php endif; ?>
									</div>
									<div class="overview">
										<p class="tit">
											<?php echo e($message->order->name, false); ?>

										</p>
										<a href="/operationmenu/message/detail/<?php echo e($message->order->id, false); ?>" class="txt">
											<?php echo e($message->messageLists->last()->detail, false); ?>

										</a>
									</div>
									<div class="time">
										<time datatime="<?php echo e($message->last_send_at, false); ?>"><?php echo e(substr($message->last_send_at,0,10), false); ?><br class="rwd_disp_xo"><?php echo e(substr($message->last_send_at,11,5), false); ?></time>
									</div>
								</dd>
							</dl>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
					<nav class="pager">
										<?php echo e($messages->appends(request()->input())->render(), false); ?>

					</nav>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_message-->
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
<?php echo $__env->make('layouts.app', ['title' => 'メッセージ｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/message/index.blade.php ENDPATH**/ ?>