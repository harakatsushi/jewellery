


<?php $__env->startSection('content'); ?>

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>キャンペーン</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">運営メニュー</a></li>
						<li>キャンペーン</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section class="mid_sec">
					<form action="" method="post"><?php echo csrf_field(); ?>
						<h3 class="tit_big02">
							キャンペーン投稿
						</h3>
						<ul class="indent_li btn_mb">
							<li>
								・開始日から終了日の間の成約案件の手数料が10%になります。
							</li>
							<li>
								・タイトルと内容がジュエラーにお知らせの形で公開されます。
							</li>
							<li>
								・キャンペーン期間が終わったら「<a href="/operationmenu/news">お知らせ一覧</a>」より非公開にしてください。
							</li>
						</ul>
						<div class="news_box btn_mb">
							<p class="fs bold">只今登録中のキャンペーン：</p>
							<p><?php echo e($campaign->title, false); ?></p>
							<p><?php echo e($campaign->from_date, false); ?> - <?php echo e($campaign->to_date, false); ?></p>
						</div>
						<div class="profile_box">
							<div class="table_style mode_contact">
								<dl>
									<dt class="req">
										開始日
									</dt>
									<dd>
										<input type="date" name="from_date" value="<?php echo e(old('from_date'), false); ?>" required="required">
									</dd>
								</dl>
								<dl>
									<dt class="req">
										終了日
									</dt>
									<dd>
										<input type="date" name="to_date" value="<?php echo e(old('to_date'), false); ?>" required="required">
									</dd>
								</dl>
								<dl>
									<dt class="req">
										タイトル
									</dt>
									<dd>
										<input type="text" name="title" value="<?php echo e(old('title'), false); ?>" placeholder="タイトルを入力してください" required="required">
									</dd>
								</dl>
								<dl>
									<dt class="req">
										内容
									</dt>
									<dd>
										<textarea name="detail" class="resize" required="required"><?php echo e(old('detail'), false); ?></textarea>
									</dd>
								</dl>
							</div>
						</div>
						<p class="btn_mt btn_mb">
							<input type="submit" class="btn01" value="投稿する">
						</p>
						<p class="btn_mt">
							<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
								BACK
							</a>
						</p>
					</form>
				</section>
				<!--/#my_favo-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
				<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'キャンペーン｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/campaign/index.blade.php ENDPATH**/ ?>