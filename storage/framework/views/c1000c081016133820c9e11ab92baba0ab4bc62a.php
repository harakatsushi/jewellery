


<?php $__env->startSection('content'); ?>

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィール</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>プロフィール</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<h3 class="tit_big02">
						現在の登録情報
					</h3>
					<div class="profile_box">
						<div class="profile_top">
							<div class="data">
								<div class="left">
									<div class="img_box mode_thum">
										<?php if($user->image): ?>
										<img src="/upload/profile/<?php echo e($user->image, false); ?>" alt="">
										<?php else: ?>
										<img src="/assets/images/jeweller/img01.jpg" alt="">
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
						<div class="table_style">
							<dl>
								<dt>
									業界経験歴
								</dt>
								<dd>
									<?php echo e($user->year, false); ?>年
								</dd>
							</dl>
							<dl>
								<dt>
									メインジャンル
								</dt>
								<dd>
									<?php echo e($user->genre->name, false); ?>

								</dd>
							</dl>
							<dl>
								<dt>
									サブジャンル
								</dt>
								<dd>
									<ul>
										<?php $__currentLoopData = $user->genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($genre->name, false); ?></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</dd>
							</dl>
							<dl>
								<dt>
									登録メールアドレス
								</dt>
								<dd>
									<?php echo e($user->email, false); ?>

								</dd>
							</dl>
							<dl>
								<dt>
									報酬振込先
								</dt>
								<dd>
									<?php if($user->bank_name && $user->bank_branch_name && $user->bank_type &&  $user->bank_number): ?>

									<p><?php echo e($user->bank_name, false); ?>銀行</p>
									<p><?php echo e($user->bank_branch_name, false); ?>支店</p>
									<p><?php echo e($user->bank_type, false); ?></p>
									<p><?php echo e($user->bank_number, false); ?></p>
									<?php else: ?>
									振込先が登録されていません。<br>
									<a href="/jewellermenu/profile/edit">プロフィール編集</a>より登録をしてください。

									<?php endif; ?>

								</dd>
							</dl>
						</div>
					</div>
					<p class="btn_mt btn_mb">
						<a href="/jewellermenu/profile/edit" class="btn01">
							<span>プロフィールを編集する</span>
						</a>
					</p>
				</section>
				<!--/#my_profile-->
				<section id="my_evaluation" class="mid_sec">
					<h3 class="tit_big02">
						あなたの評価
					</h3>
					<ul class="mail_li mode_evaluation">
						<li>
							<dl>
								<dt>
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
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
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
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
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
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
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
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
									<a href="/jeweller/profile/index.html">
										<div class="img_box mode_thum">
											<img src="/assets/images/jeweller/img01.jpg" alt="">
										</div>
										<span>juweller_name</span>
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
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_evaluation-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
		<?php echo $__env->make('layouts.jeweller_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

		<?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts.app', ['title' => 'プロフィール｜ジュエラーメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jewellermenu/profile/index.blade.php ENDPATH**/ ?>