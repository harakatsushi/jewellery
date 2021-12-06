


<?php $__env->startSection('content'); ?>


		

		<div id="page_tit">
			<div class="container">
				<h2><?php echo e($product->name, false); ?></h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/<?php echo e($jeweller->id, false); ?>"><?php echo e($jeweller->name, false); ?></a></li>
						<li><a href="/jeweller/<?php echo e($jeweller->id, false); ?>/product">作品一覧</a></li>
						<li><?php echo e($product->name, false); ?></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						登録内容
					</h3>
					<div class="prod_box">
						<ul class="tag_li">
							<?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($tag->name, false); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
						<p class="prod_name">
							<?php echo e($product->name, false); ?>

						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/<?php echo e($product->image, false); ?>" alt="<?php echo e($product->name, false); ?>">
						</div>
						<div class="txt">
							<pre><?php echo e($product->detail, false); ?></pre>
						</div>
						<?php if($product->sub_img1): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($product->sub_img1, false); ?>" alt="<?php echo e($product->name, false); ?>">
							</div>
							<p>
								<?php echo e($product->annotation01, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<?php if($product->sub_img2): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($product->sub_img2, false); ?>" alt="<?php echo e($product->name, false); ?>">
							</div>
							<p>
								<?php echo e($product->annotation02, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<?php if($product->sub_img3): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($product->sub_img3, false); ?>" alt="<?php echo e($product->name, false); ?>">
							</div>
							<p>
								<?php echo e($product->annotation03, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<?php if($product->price): ?>
						<dl class="price_box">
							<dt>
								参考価格
							</dt>
							<dd>
								<?php echo e(number_format($product->price), false); ?>円
							</dd>
						</dl>
						<?php endif; ?>
						<div class="data_box">
							<?php if($product->via==1): ?><p>制作経由：ai-jewelly</p><?php endif; ?>
							<?php if($product->via==2): ?><p>制作経由：ai-jewelly以外</p><?php endif; ?>
						</div>
					</div>
					<p class="btn_mt">
						<a href="/jeweller/<?php echo e($jeweller->id, false); ?>/menu" class="btn01">
							<span>メニュー一覧へ</span>
						</a>
					</p>
					<p class="btn_mt">
						<a href="/jeweller/<?php echo e($jeweller->id, false); ?>/material" class="btn01">
							<span>素材・デザイン一覧へ</span>
						</a>
					</p>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
<?php echo $__env->make('layouts.jeweller_front_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' =>$product->name .'｜作品一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jeweller/product/detail.blade.php ENDPATH**/ ?>