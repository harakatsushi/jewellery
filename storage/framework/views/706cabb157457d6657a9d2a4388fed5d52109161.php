
<dl class="menu_box">
    <dt>
        運営メニュー
    </dt>
    <dd>
        <div class="data">
            <div class="img_box">
                <?php if(Auth::user()->image): ?>
                <img src="/upload/profile/<?php echo e(Auth::user()->image, false); ?>" alt="">
                <?php else: ?> 
                <img src="/assets/images/operation/operation_icon.jpg" alt="">
                <?php endif; ?>

            </div>
            <p class="name">
                <?php echo e(Auth::user()->name, false); ?>

            </p>
        </div>
        <nav class="my_menu">
            <ul class="nav_menu">
                <li><a href="/operationmenu/">運営メニューTOP</a></li>
                                <li><a href="/operationmenu/message/">メッセージ</a></li>
                                <li><a href="/operationmenu/favorite/">お気に入り一覧</a></li>
                                <li><a href="/operationmenu/profile/">プロフィール</a></li>
                                <li><a href="/operationmenu/news/">お知らせ</a></li>
                                <li><a href="/operationmenu/user/">ユーザー</a></li>
                                <li><a href="/operationmenu/progress/">進捗管理</a></li>
                                <li><a href="/operationmenu/campaign/">キャンペーン</a></li>
                                <li><a href="/operationmenu/qa/">Q&amp;A</a></li>
                                <?php if(Auth::user()->role==4): ?>
                                <li><a href="/operationmenu/invitation/">運営ユーザー招待</a></li>
                                <li><a href="/operationmenu/approval/">運営ユーザー承認</a></li>
                                <?php endif; ?>
                                <li><a href="#" onclick="document.logout_form.submit()">ログアウト</a></li>
                                <?php if(Auth::user()->role==3): ?>
                               <!--  <li><a href="/operationmenu/leave/">退会</a></li> -->
                                <?php endif; ?>
            </ul>
        </nav>
    </dd>
</dl>
<form action="/logout" method="post" name="logout_form"><?php echo e(csrf_field(), false); ?></form>

<?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/layouts/admin_menu.blade.php ENDPATH**/ ?>