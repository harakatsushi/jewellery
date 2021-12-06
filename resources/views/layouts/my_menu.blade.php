                <dl class="menu_box">
                    <dt>
                        マイメニュー
                    </dt>
                    <dd>
                        <div class="data">
                            <div class="img_box">
                                  @if(Auth::user()->image)
                                <img src="/upload/profile/{{Auth::user()->image}}" alt="">
                                @else 
                                <img src="/assets/images/user/common_user.jpg" alt="">
                                @endif
                               
                            </div>
                            <p class="name">
                                {{Auth::user()->name}}
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
<form action="/logout" method="post" name="logout_form">{{ csrf_field() }}</form>

