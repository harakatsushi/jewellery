
@extends('layouts.app', ['title' => '運営ユーザー招待｜運営メニュー','css'=>'mymenu'])

@section('content')

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>運営ユーザー招待</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>運営ユーザー招待</li>
					</ul>
				</nav>
			</div>
		</div>
		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<form action="" method="post">@csrf
						<h3 class="tit_big02">
							運営ユーザー招待
						</h3>
						<div class="profile_box">

							          @if (count($errors) > 0)
				          <div class="error_txt txt_box">
				              @foreach ($errors->all() as $error)
				              <p class="tac"> {!! $error !!}</p>
				              @endforeach
				          </div>
				          @endif
							<div class="table_style mode_contact">
								<dl>
									<dt class="req">
										Eメールアドレス
									</dt>
									<dd>
										<input type="email" name="email" value="" required="required">
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
				@include('layouts.admin_menu')


			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection