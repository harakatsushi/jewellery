

<?php $__env->startSection('content'); ?>


		<div id="page_tit">
			<div class="container">
				<h2><?php echo e($order->name, false); ?></h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/order_liste">公開依頼一覧</a></li>
						<li><?php echo e($order->name, false); ?></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<div class="search_conditions mid_sec">
					<p class="tit">検索条件</p>
					<dl>
						<dt>
							募集期限：
						</dt>
						<dd>
							<?php echo e($order->limit_date1, false); ?>

						</dd>
					</dl>
					<dl>
						<dt>
							納期：
						</dt>
						<dd>
							<?php echo e($order->limit_date2, false); ?>

						</dd>
					</dl>
				</div>
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						公開依頼詳細
					</h3>
					<div class="prod_box">
						<ul class="tag_li">
							<li class="cate"><?php echo e($order->category->name, false); ?></li>
										<?php $__currentLoopData = $order->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($tag->name, false); ?></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
						<!-- <p class="beginner">
							珍しい素材のジュエリーがつくりたい
						</p> -->
						<p class="prod_name">
							<?php echo e($order->name, false); ?>

						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/<?php echo e($order->image, false); ?>" alt="">
						</div>
						<div class="txt">
							<pre><?php echo e($order->detail, false); ?></pre>
						</div>
						<?php if($order->sub_img1): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($order->sub_img1, false); ?>" alt="<?php echo e($order->name, false); ?>">
							</div>
							<p>
								<?php echo e($order->annotation01, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<?php if($order->sub_img2): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($order->sub_img2, false); ?>" alt="<?php echo e($order->name, false); ?>">
							</div>
							<p>
								<?php echo e($order->annotation02, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<?php if($order->sub_img3): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($order->sub_img3, false); ?>" alt="<?php echo e($order->name, false); ?>">
							</div>
							<p>
								<?php echo e($order->annotation03, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<dl class="price_box">
							<dt>
								制作希望価格
							</dt>
							<dd>
								<?php echo e(number_format($order->price), false); ?>円
							</dd>
						</dl>
					</div>
					<p class="btn_mt">
						<a href="/jewellermenu/message/detail/<?php echo e($order->id, false); ?>" class="btn01">
							<span>この案件に応募する</span>
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
				<dl class="menu_box narrow_box">
					<dt>
						ユーザー情報
					</dt>
					<dd>
						<div class="data">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($order->user->image, false); ?>" alt="">
							</div>
							<p class="name">
								<?php echo e($order->user->name, false); ?>

							</p>
						</div>
						<ul class="nav_menu">
							<li><a href="/user/detail/<?php echo e($order->user->id, false); ?>"><?php echo e($order->user->name, false); ?>さんのプロフィール</a></li>
						</ul>
						<p class="btn_mt">
							<a href="/jewellermenu/message/detail/<?php echo e($order->id, false); ?>" class="btn01">
								<span>この案件に応募する</span>
							</a>
						</p>
					</dd>
				</dl>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' =>$order->name. '｜公開依頼一覧｜'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/order_list/detail.blade.php ENDPATH**/ ?>