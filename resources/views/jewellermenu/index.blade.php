
@extends('layouts.app', ['title' => 'ジュエラーメニュー','css'=>'mymenu'])

@section('content')


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>ジュエラーメニュー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>ジュエラーメニュー</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				@foreach($infomations as $infomation)
				<div class="news_box">
					<time>{{$infomation->yyyymmdd}}</time>
					<p class="tit">{{$infomation->title}}</p>
					<pre>{{$infomation->detail}}</pre>
				</div>
				@endforeach



				<section id="my_history" class="mid_sec">
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
										<a href="/jewellermenu/message/detail/{{$message->id}}" class="txt">
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
					@endif
				</section>
				<!--/#my_history-->

				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						お気に入り一覧
					</h3>
					@if(!$bookmarks->count())
				
<div class="error_txt txt_box">
<p class="tac">お気に入りはありません。</p>
</div>

					@else
					<ul class="favo_li">
						@foreach($bookmarks as $bookmark)
						<li>
							<div class="img_box mode_thum">
								@if($bookmark->getObj()->image)
								<img src="/upload/profile/{{$bookmark->getObj()->image}}" alt="">
								@else
								<img src="/assets/images/jeweller/img01.jpg" alt="">
								@endif
							</div>
							<button class="btn_favo mode_s active"  onclick="addBookmark('{{$bookmark->type}}',{{$bookmark->item_id}})"></button>
							<div class="data">
								@if($bookmark->type=='jeweller')
								<a href="/jeweller/detail/{{$bookmark->item_id}}"><span>{{$bookmark->getObj()->name}}</span></a>
								@elseif($bookmark->type=='product')
								<a href="/jeweller/product/detail/{{$bookmark->item_id}}"><span>{{$bookmark->getObj()->name}}</span></a>
								@elseif($bookmark->type=='menu')
								<a href="/jeweller/menu/detail/{{$bookmark->item_id}}"><span>{{$bookmark->getObj()->name}}</span></a>
								@elseif($bookmark->type=='material')
								<a href="/jeweller/material/detail/{{$bookmark->item_id}}"><span>{{$bookmark->getObj()->name}}</span></a>
								@endif

							</div>
						</li>
						@endforeach
						
					</ul>
					<p class="btn_mt">
						<a href="/jewellermenu/favorite/" class="btn01">
							<span>お気に入り一覧へ</span>
						</a>
					</p>
					@endif
				</section>
				<!--/#my_favo-->

				<section id="my_order" class="mid_sec">
					<h3 class="tit_big02">
						発注履歴
					</h3>
					<div class="begin_order txt_box">
						<p>現在発注はしておりません。</p>
						<a href="" class="disp_b btn_mt mode_s">初めての発注はこちらから</a>
					</div>
					<!--/「begin_order」-->
<!--
					<div class="order_box txt_box">
						<ul class="news_li">
<li class="wait_contract">
<time datetime="2020/00/00">2020/00/00</time>
<a href="./orderhistory/detail.html">案件名案件名</a>
</li>
<li class="wait_payment">
<time datetime="2020/00/00">2020/00/00</time>
<a href="./orderhistory/detail.html">案件名案件名</a>
</li>
<li class="wait_shipping">
<time datetime="2020/00/00">2020/00/00</time>
<a href="./orderhistory/detail.html">案件名案件名</a>
</li>
<li class="wait_check">
<time datetime="2020/00/00">2020/00/00</time>
<a href="./orderhistory/detail.html">案件名案件名</a>
</li>
<li class="wait_assessment">
<time datetime="2020/00/00">2020/00/00</time>
<a href="./orderhistory/detail.html">案件名案件名</a>
</li>
						</ul>
						<p class="btn_mt">
							<a href="../jewellermenu/orderhistory/index.html" class="btn01">
								<span>発注履歴一覧へ</span>
							</a>
						</p>
					</div>
-->
					<!--/「begin_order」-->
				</section>
				<!--/#my_order-->

				<section id="my_received" class="mid_sec">
					<h3 class="tit_big02">
						受注履歴
					</h3>
<!--
					<div class="begin_order txt_box">
						<p>現在受注はありません。</p>
						<a href="../order_list/index.html" class="disp_b btn_mt mode_s">公開依頼一覧はこちら</a>
					</div>
-->
					<!--/「begin_order」-->
					<div class="order_box txt_box">
						<ul class="news_li">
							<li class="wait_contract">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
							<li class="wait_payment">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
							<li class="wait_shipping">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
							<li class="wait_check">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
							<li class="wait_assessment">
								<time datetime="2020/00/00">2020/00/00</time>
								<a href="./orderhistory/detail.html">案件名案件名</a>
							</li>
						</ul>
						<p class="btn_mt">
							<a href="../jewellermenu/orderreceived/index.html" class="btn01">
								<span>受注履歴一覧へ</span>
							</a>
						</p>
					</div>
					<!--/「begin_order」-->
				</section>
				<!--/#my_order-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
				@include('layouts.jeweller_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->


@endsection