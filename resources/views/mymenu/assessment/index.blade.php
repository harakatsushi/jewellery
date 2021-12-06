@extends('layouts.app', ['title' => '評価｜マイメニュー','css'=>'mymenu'])

@section('content')

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>評価</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/mymenu">マイメニュー</a></li>
						<li>評価</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_assessment" class="mid_sec">
					<form  method="post">@csrf
						<h3 class="tit_big02">
							評価入力
						</h3>
						<p class="btn_mb"><a href="/jeweller/detail/{{$message->jeweller_id}}">{{$message->jeweller->name}}</a>さんの評価を入力してください。</p>
						<div class="table_style mode_contact">
							<dl>
								<dt>
									評価
								</dt>
								<dd>
									<select name="star">
										<option value="5">☆☆☆☆☆</option>
										<option value="4">☆☆☆☆</option>
										<option value="3">☆☆☆</option>
										<option value="2">☆☆</option>
										<option value="1">☆</option>
									</select>
								</dd>
							</dl>
							<dl>
								<dt>
									コメント
								</dt>
								<dd>
									<textarea name="comment" class="resize"></textarea>
								</dd>
							</dl>
						</div>
						<p class="btn_mt btn_mb">
							<input type="submit" class="btn01" value="評価を投稿する">
						</p>
					</form>
				</section>
				<!--/#my_favo-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
				@include('layouts.my_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection