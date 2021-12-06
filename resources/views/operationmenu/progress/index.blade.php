@extends('layouts.app', ['title' => '進捗管理｜運営メニュー','css'=>'mymenu'])

@section('content')

	
		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>進捗管理</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu/">運営メニュー</a></li>
						<li>進捗管理</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						進捗管理一覧 @if($cond)（{{implode("、",$cond)}}）@endif
					</h3>
					<ul class="news_li">
						@foreach($messages as $message)
						<li class="{{$id_name[$message->status]}}">
							<time datetime="{{substr($message->last_send_at,0,10)}}">{{substr($message->last_send_at,0,10)}}</time>
							<a href="/operationmenu/progress/detail/{{$message->id}}">@if($message->order){{$message->order->name}} @else ダイレクトメッセージ @endif</a>
						</li>
						@endforeach
					</ul>
{{ $messages->appends(request()->input())->render() }}					</nav>
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
						<form >
							<ul class="nav_menu">
								<li>
									<label>
										<input type="checkbox" name="status[]" value="1"> 契約前
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="2"> 仮払い承認待ち
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="3"> 発送待ち
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="4"> 検収待ち
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="5"> 評価待ち
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="6"> 納品済み
									</label>
								</li>
							</ul>
							<p class="btn_mt">
								<input type="submit" class="btn01" value="検索する">
							</p>
							<p class="btn_mt">
								<a href="/operationmenu/progress" class="fs">
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
</html>