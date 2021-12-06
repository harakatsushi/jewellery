                <dl class="menu_box">
                    <dt>
                        マイメニュー
                    </dt>
                    <dd>
                        <div class="data">
                            <div class="img_box">
                                  <?php if(Auth::user()->image): ?>
                                <img src="/upload/profile/<?php echo e(Auth::user()->image, false); ?>" alt="">
                                <?php else: ?> 
                                <img src="/assets/images/user/common_user.jpg" alt="">
                                <?php endif; ?>
                               
                            </div>
                            <p class="name">
                                <?php echo e(Auth::user()->name, false); ?>

                            </p>
                        </div>
                        <nav class="my_menu">
                            <ul class="nav_menu">
                                <li><a href="/home">マイメニューTOP</a></li>
                                <li><a href="/mymenu/message/">メッセージ</a></li>
                                <li><a href="/mymenu/favorite/">お気に入り一覧</a></li>
                                <li><a href="/mymenu/profile/">プロフィール</a></li>
                                <li><a href="/mymenu/orderhistory/">発注履歴</a></li>
                                <li><a href="/mymenu/payment/">お支払い情報</a></li>
                                <li><a href="#" onclick="document.logout_form.submit()">ログアウト</a></li>
                                <li><a href="/mymenu/leave/">退会</a></li>
                            </ul>
                        </nav>
                    </dd>
                </dl>
<form action="/logout" method="post" name="logout_form"><?php echo e(csrf_field(), false); ?></form>

<?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/layouts/my_menu.blade.php ENDPATH**/ ?>