                <dl class="menu_box">
                    <dt>
                        ジュエラー情報
                    </dt>
                    <dd>
                        <div class="data">
                            <div class="img_box">
                                <img src="/assets/images/jeweller/img01.jpg" alt="">
                            </div>
                            <p class="name">
                                {{$jeweller->name}}
                            </p>
                        </div>
                        <ul class="nav_menu">
                            <li><a href="/jeweller/detail/{{$jeweller->id}}#pagetop">{{$jeweller->name}}さんのプロフィールTOP</a></li>
                            <li><a href="/jeweller/{{$jeweller->id}}/product/">作品</a></li>
                            <li><a href="/jeweller/{{$jeweller->id}}/menu/">メニュー</a></li>
                            <li><a href="/jeweller/{{$jeweller->id}}/material/">素材・デザイン一覧</a></li>
                            <li><a href="/jeweller/detail/{{$jeweller->id}}#sec_evaluation">直近の評価</a></li>
                            <li><a href="/jeweller/">在籍ジュエラー一覧</a></li>
                        </ul>
                    </dd>
                </dl>
