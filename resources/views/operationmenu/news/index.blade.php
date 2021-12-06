
@extends('layouts.app', ['title' => 'お知らせ｜運営メニュー','css'=>'mymenu'])

@section('content')


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>お知らせ</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>お知らせ</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="new_post">
					<a href="/operationmenu/news/new_post" class="btn01">新規投稿</a>
				</div>
				<section id="my_history" class="mid_sec">
					<h3 class="tit_big02">
						お知らせ
					</h3>
					<!--
<div class="begin_order txt_box">
<p>現在お知らせはありません。</p>
</div>
-->
					<!--/「begin_order」-->
					<div class="txt_box">
						<ul class="news_li">
							@foreach($infomations as $infomation)
							<li class="@if($infomation->status==1)released @endif @if($infomation->type==1)juweller @elseif($infomation->type==2) user @else juweller user @endif">
								<time datetime="{{$infomation->yyyymmdd}}">{{$infomation->yyyymmdd}}</time>
								<a href="/operationmenu/news/detail/{{$infomation->id}}">{{$infomation->title}}</a>
							</li>
							@endforeach

						</ul>
					</div>
					<!--/「begin_order」-->
					<nav class="pager">
						 {{ $infomations->appends(request()->input())->render() }}
						
					</nav>
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