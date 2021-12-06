<?php $__env->startSection('content'); ?>
        <div id="page_tit" class="mode_mymenu">
            <div class="container">
                <h2>ログイン</h2>
                <nav class="breadcrumbs">
                    <ul>
                        <li><a href="/">ai-jewelly TOPページ</a></li>
                        <li>ログイン</li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /#page_tit -->

        <div id="cont_wrapper" class="container u_page mode_col1">
            <main id="cont_main">
                <section id="my_history" class="mid_sec">
                    <dl class="login_box mode_user">
                        <dt>
                            ユーザーログイン
                        </dt>
                        <dd>
                            <form action="" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="pc_layout">
<!--
<div class="error_txt txt_box">
<p class="tac">メールアドレスまたはパスワードが違います。</p>
<p class="tac">あとx回ログインに失敗すると30分間入力できなくなります。</p>
<p class="tac">只今ログイン制限中です。30分後にお試しください。</p>
</div>
-->
          <?php if(count($errors) > 0): ?>
          <div class="error_txt txt_box">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <p class="tac"> <?php echo $error; ?></p>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <?php endif; ?>

                                    <div>
                                        <p>メールアドレス</p>
                                        <input type="email" name="email" value="">
                                    </div>
                                    <div>
                                        <p>パスワード</p>
                                        <input type="password" name="password" value="">
                                    </div>
                                </div>
                                <p class="btn_mt">
                                    <input type="submit" value="ログイン" class="btn01">
                                </p>
                                <p class="forget_mt">
                                    <a href="/forget">パスワードを忘れた場合</a>
                                </p>
                            </form>
                            <div class="sns_box">
                                <p>SNSアカウントログイン</p>
                                <ul>
                                    <li>
                                        <a href="" class="google">Google</a>
                                    </li>
                                    <li>
                                        <a href="" class="yahoo">Yahoo!</a>
                                    </li>
                                    <li>
                                        <a href="" class="insta">Instagram</a>
                                    </li>
                                    <li>
                                        <a href="" class="twi">Twtter</a>
                                    </li>
                                </ul>
                            </div>
                        </dd>
                    </dl>
                    <p class="link_mt">
                        <a href="/register">新規登録はこちら</a>
                    </p>
                    <p class="link_mt">
                        <a href="/jeweller_login/">ジュエラーログインはこちら</a>
                    </p>
                </section>
                <!--/#my_history-->
            </main>
            <!--/#cont_main-->
        </div>
        <!-- /#cont_wrapper -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => 'ログイン','css'=>'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/auth/login.blade.php ENDPATH**/ ?>