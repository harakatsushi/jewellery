


<?php $__env->startSection('content'); ?>

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2><?php echo e($message->user->name, false); ?> <?php echo e($message->jeweller->name, false); ?> </h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">ジュエラーメニュー</a></li>
						<li><a href="/operationmenu/message/">メッセージ</a></li>
						<li><?php echo e($message->user->name, false); ?> <?php echo e($message->jeweller->name, false); ?> </li>
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
					<ul class="message_li">
												<?php $__currentLoopData = $messageLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messageList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($messageList->send_type=='user'): ?>
						<li>
							<div class="img_box mode_thum">
								<?php if($messageList->user->image): ?>
								<img src="/upload/profile/<?php echo e($messageList->user->image, false); ?>" alt="<?php echo e($messageList->user->name, false); ?>">
								<?php else: ?>
								<img src="/assets/images/user/common_user.jpg" alt="<?php echo e($messageList->user->name, false); ?>">
								
								<?php endif; ?>
							</div>
							<div class="data">
								<p class="contributor">
									<a href="/user/detail/<?php echo e($messageList->user->id, false); ?>"><?php echo e($messageList->user->name, false); ?></a>
									<span class="time"><?php echo e($messageList->created_at, false); ?></span>
								</p>
								<pre><?php echo e($messageList->detail, false); ?></pre>
								<?php if($messageList->file): ?>
								<div class="file">
									DL：<a href="/operationmenu/message/dl/<?php echo e($messageList->id, false); ?>" download="<?php echo e($messageList->org_file_name, false); ?>"><?php echo e($messageList->org_file_name, false); ?></a>
								</div>
								<?php endif; ?>
							</div>
						</li>
						<?php else: ?>
						<li>
							<div class="img_box mode_thum">
								<?php if($messageList->user->image): ?>
								<img src="/upload/profile/<?php echo e($messageList->user->image, false); ?>" alt="<?php echo e($messageList->user->name, false); ?>">
								<?php else: ?>
								<img src="/assets/images/jeweller/img01.jpg" alt="<?php echo e($messageList->user->name, false); ?>">
								<?php endif; ?>
							</div>
							<div class="data">
								<p class="contributor">
									<a href="/jeweller/profile/<?php echo e($messageList->user->id, false); ?>"><?php echo e($messageList->user->name, false); ?></a>
									
									<span class="time"><?php echo e($messageList->created_at, false); ?></span>
								</p>
								<pre><?php echo e($messageList->detail, false); ?></pre>
								<?php if($messageList->file): ?>
								<div class="file">
									DL：<a href="/operationmenu/message/dl/<?php echo e($messageList->id, false); ?>" download="<?php echo e($messageList->org_file_name, false); ?>"><?php echo e($messageList->org_file_name, false); ?></a>
								</div>
								<?php endif; ?>
							</div>
						</li>




						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
	<!-- 				<div class="input_box">
						<form action="">
							<textarea name="message" class="autosize"></textarea>
							<input type="file" name="item">
							<p class="btn_mt"><input type="submit" class="btn01" value="投稿する"></p>
						</form>
					</div> -->
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
<?php echo $__env->make('layouts.app', ['title' => 'メッセージ｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/message/detail.blade.php ENDPATH**/ ?>