

<?php $__env->startSection('content'); ?>

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>お気に入り</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/mymenu">マイメニュー</a></li>
						<li>お気に入り</li>
					</ul>
				</nav>
			</div>
		</div>

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						お気に入り
					</h3>
					<?php if($bookmarks->count()<1): ?>

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
					<nav class="pager">
						<ul>
<?php echo e($bookmarks->appends(request()->input())->render(), false); ?>

						</ul>
					</nav>
					<?php endif; ?>
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
				<dl class="menu_box narrow_box tag_dl">
					<dt>
						絞り込み表示
					</dt>
					<dd>
						<form>
							<ul class="nav_menu">
								<li>
									<label>
										<input type="checkbox" name="type[]" value="jeweller" <?php if(is_array(request()->input('type')) && in_array('jeweller',request()->input('type'),true)): ?> checked <?php endif; ?>> ジュエラー
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="type[]" value="product" <?php if(is_array(request()->input('type')) && in_array('product',request()->input('type'))): ?> checked <?php endif; ?>> 制作実績
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="type[]" value="menu" <?php if(is_array(request()->input('type')) && in_array('menu',request()->input('type'))): ?> checked <?php endif; ?>> メニュー
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="type[]" value="material" <?php if(is_array(request()->input('type')) && in_array('material',request()->input('type'))): ?> checked <?php endif; ?>> 素材・デザイン
									</label>
								</li>
							</ul>
							<p class="btn_mt">
								<input type="submit" class="btn01" value="検索する">
							</p>
							<p class="btn_mt">
								<a href="/mymenu/favorite" class="fs">
									全て表示
								</a>
							</p>
						</form>
					</dd>
				</dl>
				<?php echo $__env->make('layouts.my_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'お気に入り｜マイメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/mymenu/favorite/index.blade.php ENDPATH**/ ?>