

<?php $__env->startSection('content'); ?>

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>マイメニュー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>マイメニュー</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<?php $__currentLoopData = $infomations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $infomation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="news_box">
					<time><?php echo e($infomation->yyyymmdd, false); ?></time>
					<p class="tit"><?php echo e($infomation->title, false); ?></p>
					<pre><?php echo e($infomation->detail, false); ?></pre>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						メッセージ
					</h3>
					<?php if(!$messages->count()): ?>

<div class="error_txt txt_box">
<p class="tac">メッセージはありません。</p>
</div>
<?php else: ?>
					<ul class="mail_li">
						<?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<dl>
								<dt>
									<?php if($message->messageLists->last()->user->id!= Auth::user()->id): ?>
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

										<div class="img_box mode_thum">
											<?php if(Auth::user()->image): ?><img src="/upload/profile/<?php echo e(Auth::user()->image, false); ?>" alt="">

											<?php else: ?>
											<img src="/assets/images/user/common_user.jpg" >
											<?php endif; ?>
										</div>
										<span>自分</span>
									

									<?php endif; ?>
								</dt>
								<dd>
									<div class="flag">
										<?php if(!$message->messageLists->last()->u_read_flg): ?>
										<img src="/assets/images/mymenu/ico-unread02.svg" alt="">
										<?php elseif($message->messageLists->last()->u_read_flg==1): ?>
										<img src="/assets/images/mymenu/ico-read02.svg" alt="">
										<?php else: ?>
										<img src="/assets/images/mymenu/ico-replay02.svg" alt="">
										<?php endif; ?>
									</div>
									<div class="overview">
										<p class="tit">
											<?php echo e($message->order->name, false); ?>

										</p>
										<a href="/mymenu/message/detail/<?php echo e($message->order->id, false); ?>" class="txt">
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
					<p class="btn_mt">
						<a href="/mymenu/message/" class="btn01">
							<span>メッセージ一覧へ</span>
						</a>
					</p>
					<?php endif; ?>
				</section>
				<!--/#my_history-->

				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						お気に入り一覧
					</h3>
					<?php if(!$bookmarks->count()): ?>
				
<div class="error_txt txt_box">
<p class="tac">お気に入りはありません。</p>
</div>

					<?php else: ?>
					<ul class="favo_li">
						<?php $__currentLoopData = $bookmarks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bookmark): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="img_box mode_thum">
								<?php if($bookmark->getObj()->image): ?>
								<img src="/upload/profile/<?php echo e($bookmark->getObj()->image, false); ?>" alt="">
								<?php else: ?>
								<img src="/assets/images/jeweller/img01.jpg" alt="">
								<?php endif; ?>
							</div>
							<button class="btn_favo mode_s active"  onclick="addBookmark('<?php echo e($bookmark->type, false); ?>',<?php echo e($bookmark->item_id, false); ?>)"></button>
							<div class="data">
								<?php if($bookmark->type=='jeweller'): ?>
								<a href="/jeweller/detail/<?php echo e($bookmark->item_id, false); ?>"><span><?php echo e($bookmark->getObj()->name, false); ?></span></a>
								<?php elseif($bookmark->type=='product'): ?>
								<a href="/jeweller/product/detail/<?php echo e($bookmark->item_id, false); ?>"><span><?php echo e($bookmark->getObj()->name, false); ?></span></a>
								<?php elseif($bookmark->type=='menu'): ?>
								<a href="/jeweller/menu/detail/<?php echo e($bookmark->item_id, false); ?>"><span><?php echo e($bookmark->getObj()->name, false); ?></span></a>
								<?php elseif($bookmark->type=='material'): ?>
								<a href="/jeweller/material/detail/<?php echo e($bookmark->item_id, false); ?>"><span><?php echo e($bookmark->getObj()->name, false); ?></span></a>
								<?php endif; ?>

							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
					<p class="btn_mt">
						<a href="/mymenu/favorite/" class="btn01">
							<span>お気に入り一覧へ</span>
						</a>
					</p>
					<?php endif; ?>
				</section>
				<!--/#my_favo-->

				<section id="my_order" class="mid_sec">
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
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
							<li class="wait_payment">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
							<li class="wait_shipping">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
							<li class="wait_check">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
							<li class="wait_assessment">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
						</ul>
						<p class="btn_mt">
							<a href="../mymenu/orderhistory/" class="btn01">
								<span>発注履歴一覧へ</span>
							</a>
						</p>
					</div>
					<!--/「begin_order」-->
				</section>
				<!--/#my_order-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
<?php echo $__env->make('layouts.my_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'マイメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/mymenu/index.blade.php ENDPATH**/ ?>