
@extends('layouts.app', ['title' => $infomation->title.'｜お知らせ｜運営メニュー','css'=>'mymenu'])

@section('content')

	
		<!-- /#g_nav -->

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>{{$infomation->title}}</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li><a href="/operationmenu/news">お知らせ</a></li>
						<li>{{$infomation->title}}</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						お知らせ詳細
					</h3>
					<div class="news_box">
						<time>{{$infomation->yyyymmdd}}</time>
						<p class="tit">{{$infomation->title}}</p>
						<pre>{{$infomation->detail}}</pre>
					</div>
					<div class="data_box">
						<p>公開状況：@if($infomation->status==1)公開 @else 非公開 @endif</p>
						<p>対象：@if($infomation->type==1)ジュエラー @elseif($infomation->type==2) ユーザー @else ジュエラー・ユーザー @endif</p>
					</div>
					<p class="btn_mt btn_mb">
						<a href="/operationmenu/news/edit/{{$infomation->id}}" class="btn01">
							<span>編集する</span>
						</a>
					</p>
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
@include('layouts.admin_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection