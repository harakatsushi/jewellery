
@extends('layouts.app', ['title' => 'メッセージ｜運営メニュー','css'=>'mymenu'])

@section('content')

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>メッセージ</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>メッセージ</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_message" class="mid_sec">
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
						@endforeach
						
					</ul>
					<nav class="pager">
										{{ $messages->appends(request()->input())->render() }}
					</nav>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/#my_message-->
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