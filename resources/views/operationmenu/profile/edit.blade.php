@extends('layouts.app', ['title' => 'プロフィールの編集｜運営メニュー','css'=>'mymenu'])

@section('content')

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィールの編集</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>プロフィールの編集</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section class="mid_sec">
					<h3 class="tit_big02">
						現在の登録情報
					</h3>
					<form action="" method="POST" enctype='multipart/form-data'>@csrf
						<div class="table_style mode_contact">
							<dl>
								<dt class="any">
									アイコン
								</dt>
								<dd>
									<div class="img_box mode_thum btn_mb">
										@if($user->image)
										<img src="/upload/profile/{{$user->image}}" alt="" id="preview">
										@else
										<img src="/assets/images/operation/operation_icon.jpg" alt="" id="preview">
										@endif

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
									登録メールアドレス
								</dt>
								<dd>
									<input type="email" name="email" value="{{$user->email}}" required="required">
								</dd>
							</dl>
							<dl>
								<dt class="req">
									パスワード<br>(変更する場合のみ)
								</dt>
								<dd>
									<input type="password" name="password" value="">
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
				@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection
</html>