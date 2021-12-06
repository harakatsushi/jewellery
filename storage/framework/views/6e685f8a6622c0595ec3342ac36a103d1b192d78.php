

<?php $__env->startSection('content'); ?>
		
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token(), false); ?>'
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
					<?php if(is_array(request()->input("genre"))): ?>
					<p class="tit">検索条件</p>
					<dl>
						<dt>
							ジュエラー種別：
						</dt>
						<dd>
							<?php echo e(implode("、",$cond), false); ?>

						</dd>
					</dl>
					<?php endif; ?>
				</div>
				<section id="sec_prod" class="mid_sec">
					<h3 class="tit_big02">
						一覧
					</h3>
					<p class="sort_box">
						<select name="" id=""   onchange="chgSort('jeweller',this.value)">
							<option value="0" <?php if($sort_number==0): ?> selected <?php endif; ?>>おすすめ</option>
							<option value="1" <?php if($sort_number==1): ?> selected <?php endif; ?>>評価の高い順</option>
							<option value="2" <?php if($sort_number==2): ?> selected <?php endif; ?>>新着順</option>
						</select>
					</p>
					<ul class="item_box mode_menu">
						<?php $__currentLoopData = $jewellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jeweller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<button class="btn_favo mode_s <?php if($bookmarks && $bookmarks->contains('item_id',$jeweller->id)): ?> active <?php endif; ?>)" onclick="addBookmark('jeweller',<?php echo e($jeweller->id, false); ?>)"></button>
							<a href="/jeweller/detail/<?php echo e($jeweller->id, false); ?>">
								<div class="img_box mode_thum">
									<?php if($jeweller->image): ?><img src="/upload/profile/<?php echo e($jeweller->image, false); ?>" alt=""><?php else: ?><img src="/assets/images/jeweller/img01.jpg" alt=""><?php endif; ?>
									<div class="data">
										<ul class="tag_li">
											<li><?php echo e($jeweller->genre->name, false); ?></li>
										</ul>
										<p class="txt"><?php echo e($jeweller->name, false); ?></p>
									</div>
								</div>
							</a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
					<style type="text/css">
					.w-5{
						display: none;
					}


					</style>
					<nav class="pager">
<?php echo e($jewellers->appends(request()->input())->render(), false); ?>

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
													<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<li>
														<label>
															<input type="checkbox" name="genre[]" value="<?php echo e($genre->id, false); ?>"
															<?php if(is_array(request()->input('genre')) && in_array($genre->id,request()->input('genre'))): ?> checked <?php endif; ?>
															> <?php echo e($genre->name, false); ?>

														</label>
													</li>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => '在籍ジュエラー'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jeweller/index.blade.php ENDPATH**/ ?>