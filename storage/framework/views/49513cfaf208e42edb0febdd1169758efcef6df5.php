


<?php $__env->startSection('content'); ?>
	

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2>作品情報編集完了</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu/">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/product">作品登録</a></li>
						<li>作品情報編集完了</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<section id="my_favo" class="mid_sec">
					<h3 class="tit_big02">
						完了
					</h3>
					<div class="txt_box">
						<p>作品情報が変更されました。</p>
						<p class="btn_mt">
							<a href="/jewellermenu/" class="btn01 mode_back">
								ジュエラーメニューTOPへ
							</a>
						</p>
					</div>
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
<?php echo $__env->make('layouts.app', ['title' => '作品情報編集完了｜作品登録｜ジュエラーメニュー｜ジュエラーメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jewellermenu/product/complete.blade.php ENDPATH**/ ?>