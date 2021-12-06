


<?php $__env->startSection('content'); ?>



		<div id="page_tit">
			<div class="container">
				<h2>素材・デザイン一覧</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/<?php echo e($jeweller->id, false); ?>"><?php echo e($jeweller->name, false); ?></a></li>
						<li>素材・デザイン一覧</li>
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
					<ul class="item_box mode_material">
						<?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<button  onclick="addBookmark('material',<?php echo e($material->id, false); ?>)" class="btn_favo mode_s <?php if($material_bookmarks && $material_bookmarks->contains('item_id',$material->id)): ?> active <?php endif; ?>"></button>
							<a href="/jeweller/material/material/<?php echo e($material->id, false); ?>">
								<div class="img_box mode_thum">
									<img src="/upload/profile/<?php echo e($material->image, false); ?>" alt="<?php echo e($material->name, false); ?>">
								</div>
								<div class="data">
									<ul class="tag_li">
										<li><?php echo e($material->name, false); ?></li>
									</ul>
									<p class="txt"><?php echo e($material->detail, false); ?></p>
								</div>
							</a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<nav class="pager">
<?php echo e($materials->appends(request()->input())->render(), false); ?>

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
<?php echo $__env->make('layouts.app', ['title' => '素材・デザイン一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jeweller/material/index.blade.php ENDPATH**/ ?>