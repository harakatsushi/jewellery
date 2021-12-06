


<?php $__env->startSection('content'); ?>



		<div id="page_tit">
			<div class="container">
				<h2>作品一覧</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/<?php echo e($jeweller->id, false); ?>"><?php echo e($jeweller->name, false); ?></a></li>
						<li>作品一覧</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						一覧
					</h3>
					<ul class="prod_li mode02">
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><button onclick="addBookmark('product',<?php echo e($product->id, false); ?>)" class="btn_favo mode_s <?php if($product_bookmarks && $product_bookmarks->contains('item_id',$product->id)): ?> active <?php endif; ?>"></button><a href="/jeweller/product/detail/<?php echo e($product->id, false); ?>"><img src="/upload/profile/<?php echo e($product->image, false); ?>" alt="<?php echo e($product->name, false); ?>"></a></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<nav class="pager">
						<ul>
							<?php echo e($products->appends(request()->input())->render(), false); ?>

						</ul>
					</nav>
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
<?php echo $__env->make('layouts.app', ['title' => '作品一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jeweller/product/index.blade.php ENDPATH**/ ?>