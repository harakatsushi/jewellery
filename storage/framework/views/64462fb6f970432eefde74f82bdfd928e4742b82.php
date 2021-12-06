<?php $__env->startSection('content'); ?>


        <div id="page_tit" class="mode_mymenu">
            <div class="container">
                <h2>新規登録</h2>
                <nav class="breadcrumbs">
                    <ul>
                        <li><a href="/">ai-jewelly TOPページ</a></li>
                        <li>新規登録</li>
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
                            ユーザー新規登録
                        </dt>
                        <dd>
                            <form method="POST"> <?php echo e(csrf_field(), false); ?>

                                <div class="pc_layout">
                                    <p class="tac read">
                                        簡単登録で素敵なジュエリーに出会えます！
                                    </p>
                                    <div class="table_style mode_contact">

        <div class="col-sm-offset-2 col-sm-8">
          <?php if(count($errors) > 0): ?>
          <div class="alert alert-danger">
            <ul class="list-unstyled">
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <?php echo $error; ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <?php endif; ?>
      </div>



                                        <dl>
                                            <dt class="req">
                                                ユーザーネーム
                                            </dt>
                                            <dd>
                                                <input type="text" name="name" value="" required="required">
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="req">
                                                メールアドレス
                                            </dt>
                                            <dd>
                                                <input type="email" name="email" value="" required="required">
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="req">
                                                パスワード
                                            </dt>
                                            <dd>
                                                <input type="password" name="password" value="" required="required">
                                            </dd>
                                        </dl>
                                    </div>
                                    <p class="btn_mt tac fs">
                                        <label>
                                            <input type="checkbox" name="agree"  required="required">
                                            <a href="/terms/#sec01">利用規約</a>、<a href="/contact/#pp">プライバシーポリシー</a>に同意する
                                        </label>
                                    </p>
                                    <p class="btn_mt">
                                        <input type="submit" value="新規登録" class="btn01">
                                    </p>
                                </div>
                            </form>
                            <div class="sns_box">
                                <p>SNSアカウント新規登録</p>
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
                        <a href="/login">ログインはこちら</a>
                    </p>
                    <p class="link_mt">
                        <a href="/jeweller_login/new_jeweller">ジュエラー新規登録はこちら</a>
                    </p>
                </section>
                <!--/#my_history-->
            </main>
            <!--/#cont_main-->
        </div>
        <!-- /#cont_wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', ['title' => '新規登録','css' => 'mymenu'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/auth/register.blade.php ENDPATH**/ ?>