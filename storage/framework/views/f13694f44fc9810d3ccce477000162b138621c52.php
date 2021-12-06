


<?php $__env->startSection('content'); ?>

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token(), false); ?>'
    }
});
	function chgSt(id,st){
		 $.ajax({
		    url: '/operationmenu/user/status',
		    type: 'post',
		    dataType: 'json',
		    // フォーム要素の内容をハッシュ形式に変換
		    data: "id="+id+"&st="+st,
		    timeout: 5000,
		  })
		  .done(function(data) {
		      // 通信成功時の処理を記述
		  })
		  .fail(function() {
		      // 通信失敗時の処理を記述
		  });
	}


</script>
		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2><?php echo e($user->name, false); ?></h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">運営メニュー</a></li>
						<li><a href="/operationmenu/user/">ユーザー</a></li>
						<li><?php echo e($user->name, false); ?></li>
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
									<div class="release">
										<button class="btn_release <?php if($user->status==1): ?>active <?php endif; ?> " onclick="chgSt(<?php echo e($user->id, false); ?>,1)">承認</button>
										<button class="btn_release <?php if($user->status==0): ?>active <?php endif; ?> " onclick="chgSt(<?php echo e($user->id, false); ?>,0)">非承認</button>
									</div>
									<div class="img_box mode_thum">
										<?php if($user->image): ?><img src="/upload/profile/<?php echo e($user->image, false); ?>" alt="">
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
									登録メールアドレス
								</dt>
								<dd>
									<?php echo e($user->email, false); ?>

								</dd>
							</dl>
							<dl>
								<dt>
									お支払い情報
								</dt>
								<?php if($user->bank_name && $user->bank_branch_name && $user->bank_type &&  $user->bank_number): ?>
								<dd>
									<p><?php echo e($user->bank_name, false); ?>銀行</p>
									<p><?php echo e($user->bank_branch_name, false); ?>支店</p>
									<p><?php echo e($user->bank_type, false); ?></p>
									<p><?php echo e($user->bank_number, false); ?></p>
								</dd>

								<?php else: ?>
								<dd>
									登録されていません。
								</dd>
								<?php endif; ?>
							</dl>
						</div>
						<p class="btn_mt">
							<a href="../message/detail.html" class="btn01">
								<span>メッセージを送る</span>
							</a>
						</p>
						<p class="btn_mt tac">
							<a href="/user/detail.html" class="link_a">
								<span>プロフィールページへ</span>
							</a>
						</p>
						<?php if($user->role==2): ?>
						<div class="table_style">
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
									お名前<span class="fs">（非公開）</span>
								</dt>
								<dd>
									<?php echo e($user->name2, false); ?>

								</dd>
							</dl>
							<dl>
								<dt>
									所在地<span class="fs">（非公開）</span>
								</dt>
								<dd>
									<p>&#12306;<?php echo e($user->zip, false); ?></p>
									<p><?php echo e($user->pref, false); ?></p>
									<p><?php echo e($user->address, false); ?></p>
								</dd>
							</dl>
							<?php if($user->bank_name && $user->bank_branch_name && $user->bank_type &&  $user->bank_number): ?>
							<dl>
								<dt>
									報酬振込先
								</dt>
								<dd>
									<p><?php echo e($user->bank_name, false); ?>銀行</p>
									<p><?php echo e($user->bank_branch_name, false); ?>支店</p>
									<p><?php echo e($user->bank_type, false); ?></p>
									<p><?php echo e($user->bank_number, false); ?></p>
								</dd>
							</dl>
							<?php endif; ?>

						</div>
						<?php endif; ?>
					</div>
					<p class="btn_mt">
						<a href="../message/detail.html" class="btn01">
							<span>メッセージを送る</span>
						</a>
					</p>
					<p class="btn_mt tac">
						<a href="/jeweller/detail.html" class="link_a">
							<span>プロフィールページへ</span>
						</a>
					</p>
				</section>
				<!--/#my_profile-->

				<section id="payment_history" class="mid_sec">
					<h3 class="tit_big02">
						支払い履歴
					</h3>
					<div class="table_style mode_contact">
						<dl>
							<dt>
								2020/03
							</dt>
							<dd>
								<p>売り上げ：000,000円</p>
								<p>振り込み：000,000円</p>
								<p>アカウント残金：000,000円</p>
								<form action="" class="btn_mt mode_s txt_box">
									<p>
										<input type="number" value="" class="input_price"> 円
									</p>
									<textarea name="" class="resize"></textarea>
									<P>
										<input type="submit" value="更新" class="btn_submit mode02">
									</P>
								</form>
							</dd>
						</dl>
						<dl>
							<dt>
								2020/02
							</dt>
							<dd>
								<p>売り上げ：000,000円</p>
								<p>振り込み：000,000円</p>
								<p>アカウント残金：000,000円</p>
								<form action="" class="btn_mt mode_s txt_box">
									<p>
										<input type="number" value="" class="input_price"> 円
									</p>
									<textarea name="" class="resize"></textarea>
									<P>
										<input type="submit" value="更新" class="btn_submit mode02">
									</P>
								</form>
							</dd>
						</dl>
						<dl>
							<dt>
								2020/01
							</dt>
							<dd>
								<p>売り上げ：000,000円</p>
								<p>振り込み：000,000円</p>
								<p>アカウント残金：000,000円</p>
								<form action="" class="btn_mt mode_s txt_box">
									<p>
										<input type="number" value="" class="input_price"> 円
									</p>
									<textarea name="" class="resize"></textarea>
									<P>
										<input type="submit" value="更新" class="btn_submit mode02">
									</P>
								</form>
							</dd>
						</dl>
					</div>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#payment_history -->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">

				<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => $user->name.'｜ユーザー｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/user/detail.blade.php ENDPATH**/ ?>