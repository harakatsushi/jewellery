
@extends('layouts.app', ['title' => 'プロフィールの編集','css'=>'mymenu'])

@section('content')


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>プロフィールの編集</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/home/">マイメニュー</a></li>
						<li>プロフィール編集</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_profile" class="mid_sec">
					<form action="" method="post" enctype="multipart/form-data">@csrf
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
											@if($user->image)
											<img src="/upload/profile/{{$user->image}}" alt="" id="preview">
											@else
											<img src="/assets/images/user/common_user.jpg" id="preview" alt="">
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
									名前
								</dt>
								<dd>
									<input type="text" name="name" value="{{$user->name}}" required="required">
								</dd>
							</dl>
								<dl>
									<dt class="any">
										コメント
									</dt>
									<dd>
										<textarea name="comment" class="resize">{{$user->comment}}</textarea>
									</dd>
								</dl>
								<dl>
									<dt class="req">
										登録メールアドレス
									</dt>
									<dd>
										<input type="email" name="email" value="{{$user->email}}">
									</dd>
								</dl>
								<dl>
									<dt class="req">
										パスワード(変更する場合のみ)
									</dt>
									<dd>
										<input type="password" name="password" value="value">
									</dd>
								</dl>
							</div>
						</div>
						<p class="btn_mt btn_mb">
							<input type="submit" class="btn01" value="変更する">
						</p>
					</form>
				</section>
				<!--/#my_profile-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
@include('layouts.my_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

@endsection