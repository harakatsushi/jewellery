
@extends('layouts.app', ['title' => '新規投稿｜Q&amp;A｜運営メニュー','css'=>'mymenu'])

@section('content')


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
					<form action="" method="post"> @csrf
						<div class="table_style mode_contact">

          @if (count($errors) > 0)
          <div class="error_txt txt_box">
              @foreach ($errors->all() as $error)
              <p class="tac"> {!! $error !!}</p>
              @endforeach
          </div>
          @endif
								<dl>
									<dt class="req">
										Q
									</dt>
									<dd>
										<input type="text" name="question" value="" placeholder="質問を入力してください" value="{{ old('question') }}" required="required">
									</dd>
								</dl>
								<dl>
									<dt class="any">
										A
									</dt>
									<dd>
										<textarea name="answer" class="resize" placeholder="回答を入力してください">{{ old('answer') }}</textarea>
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
													<input type="radio" value="1" name="category" @if(old('category')==1) checked="checked"@endif> ご依頼前の良くある質問
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="category" @if(old('category')==2) checked="checked"@endif> ご依頼後の良くある質問
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="3" name="category" @if(old('category')==3) checked="checked"@endif> ジュエラー向け
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="4" name="category" @if(old('category')==4) checked="checked"@endif> システムについて
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="5" name="category" @if(old('category')==5) checked="checked"@endif> その他
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
													<input type="radio" value="1" name="status" @if(old('status')==1) checked="checked"@endif> 公開
												</label>
											</li>
											<li>
												<label>
													<input type="radio" value="2" name="status" @if(old('status')==2) checked="checked"@endif> 非公開
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
				@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

@endsection