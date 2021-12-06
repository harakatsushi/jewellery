


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
				<h2>ユーザー</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/operationmenu">運営メニュー</a></li>
						<li>ユーザー</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						ユーザー<?php if($cond): ?>（<?php echo e(implode('、',$cond), false); ?>）<?php endif; ?>
					</h3>
					<ul class="favo_li mode_prod">
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li <?php if($user->status==9): ?> class="leaved" <?php endif; ?>>
							<div class="img_box mode_thum">
								<?php if($user->image): ?>
				                <img src="/upload/profile/<?php echo e(Auth::user()->image, false); ?>" alt="">
				                <?php else: ?> 
				                <img src="/assets/images/jeweller/img01.jpg" alt="">
                				<?php endif; ?>
								
							</div>
							<div class="release">
								<button class="btn_release <?php if($user->status==1): ?>active <?php endif; ?> " onclick="chgSt(<?php echo e($user->id, false); ?>,1)">承認</button>
								<button class="btn_release <?php if($user->status==0): ?>active <?php endif; ?> " onclick="chgSt(<?php echo e($user->id, false); ?>,0)">非承認</button>
							</div>
							<div class="data">
								<a href="/operationmenu/user/detail/<?php echo e($user->id, false); ?>"><span><?php if($user->status==9): ?> 【退会済】 <?php endif; ?> <?php echo e($user->name, false); ?></span></a>
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
				<dl class="menu_box narrow_box tag_dl">
					<dt>
						絞り込み表示
					</dt>
					<dd>
						<form action="">
							<ul class="nav_menu">
								<li class="fs">
									ユーザー種別
								</li>
								<li>
									<label>
										<input type="checkbox" name="role[]" value="1" <?php if(is_array($select_role) && in_array(1,$select_role)): ?>checked <?php endif; ?>> ユーザー
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="role[]" value="2" <?php if(is_array($select_role) && in_array(2,$select_role)): ?>checked <?php endif; ?>> ジュエラー
									</label>
								</li>
								<li class="fs">
									ジュエラー業種
								</li>
								<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <label>
                                        <input type="checkbox" value="<?php echo e($genre->id, false); ?>" name="genre_id[]" 
                                        <?php if(is_array($select_genre) && in_array($genre->id,$select_genre)): ?>checked <?php endif; ?>> <?php echo e($genre->name, false); ?>

                                    </label>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<li class="fs">
									アカウント状況
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="1" <?php if(is_array($select_status) && in_array(1,$select_status)): ?>checked <?php endif; ?>> 承認
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="0" <?php if(is_array($select_status) && in_array(0,$select_status)): ?>checked <?php endif; ?>> 非承認
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="status[]" value="9" <?php if(is_array($select_status) && in_array(9,$select_status)): ?>checked <?php endif; ?>> 退会済
									</label>
								</li>
								<li class="fs">
									アカウント状況
								</li>
								<li>
									<label>
										<input type="checkbox" name="is_pay_wait" value="1" <?php if(request()->input('is_pay_wait')): ?>checked <?php endif; ?>> 報酬支払待ち
									</label>
								</li>
								<li class="fs">
									評価
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="5" <?php if(is_array(request()->input('evaluation')) && in_array(5,request()->input('evaluation'))): ?>checked <?php endif; ?>> ★4-5
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="4" <?php if(is_array(request()->input('evaluation')) && in_array(4,request()->input('evaluation'))): ?>checked <?php endif; ?>> ★3-4未満
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="3" <?php if(is_array(request()->input('evaluation')) && in_array(3,request()->input('evaluation'))): ?>checked <?php endif; ?>> ★2-3未満
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="2" <?php if(is_array(request()->input('evaluation')) && in_array(2,request()->input('evaluation'))): ?>checked <?php endif; ?>> ★1-2未満
									</label>
								</li>
								<li>
									<label>
										<input type="checkbox" name="evaluation[]" value="1" <?php if(is_array(request()->input('evaluation')) && in_array(1,request()->input('evaluation'))): ?>checked <?php endif; ?>> ★0-1未満
									</label>
								</li>
							</ul>
							<p class="btn_mt">
								<input type="submit" class="btn01" value="検索する">
							</p>
							<p class="btn_mt">
								<a href="/operationmenu/user" class="fs">
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
<?php echo $__env->make('layouts.app', ['title' => 'ユーザー｜運営メニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/operationmenu/user/index.blade.php ENDPATH**/ ?>