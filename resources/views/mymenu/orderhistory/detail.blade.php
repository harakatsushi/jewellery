@extends('layouts.app', ['title' => '発注履歴｜マイメニュー','css'=>'mymenu'])

@section('content')


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>@if($message->order){{$message->order->name}} @else ダイレクトメッセージ @endif</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/mymenu">マイメニュー</a></li>
						<li><a href="/mymenu/orderhistory">発注履歴</a></li>
						<li>@if($message->order){{$message->order->name}} @else ダイレクトメッセージ @endif</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						発注履歴詳細
					</h3>
					<div class="order_history_box table_style">
						<dl>
							<dt>
								案件名
							</dt>
							<dd>
								@if($message->order){{$message->order->name}} @else ダイレクトメッセージ @endif
							</dd>
						</dl>
						<dl>
							<dt>
								募集公開日
							</dt>
							<dd>
								
						@if($message->order){{$message->order->created_at}}  @endif
							</dd>
						</dl>
						<dl>
							<dt>
								カテゴリー
							</dt>
							<dd>
								@if($message->order){{$message->order->category->name}}  @endif
							</dd>
						</dl>
						<dl>
							<dt>
								タグ
							</dt>
							<dd class="txt_box">

								<div>
									<!-- <p>【タグタイプ】</p> -->
									<ul>
							@if($message->order)
										@foreach($message->order->tags as $tag)
										<li>{{$tag->name}}</li>
										@endforeach

										@endif
									</ul>
								</div>
							</dd>
						</dl>
						<dl>
							<dt>
								アイキャッチ
							</dt>
							<dd>
								@if($message->order)
								<div class="img_box btn_mb">
									<img src="/upload/profile/{{$message->order->image}}" alt="">
								</div>
								@endif
							</dd>
						</dl>
						<dl>
							<dt>
								説明文
							</dt>@if($message->order)
								<pre>{{$message->order->detail}}</pre>@endif
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像①
							</dt>
							<dd class="txt_box">
								@if($message->order && $message->order->sub_img1)
								<div class="img_box">
									<img src="/upload/profile/{{$message->order->sub_img1}}" alt="">
								</div>
								<p>{{$message->order->annotation01}}</p>
								@endif
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像②
							</dt>
							<dd class="txt_box">
								@if($message->order && $message->order->sub_img2)
								<div class="img_box">
									<img src="/upload/profile/{{$message->order->sub_img2}}" alt="">
								</div>
								<p>{{$message->order->annotation02}}</p>
								@endif
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像③
							</dt>
							<dd class="txt_box">
								@if($message->order && $message->order->sub_img3)
								<div class="img_box">
									<img src="/upload/profile/{{$message->order->sub_img3}}" alt="">
								</div>
								<p>{{$message->order->annotation013}}</p>
								@endif
							</dd>
						</dl>
						<dl>
							<dt>
								募集ページURL
							</dt>
							<dd>
						@if($message->order)
								<a href="/order_list/detail/{{$message->order->id}}">ai-jewelly.com/order_list/detail/{{$message->order->id}}</a>
								@endif
							</dd>
						</dl>
						<dl>
							<dt>
								受注者
							</dt>
							<dd>
	
								<a href="/jeweller/profile/{{$message->jeweller_id}}">{{$message->jeweller->name}}</a>
							</dd>
						</dl>
						<dl>
							<dt>
								契約日
							</dt>
							<dd>
								{{$message->accept_at}}
							</dd>
						</dl>
						<dl>
							<dt>
								金額
							</dt>
							<dd>
								{{number_format($message->accept_price)}}円
							</dd>
						</dl>
						<dl>
							<dt>
								メッセージURL
							</dt>
							<dd>
								<a href="/mymenu/message/detail/{{$message->id}}">ai-jewelly.com/mymenu/message/detail/{{$message->id}}</a>
							</dd>
						</dl>
						<dl>
							<dt>
								進捗状況
							</dt>
							<dd>
								@if($message->status==1)<p>契約前</p>@endif
								@if($message->status==2)<p>仮払い承認待ち</p>@endif
								<!-- <p class="btn_mt mode_s">
									<button class="btn_submit mode02">仮払いを確認しました</button>
								</p> -->
								@if($message->status==3)<p>発送待ち</p>@endif
								@if($message->status==4)<p>検収待ち</p>@endif
								@if($message->status==5)<p>評価待ち</p>@endif
								@if($message->status==6)<p>納品済み</p>@endif
							</dd>
						</dl>
					</div>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
					<!-- <div class="order_history_box table_style">
						<dl>
							<dt>
								素材・デザイン名
							</dt>
							<dd>
								案件名案件名
							</dd>
						</dl>
						<dl>
							<dt>
								カテゴリー
							</dt>
							<dd>
								カテゴリーが入ります。
							</dd>
						</dl>
						<dl>
							<dt>
								タグ
							</dt>
							<dd class="txt_box">
								<div>
									<p>【タグタイプ】</p>
									<ul>
										<li>タグ名</li>
										<li>タグ名</li>
										<li>タグ名</li>
									</ul>
								</div>
								<div>
									<p>【タグタイプ】</p>
									<ul>
										<li>タグ名</li>
										<li>タグ名</li>
										<li>タグ名</li>
									</ul>
								</div>
								<div>
									<p>【タグタイプ】</p>
									<ul>
										<li>タグ名</li>
										<li>タグ名</li>
										<li>タグ名</li>
									</ul>
								</div>
							</dd>
						</dl>
						<dl>
							<dt>
								アイキャッチ
							</dt>
							<dd>
								<div class="img_box btn_mb">
									<img src="../../assets/images/material/img01.jpg" alt="">
								</div>
							</dd>
						</dl>
						<dl>
							<dt>
								説明文
							</dt>
							<dd>
								<pre>テキストが入ります。
