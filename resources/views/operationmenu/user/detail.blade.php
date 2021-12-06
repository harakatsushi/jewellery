
@extends('layouts.app', ['title' => $user->name.'｜ユーザー｜運営メニュー','css'=>'mymenu'])

@section('content')

<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
				<h2>{{$user->name}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">運営メニュー</a></li>
						<li><a href="/operationmenu/user/">ユーザー</a></li>
						<li>{{$user->name}}</li>
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
										<button class="btn_release @if($user->status==1)active @endif " onclick="chgSt({{$user->id}},1)">承認</button>
										<button class="btn_release @if($user->status==0)active @endif " onclick="chgSt({{$user->id}},0)">非承認</button>
									</div>
									<div class="img_box mode_thum">
										@if($user->image)<img src="/upload/profile/{{$user->image}}" alt="">
										@else
										<img src="/assets/images/jeweller/img01.jpg" alt="">
										@endif
									</div>
									<div class="data">
										<span>{{$user->name}}</span>
									</div>
								</div>
								<div class="right">
									<div class="evaluation">
										<dl class="transaction">
											<dt>
												取引実績
											</dt>
											<dd>
												<div><span class="fs">{{$user->eva_cnt}}</span>件</div>
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
												{{$user->ave_evaluation}}

												@if($user->ave_evaluation)
												<div class="star_box">
													<img src="/assets/images/mymenu/ico-star_3-5.svg" alt="">
												</div>
												@endif
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
								<pre>{{$user->comment}}</pre>
							</dd>
						</dl>
						<div class="table_style">
							<dl>
								<dt>
									登録メールアドレス
								</dt>
								<dd>
									{{$user->email}}
								</dd>
							</dl>
							<dl>
								<dt>
									お支払い情報
								</dt>
								@if($user->bank_name && $user->bank_branch_name && $user->bank_type &&  $user->bank_number)
								<dd>
									<p>{{$user->bank_name}}銀行</p>
									<p>{{$user->bank_branch_name}}支店</p>
									<p>{{$user->bank_type}}</p>
									<p>{{$user->bank_number}}</p>
								</dd>

								@else
								<dd>
									登録されていません。
								</dd>
								@endif
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
						@if($user->role==2)
						<div class="table_style">
							<dl>
								<dt>
									登録メールアドレス
								</dt>
								<dd>
									{{$user->email}}
								</dd>
							</dl>
							<dl>
								<dt>
									業界経験歴
								</dt>
								<dd>
									{{$user->year}}年
								</dd>
							</dl>
							<dl>
								<dt>
									メインジャンル
								</dt>
								<dd>
									{{$user->genre->name}}
								</dd>
							</dl>
							<dl>
								<dt>
									サブジャンル
								</dt>
								<dd>
									<ul>
										@foreach($user->genres as $genre)
										<li>{{$genre->name}}</li>
										@endforeach
									</ul>
								</dd>
							</dl>
							<dl>
								<dt>
									お名前<span class="fs">（非公開）</span>
								</dt>
								<dd>
									{{$user->name2}}
								</dd>
							</dl>
							<dl>
								<dt>
									所在地<span class="fs">（非公開）</span>
								</dt>
								<dd>
									<p>&#12306;{{$user->zip}}</p>
									<p>{{$user->pref}}</p>
									<p>{{$user->address}}</p>
								</dd>
							</dl>
							@if($user->bank_name && $user->bank_branch_name && $user->bank_type &&  $user->bank_number)
							<dl>
								<dt>
									報酬振込先
								</dt>
								<dd>
									<p>{{$user->bank_name}}銀行</p>
									<p>{{$user->bank_branch_name}}支店</p>
									<p>{{$user->bank_type}}</p>
									<p>{{$user->bank_number}}</p>
								</dd>
							</dl>
							@endif

						</div>
						@endif
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

				@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection