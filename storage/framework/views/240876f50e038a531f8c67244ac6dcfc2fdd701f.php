


<?php $__env->startSection('content'); ?>


		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>Q&amp;A</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>Q&amp;A</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token(), false); ?>'
    }
});
	function chgQaSt(id,st){
		 $.ajax({
		    url: '/operationmenu/qa/status',
		    type: 'post',
		    dataType: 'json',
		    // フォーム要素の内容をハッシュ形式に変換
		    data: "id="+id+"&st="+st,
		    timeout: 5000,
		  })
		  .done(function(data) {
		      // 通信成功時の処理を記述
		  })
		  .fail(function() {
		      // 通信失敗時の処理を記述
		  });
	}


</script>
		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="new_post">
					<a href="/operationmenu/qa/new_post" class="btn01">新規投稿</a>
				</div>
				<section class="mid_sec">
					<h3 class="tit_big02">
						Q&amp;A一覧<?php if($cond): ?>（<?php echo e(implode('、',$cond), false); ?>）<?php endif; ?>
					</h3>
					<ul class="qa_li">
						<?php $__currentLoopData = $qas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<p class="cate"><?php if($qa->category==1): ?>ご依頼前の良くある質問
								<?php elseif($qa->category==2): ?>ご依頼後の良くある質問
								<?php elseif($qa->category==3): ?>ジュエラー向け
								<?php elseif($qa->category==4): ?>システムについて
								<?php elseif($qa->category==5): ?>その他

							<?php endif; ?></p>
							<dl>
								<dt>
									<?php echo e($qa->question, false); ?>

								</dt>
								<dd>
									<?php echo e($qa->answer, false); ?>

								</dd>
							</dl>
							<div class="tar">
								<div class="release">
									<button class="btn_release <?php if($qa->status==1): ?> active <?php endif; ?>" onclick="chgQaSt(<?php echo e($qa->id, false); ?>,1)">公開</button>
									<button class="btn_release <?php if($qa->status==2): ?> active <?php endif; ?>" onclick="chgQaSt(<?php echo e($qa->id, false); ?>,2)">非公開</button>
								</div>
								<a href="/operationmenu/qa/edit/<?php echo e($qa->id, false); ?>">編集する</a>
							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</ul>
					<nav class="pager">
						 <?php echo e($qas->appends(request()->input())->render(), false); ?>

						
					</nav>
					
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
						<form action="">
							<ul class="nav_menu">
								<li>
									<label>
										<input type="checkbox" name="category[]" value="1" <?php if(in_array(1,$category)): ?> checked <?php endif; ?>> ご依頼前の良くある質問
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="category[]" value="2" <?php if(in_array(2,$category)): ?> checked <?php endif; ?>> ご依頼後の良くある質問
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="category[]" value="3" <?php if(in_array(3,$category)): ?> checked <?php endif; ?>> ジュエラー向け
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="category[]" value="4" <?php if(in_array(4,$category)): ?> checked <?php endif; ?>> システムについて
									</label>
								</li>
								<li> 
									<label>
										<input type="checkbox" name="category[]" value="5" <?php if(in_array(5,$category)): ?> checked <?php endif; ?>> その他
									</label>
								</li>
							</ul>
							<p class="btn_mt">
								<input type="submit" class="btn01" value="検索する">
							</p>
							<p class="btn_mt">
								<a href="/operationmenu/qa" class="fs">
									全て表示
								</a>
							</p>
						</form>
					</dd>
				</dl>
				<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'Q&amp;A｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/qa/index.blade.php ENDPATH**/ ?>