テキストが入ります。
テキストが入ります。</pre>
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像①
							</dt>
							<dd class="txt_box">
								<div class="img_box">
									<img src="../../assets/images/top/wish-img_pc.jpg" alt="">
								</div>
								<p>補足文が入ります。なければ非表示になります。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像②
							</dt>
							<dd class="txt_box">
								<div class="img_box">
									<img src="../../assets/images/top/wish-img_pc.jpg" alt="">
								</div>
								<p>補足文が入ります。なければ非表示になります。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像③
							</dt>
							<dd class="txt_box">
								<div class="img_box">
									<img src="../../assets/images/top/wish-img_pc.jpg" alt="">
								</div>
								<p>補足文が入ります。なければ非表示になります。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								素材・デザイン名ページURL
							</dt>
							<dd>
								<a href="../../order_list/detail.html">ai-jewelly.com/order_list/detail.html</a>
							</dd>
						</dl>
						<dl>
							<dt>
								受注者
							</dt>
							<dd>
								<a href="../jeweller/profile/index.html">juwellerが決まっていない場合はこの項目自体が非表示になります</a>
							</dd>
						</dl>
						<dl>
							<dt>
								契約日
							</dt>
							<dd>
								2020/00/00
							</dd>
						</dl>
						<dl>
							<dt>
								金額
							</dt>
							<dd>
								20,000円
							</dd>
						</dl>
						<dl>
							<dt>
								メッセージURL
							</dt>
							<dd>
								<a href="../message/detail.html">ai-jewelly.com/mymenu/message/detail.html</a>
							</dd>
						</dl>
						<dl>
							<dt>
								進捗状況
							</dt>
							<dd>
								<p>契約前</p>
								<p>仮払い承認待ち</p>
								<p>発送待ち</p>
								<p>検収待ち</p>
								<p><a href="../assessment/index.html">評価待ち</a></p>
								<p>納品済み</p>
							</dd>
						</dl>
					</div>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
					<div class="order_history_box table_style">
						<dl>
							<dt>
								メニュー名
							</dt>
							<dd>
								案件名案件名
							</dd>
						</dl>
						<dl>
							<dt>
								カテゴリー
							</dt>
							<dd>
								カテゴリーが入ります。
							</dd>
						</dl>
						<dl>
							<dt>
								タグ
							</dt>
							<dd class="txt_box">
								<div>
									<p>【タグタイプ】</p>
									<ul>
										<li>タグ名</li>
										<li>タグ名</li>
										<li>タグ名</li>
									</ul>
								</div>
								<div>
									<p>【タグタイプ】</p>
									<ul>
										<li>タグ名</li>
										<li>タグ名</li>
										<li>タグ名</li>
									</ul>
								</div>
								<div>
									<p>【タグタイプ】</p>
									<ul>
										<li>タグ名</li>
										<li>タグ名</li>
										<li>タグ名</li>
									</ul>
								</div>
							</dd>
						</dl>
						<dl>
							<dt>
								アイキャッチ
							</dt>
							<dd>
								<div class="img_box btn_mb">
									<img src="../../assets/images/material/img01.jpg" alt="">
								</div>
							</dd>
						</dl>
						<dl>
							<dt>
								説明文
							</dt>
							<dd>
								<pre>テキストが入ります。
テキストが入ります。
テキストが入ります。</pre>
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像①
							</dt>
							<dd class="txt_box">
								<div class="img_box">
									<img src="../../assets/images/top/wish-img_pc.jpg" alt="">
								</div>
								<p>補足文が入ります。なければ非表示になります。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像②
							</dt>
							<dd class="txt_box">
								<div class="img_box">
									<img src="../../assets/images/top/wish-img_pc.jpg" alt="">
								</div>
								<p>補足文が入ります。なければ非表示になります。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								添付画像③
							</dt>
							<dd class="txt_box">
								<div class="img_box">
									<img src="../../assets/images/top/wish-img_pc.jpg" alt="">
								</div>
								<p>補足文が入ります。なければ非表示になります。</p>
							</dd>
						</dl>
						<dl>
							<dt>
								メニューページURL
							</dt>
							<dd>
								<a href="../../order_list/detail.html">ai-jewelly.com/order_list/detail.html</a>
							</dd>
						</dl>
						<dl>
							<dt>
								受注者
							</dt>
							<dd>
								<a href="../jeweller/profile/index.html">juwellerが決まっていない場合はこの項目自体が非表示になります</a>
							</dd>
						</dl>
						<dl>
							<dt>
								契約日
							</dt>
							<dd>
								2020/00/00
							</dd>
						</dl>
						<dl>
							<dt>
								金額
							</dt>
							<dd>
								20,000円
							</dd>
						</dl>
						<dl>
							<dt>
								メッセージURL
							</dt>
							<dd>
								<a href="../message/detail.html">ai-jewelly.com/mymenu/message/detail.html</a>
							</dd>
						</dl>
						<dl>
							<dt>
								進捗状況
							</dt>
							<dd>
								<p>契約前</p>
								<p>仮払い承認待ち</p>
								<p>発送待ち</p>
								<p>検収待ち</p>
								<p><a href="../assessment/index.html">評価待ち</a></p>
								<p>納品済み</p>
							</dd>
						</dl> -->
					</div>
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
				@include('layouts.my_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection