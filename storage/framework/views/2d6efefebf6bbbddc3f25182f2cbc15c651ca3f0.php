


<?php $__env->startSection('content'); ?>



		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>新規登録</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>新規登録</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_col1">
			<main id="cont_main">
				<section id="my_history" class="mid_sec">
					<dl class="login_box mode_jeweller">
						<dt>
							ジュエラー新規登録完了
						</dt>
						<dd>
							<div class="pc_layout">
								<p class="tac read">
									ご登録ありがとうございます！
								</p>
								<div class="txt_box btn_mt tac_pc">
									<p>ご登録いただいた直後は<span class="bold">「承認待ち」</span>というパラメーターです。</p>
									<p>運営より承認させていただいただくと登録された</p>
									<ul class="indnt_li">
										<li>・プロフィール</li>
										<li>・制作した作品</li>
										<li>・メニュー</li>
										<li>・素材・デザイン</li>
									</ul>
									<p>がサイトに表示され、公開依頼に応募できると様になります。</p>
									<p>承認されるまでの間にプロフィールを充実させましょう！</p>
								</div>
								<p class="btn_mt">
									<a href="/jewellermenu/" class="btn01">ジュエラーメニューへ</a>
								</p>
							</div>
						</dd>
					</dl>
				</section>
				<!--/#my_history-->
			</main>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => '新規登録','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jeweller_login/complete.blade.php ENDPATH**/ ?>