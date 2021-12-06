
@extends('layouts.app', ['title' => '作品一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'])

@section('content')



		<div id="page_tit">
			<div class="container">
				<h2>作品一覧</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/{{$jeweller->id}}">{{$jeweller->name}}</a></li>
						<li>作品一覧</li>
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
					<ul class="prod_li mode02">
						@foreach($products as $product)
						<li><button onclick="addBookmark('product',{{$product->id}})" class="btn_favo mode_s @if($product_bookmarks && $product_bookmarks->contains('item_id',$product->id)) active @endif"></button><a href="/jeweller/product/detail/{{$product->id}}"><img src="/upload/profile/{{$product->image}}" alt="{{$product->name}}"></a></li>
						@endforeach
					</ul>
					<nav class="pager">
						<ul>
							{{ $products->appends(request()->input())->render() }}
						</ul>
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
		<!-- /#cont_wrapper -->
@endsection