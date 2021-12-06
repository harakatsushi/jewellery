

<?php $__env->startSection('content'); ?>

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィールの編集</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>プロフィール編集</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<form action="" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
						<h3 class="tit_big02">
							プロフィールの編集
						</h3>
						<div class="profile_box">
							<div class="table_style mode_contact">
								<dl>
									<dt class="any">
										アイコン
									</dt>
									<dd>
										<div class="img_box mode_thum btn_mb">
											<?php if($user->image): ?>
											<img src="/upload/profile/<?php echo e($user->image, false); ?>" alt="" id="preview">
											<?php else: ?>
											<img src="/assets/images/jeweller/img01.jpg" id="preview" alt="">
											<?php endif; ?>
\
										</div>
										<input type="file" name="image" id="myImage" value="" accept="image/*">

										<script>
											$('#myImage').on('change', function (e) {
												var reader = new FileReader();
												reader.onload = function (e) {
													$("#preview").attr('src', e.target.result);
												}
												reader.readAsDataURL(e.target.files[0]);
											});
										</script>
									</dd>
								</dl>
								<dl>
								<dt class="req">
									名前
								</dt>
								<dd>
									<input type="text" name="name" value="<?php echo e($user->name, false); ?>" required="required">
								</dd>
							</dl>
								<dl>
									<dt class="req">
										業界経験歴
									</dt>
									<dd>
										<input type="number" name="year"  class="input_ss" value="<?php echo e($user->year, false); ?>"> 年
									</dd>
								</dl>
								<dl>
									<dt class="req">
										メインジャンル
									</dt>
									<dd>
										<ul>
											<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <label>
                                                            <input type="radio" value="<?php echo e($genre->id, false); ?>" name="genre_id" <?php if(old('genre_id')==$genre->id): ?>checked <?php elseif(!old('genre_id')&& $user->genre_id==$genre->id): ?>checked <?php endif; ?>> <?php echo e($genre->name, false); ?>

                                                        </label>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</ul>
									</dd>
								</dl>
								<dl>
									<dt class="any">
										サブジャンル
									</dt>
									<dd>
										<ul>
                                                  <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" value="<?php echo e($genre->id, false); ?>" name="sub_genre_id[]" 
                                                            <?php if(is_array(old('genre_id')) && in_array($genre->id,old('genre_id'))): ?> <?php elseif(!old('genre_id') &&in_array($genre->id,$select_genres)): ?>checked <?php endif; ?>> <?php echo e($genre->name, false); ?>

                                                        </label>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</dd>
								</dl>
								<dl>
									<dt class="any">
										コメント
									</dt>
									<dd>
										<textarea name="comment" class="resize"><?php echo e($user->comment, false); ?></textarea>
									</dd>
								</dl>
								<dl>
									<dt class="req">
										登録メールアドレス
									</dt>
									<dd>
										<input type="email" name="email" value="<?php echo e($user->email, false); ?>">
									</dd>
								</dl>
								<dl>
									<dt class="req">
										パスワード(変更する場合のみ)
									</dt>
									<dd>
										<input type="password" name="password" value="">
									</dd>
								</dl>
								<dl>
									<dt class="any">
										報酬振込先
									</dt>
									<dd class="txt_box mode_input">
										<p>
											銀行名<br>
											<input type="text" name="bank_name" value="<?php echo e($user->bank_name, false); ?>" placeholder="○○銀行">
										</p>
										<p>
											支店名<br>
											<input type="text" name="bank_branch_name" value="<?php echo e($user->bank_branch_name, false); ?>" placeholder="○○支店">
										</p>
										<p>
											預金科目<br>
											<select name="bank_type">
												<option value="普通" <?php if($user->bank_type=="普通"): ?> selected <?php endif; ?>)>普通</option>
												<option value="当座" <?php if($user->bank_type=="当座"): ?> selected <?php endif; ?>)>当座</option>
												<option value="貯蓄" <?php if($user->bank_type=="貯蓄"): ?> selected <?php endif; ?>)>貯蓄</option>
											</select>
										</p>
										<p>
											口座番号<br>
											<input type="number" name="bank_number" value="<?php echo e($user->bank_number, false); ?>">
										</p>
										<p>
											受取人名<br>
											<input type="text" name="bank_receiver" value="<?php echo e($user->bank_receiver, false); ?>">
										</p>
									</dd>
								</dl>
							</div>
						</div>
						<p class="btn_mt btn_mb">
							<input type="submit" class="btn01" value="変更する">
						</p>
						<p class="btn_mt">
							<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
								BACK
							</a>
						</p>
					</form>
				</section>
				<!--/#my_profile-->
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
<?php echo $__env->make('layouts.app', ['title' => 'プロフィールの編集｜ジュエラーメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jewellermenu/profile/edit.blade.php ENDPATH**/ ?>