
@extends('layouts.app', ['title' => '【編集】'.$infomation->title.'｜お知らせ｜運営メニュー','css'=>'mymenu'])

@section('content')
	

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>【編集】{{$infomation->title}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li><a href="/operationmenu/news">お知らせ</a></li>
						<li>【編集】{{$infomation->title}}</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<form action="" method="post">@csrf
						<h3 class="tit_big02">
							お知らせ編集
						</h3>
						<div class="profile_box">
							<div class="table_style mode_contact">
								<dl>
									<dt class="req">
										投稿日
									</dt>
									<dd>
										<input type="date" name="yyyymmdd" value="{{ old('yyyymmdd') ?? $infomation->yyyymmdd}}" required="required">
									</dd>
								</dl>
								<dl>
									<dt class="req">
										タイトル
									</dt>
									<dd>
										<input type="text" name="title" value="{{ old('title') ?? $infomation->title }}" placeholder="タイトルを入力してください" required="required">
									</dd>
								</dl>
								<dl>
									<dt class="req">
										内容
									</dt>
									<dd>
										<textarea name="detail" class="resize"  required="required">{{ old('detail') ?? $infomation->detail }}</textarea>
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
													<input type="radio" value="1" name="status" @if($infomation->status==1) checked="checked"@endif> 公開
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="status" @if($infomation->status==2) checked="checked"@endif> 非公開
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
													<input type="radio" value="1" name="type" @if($infomation->type==1) checked="checked"@endif> ジュエラー
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="type" @if($infomation->type==2) checked="checked"@endif> ユーザー
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="3" name="type" @if($infomation->type==3) checked="checked"@endif> ジュエラー・ユーザー
												</label>
											</li>
										</ul>
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