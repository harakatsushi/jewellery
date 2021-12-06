


<?php $__env->startSection('content'); ?>



		<div id="page_tit">
			<div class="container">
				<h2>メニュー一覧</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/<?php echo e($jeweller->id, false); ?>"><?php echo e($jeweller->name, false); ?></a></li>
						<li>メニュー一覧</li>
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
					<ul class="item_box mode_menu">
						<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<button onclick="addBookmark('menu',<?php echo e($menu->id, false); ?>)" class="btn_favo mode_s <?php if($menu_bookmarks && $menu_bookmarks->contains('item_id',$menu->id)): ?> active <?php endif; ?>"></button>
							<a href="/jeweller/menu/detail/<?php echo e($menu->id, false); ?>">
								<div class="img_box mode_thum">
									<img src="/upload/profile/<?php echo e($menu->image, false); ?>" alt="<?php echo e($menu->name, false); ?>">
									<div class="data">
										<ul class="tag_li">
											<li class="price"><?php echo e(number_format($menu->price), false); ?>円<?php echo e($menu->name, false); ?></li>
										</ul>
										<p class="txt"><?php echo e($menu->detail, false); ?></p>
									</div>
								</div>
							</a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<nav class="pager">
						<?php echo e($menus->appends(request()->input())->render(), false); ?>

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'メニュー一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jeweller/menu/index.blade.php ENDPATH**/ ?>