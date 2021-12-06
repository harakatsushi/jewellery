@extends('layouts.app', ['title' => '在籍ジュエラー'])

@section('content')
		
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
});
</script>
		<div id="page_tit">
			<div class="container">
				<h2>在籍ジュエラー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>在籍ジュエラー</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<div class="search_conditions mid_sec">
					@if(is_array(request()->input("genre")))
					<p class="tit">検索条件</p>
					<dl>
						<dt>
							ジュエラー種別：
						</dt>
						<dd>
							{{implode("、",$cond)}}
						</dd>
					</dl>
					@endif
				</div>
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						一覧
					</h3>
					<p class="sort_box">
						<select name="" id=""   onchange="chgSort('jeweller',this.value)">
							<option value="0" @if($sort_number==0) selected @endif>おすすめ</option>
							<option value="1" @if($sort_number==1) selected @endif>評価の高い順</option>
							<option value="2" @if($sort_number==2) selected @endif>新着順</option>
						</select>
					</p>
					<ul class="item_box mode_menu">
						@foreach($jewellers as $jeweller)
						<li>
							<button class="btn_favo mode_s @if($bookmarks && $bookmarks->contains('item_id',$jeweller->id)) active @endif)" onclick="addBookmark('jeweller',{{$jeweller->id}})"></button>
							<a href="/jeweller/detail/{{$jeweller->id}}">
								<div class="img_box mode_thum">
									@if($jeweller->image)<img src="/upload/profile/{{$jeweller->image}}" alt="">@else<img src="/assets/images/jeweller/img01.jpg" alt="">@endif
									<div class="data">
										<ul class="tag_li">
											<li>{{$jeweller->genre->name}}</li>
										</ul>
										<p class="txt">{{$jeweller->name}}</p>
									</div>
								</div>
							</a>
						</li>
						@endforeach
						
					</ul>
					<style type="text/css">
					.w-5{
						display: none;
					}


					</style>
					<nav class="pager">
{{ $jewellers->appends(request()->input())->render() }}
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
			<aside id="cont_aside" class="mode_search">
				<dl class="menu_box">
					<dt>
						ジュエラー検索
					</dt>
					<dd>
						<form action="" method="get">
							<div class="table_style mode_contact">
								<dl>
									<dt>
										ジュエラー種別
									</dt>
									<dd>
										<dl class="tag_dl">
											<dt>
												種別
											</dt>
											<dd>
												<ul>
													@foreach($genres as $genre)
													<li>
														<label>
															<input type="checkbox" name="genre[]" value="{{$genre->id}}"
															@if(is_array(request()->input('genre')) && in_array($genre->id,request()->input('genre'))) checked @endif
															> {{$genre->name}}
														</label>
													</li>
													@endforeach
												</ul>
											</dd>
										</dl>
									</dd>
								</dl>
							</div>
							<p class="btn_mt mode_s">
								<input type="submit" class="btn01" value="検索する">
							</p>
						</form>
						<p class="btn_mt mode_s tac fs">
							<a href="/jeweller">全て表示</a>
						</p>
					</dd>
				</dl>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
@endsection