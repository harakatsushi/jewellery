@extends('layouts.app', ['title' => 'お気に入り｜マイメニュー','css'=>'mymenu'])

@section('content')

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>お気に入り</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/mymenu">マイメニュー</a></li>
						<li>お気に入り</li>
					</ul>
				</nav>
			</div>
		</div>

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						お気に入り
					</h3>
					@if($bookmarks->count()<1)

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
					<nav class="pager">
						<ul>
{{ $bookmarks->appends(request()->input())->render() }}
						</ul>
					</nav>
					@endif
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
						<form>
							<ul class="nav_menu">
								<li>
									<label>
										<input type="checkbox" name="type[]" value="jeweller" @if(is_array(request()->input('type')) && in_array('jeweller',request()->input('type'),true)) checked @endif> ジュエラー
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="type[]" value="product" @if(is_array(request()->input('type')) && in_array('product',request()->input('type'))) checked @endif> 制作実績
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="type[]" value="menu" @if(is_array(request()->input('type')) && in_array('menu',request()->input('type'))) checked @endif> メニュー
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="type[]" value="material" @if(is_array(request()->input('type')) && in_array('material',request()->input('type'))) checked @endif> 素材・デザイン
									</label>
								</li>
							</ul>
							<p class="btn_mt">
								<input type="submit" class="btn01" value="検索する">
							</p>
							<p class="btn_mt">
								<a href="/mymenu/favorite" class="fs">
									全て表示
								</a>
							</p>
						</form>
					</dd>
				</dl>
				@include('layouts.my_menu')
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
@endsection