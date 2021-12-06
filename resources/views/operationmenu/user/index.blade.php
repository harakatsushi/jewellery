
@extends('layouts.app', ['title' => 'ユーザー｜運営メニュー','css'=>'mymenu'])

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
				<h2>ユーザー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>ユーザー</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						ユーザー@if($cond)（{{implode('、',$cond)}}）@endif
					</h3>
					<ul class="favo_li mode_prod">
						@foreach($users as $user)
						<li @if($user->status==9) class="leaved" @endif>
							<div class="img_box mode_thum">
								@if($user->image)
				                <img src="/upload/profile/{{Auth::user()->image}}" alt="">
				                @else 
				                <img src="/assets/images/jeweller/img01.jpg" alt="">
                				@endif
								
							</div>
							<div class="release">
								<button class="btn_release @if($user->status==1)active @endif " onclick="chgSt({{$user->id}},1)">承認</button>
								<button class="btn_release @if($user->status==0)active @endif " onclick="chgSt({{$user->id}},0)">非承認</button>
							</div>
							<div class="data">
								<a href="/operationmenu/user/detail/{{$user->id}}"><span>@if($user->status==9) 【退会済】 @endif {{$user->name}}</span></a>
							</div>
						</li>
						@endforeach

					</ul>
					<nav class="pager">
						{{ $users->appends(request()->input())->render() }}
					</nav>
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
				<dl class="menu_box narrow_box tag_dl">
					<dt>
						絞り込み表示
					</dt>
					<dd>
						<form action="">
							<ul class="nav_menu">
								<li class="fs">
									ユーザー種別
								</li>
								<li>
									<label>
										<input type="checkbox" name="role[]" value="1" @if(is_array($select_role) && in_array(1,$select_role))checked @endif> ユーザー
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="role[]" value="2" @if(is_array($select_role) && in_array(2,$select_role))checked @endif> ジュエラー
									</label>
								</li>
								<li class="fs">
									ジュエラー業種
								</li>
								@foreach($genres as $genre)
                                <li>
                                    <label>
                                        <input type="checkbox" value="{{$genre->id}}" name="genre_id[]" 
                                        @if(is_array($select_genre) && in_array($genre->id,$select_genre))checked @endif> {{$genre->name}}
                                    </label>
                                </li>
                                @endforeach

								<li class="fs">
									アカウント状況
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="1" @if(is_array($select_status) && in_array(1,$select_status))checked @endif> 承認
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="0" @if(is_array($select_status) && in_array(0,$select_status))checked @endif> 非承認
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="9" @if(is_array($select_status) && in_array(9,$select_status))checked @endif> 退会済
									</label>
								</li>
								<li class="fs">
									アカウント状況
								</li>
								<li>
									<label>
										<input type="checkbox" name="is_pay_wait" value="1" @if(request()->input('is_pay_wait'))checked @endif> 報酬支払待ち
									</label>
								</li>
								<li class="fs">
									評価
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="5" @if(is_array(request()->input('evaluation')) && in_array(5,request()->input('evaluation')))checked @endif> ★4-5
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="4" @if(is_array(request()->input('evaluation')) && in_array(4,request()->input('evaluation')))checked @endif> ★3-4未満
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="3" @if(is_array(request()->input('evaluation')) && in_array(3,request()->input('evaluation')))checked @endif> ★2-3未満
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="2" @if(is_array(request()->input('evaluation')) && in_array(2,request()->input('evaluation')))checked @endif> ★1-2未満
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="1" @if(is_array(request()->input('evaluation')) && in_array(1,request()->input('evaluation')))checked @endif> ★0-1未満
									</label>
								</li>
							</ul>
							<p class="btn_mt">
								<input type="submit" class="btn01" value="検索する">
							</p>
							<p class="btn_mt">
								<a href="/operationmenu/user" class="fs">
									全て表示
								</a>
							</p>
						</form>
					</dd>
				</dl>
				@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection