
@extends('layouts.app', ['title' => 'メッセージ｜マイメニュー','css'=>'mymenu'])

@section('content')


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>メッセージ</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/home/">マイメニュー</a></li>
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
					@if($messages->count()<1)

<div class="error_txt txt_box">
<p class="tac">メッセージはありません。</p>
</div>

@else
					<ul class="mail_li">
						@foreach($messages as $message)
						@if($message->messageLists->last())
						<li>
							<dl>
								<dt>
									@if($message->messageLists->last()->user->id!= Auth::user()->id)
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

										<div class="img_box mode_thum">
											@if(Auth::user()->image)<img src="/upload/profile/{{Auth::user()->image}}" alt="">

											@else
											<img src="/assets/images/user/common_user.jpg" >
											@endif
										</div>
										<span>自分</span>
									

									@endif
								</dt>
								<dd>
									<div class="flag">
										@if(!$message->messageLists->last()->u_read_flg)
										<img src="/assets/images/mymenu/ico-unread02.svg" alt="">
										@elseif($message->messageLists->last()->u_read_flg==1)
										<img src="/assets/images/mymenu/ico-read02.svg" alt="">
										@else
										<img src="/assets/images/mymenu/ico-replay02.svg" alt="">
										@endif
									</div>
									<div class="overview">
										<p class="tit">
											@if($message->order) {{$message->order->name}} @else ダイレクトメッセージ @endif
										</p>
										<a href="/mymenu/message/detail/{{$message->id}}" class="txt">
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
					<nav class="pager">
						{{ $messages->appends(request()->input())->render() }}
					</nav>

@endif
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
@include('layouts.my_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

@endsection