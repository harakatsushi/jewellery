

<?php $__env->startSection('content'); ?>

	

		<div id="page_tit">
			<div class="container">
				<h2>在籍ジュエラー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><?php echo e($jeweller->name, false); ?>さん</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<h3 class="tit_big02">
						<?php echo e($jeweller->name, false); ?>さん
					</h3>
					<div class="profile_box">
						<div class="profile_top">
							<div class="data">
								<div class="left">
									<div class="img_box mode_thum">
										<?php if($jeweller->image): ?><img src="/upload/profile/<?php echo e($jeweller->image, false); ?>" alt="">
										<?php else: ?>
										<img src="/assets/images/jeweller/img01.jpg" alt="">
										<?php endif; ?>
									</div>
									<div class="data">
										<span><?php echo e($jeweller->name, false); ?></span>
									</div>
								</div>
								<div class="fav_box">
									<button class="btn_favo mode02  <?php if($bookmarks && $bookmarks->contains('item_id',$jeweller->id)): ?> active <?php endif; ?>"  onclick="addBookmark('jeweller',<?php echo e($jeweller->id, false); ?>)">
										
										<?php if($bookmarks && $bookmarks->contains('item_id',$jeweller->id)): ?> 
										<span class="pos_txt" >お気に入りに登録済</span> 

										<?php else: ?>
										<span class="neg_txt" >お気に入りに登録</span>
										<?php endif; ?>

									</button>
								</div>
								<div class="right">
									<div class="evaluation">
										<dl class="transaction">
											<dt>
												取引実績
											</dt>
											<dd>
												<div><span class="fs">5</span>件</div>
											</dd>
										</dl>
										<dl class="transaction">
											<dt>
												完了率
											</dt>
											<dd>
												<div><span class="fs">100</span>%</div>
											</dd>
										</dl>
										<dl class="point">
											<dt>
												総合評価
											</dt>
											<dd>
												<?php echo e($jeweller->ave_evaluation, false); ?>


												<?php if($jeweller->ave_evaluation): ?>
												<div class="star_box">
													<img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
												</div>
												<?php endif; ?>
											</dd>
										</dl>
									</div>
								</div>
							</div>
						</div>
						<dl class="comment">
							<dt>
								コメント：
							</dt>
							<dd>
								<pre><?php echo e($jeweller->comment, false); ?></pre>
							</dd>
						</dl>
						<div class="table_style">
							<dl>
								<dt>
									業界経験歴
								</dt>
								<dd>
									<?php echo e($jeweller->year, false); ?>年
								</dd>
							</dl>
							<dl>
								<dt>
									メインジャンル
								</dt>
								<dd>
									<?php echo e($jeweller->genre->name, false); ?>

								</dd>
							</dl>
							<dl>
								<dt>
									サブジャンル
								</dt>
								<dd>
									<ul>
										<?php $__currentLoopData = $jeweller->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($genre->name, false); ?></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
				</section>
				<!--/sec-->
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						作品
					</h3>
					<ul class="prod_li mode02">
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($product->status==1): ?>
						<li><button onclick="addBookmark('product',<?php echo e($product->id, false); ?>)" class="btn_favo mode_s <?php if($product_bookmarks && $product_bookmarks->contains('item_id',$product->id)): ?> active <?php endif; ?>"></button><a href="/jeweller/product/detail/<?php echo e($product->id, false); ?>"><img src="/upload/profile/<?php echo e($product->image, false); ?>" alt="<?php echo e($product->name, false); ?>"></a></li>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<p class="btn_mt">
						<a href="/jeweller/<?php echo e($jeweller->id, false); ?>/product/" class="btn01">
							<span>作品一覧へ</span>
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						メニュー
					</h3>
					<ul class="item_box mode_menu">
						<?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($menu->status==1): ?>
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
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
					<p class="btn_mt">
						<a href="/jeweller/<?php echo e($jeweller->id, false); ?>/menu/" class="btn01">
							<span>メニュー一覧へ</span>
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_material" class="mid_sec">
					<h3 class="tit_big02">
						素材・デザイン
					</h3>
					<ul class="item_box mode_material">
						<?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($menu->status==1): ?>
						<li>
							<button  onclick="addBookmark('material',<?php echo e($material->id, false); ?>)" class="btn_favo mode_s <?php if($material_bookmarks && $material_bookmarks->contains('item_id',$material->id)): ?> active <?php endif; ?>"></button>
							<a href="/jeweller/material/detail/<?php echo e($material->id, false); ?>">
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
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
					<p class="btn_mt">
						<a href="/jeweller/<?php echo e($jeweller->id, false); ?>/material" class="btn01">
							<span>素材・デザイン一覧へ</span>
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_evaluation" class="mid_link">
					<h3 class="tit_big02">
						直近の評価（最新10件）
					</h3>
					<p>
						評価はまだありません。
					</p>
					<ul class="mail_li mode_evaluation">
						<li>
							<dl>
								<dt>
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="/user/detail.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/user/common_user.jpg" alt="">
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
											<span class="fs">3.5</span><img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
										</div>
										<p class="txt">
											テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。
										</p>
									</div>
								</dd>
							</dl>
						</li>
					</ul>
				</section>
				<!--/sec-->
				<p class="btn_mt">
					<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
						BACK
					</a>
				</p>
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
<?php echo $__env->make('layouts.jeweller_front_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => $jeweller->name.'さん｜在籍ジュエラー｜ジュエラーメニュー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jeweller/detail.blade.php ENDPATH**/ ?>