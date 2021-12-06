
@extends('layouts.app', ['title' => '素材・デザイン一覧｜'.$jeweller->name.'さん｜在籍ジュエラー'])

@section('content')



		<div id="page_tit">
			<div class="container">
				<h2>素材・デザイン一覧</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jeweller">在籍ジュエラー</a></li>
						<li><a href="/jeweller/detail/{{$jeweller->id}}">{{$jeweller->name}}</a></li>
						<li>素材・デザイン一覧</li>
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
					<ul class="item_box mode_material">
						@foreach($materials as $material)
						<li>
							<button  onclick="addBookmark('material',{{$material->id}})" class="btn_favo mode_s @if($material_bookmarks && $material_bookmarks->contains('item_id',$material->id)) active @endif"></button>
							<a href="/jeweller/material/detail/{{$material->id}}">
								<div class="img_box mode_thum">
									<img src="/upload/profile/{{$material->image}}" alt="{{$material->name}}">
								</div>
								<div class="data">
									<ul class="tag_li">
										<li>{{$material->name}}</li>
									</ul>
									<p class="txt">{{$material->detail}}</p>
								</div>
							</a>
						</li>
						@endforeach
					</ul>
					<nav class="pager">
{{ $materials->appends(request()->input())->render() }}
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