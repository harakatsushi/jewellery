


<?php $__env->startSection('content'); ?>
		

		<div id="page_tit">
			<div class="container">
				<h2>Q&amp;A</h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li>Q&amp;A</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page mode_item">
			<main id="cont_main">
				<section id="sec_qa01" class="mid_sec">
					<h3 class="tit_big02">
						ご依頼前の良くある質問
					</h3>
					<ul class="qa_li">
						<?php $__currentLoopData = $qas1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<p class="cate">ご依頼前の良くある質問</p>
							<dl>
								<dt>
									<?php echo e($qa->question, false); ?>

								</dt>
								<dd>
									<?php echo nl2br(htmlspecialchars($qa->answer)); ?>

								</dd>
							</dl>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_qa02" class="mid_sec">
					<h3 class="tit_big02">
						ご依頼後の良くある質問
					</h3>
					<ul class="qa_li">
						<?php $__currentLoopData = $qas2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<p class="cate">ご依頼後の良くある質問</p>
							<dl>
								<dt>
									<?php echo e($qa->question, false); ?>

								</dt>
								<dd>
									<?php echo nl2br(htmlspecialchars($qa->answer)); ?>

								</dd>
							</dl>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_qa03" class="mid_sec">
					<h3 class="tit_big02">
						ジュエラー向け
					</h3>
					<ul class="qa_li">
						<?php $__currentLoopData = $qas3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<p class="cate">ジュエラー向け</p>
							<dl>
								<dt>
									<?php echo e($qa->question, false); ?>

								</dt>
								<dd>
									<?php echo nl2br(htmlspecialchars($qa->answer)); ?>

								</dd>
							</dl>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_qa04" class="mid_sec">
					<h3 class="tit_big02">
						システムについて
					</h3>
					<ul class="qa_li">
						<?php $__currentLoopData = $qas4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<p class="cate">システムについて</p>
							<dl>
								<dt>
									<?php echo e($qa->question, false); ?>

								</dt>
								<dd>
									<?php echo nl2br(htmlspecialchars($qa->answer)); ?>

								</dd>
							</dl>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<p class="btn_mt">
						<a href="#" onclick="javascript:window.history.back(-1);return false;" class="btn01 mode_back">
							BACK
						</a>
					</p>
				</section>
				<!--/sec-->
				<section id="sec_qa05" class="mid_sec">
					<h3 class="tit_big02">
						その他
					</h3>
					<ul class="qa_li">
						<?php $__currentLoopData = $qas5; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<p class="cate">その他</p>
							<dl>
								<dt>
									<?php echo e($qa->question, false); ?>

								</dt>
								<dd>
									<?php echo nl2br(htmlspecialchars($qa->answer)); ?>

								</dd>
							</dl>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
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
				<dl class="menu_box">
					<dt>
						制作実績検索
					</dt>
					<dd>
						<ul class="nav_menu">
							<li>
								<a href="#sec_qa01">ご依頼前の良くある質問</a>
							</li>
							<li>
								<a href="#sec_qa02">ご依頼後の良くある質問</a>
							</li>
							<li>
								<a href="#sec_qa03">ジュエラー向け</a>
							</li>
							<li>
								<a href="#sec_qa04">システムについて</a>
							</li>
							<li>
								<a href="#sec_qa05">その他</a>
							</li>
						</ul>
					</dd>
				</dl>
			</aside>
			<!--/#cont_main-->
		</div>
		<!-- /#cont_wrapper -->
<form action="/logout" method="post" name="logout_form"><?php echo e(csrf_field(), false); ?></form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'Q&amp;A'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/qa/index.blade.php ENDPATH**/ ?>