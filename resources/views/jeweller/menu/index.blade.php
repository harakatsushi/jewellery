
@extends('layouts.app', ['title' => 'メニュー一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'])

@section('content')



		<div id="page_tit">
			<div class="container">
				<h2>メニュー一覧</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/{{$jeweller->id}}">{{$jeweller->name}}</a></li>
						<li>メニュー一覧</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						一覧
					</h3>
					<ul class="item_box mode_menu">
						@foreach($menus as $menu)
						<li>
							<button onclick="addBookmark('menu',{{$menu->id}})" class="btn_favo mode_s @if($menu_bookmarks && $menu_bookmarks->contains('item_id',$menu->id)) active @endif"></button>
							<a href="/jeweller/menu/detail/{{$menu->id}}">
								<div class="img_box mode_thum">
									<img src="/upload/profile/{{$menu->image}}" alt="{{$menu->name}}">
									<div class="data">
										<ul class="tag_li">
											<li class="price">{{number_format($menu->price)}}円{{$menu->name}}</li>
										</ul>
										<p class="txt">{{$menu->detail}}</p>
									</div>
								</div>
							</a>
						</li>
						@endforeach
					</ul>
					<nav class="pager">
						{{ $menus->appends(request()->input())->render() }}
					</nav>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
				@include('layouts.jeweller_front_menu')
			</aside>
			<!--/#cont_main-->
		</div>
@endsection