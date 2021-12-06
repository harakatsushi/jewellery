@extends('layouts.app', ['title' => 'お問い合わせ'])

@section('content')
  <script src="//www.google.com/recaptcha/api.js?render={{ config('original.recaptcha.v3.site_key') }}"></script>
  <script>
      grecaptcha.ready(function () {
        grecaptcha.execute("{{ config('original.recaptcha.v3.site_key') }}", {action: "sent"}).then(function(token) {
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

					<form action="/contact/confirm" method="post">@csrf
						<div class="table_style mode_contact btn_mt">
							          @if (count($errors) > 0)
          <div class="error_txt txt_box">
              @foreach ($errors->all() as $error)
              <p class="tac"> {!! $error !!}</p>
              @endforeach
          </div>
          @endif
							<dl>
								<dt class="req">
									お名前
								</dt>
								<dd>
									<input type="text" name="name" class="name" value="{{old('name')}}" required="required">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									メールアドレス
								</dt>
								<dd>
									<input type="email" name="email" class="email" value="{{old('email')}}" required="required">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									お問い合わせ内容
								</dt>
								<dd>
									<textarea name="detail" class="resize" required="required">{{old('detail')}}</textarea>
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

@endsection