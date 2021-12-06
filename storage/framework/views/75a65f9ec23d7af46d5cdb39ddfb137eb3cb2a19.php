

<?php $__env->startSection('content'); ?>


	

		<div id="page_tit">
			<div class="container">
				<h2><?php echo e($material->name, false); ?></h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/<?php echo e($jeweller->id, false); ?>"><?php echo e($jeweller->name, false); ?></a></li>
						<li><a href="/jeweller/<?php echo e($jeweller->id, false); ?>/material">作品一覧</a></li>
						<li><?php echo e($material->name, false); ?></li>
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
							<?php $__currentLoopData = $material->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li><?php echo e($tag->name, false); ?></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
						<p class="prod_name">
							<?php echo e($material->name, false); ?>

						</p>
						<div class="img_box mode_thum">
							<img src="/upload/profile/<?php echo e($material->image, false); ?>" alt="<?php echo e($material->name, false); ?>">
						</div>
						<div class="txt">
							<<pre><?php echo e($material->detail, false); ?></pre>
						</div>
<?php if($material->sub_img1): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($material->sub_img1, false); ?>" alt="<?php echo e($material->name, false); ?>">
							</div>
							<p>
								<?php echo e($material->annotation01, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<?php if($material->sub_img2): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($material->sub_img2, false); ?>" alt="<?php echo e($material->name, false); ?>">
							</div>
							<p>
								<?php echo e($material->annotation02, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<?php if($material->sub_img3): ?>
						<div class="postscript_box txt_box">
							<div class="img_box">
								<img src="/upload/profile/<?php echo e($material->sub_img3, false); ?>" alt="<?php echo e($material->name, false); ?>">
							</div>
							<p>
								<?php echo e($material->annotation03, false); ?>

							</p>
						</div>
						<?php endif; ?>
						<?php if($material->price): ?>
						<dl class="price_box">
							<dt>
								参考価格
							</dt>
							<dd>
								<?php echo e(number_format($material->price), false); ?>円<?php if($material->price_option==2): ?> ～ <?php endif; ?>
							</dd>
						</dl>
						<?php endif; ?>
					</div>
					<p class="btn_mt btn_mb">
						<a href="../../mymenu/message/detail.html" class="btn01">
							<span>このアイテムについて相談する</span>
						</a>
					</p>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_evaluation" class="mid_sec">
					<h3 class="tit_big02">
						このアイテムの直近の評価（最新5件）
					</h3>
					<p>
						評価はまだありません。
					</p>
					<ul class="mail_li mode_evaluation">
						<li>
							<dl>
								<dt>
									<a href="../../user/detail.html">
										<div class="img_box mode_thum">
											<img src="../../assets/images/user/common_user.jpg" alt="">
										</div>
										<span>user_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="../../assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>
									<a href="../../user/detail.html">
										<div class="img_box mode_thum">
											<img src="../../assets/images/user/common_user.jpg" alt="">
										</div>
										<span>user_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="../../assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>
									<a href="../../user/detail.html">
										<div class="img_box mode_thum">
											<img src="../../assets/images/user/common_user.jpg" alt="">
										</div>
										<span>user_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="../../assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>
									<a href="../../user/detail.html">
										<div class="img_box mode_thum">
											<img src="../../assets/images/user/common_user.jpg" alt="">
										</div>
										<span>user_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="../../assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
						<li>
							<dl>
								<dt>
									<a href="../../user/detail.html">
										<div class="img_box mode_thum">
											<img src="../../assets/images/user/common_user.jpg" alt="">
										</div>
										<span>user_name</span>
									</a>
								</dt>
								<dd>
									<div class="overview">
										<div class="top">
											<p class="tit">
												案件名案件名案件名
											</p>
											<div class="time">
												<time datatime="0000-00-00">0000/00/00</time>
											</div>
										</div>
										<div class="star_box">
											<span class="fs">3.5</span><img src="../../assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
					</ul>
					<p class="btn_mt btn_mb">
						<a href="../../mymenu/message/detail.html" class="btn01">
							<span>このアイテムについて相談する</span>
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
<?php echo $__env->make('layouts.app', ['title' =>$material->name .'｜素材・デザイン一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jeweller/material/detail.blade.php ENDPATH**/ ?>