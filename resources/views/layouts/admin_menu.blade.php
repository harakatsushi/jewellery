
<dl class="menu_box">
    <dt>
        運営メニュー
    </dt>
    <dd>
        <div class="data">
            <div class="img_box">
                @if(Auth::user()->image)
                <img src="/upload/profile/{{Auth::user()->image}}" alt="">
                @else 
                <img src="/assets/images/operation/operation_icon.jpg" alt="">
                @endif

            </div>
            <p class="name">
                {{Auth::user()->name}}
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
                                @if(Auth::user()->role==4)
                                <li><a href="/operationmenu/invitation/">運営ユーザー招待</a></li>
                                <li><a href="/operationmenu/approval/">運営ユーザー承認</a></li>
                                @endif
                                <li><a href="#" onclick="document.logout_form.submit()">ログアウト</a></li>
                                @if(Auth::user()->role==3)
                               <!--  <li><a href="/operationmenu/leave/">退会</a></li> -->
                                @endif
            </ul>
        </nav>
    </dd>
</dl>
<form action="/logout" method="post" name="logout_form">{{ csrf_field() }}</form>

