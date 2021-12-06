
@extends('layouts.app', ['title' => 'メッセージ｜運営メニュー','css'=>'mymenu'])

@section('content')

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>{{$message->user->name}} {{$message->jeweller->name}} </h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">ジュエラーメニュー</a></li>
						<li><a href="/operationmenu/message/">メッセージ</a></li>
						<li>{{$message->user->name}} {{$message->jeweller->name}} </li>
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
					<ul class="message_li">
												@foreach($messageLists as $messageList)
						@if($messageList->send_type=='user')
						<li>
							<div class="img_box mode_thum">
								@if($messageList->user->image)
								<img src="/upload/profile/{{$messageList->user->image}}" alt="{{$messageList->user->name}}">
								@else
								<img src="/assets/images/user/common_user.jpg" alt="{{$messageList->user->name}}">
								
								@endif
							</div>
							<div class="data">
								<p class="contributor">
									<a href="/user/detail/{{$messageList->user->id}}">{{$messageList->user->name}}</a>
									<span class="time">{{$messageList->created_at}}</span>
								</p>
								<pre>{{$messageList->detail}}</pre>
								@if($messageList->file)
								<div class="file">
									DL：<a href="/operationmenu/message/dl/{{$messageList->id}}" download="{{$messageList->org_file_name}}">{{$messageList->org_file_name}}</a>
								</div>
								@endif
							</div>
						</li>
						@else
						<li>
							<div class="img_box mode_thum">
								@if($messageList->user->image)
								<img src="/upload/profile/{{$messageList->user->image}}" alt="{{$messageList->user->name}}">
								@else
								<img src="/assets/images/jeweller/img01.jpg" alt="{{$messageList->user->name}}">
								@endif
							</div>
							<div class="data">
								<p class="contributor">
									<a href="/jeweller/profile/{{$messageList->user->id}}">{{$messageList->user->name}}</a>
									
									<span class="time">{{$messageList->created_at}}</span>
								</p>
								<pre>{{$messageList->detail}}</pre>
								@if($messageList->file)
								<div class="file">
									DL：<a href="/operationmenu/message/dl/{{$messageList->id}}" download="{{$messageList->org_file_name}}">{{$messageList->org_file_name}}</a>
								</div>
								@endif
							</div>
						</li>




						@endif
						@endforeach
					</ul>
	<!-- 				<div class="input_box">
						<form action="">
							<textarea name="message" class="autosize"></textarea>
							<input type="file" name="item">
							<p class="btn_mt"><input type="submit" class="btn01" value="投稿する"></p>
						</form>
					</div> -->
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