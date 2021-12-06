


 <dl class="menu_box">
                    <dt>
                        ジュエラーメニュー
                    </dt>
                    <dd>
                        <div class="data">
                            <div class="img_box">
                  <?php if(Auth::user()->image): ?>
                <img src="/upload/profile/<?php echo e(Auth::user()->image, false); ?>" alt="">
                <?php else: ?> 
               <img src="/assets/images/jeweller/img01.jpg" alt="">
                <?php endif; ?>
                                
                            </div>
                            <p class="name">
                                <?php echo e(Auth::user()->name, false); ?>

                            </p>
                        </div>
                        <nav class="my_menu">
                            <ul class="nav_menu">
                                <li><a href="/jewellermenu/">ジュエラーメニューTOP</a></li>
                                <li><a href="/jewellermenu/message/">メッセージ</a></li>
                                <li><a href="/jewellermenu/favorite/">お気に入り一覧</a></li>
                                <li><a href="/jewellermenu/profile/">プロフィール</a></li>
                                <li><a href="/jewellermenu/orderhistory/">発注履歴</a></li>
                                <li><a href="/jewellermenu/orderreceived/">受注履歴</a></li>
                                <li><a href="/jewellermenu/product/">作品登録</a></li>
                                <li><a href="/jewellermenu/menu/">メニュー登録</a></li>
                                <li><a href="/jewellermenu/material/">素材・デザイン登録</a></li>
                                <li><a href="#" onclick="document.logout_form.submit()">ログアウト</a></li>
                                <li><a href="/jewellermenu/leave/">退会</a></li>
                            </ul>
                        </nav>
                    </dd>
                </dl>
<form action="/logout" method="post" name="logout_form"><?php echo e(csrf_field(), false); ?></form>

<?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/layouts/jeweller_menu.blade.php ENDPATH**/ ?>