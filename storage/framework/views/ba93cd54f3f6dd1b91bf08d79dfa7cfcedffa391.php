


<?php $__env->startSection('content'); ?>

	

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>編集</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">運営メニュー</a></li>
						<li><a href="/operationmenu/qa">Q&amp;A</a></li>

						<li>編集</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section class="mid_sec">
					<h3 class="tit_big02">
						Q&amp;A編集
					</h3>
					<form method="post"><?php echo csrf_field(); ?>
						<div class="table_style mode_contact">
								<dl>
									<dt class="req">
										Q
									</dt>
									<dd>
										<input type="text" name="question" value="<?php echo e($qa->question, false); ?>" placeholder="質問を入力してください"  required="required">
									</dd>
								</dl>
								<dl>
									<dt class="any">
										A
									</dt>
									<dd>
										<textarea name="answer" class="resize" placeholder="回答を入力してください"><?php echo e($qa->answer, false); ?></textarea>
									</dd>
								</dl>
								<dl>
									<dt class="req">
										カテゴリー
									</dt>
									<dd>
										<ul>
											<li>
												<label>
													<input type="radio" value="1" name="category" <?php if($qa->category==1): ?> checked <?php endif; ?>> ご依頼前の良くある質問
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="category" <?php if($qa->category==2): ?> checked <?php endif; ?>> ご依頼後の良くある質問
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="3" name="category" <?php if($qa->category==3): ?> checked <?php endif; ?>> ジュエラー向け
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="4" name="category" <?php if($qa->category==4): ?> checked <?php endif; ?>> システムについて
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="5" name="category" <?php if($qa->category==5): ?> checked <?php endif; ?>> その他
												</label>
											</li>
										</ul>
									</dd>
								</dl>
								<dl>
									<dt class="req">
										公開状況
									</dt>
									<dd>
										<ul>
											<li>
												<label>
													<input type="radio" value="1" name="status" <?php if($qa->status==1): ?> checked <?php endif; ?>> 公開
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="status" <?php if($qa->status==2): ?> checked <?php endif; ?>> 非公開
												</label>
											</li>
										</ul>
									</dd>
								</dl>
							</div>
						<p class="btn_mt btn_mb">
							<input type="submit" class="btn01" value="変更する">
						</p>
					</form>
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
				<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => '編集｜Q&amp;A｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/qa/edit.blade.php ENDPATH**/ ?>