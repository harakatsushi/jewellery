


<?php $__env->startSection('content'); ?>


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>新規投稿</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">運営メニュー</a></li>
						<li><a href="/operationmenu/qa">Q&amp;A</a></li>
						<li>新規投稿</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section class="mid_sec">
					<h3 class="tit_big02">
						Q&amp;A新規投稿
					</h3>
					<form action="" method="post"> <?php echo csrf_field(); ?>
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
										Q
									</dt>
									<dd>
										<input type="text" name="question" value="" placeholder="質問を入力してください" value="<?php echo e(old('q'), false); ?>">
									</dd>
								</dl>
								<dl>
									<dt class="any">
										A
									</dt>
									<dd>
										<textarea name="answer" class="resize" placeholder="回答を入力してください"><?php echo e(old('answer'), false); ?></textarea>
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
													<input type="radio" value="1" name="category" <?php if(old('category')==1): ?> checked="checked"<?php endif; ?>> ご依頼前の良くある質問
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="category" <?php if(old('category')==2): ?> checked="checked"<?php endif; ?>> ご依頼後の良くある質問
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="3" name="category" <?php if(old('category')==3): ?> checked="checked"<?php endif; ?>> ジュエラー向け
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="4" name="category" <?php if(old('category')==4): ?> checked="checked"<?php endif; ?>> システムについて
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="5" name="category" <?php if(old('category')==5): ?> checked="checked"<?php endif; ?>> その他
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
							</div>
						<p class="btn_mt btn_mb">
							<input type="submit" class="btn01" value="投稿する">
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
				<dl class="menu_box">
					<dt>
						運営メニュー
					</dt>
					<dd>
						<div class="data">
							<div class="img_box">
								<img src="/assets/images/operation/operation_icon.jpg" alt="">
							</div>
							<p class="name">
								operation_name
							</p>
						</div>
						<nav class="my_menu">
							<ul class="nav_menu">
								<li><a href="/operationmenu/">運営メニューTOP</a></li>
								<li><a href="/operationmenu/message/">メッセージ</a></li>
								<li><a href="/operationmenu/favorite/">お気に入り一覧</a></li>
								<li><a href="/operationmenu/profile/">プロフィール</a></li>
								<li><a href="/operationmenu/news/">お知らせ</a></li>
								<li><a href="/operationmenu/user/">ユーザー</a></li>
								<li><a href="/operationmenu/progress/">進捗管理</a></li>
								<li><a href="/operationmenu/campaign/">キャンペーン</a></li>
								<li><a href="/operationmenu/qa/">Q&amp;A</a></li>
								<li><a href="/operationmenu/invitation/">運営ユーザー招待</a></li>
								<li><a href="/operationmenu/approval/">運営ユーザー承認</a></li>
								<li><a href="/operationmenu/leave/">退会</a></li>
							</ul>
						</nav>
					</dd>
				</dl>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => '新規投稿｜Q&amp;A｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/qa/new_post.blade.php ENDPATH**/ ?>