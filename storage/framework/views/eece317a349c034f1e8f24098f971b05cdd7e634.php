


<?php $__env->startSection('content'); ?>

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2><?php echo e($material->name, false); ?></h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu/">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/material">素材・デザイン登録</a></li>
						<li><?php echo e($material->name, false); ?></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						登録内容
					</h3>
					<div class="prod_box">
						<ul class="tag_li">
							<?php $__currentLoopData = $material->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($tag->name, false); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
						<p class="prod_name">
							<?php echo e($material->name, false); ?>

						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/<?php echo e($material->image, false); ?>" alt="">
						</div>
						<div class="txt">
							<pre><?php echo e($material->detail, false); ?></pre>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<?php if($material->sub_img1): ?><img src="/upload/profile/<?php echo e($material->sub_img1, false); ?>" alt=""><?php endif; ?>
							</div>
							<p>
								<?php echo nl2br(htmlspecialchars($material->annotation01)); ?>

							</p>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<?php if($material->sub_img2): ?><img src="/upload/profile/<?php echo e($material->sub_img2, false); ?>" alt=""><?php endif; ?>
							</div>
							<p>
								<?php echo nl2br(htmlspecialchars($material->annotation02)); ?>

							</p>
						</div>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<?php if($material->sub_img3): ?><img src="/upload/profile/<?php echo e($material->sub_img3, false); ?>" alt=""><?php endif; ?>
							</div>
							<p>
								<?php echo nl2br(htmlspecialchars($material->annotation03)); ?>

							</p>
						</div>
						<dl class="price_box">
							<dt>
								参考価格
							</dt>
							<dd>
								<?php echo e(number_format($material->price), false); ?>円（入力がないと非表示になります）
							</dd>
						</dl>
						<div class="data_box">
							<?php if($material->status==1): ?><p>公開状況：公開</p><?php endif; ?>
							<?php if($material->status==2): ?><p>公開状況：非公開</p><?php endif; ?>
							<?php if($material->via==1): ?><p>制作経由：ai-jewelly</p><?php endif; ?>
							<?php if($material->via==2): ?><p>制作経由：ai-jewelly以外</p><?php endif; ?>
						</div>
					</div>
					<p class="btn_mt btn_mb">
						<a href="/jewellermenu/material/edit/<?php echo e($material->id, false); ?>" class="btn01">
							<span>登録作品を編集する</span>
						</a>
					</p>
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
			<?php echo $__env->make('layouts.jeweller_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => $material->name.'｜素材・デザイン登録｜ジュエラーメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jewellermenu/material/detail.blade.php ENDPATH**/ ?>