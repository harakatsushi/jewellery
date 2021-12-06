


<?php $__env->startSection('content'); ?>


		<!-- /#g_nav -->

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>新規投稿</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li><a href="/operationmenu/news">お知らせ</a></li>s
						<li>新規投稿</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<form action="" method="post"><?php echo csrf_field(); ?>
						<h3 class="tit_big02">
							お知らせ投稿
						</h3>
						<div class="profile_box">
							<div class="table_style mode_contact">
          <?php if(count($errors) > 0): ?>
          <div class="error_txt txt_box">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <p class="tac"> <?php echo $error; ?></p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php endif; ?>
								<dl>
									<dt class="req">
										投稿日
									</dt>
									<dd>
										<input type="date" name="yyyymmdd" value="<?php echo e(old('yyyymmdd'), false); ?>" required="required">
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
										<textarea name="detail" class="resize"  required="required"><?php echo e(old('yyyymmdd'), false); ?></textarea>
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
													<input type="radio" value="1" name="status" <?php if(old('status')==1): ?> checked="checked"<?php endif; ?>> 公開
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="status" <?php if(old('status')==2): ?> checked="checked"<?php endif; ?>> 非公開
												</label>
											</li>
										</ul>
									</dd>
								</dl>
								<dl>
									<dt class="req">
										対象
									</dt>
									<dd>
										<ul>
											<li>
												<label>
													<input type="radio" value="1" name="type" <?php if(old('type')==1): ?> checked="checked"<?php endif; ?>> ジュエラー
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="type" <?php if(old('type')==2): ?> checked="checked"<?php endif; ?>> ユーザー
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="3" name="type" <?php if(old('type')==3): ?> checked="checked"<?php endif; ?>> ジュエラー・ユーザー
												</label>
											</li>
										</ul>
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
<?php echo $__env->make('layouts.app', ['title' => '新規投稿｜お知らせ｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/news/new_post.blade.php ENDPATH**/ ?>