


<?php $__env->startSection('content'); ?>

		<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token(), false); ?>'
    }
});
	function chgSt(id,st){
		 $.ajax({
		    url: '/jewellermenu/product/status',
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

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>作品登録</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu">ジュエラーメニュー</a></li>
						<li>作品登録</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="new_post">
					<a href="/jewellermenu/product/new_post" class="btn01">新規登録</a>
				</div>
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						登録済み作品一覧
					</h3>
					<?php if($products->count()<1): ?>

<div class="error_txt txt_box">
<p class="tac">登録済みの作品はありません。</p>
</div>

<?php else: ?>
					<ul class="favo_li mode_prod">
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="img_box mode_thum">
								<?php if($product->image): ?>
								<img src="/upload/profile/<?php echo e($product->image, false); ?>" alt="">

								<?php endif; ?>
								
							</div>
							<div class="release">
								<button class="btn_release <?php if($product->status==1): ?> active <?php endif; ?>" onclick="chgSt(<?php echo e($product->id, false); ?>,1)">公開</button>
								<button class="btn_release <?php if($product->status==2): ?> active <?php endif; ?>" onclick="chgSt(<?php echo e($product->id, false); ?>,2)">非公開</button>

							</div>
							<div class="data">
								<a href="/jewellermenu/product/detail/<?php echo e($product->id, false); ?>"><span><?php echo e($product->name, false); ?></span></a>
							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
					<nav class="pager">
						 <?php echo e($products->appends(request()->input())->render(), false); ?>

					</nav>
					<?php endif; ?>
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
				<?php echo $__env->make('layouts.jeweller_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
</html>
<?php echo $__env->make('layouts.app', ['title' => '作品登録｜ジュエラーメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jewellermenu/product/index.blade.php ENDPATH**/ ?>