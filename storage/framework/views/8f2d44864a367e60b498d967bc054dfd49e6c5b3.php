

<?php $__env->startSection('content'); ?>

		<div id="page_tit">
			<div class="container">
				<h2>お問い合わせ</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>お問い合わせ</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_col1">
			<main id="cont_main">
				<section id="sec" class="mid_sec">
					<h3 class="tit_big02">
						入力内容確認
					</h3>
					<div class="txt_box">
						<p>
							ご入力いただいた内容に誤りがなければ「送信する」を押してください。
						</p>
					</div>

					<form action="/contact/end" method="post"><?php echo csrf_field(); ?>
						<div class="table_style mode_contact btn_mt">
							<dl>
								<dt class="req">
									お名前
								</dt>
								<dd>
									<?php echo e(request()->input("name"), false); ?>

									<input type="hidden" class="name" value="">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									メールアドレス
								</dt>
								<dd>
									<?php echo e(request()->input("email"), false); ?>

									<input type="hidden" class="email" value="">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									お問い合わせ内容
								</dt>
								<dd>
									<pre><?php echo e(request()->input("detail"), false); ?></pre>
									<textarea name="txt" class="resize hidden"></textarea>
								</dd>
							</dl>
							<p class="btn_mt">
								<input type="submit" value="送信する" class="btn01">
							</p>
						</div>
					</form>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
			</main>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'お問い合わせ'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/contact/confirm.blade.php ENDPATH**/ ?>