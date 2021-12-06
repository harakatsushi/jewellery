

<?php $__env->startSection('content'); ?>
  <script src="//www.google.com/recaptcha/api.js?render=<?php echo e(config('original.recaptcha.v3.site_key'), false); ?>"></script>
  <script>
      grecaptcha.ready(function () {
        grecaptcha.execute("<?php echo e(config('original.recaptcha.v3.site_key'), false); ?>", {action: "sent"}).then(function(token) {
          var recaptchaResponse = document.getElementById("recaptchaResponse");
          recaptchaResponse.value = token;
        });
      });
  </script>
		<div id="cont_wrapper" class="container u_page mode_col1">
			<main id="cont_main">
				<section id="sec" class="mid_sec">
					<h3 class="tit_big02">
						お問い合わせフォーム
					</h3>
					<div class="txt_box">
						<p>
							ご意見・ご要望や改善要望等ございましたらこちらからお寄せください。
						</p>
						<p>
							回答が必要なものに関しましてはご入力いただいたメールアドレス宛に、運営よりご回答を3営業日以内に差し上げますので少々お待ちください。
						</p>
						<p class="annotation">
							※3営業日を超えて回答がない場合はメールアドレスの入力ミスや迷惑フォルダに入っている場合がございますので、ご確認・再送信をお願いいたします。
						</p>
					</div>

					<form action="/contact/confirm" method="post"><?php echo csrf_field(); ?>
						<div class="table_style mode_contact btn_mt">
							          <?php if(count($errors) > 0): ?>
          <div class="error_txt txt_box">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <p class="tac"> <?php echo $error; ?></p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php endif; ?>
							<dl>
								<dt class="req">
									お名前
								</dt>
								<dd>
									<input type="text" name="name" class="name" value="<?php echo e(old('name'), false); ?>" required="required">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									メールアドレス
								</dt>
								<dd>
									<input type="email" name="email" class="email" value="<?php echo e(old('email'), false); ?>" required="required">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									お問い合わせ内容
								</dt>
								<dd>
									<textarea name="detail" class="resize" required="required"><?php echo e(old('detail'), false); ?></textarea>
								</dd>
							</dl>
							<p class="btn_mt">
								<input type="submit" value="確認画面へ" class="btn01">
							</p>
						</div>
						<input type="hidden" name="recaptchaResponse" id="recaptchaResponse">
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
<?php echo $__env->make('layouts.app', ['title' => 'お問い合わせ'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/contact/index.blade.php ENDPATH**/ ?>