

<?php $__env->startSection('content'); ?>


		<div id="page_tit">
			<div class="container">
				<h2>ユーザー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><?php echo e($user->name, false); ?>さん</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<h3 class="tit_big02">
						<?php echo e($user->name, false); ?>さん
					</h3>
					<div class="profile_box">
						<div class="profile_top">
							<div class="data">
								<div class="left">
									<div class="img_box mode_thum">
										<?php if($user->image): ?>
										<img src="/upload/profile/<?php echo e($user->image, false); ?>" alt="">
										<?php else: ?>
										<img src="/assets/images/user/common_user.jpg" alt="">
										<?php endif; ?>
									</div>
									<div class="data">
										<span><?php echo e($user->name, false); ?></span>
									</div>
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
												<?php echo e($user->ave_evaluation, false); ?>


												<?php if($user->ave_evaluation): ?>
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
								<pre><?php echo e($user->comment, false); ?></pre>
							</dd>
						</dl>
					</div>
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
									<a href="../jeweller/detail.html">
										<div class="img_box mode_thum">
											<img src="../assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>jeweller_name</span>
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
											<span class="fs">3.5</span><img src="../assets/images/mymenu/ico-star_3-5.svg" alt="">
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
				<dl class="menu_box">
					<dt>
						ユーザー情報
					</dt>
					<dd>
						<div class="data">
							<div class="img_box">
								<?php if($user->image): ?>
										<img src="/upload/profile/<?php echo e($user->image, false); ?>" alt="">
										<?php else: ?>
										<img src="/assets/images/user/common_user.jpg" alt="">
										<?php endif; ?>
							</div>
							<p class="name">
								<?php echo e($user->name, false); ?>

							</p>
						</div>
						<ul class="nav_menu">
							<li><a href="/user/detail/<?php echo e($user->id, false); ?>#pagetop"><?php echo e($user->name, false); ?>}さんのプロフィールTOP</a></li>
							<li><a href="/user/detail/<?php echo e($user->id, false); ?>#sec_evaluation">直近の評価</a></li>
						</ul>
					</dd>
				</dl>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => $user->name.'さん｜ユーザー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/user/detail.blade.php ENDPATH**/ ?>