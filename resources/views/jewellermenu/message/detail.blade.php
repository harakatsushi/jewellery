
@if($order)
@extends('layouts.app', ['title' => $order->name.'｜メッセージ｜ジュエラーメニュー','css'=>'mymenu'])
 @else 
@extends('layouts.app', ['title' => 'ダイレクトメッセージ｜メッセージ｜ジュエラーメニュー','css'=>'mymenu'])
  @endif


@section('content')
		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>@if($order){{$order->name}} @else ダイレクトメッセージ @endif</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu/">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/message/">メッセージ</a></li>
						<li>@if($order) {{$order->name}} @else ダイレクトメッセージ @endif</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->
          @if (count($errors) > 0)
          <div class="error_txt txt_box">
              @foreach ($errors->all() as $error)
              <p class="tac"> {!! $error !!}</p>
              @endforeach
          </div>
          @endif
		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="progress_box mid_sec">
					@if($message->status<2)
					<div class="progress_flow mode_consultation">
						<ul>
							<li @if($message->status==1)class="active" @endif >相談</li>
							<li @if($message->status==2)class="active" @endif >契約</li>
						</ul>
					</div>
					@else
					<div class="progress_flow mode_cntract">
						<ul>
							<li @if($message->status==2)class="active" @endif ">契約</li>
							<li @if($message->status==3)class="active" @endif >仮払い</li>
							<li @if($message->status==4)class="active" @endif >業務・発送</li>
							<li @if($message->status==5)class="active" @endif >検収</li>
							<li @if($message->status==6)class="active" @endif >評価</li>
						</ul>
					</div> 
					@endif
					@if($message->status==1)

					@if($message->j_doui)
					<dl class="conditions">
						<dt>
							只今の条件
						</dt>
						<dd>
							<div class="after_condition">

								<p class="from"><a href="/user/detail/{{$message->user_id}}">{{$message->user->name}}</a>さんより</p>
								<p class="price"><span class="pay">支払総額：{{number_format($message->u_price)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->u_price*0.8)}}円）</p>
								<p class="time">{{$message->u_limit_at}}</p >
							
							</div>
							<div class="btn_box">
								@if($message->j_doui==1) <p>同意しました相手の同意をお待ちください。</p> @endif
								
			
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>


					@else
					@if(!$message->j_at )
					<dl class="conditions">
						<dt>
							只今の条件
						</dt>
						<dd>
							@if($message->u_at)
							<div class="after_condition">

								<p class="from"><a href="/user/detail/{{$message->user_id}}">{{$message->user->name}}</a>さんより</p>
								<p class="price"><span class="pay">支払総額：{{number_format($message->u_price)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->u_price*0.8)}}円）</p>
								<p class="time">{{$message->u_limit_at}}</p >
							
							</div>
							@endif
							<div class="btn_box">
								
								@if($message->u_at)
								@if($message->j_doui!=1)<a href="/jewellermenu/message/acept/{{$message->id}}" class="btn01">同意して契約</a> @endif
								@if($message->j_doui==1) <p>同意しました相手の同意をお待ちください。</p> @endif

								@endif
								@if($message->j_doui!=1)	
								<dl class="btn_mt tac condition_box">
									<dt><span class="more">新しい条件を提示する</span></dt>
									<dd class="hide_content">

										<form action="/jewellermenu/message/proposal/{{$message->id}}" method="POST">@csrf
											<table class="input_form">
												<tr>
													<th class="req">
														契約金額
													</th>
													<td>
														<input type="number" name="price" value="{{old('price')}}" > 円<br>
														<span class="fs">（システム利用料控除後のジュエラー受領報酬：xxx円）</span>
													</td>
												</tr>
												<tr>
													<th class="any">
														完了予定日
													</th>
													<td>
														<input type="date" name="date" value="{{old('date')}}">
													</td>
												</tr>
											</table>
											<input type="submit" class="btn_submit" value="条件を更新する">
										</form>
									</dd>
								</dl>
								@endif
			
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					@elseif(($message->u_at && $message->u_at>$message->j_at) )
					<dl class="conditions">
						<dt>
							新しい条件が提示されています。
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="/user/detail/{{$message->user_id}}">{{$message->user->name}}</a>さんより</p>
								<p class="price"><span class="pay">支払総額：{{number_format($message->u_price)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->u_price*0.8)}}円）</p>
								<p class="time">{{$message->u_limit_at}}</p >
							</div>
							<div class="after_condition mode_before">
								<p class="from">以前の条件：</p>
								<p class="price"><span class="pay">支払総額：{{number_format($message->j_price*0.8)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->j_price*0.8)}}円）</p>
								<p class="time">{{$message->j_limit_at}}</p>
							</div>
							<div class="btn_box">
								@if($message->j_doui!=1)<a href="/jewellermenu/message/acept/{{$message->id}}" class="btn01">同意して契約</a> @endif
								<dl class="btn_mt tac condition_box">
									<dt><span class="more">新しい条件を提示する</span></dt>
									<dd class="hide_content">
										<form action="/jewellermenu/message/proposal/{{$message->id}}" method="POST">@csrf
											<table class="input_form">
												<tr>
													<th class="req">
														契約金額
													</th>
													<td>
														<input type="number" name="price" value="{{old('price')}}" > 円<br>
														<span class="fs">（システム利用料控除後のジュエラー受領報酬：xxx円）</span>
													</td>
												</tr>
												<tr>
													<th class="any">
														完了予定日
													</th>
													<td>
														<input type="date" name="date" value="{{old('date')}}">
													</td>
												</tr>
											</table>
											<input type="submit" class="btn_submit" value="条件を更新する">
										</form>
									</dd>
								</dl>
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					@elseif(($message->u_at && $message->u_at<=$message->j_at) )
					<dl class="conditions">
						<dt>
							条件提示中です
						</dt>
						<dd>
							<div class="btn_box">
							@if($message->j_doui==1)相手が同意しました<br><a href="/jewellermenu/message/acept/{{$message->id}}" class="btn01">同意して契約</a> @endif
						</div>
							<div class="after_condition">
								<!-- <p class="from"><a href="../../user/detail.html">user_name</a>さんより</p> -->
								<p class="price"><span class="pay">支払総額：{{number_format($message->j_price)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->j_price*0.8)}}円）</p>
								<p class="time">{{$message->j_at}}</p>
							</div>
							<div class="after_condition mode_before">
								<p class="from">以前の条件：</p>
								<p class="price"><span class="pay">支払総額：{{number_format($message->u_price)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->u_price*0.8)}}円）</p>
								<p class="time">{{$message->u_at}}</p>
							</div>
							<div class="btn_box">
								<dl class="btn_mt tac condition_box">
									<dt><span class="more">新しい条件を提示する</span></dt>
									<dd class="hide_content">
										<form action="/jewellermenu/message/proposal/{{$message->id}}" method="POST">@csrf
											<table class="input_form">
												<tr>
													<th class="req">
														契約金額
													</th>
													<td>
														<input type="number" name="price" value="{{old('price')}}" > 円<br>
														<span class="fs">（システム利用料控除後のジュエラー受領報酬：xxx円）</span>
													</td>
												</tr>
												<tr>
													<th class="any">
														完了予定日
													</th>
													<td>
														<input type="date" name="date" value="{{old('date')}}">
													</td>
												</tr>
											</table>
											<input type="submit" class="btn_submit" value="条件を更新する">
										</form>
									</dd>
								</dl>
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
										@elseif($message->u_doui  )
					<dl class="conditions">
						<dt>
							相手が同意しました
						</dt>
						<dd>
							<div class="btn_box">
							相手が同意しました<br><a href="/jewellermenu/message/acept/{{$message->id}}" class="btn01">同意して契約</a>
						</div>
							
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					@endif
					@endif
					@endif
					@if($message->status==2 && !$message->pay_status==1)
					<dl class="conditions">
						<dt>
							合意条件
						</dt>
						<dd>
							<div class="after_condition">
								@if($message->accept_type=='user')
								<p class="from"><a href="/user/detail/{{$message->user_id}}">{{$message->user->name}}</a>さんより</p>
								@else
								<p class="from"><a href="/jeweller/detail/{{$message->jeweller_id}}">{{$message->jeweller->name}}</a>さんより</p>
								@endif
								<p class="price"><span class="pay">支払総額：{{number_format($message->accept_price)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->accept_price*0.8)}}円）</p>
								<p class="time">{{$message->accept_at}}</p>
							</div>
							<div class="btn_box">
								<p class="tac btn_mb">
									条件の合意が成立しました。<br>
									仮払いをお待ちください。
								</p>
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li class="now"><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					@endif
					@if($message->status==2 && $message->pay_status==1)
					<dl class="conditions">
						<dt>
							仮払い承認待ち
						</dt>
						<dd>
							<div class="after_condition">
								@if($message->accept_type=='user')
								<p class="from"><a href="/user/detail/{{$message->user_id}}">{{$message->user->name}}</a>さんより</p>
								@else
								<p class="from"><a href="/jeweller/detail/{{$message->jeweller_id}}">{{$message->jeweller->name}}</a>さんより</p>
								@endif
								<p class="price"><span class="pay">支払総額：{{number_format($message->accept_price)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->accept_price*0.8)}}円）</p>
								<p class="time">{{$message->accept_at}}</p>
							</div>
							<div class="btn_box">
								<p class="tac btn_mb">
									仮払いが行われました。<br>
									運営の承認をお待ちください。
								</p>
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li class="now"><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					@endif
					@if($message->status==3)

					<dl class="conditions">
						<dt>
							仮払いが完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								
								<p class="from"><a href="/user/detail/{{$message->user_id}}">{{$message->user->name}}</a>さんより</p>
								<p class="price"><span class="pay">支払総額：{{number_format($message->accept_price)}}円</span>（システム利用料控除後のジュエラー受領報酬：{{number_format($message->accept_price*0.8)}}円）</p>
								<p class="time">{{$message->pay_at}}</p>
							</div>
							<div class="btn_box">
								<div class="txt_box">
									<p class="tac">
										仮払いが行われました。<br>
										作業を開始してください。
									</p>
									<p class="tac btn_mb">
										発送したら下記のボタンを押してください。
									</p>
								</div>
								<a href="/jewellermenu/send/{{$message->id}}" class="btn01">発送をする</a>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="now"><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					@endif
					@if($message->status==4)
					<dl class="conditions">
						<dt>
							発送が完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="/jeweller/detail/{{$message->jeweller_id}}">{{$message->jeweller->name}}</a>さんより</p>
								<p>{{$message->send_at}}に発送されました。</p>
							</div>
							<div class="btn_box">
								<p class="tac btn_mb">
									受け取り・検品をお待ちください。
								</p>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="done"><span>②ジュエラー：業務・発送</span></li>
									<li class="now"><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
						@endif
					@if($message->status==5)
					<dl class="conditions">
						<dt>
							受け取り・検品が完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="/user/detail/{{$message->user_id}}">{{$message->user->name}}</a>さんより</p>
								<p>{{$message->recieve_at}}に受け取り・検品が完了しました</p>
							</div>
							<div class="btn_box">
								<div class="txt_box">
									<p class="tac">
										受け取りが確認されました。<br>
										ご利用ありがとうございます。<br>
										（報酬は次回の振り込み日に振り込まれます）
									</p>
									<p class="tac btn_mb">
										今回の取引を評価しましょう！
									</p>
								</div>
								<a href="/jewellermenu/assessment/{{$message->id}}" class="btn01">評価する</a>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="done"><span>②ジュエラー：業務・発送</span></li>
									<li class="done"><span>④発注者：受け取り・検品</span></li>
									<li class="now"><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					@endif
				</div>
			
				<section id="my_message" class="mid_sec">
					<h3 class="tit_big02">
						メッセージ
					</h3>
					<ul class="message_li">
						@foreach($messageLists as $messageList)
						@if($messageList->user->id==Auth::user()->id)
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
									DL：<a href="/jewellermenu/message/dl/{{$messageList->id}}" download="{{$messageList->org_file_name}}">{{$messageList->org_file_name}}</a>
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
									DL：<a href="/jewellermenu/message/dl/{{$messageList->id}}" download="{{$messageList->org_file_name}}">{{$messageList->org_file_name}}</a>
								</div>
								@endif
							</div>
						</li>




						@endif
						@endforeach
						
					</ul>
					<div class="input_box">
						<form action="/jewellermenu/message/detail/{{$message->id}}" method="POST" enctype="multipart/form-data">@csrf
							<textarea name="detail" class="autosize" required="required"></textarea>
							<input type="file" name="file">
							<p class="btn_mt"><input type="submit" class="btn01" value="投稿する"></p>
						</form>
					</div>
				</section>
				<!--/#my_message-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
@include('layouts.jeweller_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

@endsection