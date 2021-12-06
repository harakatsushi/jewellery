@extends('layouts.app', ['title' => '発注履歴｜ジュエラーメニュー','css'=>'mymenu'])

@section('content')

		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>発注履歴</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>発注履歴</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						発注履歴
					</h3>
					@if($messages->count()<1)
		
<div class="begin_order txt_box">
<p>現在発注はしておりません。</p>
<a href="" class="disp_b btn_mt mode_s">初めての発注はこちらから</a>
</div>
@else
					<!--/「begin_order」-->
					<div class="order_box txt_box">
					<ul class="news_li">
						@foreach($messages as $message)
						<li class="{{$id_name[$message->status]}}">
							<time datetime="{{substr($message->last_send_at,0,10)}}">{{substr($message->last_send_at,0,10)}}</time>
							<a href="/jewellermenu/orderhistory/detail/{{$message->id}}">@if($message->order){{$message->order->name}} @else ダイレクトメッセージ @endif</a>
						</li>
						@endforeach
					</ul>

					</div>
					<!--/「begin_order」-->
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
				<!--/#my_history-->
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