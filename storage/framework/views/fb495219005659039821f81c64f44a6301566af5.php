


<?php $__env->startSection('content'); ?>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': '<?php echo e(csrf_token(), false); ?>'
    }
});
	function chgSt(id,st){
		 $.ajax({
		    url: '/operationmenu/user/status',
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
				<h2>運営ユーザー承認</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>運営ユーザー承認</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						運営ユーザー
					</h3>
					<ul class="favo_li mode_prod">
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="img_box mode_thum">
								<?php if($user->image): ?>
				                <img src="/upload/profile/<?php echo e(Auth::user()->image, false); ?>" alt="">
				                <?php else: ?> 
				                <img src="/assets/images/operation/operation_icon.jpg" alt="">
                				<?php endif; ?>
								
							</div>
							<div class="release">
								<button class="btn_release <?php if($user->status==1): ?>active <?php endif; ?> " onclick="chgSt(<?php echo e($user->id, false); ?>,1)">承認</button>
								<button class="btn_release <?php if($user->status==0): ?>active <?php endif; ?> " onclick="chgSt(<?php echo e($user->id, false); ?>,0)">非承認</button>
							</div>
							<div class="data">
								<p><?php echo e($user->name, false); ?></p>
								<p>Eメール：<?php echo e($user->email, false); ?></p>
							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					</ul>
					<nav class="pager">
<?php echo e($users->appends(request()->input())->render(), false); ?>

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
				<?php echo $__env->make('layouts.admin_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => '運営ユーザー承認｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/approval/index.blade.php ENDPATH**/ ?>