


<?php $__env->startSection('content'); ?>



		<div id="page_tit">
			<div class="container">
				<h2>公開依頼一覧</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>公開依頼一覧</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<div class="search_conditions mid_sec">
					<p class="tit">検索条件</p>
					<?php if($cond1): ?>
					<dl>
						<dt>
							カテゴリー：
						</dt>
						<dd>
							<?php echo e(implode("、",$cond1), false); ?>

						</dd>
					</dl>
					<?php endif; ?>
					<?php if($cond2): ?>
					<dl>
						<dt>
							タグ：
						</dt>
						<dd>
							<?php echo e(implode("、",$cond2), false); ?>

						</dd>
					</dl>
					<?php endif; ?>
					<?php if($cond3): ?>
					<dl>
						<dt>
							お悩み別：
						</dt>
						<dd>
							<?php echo e(implode("、",$cond3), false); ?>

						</dd>
					</dl>
					<?php endif; ?>
					<?php if($cond4): ?>
					<dl>
						<dt>
							価格：
						</dt>
						<dd>
							<?php echo e(implode("、",$cond4), false); ?>

						</dd>
					</dl>
					<?php endif; ?>
				</div>
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						公開依頼一覧
					</h3>
					<form action="" method="get">
						<p class="sort_box">
							<select name="" id="" onchange="chgSort('order',this.value)">
								<option value="0" <?php if($sort_number==0): ?> selected <?php endif; ?>>新着順</option>
								<option value="1" <?php if($sort_number==1): ?> selected <?php endif; ?>>締切りが遠い順</option>
								<option value="2" <?php if($sort_number==2): ?> selected <?php endif; ?>>締切りが近い順</option>
								<option value="3" <?php if($sort_number==3): ?> selected <?php endif; ?>>予算が高い順</option>
								<option value="4" <?php if($sort_number==4): ?> selected <?php endif; ?>>予算が安い順</option>
							</select>
						</p>
						<ul class="favo_li mode_order">
							<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<div class="left">
									<div class="img_box mode_thum">
										<img src="/upload/profile/<?php echo e($order->image, false); ?>" alt="">
									</div>
									<p class="date">あと<span class="bold"><?php echo e($order->limit_span(), false); ?></span>日</p>
								</div>
								<div class="data">
									<ul class="tag_li">
										<li class="cate"><?php echo e($order->category->name, false); ?></li>
										<?php $__currentLoopData = $order->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($tag->name, false); ?></li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
									<!-- <p class="beginner">
										珍しい素材のジュエリーがつくりたい
									</p> -->
									<a href="/order_list/detail/<?php echo e($order->id, false); ?>"><span><?php echo e($order->name, false); ?></span></a>
									<p class="price">
										制作希望価格：<?php echo e(number_format($order->price), false); ?>円
									</p>
									<p class="summary">
										<?php echo e($order->detail, false); ?>

									</p>
								</div>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</ul>
					</form>
					<nav class="pager">
						<?php echo e($orders->appends(request()->input())->render(), false); ?>

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
						公開依頼検索
					</dt>
					<dd>
						<form action="" method="get">
							<div class="table_style mode_contact">
								<dl>
									<dt>
										カテゴリー
									</dt>
									<dd>
										<ul>
											<li class="fs">
											作る
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="1"  <?php if(request()->input('category_id')==1): ?> checked="checked" <?php endif; ?> > フルオーダー
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="2"  <?php if(request()->input('category_id')==2): ?> checked="checked" <?php endif; ?>> セミオーダー
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="3"  <?php if(request()->input('category_id')==3): ?> checked="checked" <?php endif; ?>> リフォーム
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="4"  <?php if(request()->input('category_id')==4): ?> checked="checked" <?php endif; ?>> デザインのみ
											</label>
										</li>
										<li class="fs">
											素材
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="5"  <?php if(request()->input('category_id')==5): ?> checked="checked" <?php endif; ?>> 素材を探す
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="6"  <?php if(request()->input('category_id')==6): ?> checked="checked" <?php endif; ?>> 素材を依頼する
											</label>
										</li>
										<li class="fs">
											修理・リサイクル
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="7"  <?php if(request()->input('category_id')==7): ?> checked="checked" <?php endif; ?>> 修理
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="8"  <?php if(request()->input('category_id')==8): ?> checked="checked" <?php endif; ?>> サイズ直し
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="9"  <?php if(request()->input('category_id')==9): ?> checked="checked" <?php endif; ?>> 売却
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="10"  <?php if(request()->input('category_id')==10): ?> checked="checked" <?php endif; ?>> 査定
											</label>
										</li>
										<li class="fs">
											相談
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="11"  <?php if(request()->input('category_id')==11): ?> checked="checked" <?php endif; ?>> アドバイス
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="12"  <?php if(request()->input('category_id')==12): ?> checked="checked" <?php endif; ?>> コーディネート
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="13"  <?php if(request()->input('category_id')==13): ?> checked="checked" <?php endif; ?>> 問い合わせ
											</label>
										</li>
										<li>
											<label>
												<input type="radio" name="category_id" value="14"  <?php if(request()->input('category_id')==14): ?> checked="checked" <?php endif; ?>> その他
											</label>
										</li>
										</ul>
									</dd>
								</dl>
								<dl>
									<dt>
										タグ
									</dt>
									<dd>
										<dd>
										<dl class="tag_dl">
											<dt>
												タイプ別
											</dt>
											<dd>
												<ul>
													<li class="tit_class">
														指回り
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(1,request()->input('tag'))): ?> checked <?php endif; ?>  value="1" > リング（指輪）
														</label>
													</li>
													<li class="tit_class">
														腕周り
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(2,request()->input('tag'))): ?> checked <?php endif; ?>  value="2"> ブレスレット（腕輪）
														</label>
													</li>
													<li class="tit_class">
														首回り
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(3,request()->input('tag'))): ?> checked <?php endif; ?>  value="3"> ネックレス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(4,request()->input('tag'))): ?> checked <?php endif; ?>  value="4"> ペンダント
														</label>
													</li>
													<li class="tit_class">
														耳
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(5,request()->input('tag'))): ?> checked <?php endif; ?>  value="5"> ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(6,request()->input('tag'))): ?> checked <?php endif; ?>  value="6"> イヤリング
														</label>
													</li>
													<li class="tit_class">
														その他
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(7,request()->input('tag'))): ?> checked <?php endif; ?>  value="7"> リング&amp;ネックレス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(8,request()->input('tag'))): ?> checked <?php endif; ?>  value="8"> リング&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(9,request()->input('tag'))): ?> checked <?php endif; ?>  value="9"> ネックレス&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(10,request()->input('tag'))): ?> checked <?php endif; ?>  value="10"> リング&amp;ネックレス&amp;ピアス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(11,request()->input('tag'))): ?> checked <?php endif; ?>  value="11"> ブローチ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(12,request()->input('tag'))): ?> checked <?php endif; ?>  value="12"> アンクレット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(13,request()->input('tag'))): ?> checked <?php endif; ?>  value="13"> パーチ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(14,request()->input('tag'))): ?> checked <?php endif; ?>  value="14"> 置物
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(15,request()->input('tag'))): ?> checked <?php endif; ?>  value="15"> ケース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(16,request()->input('tag'))): ?> checked <?php endif; ?>  value="16"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												用途
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(17,request()->input('tag'))): ?> checked <?php endif; ?>  value="17"> レディース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(18,request()->input('tag'))): ?> checked <?php endif; ?>  value="18"> メンズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(19,request()->input('tag'))): ?> checked <?php endif; ?>  value="19"> ブライダル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(20,request()->input('tag'))): ?> checked <?php endif; ?>  value="20"> ペア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(21,request()->input('tag'))): ?> checked <?php endif; ?>  value="21"> エタニティ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(22,request()->input('tag'))): ?> checked <?php endif; ?>  value="22"> ピンキー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(23,request()->input('tag'))): ?> checked <?php endif; ?>  value="23"> シグネット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(24,request()->input('tag'))): ?> checked <?php endif; ?>  value="24"> インテリア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(25,request()->input('tag'))): ?> checked <?php endif; ?>  value="25">鑑定/鑑賞
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(26,request()->input('tag'))): ?> checked <?php endif; ?>  value="26"> ダイヤモンドルース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(27,request()->input('tag'))): ?> checked <?php endif; ?>  value="27"> その他ルース
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(28,request()->input('tag'))): ?> checked <?php endif; ?>  value="28"> アイデア製品
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(29,request()->input('tag'))): ?> checked <?php endif; ?>  value="29"> 冠婚葬祭
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(30,request()->input('tag'))): ?> checked <?php endif; ?>  value="30"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												デザインイメージ
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(31,request()->input('tag'))): ?> checked <?php endif; ?>  value="31"> シンプル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(32,request()->input('tag'))): ?> checked <?php endif; ?>  value="32"> ゴージャス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(33,request()->input('tag'))): ?> checked <?php endif; ?>  value="33"> かわいい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(34,request()->input('tag'))): ?> checked <?php endif; ?>  value="34"> 高級感
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(35,request()->input('tag'))): ?> checked <?php endif; ?>  value="35"> オリジナリティ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(36,request()->input('tag'))): ?> checked <?php endif; ?>  value="36"> 面白い
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(37,request()->input('tag'))): ?> checked <?php endif; ?>  value="37"> アンティーク調
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(38,request()->input('tag'))): ?> checked <?php endif; ?>  value="38"> 洋風
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(39,request()->input('tag'))): ?> checked <?php endif; ?>  value="39"> 和風
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(40,request()->input('tag'))): ?> checked <?php endif; ?>  value="40"> ハート
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(41,request()->input('tag'))): ?> checked <?php endif; ?>  value="41"> アニマル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(42,request()->input('tag'))): ?> checked <?php endif; ?>  value="42"> フラワー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(43,request()->input('tag'))): ?> checked <?php endif; ?>  value="43"> スター/ムーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(44,request()->input('tag'))): ?> checked <?php endif; ?>  value="44"> クロス
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(45,request()->input('tag'))): ?> checked <?php endif; ?>  value="45"> クラウン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(46,request()->input('tag'))): ?> checked <?php endif; ?>  value="46"> アルファベット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(47,request()->input('tag'))): ?> checked <?php endif; ?>  value="47"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												デザイン・特徴
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(48,request()->input('tag'))): ?> checked <?php endif; ?>  value="48"> 地金のみ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(49,request()->input('tag'))): ?> checked <?php endif; ?>  value="49"> ダイヤモンド付き
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(50,request()->input('tag'))): ?> checked <?php endif; ?>  value="50"> 宝石付き
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(51,request()->input('tag'))): ?> checked <?php endif; ?>  value="51"> 1粒タイプ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(52,request()->input('tag'))): ?> checked <?php endif; ?>  value="52"> 宝石沢山
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(53,request()->input('tag'))): ?> checked <?php endif; ?>  value="53"> 模様あり
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(54,request()->input('tag'))): ?> checked <?php endif; ?>  value="54"> 裏側に加工
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(55,request()->input('tag'))): ?> checked <?php endif; ?>  value="55"> セット（重ね付け）
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(56,request()->input('tag'))): ?> checked <?php endif; ?>  value="56"> 華奢
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(57,request()->input('tag'))): ?> checked <?php endif; ?>  value="57"> 幅太
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(59,request()->input('tag'))): ?> checked <?php endif; ?>  value="58"> S字
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(59,request()->input('tag'))): ?> checked <?php endif; ?>  value="59"> V字
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(60,request()->input('tag'))): ?> checked <?php endif; ?>  value="60"> チェーンのみ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(61,request()->input('tag'))): ?> checked <?php endif; ?>  value="61"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												素材別
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(62,request()->input('tag'))): ?> checked <?php endif; ?>  value="62"> K18イエローゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(63,request()->input('tag'))): ?> checked <?php endif; ?>  value="63"> K18ピンクゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(64,request()->input('tag'))): ?> checked <?php endif; ?>  value="64"> K18ホワイトゴールド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(65,request()->input('tag'))): ?> checked <?php endif; ?>  value="65"> K14
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(66,request()->input('tag'))): ?> checked <?php endif; ?>  value="66"> K10
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(67,request()->input('tag'))): ?> checked <?php endif; ?>  value="67"> K24純金
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(68,request()->input('tag'))): ?> checked <?php endif; ?>  value="68"> プラチナ850
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(69,request()->input('tag'))): ?> checked <?php endif; ?>  value="69"> プラチナ900
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(70,request()->input('tag'))): ?> checked <?php endif; ?>  value="70"> プラチナ950
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(71,request()->input('tag'))): ?> checked <?php endif; ?>  value="71"> プラチナ1000
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(72,request()->input('tag'))): ?> checked <?php endif; ?>  value="72"> K18/PTコンビ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(73,request()->input('tag'))): ?> checked <?php endif; ?>  value="73"> シルバー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(74,request()->input('tag'))): ?> checked <?php endif; ?>  value="74"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												宝石別
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(75,request()->input('tag'))): ?> checked <?php endif; ?>  value="75"> ダイヤモンド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(76,request()->input('tag'))): ?> checked <?php endif; ?>  value="76"> ルビー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(77,request()->input('tag'))): ?> checked <?php endif; ?>  value="77"> サファイア
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(78,request()->input('tag'))): ?> checked <?php endif; ?>  value="78"> エメラルド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(79,request()->input('tag'))): ?> checked <?php endif; ?>  value="79"> オパール
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(80,request()->input('tag'))): ?> checked <?php endif; ?>  value="80"> タンザナイト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(81,request()->input('tag'))): ?> checked <?php endif; ?>  value="81"> アレキサンドライト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(82,request()->input('tag'))): ?> checked <?php endif; ?>  value="82"> トルマリン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(83,request()->input('tag'))): ?> checked <?php endif; ?>  value="83"> トパーズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(84,request()->input('tag'))): ?> checked <?php endif; ?>  value="84"> アクアマリン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(85,request()->input('tag'))): ?> checked <?php endif; ?>  value="85"> ペリドット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(86,request()->input('tag'))): ?> checked <?php endif; ?>  value="86"> 真珠
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(87,request()->input('tag'))): ?> checked <?php endif; ?>  value="87"> ガーネット
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(88,request()->input('tag'))): ?> checked <?php endif; ?>  value="88"> ターコイズ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(89,request()->input('tag'))): ?> checked <?php endif; ?>  value="89"> ムーンストーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(90,request()->input('tag'))): ?> checked <?php endif; ?>  value="90"> 珊瑚
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(91,request()->input('tag'))): ?> checked <?php endif; ?>  value="91"> アメシスト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(92,request()->input('tag'))): ?> checked <?php endif; ?>  value="92"> 誕生石
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(93,request()->input('tag'))): ?> checked <?php endif; ?>  value="93"> 原石
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(94,request()->input('tag'))): ?> checked <?php endif; ?>  value="94"> 合成ダイヤモンド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(95,request()->input('tag'))): ?> checked <?php endif; ?>  value="95"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
										<dl class="tag_dl">
											<dt>
												宝石の色
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(96,request()->input('tag'))): ?> checked <?php endif; ?>  value="96"> 無色/ホワイト
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(97,request()->input('tag'))): ?> checked <?php endif; ?>  value="97"> ブラック
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(98,request()->input('tag'))): ?> checked <?php endif; ?>  value="98"> ブラウン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(99,request()->input('tag'))): ?> checked <?php endif; ?>  value="99"> レッド
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(100,request()->input('tag'))): ?> checked <?php endif; ?>  value="100"> ピンク
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(101,request()->input('tag'))): ?> checked <?php endif; ?>  value="101"> ブルー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(102,request()->input('tag'))): ?> checked <?php endif; ?>  value="102"> ライトブルー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(103,request()->input('tag'))): ?> checked <?php endif; ?>  value="103"> パープル
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(104,request()->input('tag'))): ?> checked <?php endif; ?>  value="104"> グリーン
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(105,request()->input('tag'))): ?> checked <?php endif; ?>  value="105"> オレンジ
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(106,request()->input('tag'))): ?> checked <?php endif; ?>  value="106"> イエロー
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(107,request()->input('tag'))): ?> checked <?php endif; ?>  value="107"> 混合色
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(108,request()->input('tag'))): ?> checked <?php endif; ?>  value="108"> その他
														</label>
													</li>
												</ul>
											</dd>
										</dl>
									</dd>
								</dl>
								<dl>
									<dt>
										お悩み別
									</dt>
									<dd>
										<dl class="tag_dl">
											<dt>
												お悩み
											</dt>
											<dd>
												<ul>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(109,request()->input('tag'))): ?> checked <?php endif; ?>  value="109"> 世界でひとつのこだわりのものを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(110,request()->input('tag'))): ?> checked <?php endif; ?>  value="110"> ジュエリーは高いから安ければ・・・
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(111,request()->input('tag'))): ?> checked <?php endif; ?>  value="111"> 自分好みの素材があったら作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(112,request()->input('tag'))): ?> checked <?php endif; ?>  value="112"> いらないジュエリーを処分したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(113,request()->input('tag'))): ?> checked <?php endif; ?>  value="113"> いらないジュエリーをリフォームしたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(114,request()->input('tag'))): ?> checked <?php endif; ?>  value="114"> 記念品としてジュエリーを量産したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(115,request()->input('tag'))): ?> checked <?php endif; ?>  value="115"> 珍しい素材のジュエリーがつくりたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(116,request()->input('tag'))): ?> checked <?php endif; ?>  value="116"> 自分のジュエリーを修理したい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(117,request()->input('tag'))): ?> checked <?php endif; ?>  value="117"> 会社の社章をまとめて作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(118,request()->input('tag'))): ?> checked <?php endif; ?>  value="118"> 自分のブランドのジュエリーを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(119,request()->input('tag'))): ?> checked <?php endif; ?>  value="119"> 自分のジュエリーを査定してもらたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(120,request()->input('tag'))): ?> checked <?php endif; ?>  value="120"> ジュエリーや宝石の知識をつけたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(121,request()->input('tag'))): ?> checked <?php endif; ?>  value="121"> できてるデザインから作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(122,request()->input('tag'))): ?> checked <?php endif; ?>  value="122"> 過去のデザインを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(123,request()->input('tag'))): ?> checked <?php endif; ?>  value="123"> 手持ちのジュエリーと同じものを作りたい
														</label>
													</li>
													<li>
														<label>
															<input type="checkbox" name="tag[]" <?php if(is_array(request()->input('tag')) && in_array(124,request()->input('tag'))): ?> checked <?php endif; ?>  value="124"> 信頼できるお店でつくりたい
														</label>
													</li>
												</ul>
											</dd>
										</dl>
									</dd>
								</dl>
								<dl>
									<dt>
										価格
									</dt>
									<dd>
										<ul>
											<li>
												<input type="number" name="min_price" value="<?php echo e(request()->input('min_price'), false); ?>" class="input_price"> <span class="fs">円（税込）以上、</span>
											</li>
											<li>
												<input type="number" name="max_price" value="<?php echo e(request()->input('max_price'), false); ?>" class="input_price"> <span class="fs">円（税込）未満</span>
											</li>
										</ul>
									</dd>
								</dl>
							</div>
							<p class="btn_mt mode_s">
								<input type="submit" class="btn01" value="検索する">
							</p>
						</form>
						<p class="btn_mt mode_s tac fs">
							<a href="/order_list">全て表示</a>
						</p>
					</dd>
				</dl>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => '公開依頼一覧｜作品登録｜ジュエラーメニュー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/order_list/index.blade.php ENDPATH**/ ?>