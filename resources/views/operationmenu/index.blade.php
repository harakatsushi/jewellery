
@extends('layouts.app', ['title' => '運営メニュー','css'=>'mymenu'])

@section('content')

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>運営メニュー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="../">ai-jewelly TOPページ</a></li>
						<li>運営メニュー</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				@if($campaign)
				<div class="news_box">
					<p class="fs">予定キャンペーン</p>
					<p class="tit">{{$campaign->title}}　{{$campaign->from_date}} - {{$campaign->to_date}}</p>
					<pre>{{$campaign->detail}}</pre>
				</div>
				@endif
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						非承認ユーザー
					</h3>
					@if($users1->count()<1)
			
<div class="error_txt txt_box">
<p class="tac">非承認ユーザーはいません。</p>
</div>
					@else
					<ul class="favo_li mode_prod">
						@foreach($users1 as $user)
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
					<p class="btn_mt">
						<a href="/operationmenu/user/" class="btn01">
							<span>ユーザー一覧へ</span>
						</a>
					</p>
					@endif
				</section>
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						運営ユーザー
					</h3>
					@if($users2->count()<1)
			
<div class="error_txt txt_box">
<p class="tac">非承認ユーザーはいません。</p>
</div>
					@else
					<ul class="favo_li mode_prod">
@foreach($users2 as $user)
						<li>
							<div class="img_box mode_thum">
								@if($user->image)
				                <img src="/upload/profile/{{Auth::user()->image}}" alt="">
				                @else 
				                <img src="/assets/images/operation/operation_icon.jpg" alt="">
                				@endif
								
							</div>
							<div class="release">
								<button class="btn_release @if($user->status==1)active @endif " onclick="chgSt({{$user->id}},1)">承認</button>
								<button class="btn_release @if($user->status==0)active @endif " onclick="chgSt({{$user->id}},0)">非承認</button>
							</div>
							<div class="data">
								<p>{{$user->name}}</p>
								<p>Eメール：{{$user->email}}</p>
							</div>
						</li>
						@endforeach
					</ul>
					<p class="btn_mt">
						<a href="/operationmenu/approval/" class="btn01">
							<span>運営ユーザー</span>
						</a>
					</p>
					@endif
				</section>
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						メッセージ
					</h3>
					<!--
<div class="error_txt txt_box">
<p class="tac">メッセージはありません。</p>
</div>
-->
					<ul class="mail_li">
						@foreach($messages as $message)
						@if($message->messageLists->last())
						<li>
							<dl>
								<dt>
									@if($message->messageLists->last()->send_type=='jeweller')
									<a href="/jeweller/profile/{{ $message->messageLists->last()->user->id }}">
										<div class="img_box mode_thum">
											@if($message->messageLists->last()->user->image)
											<img src="/upload/profile/{{$message->messageLists->last()->user->image}}" alt="">
											@else
											<img src="/assets/images/jeweller/img01.jpg" alt="">
											@endif
										</div>
										<span>{{$message->messageLists->last()->user->name}}</span>
									</a>
									@else
									<a href="/user/detail/{{ $message->messageLists->last()->user->id }}">
										<div class="img_box mode_thum">
											@if($message->messageLists->last()->user->image)
											<img src="/upload/profile/{{$message->messageLists->last()->user->image}}" alt="">
											@else
											<img src="/assets/images/user/common_user.jpg" >
											@endif
										</div>
										<span>{{$message->messageLists->last()->user->name}}</span>
									
										</a>
									@endif
								</dt>
								<dd>
									<div class="flag">
										@if($message->messageLists->last()->send_type=='jeweller')
											@if(!$message->messageLists->last()->j_read_flg)
											<img src="/assets/images/mymenu/ico-unread02.svg" alt="">
											@elseif($message->messageLists->last()->j_read_flg==1)
											<img src="/assets/images/mymenu/ico-read02.svg" alt="">
											@else
											<img src="/assets/images/mymenu/ico-replay02.svg" alt="">
											@endif

										@else
											@if(!$message->messageLists->last()->u_read_flg)
											<img src="/assets/images/mymenu/ico-unread02.svg" alt="">
											@elseif($message->messageLists->last()->u_read_flg==1)
											<img src="/assets/images/mymenu/ico-read02.svg" alt="">
											@else
											<img src="/assets/images/mymenu/ico-replay02.svg" alt="">
											@endif
										@endif
									</div>
									<div class="overview">
										<p class="tit">
										@if($message->order) {{$message->order->name}} @else ダイレクトメッセージ @endif
										</p>
										<a href="/operationmenu/message/detail/{{$message->id}}" class="txt">
											{{$message->messageLists->last()->detail}}
										</a>
									</div>
									<div class="time">
										<time datatime="{{$message->last_send_at}}">{{substr($message->last_send_at,0,10)}}<br class="rwd_disp_xo">{{substr($message->last_send_at,11,5)}}</time>
									</div>
								</dd>
							</dl>
						</li>
						@endif
						@endforeach
					</ul>
					<p class="btn_mt">
						<a href="/jewellermenu/message/" class="btn01">
							<span>メッセージ一覧へ</span>
						</a>
					</p>
				</section>
				<!--/#my_history-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
				@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

@endsection