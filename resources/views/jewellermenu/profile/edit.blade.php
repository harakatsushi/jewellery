@extends('layouts.app', ['title' => 'プロフィールの編集｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

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
											<img src="/assets/images/jeweller/img01.jpg" id="preview" alt="">
											@endif
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
									<input type="text" name="name" value="{{$user->name}}" required="required">
								</dd>
							</dl>
								<dl>
									<dt class="req">
										業界経験歴
									</dt>
									<dd>
										<input type="number" name="year"  class="input_ss" value="{{$user->year}}"> 年
									</dd>
								</dl>
								<dl>
									<dt class="req">
										メインジャンル
									</dt>
									<dd>
										<ul>
											@foreach($genres as $genre)
                                                    <li>
                                                        <label>
                                                            <input type="radio" value="{{$genre->id}}" name="genre_id" @if(old('genre_id')==$genre->id)checked @elseif (!old('genre_id')&& $user->genre_id==$genre->id)checked @endif> {{$genre->name}}
                                                        </label>
                                                    </li>
                                                    @endforeach
											
										</ul>
									</dd>
								</dl>
								<dl>
									<dt class="any">
										サブジャンル
									</dt>
									<dd>
										<ul>
                                                  @foreach($genres as $genre)
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" value="{{$genre->id}}" name="sub_genre_id[]" 
                                                            @if(is_array(old('genre_id')) && in_array($genre->id,old('genre_id'))) @elseif (!old('genre_id') &&in_array($genre->id,$select_genres))checked @endif> {{$genre->name}}
                                                        </label>
                                                    </li>
                                                    @endforeach
										</ul>
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
											<input type="text" name="bank_name" value="{{$user->bank_name}}" placeholder="○○銀行">
										</p>
										<p>
											支店名<br>
											<input type="text" name="bank_branch_name" value="{{$user->bank_branch_name}}" placeholder="○○支店">
										</p>
										<p>
											預金科目<br>
											<select name="bank_type">
												<option value="普通" @if($user->bank_type=="普通") selected @endif)>普通</option>
												<option value="当座" @if($user->bank_type=="当座") selected @endif)>当座</option>
												<option value="貯蓄" @if($user->bank_type=="貯蓄") selected @endif)>貯蓄</option>
											</select>
										</p>
										<p>
											口座番号<br>
											<input type="number" name="bank_number" value="{{$user->bank_number}}">
										</p>
										<p>
											受取人名<br>
											<input type="text" name="bank_receiver" value="{{$user->bank_receiver}}">
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
				@include('layouts.jeweller_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection
</html>