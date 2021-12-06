


<?php $__env->startSection('content'); ?>
		

		<div id="page_tit" class="mode_mymenu">
			<div class="container">
				<h2><?php echo e($order->name, false); ?></h2>
				<nav class="breadcrumbs">
					<ul>
						<li><a href="/">ai-jewelly TOPページ</a></li>
						<li><a href="/jewellermenu/">ジュエラーメニュー</a></li>
						<li><a href="/jewellermenu/message/">メッセージ</a></li>
						<li><?php echo e($order->name, false); ?></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- /#page_tit -->

		<div id="cont_wrapper" class="container u_page">
			<main id="cont_main">
				<div class="progress_box mid_sec">
					<div class="progress_flow mode_consultation">
						<ul>
							<li class="active">相談</li>
							<li>契約</li>
						</ul>
					</div>
					<!-- <div class="progress_flow mode_cntract">
						<ul>
							<li class="active">契約</li>
							<li>仮払い</li>
							<li>業務・発送</li>
							<li>検収</li>
							<li>評価</li>
						</ul>
					</div> -->
					<dl class="conditions">
						<dt>
							只今の条件
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="/user/detail/<?php echo e($order->user_id, false); ?>"><?php echo e($order->user->name, false); ?></a>さんより</p>
								<?php if($order): ?><p class="price"><span class="pay">支払総額：<?php echo e(number_format($order->price), false); ?>円</span>（システム利用料控除後のジュエラー受領報酬：<?php echo e(number_format($order->price*0.8), false); ?>円）</p>
								<p class="time"><?php echo e($order->limit_date2, false); ?></p><?php endif; ?>
							</div>
							<div class="btn_box">
								<?php if($message): ?><a href="" class="btn01">同意して契約</a>
								<!--								<p>同意しました相手の同意をお待ちください。</p>--><?php endif; ?>
								<dl class="btn_mt tac condition_box">
									<dt><span class="more">新しい条件を提示する</span></dt>
									<dd class="hide_content">
										<form action="">
											<table class="input_form">
												<tr>
													<th class="req">
														契約金額
													</th>
													<td>
														<input type="number" name="prie" value="value"> 円<br>
														<span class="fs">（システム利用料控除後のジュエラー受領報酬：xxx円）</span>
													</td>
												</tr>
												<tr>
													<th class="any">
														完了予定日
													</th>
													<td>
														<input type="date" name="date" value="value">
													</td>
												</tr>
											</table>
											<input type="submit" class="btn_submit" value="条件を更新する">
										</form>
									</dd>
								</dl>
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<?php if($message): ?>
					<dl class="conditions">
						<dt>
							新しい条件が提示されています。
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../user/detail.html">user_name</a>さんより</p>
								<p class="price"><span class="pay">支払総額：20,000円</span>（システム利用料控除後のジュエラー受領報酬：16,000円）</p>
								<p class="time">2020/00/00</p>
							</div>
							<div class="after_condition mode_before">
								<p class="from">以前の条件：</p>
								<p class="price"><span class="pay">支払総額：20,000円</span>（システム利用料控除後のジュエラー受領報酬：16,000円）</p>
								<p class="time">2020/00/00</p>
							</div>
							<div class="btn_box">
								<a href="" class="btn01">同意して契約</a>
								<!--								<p>同意しました相手の同意をお待ちください。</p>-->
								<dl class="btn_mt tac condition_box">
									<dt><span class="more">新しい条件を提示する</span></dt>
									<dd class="hide_content">
										<form action="">
											<table class="input_form">
												<tr>
													<th class="req">
														契約金額
													</th>
													<td>
														<input type="number" name="prie" value="value"> 円<br>
														<span class="fs">（システム利用料控除後のジュエラー受領報酬：xxx円）</span>
													</td>
												</tr>
												<tr>
													<th class="any">
														完了予定日
													</th>
													<td>
														<input type="date" name="date" value="value">
													</td>
												</tr>
											</table>
											<input type="submit" class="btn_submit" value="条件を更新する">
										</form>
									</dd>
								</dl>
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							合意条件
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../user/detail.html">user_name</a>さんより</p>
								<p class="price"><span class="pay">支払総額：20,000円</span>（システム利用料控除後のジュエラー受領報酬：16,000円）</p>
								<p class="time">2020/00/00</p>
							</div>
							<div class="btn_box">
								<p class="tac">
									条件の合意が成立しました。<br>
									仮払いを行ってください。
								</p>
								<p class="annotation tac btn_mb">
									※下のボタンを押すと決済付代行の画面が開きます。
								</p>
								<a href="" class="btn01">仮払いを行う</a>
								<!--								<p>運営の承認をお待ちください。</p>-->
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li class="now"><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							合意条件
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../user/detail.html">user_name</a>さんより</p>
								<p class="price"><span class="pay">支払総額：20,000円</span>（システム利用料控除後のジュエラー受領報酬：16,000円）</p>
								<p class="time">2020/00/00</p>
							</div>
							<div class="btn_box">
								<p class="tac btn_mb">
									条件の合意が成立しました。<br>
									仮払いをお待ちください。
								</p>
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li class="now"><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							仮払い承認待ち
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../user/detail.html">user_name</a>さんより</p>
								<p class="price"><span class="pay">支払総額：20,000円</span>（システム利用料控除後のジュエラー受領報酬：16,000円）</p>
								<p class="time">2020/00/00</p>
							</div>
							<div class="btn_box">
								<p class="tac btn_mb">
									仮払いが行われました。<br>
									運営の承認をお待ちください。
								</p>
							</div>
							<div class="txt_box">
								<p class="caution">
									※トラブル防止のために、必ず「契約」「仮払い」完了後に作業を開始してください。
								</p>
								<ul>
									<li class="read">今後の流れ</li>
									<li class="now"><span>①発注者：報酬の仮払い</span></li>
									<li><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							仮払いが完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../user/detail.html">user_name</a>さんより</p>
								<p class="price"><span class="pay">支払総額：20,000円</span>（システム利用料控除後のジュエラー受領報酬：16,000円）</p>
								<p class="time">2020/00/00</p>
							</div>
							<div class="btn_box">
								<p class="tac btn_mb">
									作業を開始します。<br>
									メッセージをやり取りしつつ納品をお待ちください。
								</p>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="now"><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							仮払いが完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../user/detail.html">user_name</a>さんより</p>
								<p class="price"><span class="pay">支払総額：20,000円</span>（システム利用料控除後のジュエラー受領報酬：16,000円）</p>
								<p class="time">2020/00/00</p>
							</div>
							<div class="btn_box">
								<div class="txt_box">
									<p class="tac">
										仮払いが行われました。<br>
										作業を開始してください。
									</p>
									<p class="tac btn_mb">
										発送したら下記のボタンを押してください。
									</p>
								</div>
								<a href="" class="btn01">発送をする</a>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="now"><span>②ジュエラー：業務・発送</span></li>
									<li><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							発送が完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../jeweller/detail.html">jeweller_name</a>さんより</p>
								<p>0000/00/00に発送されました。</p>
							</div>
							<div class="btn_box">
								<p class="tac btn_mb">
									発送されました。<br>
									検品をしてください。
								</p>
								<a href="" class="btn01">受け取り・検品しました</a>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="done"><span>②ジュエラー：業務・発送</span></li>
									<li class="now"><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							発送が完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../jeweller/detail.html">jeweller_name</a>さんより</p>
								<p>0000/00/00に発送されました。</p>
							</div>
							<div class="btn_box">
								<p class="tac btn_mb">
									受け取り・検品をお待ちください。
								</p>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="done"><span>②ジュエラー：業務・発送</span></li>
									<li class="now"><span>④発注者：受け取り・検品</span></li>
									<li><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							受け取り・検品が完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../user/detail.html">user_name</a>さんより</p>
								<p>0000/00/00に受け取り・検品が完了しました</p>
							</div>
							<div class="btn_box">
								<div class="txt_box">
									<p class="tac">
										受け取りが確認されました。<br>
										ご利用ありがとうございます。
									</p>
									<p class="tac btn_mb">
										今回の取引を評価しましょう！
									</p>
								</div>
								<a href="" class="btn01">評価する</a>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="done"><span>②ジュエラー：業務・発送</span></li>
									<li class="done"><span>④発注者：受け取り・検品</span></li>
									<li class="now"><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
					<dl class="conditions">
						<dt>
							受け取り・検品が完了しました！
						</dt>
						<dd>
							<div class="after_condition">
								<p class="from"><a href="../../user/detail.html">user_name</a>さんより</p>
								<p>0000/00/00に受け取り・検品が完了しました</p>
							</div>
							<div class="btn_box">
								<div class="txt_box">
									<p class="tac">
										受け取りが確認されました。<br>
										ご利用ありがとうございます。<br>
										（報酬は次回の振り込み日に振り込まれます）
									</p>
									<p class="tac btn_mb">
										今回の取引を評価しましょう！
									</p>
								</div>
								<a href="../assessment/index.html" class="btn01">評価する</a>
							</div>
							<div class="txt_box">
								<ul>
									<li class="read">今後の流れ</li>
									<li class="done"><span>①発注者：報酬の仮払い</span></li>
									<li class="done"><span>②ジュエラー：業務・発送</span></li>
									<li class="done"><span>④発注者：受け取り・検品</span></li>
									<li class="now"><span>⑤ジュエラー：報酬受け取り</span></li>
								</ul>
							</div>
						</dd>
					</dl>
				</div>
				<?php endif; ?>
				<section id="my_message" class="mid_sec">
					<h3 class="tit_big02">
						メッセージ
					</h3>
					<ul class="message_li">
						<?php $__currentLoopData = $messageLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messageList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($messageList->user->id==Auth::user()->id): ?>
						<li>
							<div class="img_box mode_thum">
								<?php if($messageList->user->image): ?>
								<img src="/upload/profile/<?php echo e($messageList->user->image, false); ?>" alt="<?php echo e($messageList->user->name, false); ?>">
								<?php else: ?>
								<img src="/assets/images/jeweller/img01.jpg" alt="<?php echo e($messageList->user->name, false); ?>">
								<?php endif; ?>
							</div>
							<div class="data">
								<p class="contributor">
									<a href="/jeweller/profile/<?php echo e($messageList->user->id, false); ?>"><?php echo e($messageList->user->name, false); ?></a>
									<span class="time"><?php echo e($messageList->created_at, false); ?></span>
								</p>
								<pre><?php echo e($messageList->detail, false); ?></pre>
								<?php if($messageList->file): ?>
								<div class="file">
									DL：<a href="/jewellermenu/message/dl/<?php echo e($messageList->id, false); ?>" download="<?php echo e($messageList->org_file_name, false); ?>"><?php echo e($messageList->org_file_name, false); ?></a>
								</div>
								<?php endif; ?>
							</div>
						</li>
						<?php else: ?>
						<li>
							<div class="img_box mode_thum">
								<?php if($messageList->user->image): ?>
								<img src="/upload/profile/<?php echo e($messageList->user->image, false); ?>" alt="<?php echo e($messageList->user->name, false); ?>">
								<?php else: ?>
								<img src="/assets/images/user/common_user.jpg" alt="<?php echo e($messageList->user->name, false); ?>">
								<?php endif; ?>
							</div>
							<div class="data">
								<p class="contributor">
									<a href="/user/detail/<?php echo e($messageList->user->id, false); ?>"><?php echo e($messageList->user->name, false); ?></a>
									<span class="time"><?php echo e($messageList->created_at, false); ?></span>
								</p>
								<pre><?php echo e($messageList->detail, false); ?></pre>
								<?php if($messageList->file): ?>
								<div class="file">
									DL：<a href="/jewellermenu/message/dl/<?php echo e($messageList->id, false); ?>" download="<?php echo e($messageList->org_file_name, false); ?>"><?php echo e($messageList->org_file_name, false); ?></a>
								</div>
								<?php endif; ?>
							</div>
						</li>




						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</ul>
					<div class="input_box">
						<form action="/jewellermenu/message/detail/<?php echo e($order->id, false); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?>
							<textarea name="detail" class="autosize" required="required"></textarea>
							<input type="file" name="file">
							<p class="btn_mt"><input type="submit" class="btn01" value="投稿する"></p>
						</form>
					</div>
				</section>
				<!--/#my_message-->
			</main>
			<!--/#cont_main-->

			<aside id="cont_aside" class="mode_menu">
<?php echo $__env->make('layouts.jeweller_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</aside>
			<!--/#cont_aside-->
		</div>
		<!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => $order->name.'｜メッセージ｜ジュエラーメニュー','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/jewellermenu/message/detail.blade.php ENDPATH**/ ?>