<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   <!-- IEの互換表示無効 -->
        <meta name="format-detection" content="telephone=no">   <!-- 電話番号自動リンク無効 -->
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">   <!-- Skypeによる電話番号置換無効 -->
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <meta property="og:url" content="ページのURL">   <!-- OGPタグ/twitterカード -->
        <meta property="og:title" content="ページのタイトル">
        <meta property="og:type" content="ページのタイプ">
        <meta property="og:description" content="記事の抜粋">
        <meta property="og:image" content="画像のURL">
        <meta name="twitter:card" content="カード種類">
        <meta name="twitter:site" content="@Twitterユーザー名">
        <meta property="og:site_name" content="サイト名">
        <meta property="og:locale" content="ja_JP">
        <meta property="fb:app_id" content="appIDを入力">

        <meta name="msapplication-TileImage" content="画像のURL"><!-- Windows用タイル設定 -->
        <meta name="msapplication-TileColor" content="カラーコード（例：#F89174）"/>

        <meta name="description" content="">
        <meta name="robots" content="noindex,nofollow">

        <title>オリジナルジュエリー制作「ai-jewelly」</title>

        <link rel="apple-touch-icon-precomposed" href="画像のURL" />   <!-- スマホ用アイコン画像 -->
        <link rel="stylesheet" href="/assets/css/common.css">
        <link rel="stylesheet" href="/assets/css/top.css">
        <link rel="stylesheet" href="/assets/css/slick-theme.css">
        <link rel="stylesheet" href="/assets/css/slick.css">

        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js"></script>
        <script src="/assets/js/slick.min.js"></script>
        <script src="/assets/js/common.js"></script>

        <script>
            //.slider
            $(function(){
                $('.slider').slick({
                    arrows:false,
                    infinite:true,
                    asNavFor:'.thumb',
                });
                $('.thumb').slick({
                    asNavFor:'.slider',
                    focusOnSelect: true,
                    slidesToShow:4,
                    slidesToScroll:1
                });
            });
        </script>

    </head>

    <body id="pagetop">
        <div class="shade"></div>
        <header id="header">
            <div id="seo">
                <div class="pc_container">
<!--                    <h1><span>全国のジュエラーがあなただけのオリジナルジュエリーをお作りします</span></h1>-->
                    <h1><span>オリジナルジュエリー制作をオンラインで「ai-jewelly」</span></h1>
                </div>
            </div>
            <div class="pc_container">
                <div id="menu_btn" class="menu"><span></span></div>
                <a href="/" id="logo"><img src="/assets/images/common_img/logo.svg" alt="ai-jewelly"></a>
                <ul class="right">
                    <li><a href="/order/" class="h_btn"><img src="/assets/images/common_img/h-button_sp.svg" alt="制作依頼はこちら" class="imgSwitch"></a></li>
                    <li><a href="/login/"><img src="/assets/images/common_img/user.svg" alt="ログイン"></a></li>
                    <li><a href="/qa/"><img src="/assets/images/common_img/q&a.svg" alt="Q&A"></a></li>
                </ul>
            </div>
        </header>
        <!-- /#header -->

        <nav id="g_nav">
            <div class="inner">
                <dl class="my_menu">
                    <dt>マイメニュー</dt>
                    <dd>
                        <ul class="nav_menu">
                            <li>
                                <a href="/mymenu/">マイメニュー TOPページ</a>
                            </li>
                            <li>
                                <a href="/mymenu/message/">メッセージ</a>
                            </li>
                            <li>
                                <a href="/mymenu/favorite/">お気に入り一覧</a>
                            </li>
                            <li>
                                <a href="/mymenu/profile/">プロフィール</a>
                            </li>
                            <li>
                                <a href="/mymenu/orderhistory/">発注履歴</a>
                            </li>
                            <li>
                                <a href="/mymenu/payment/">お支払い方法</a>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="my_menu">
                    <dt>ジュエラーメニュー</dt>
                    <dd>
                        <ul class="nav_menu">
                            <li>
                                <a href="/jewellermenu/">ジュエラーメニュー TOPページ</a>
                            </li>
                            <li>
                                <a href="/jewellermenu/message/">メッセージ</a>
                            </li>
                            <li>
                                <a href="/jewellermenu/favorite/">お気に入り一覧</a>
                            </li>
                            <li>
                                <a href="/jewellermenu/profile/">プロフィール</a>
                            </li>
                            <li>
                                <a href="/jewellermenu/orderhistory/">発注履歴</a>
                            </li>
                            <li>
                                <a href="/jewellermenu/orderreceived/">受注履歴</a>
                            </li>
                            <li>
                                <a href="/jewellermenu/product/">作品登録</a>
                            </li>
                            <li>
                                <a href="/jewellermenu/menu/">メニュー登録</a>
                            </li>
                            <li>
                                <a href="/jewellermenu/material/">素材・デザイン登録</a>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <dl class="my_menu">
                    <dt>運営メニュー</dt>
                    <dd>
                        <ul class="nav_menu">
                            <li>
                                <a href="/operationmenu/">運営メニュー TOPページ</a>
                            </li>
                            <li>
                                <a href="/operationmenu/message/">メッセージ</a>
                            </li>
                            <li>
                                <a href="/operationmenu/favorite/">お気に入り一覧</a>
                            </li>
                            <li>
                                <a href="/operationmenu/news/">お知らせ</a>
                            </li>
                            <li>
                                <a href="/operationmenu/user/">ユーザー</a>
                            </li>
                            <li>
                                <a href="/operationmenu/progress/">進捗管理</a>
                            </li>
                        </ul>
                    </dd>
                </dl>
                <ul class="nav_menu">
                    <li>
                        <a href="/">ai-jewelly TOPページ</a>
                    </li>
                    <li>
                        <a href="/product/">制作実績</a>
                    </li>
                    <li>
                        <a href="/jeweller/">ジュエラー一覧</a>
                    </li>
                    <li>
                        <a href="/material/">素材・デザイン一覧</a>
                    </li>
                    <li>
                        <a href="/menu/">制作メニュー</a>
                    </li>
                    <li>
                        <a href="/tutorial/">発注チュートリアル</a>
                    </li>
                    <li>
                        <a href="/order_list/">公開依頼一覧</a>
                    </li>
                    <li>
                        <a href="/qa/">Q&amp;A</a>
                    </li>
                    <li>
                        <a href="/price/">料金の目安</a>
                    </li>
                    <li>
                        <a href="/guide/">ご利用ガイド</a>
                    </li>
                    <li>
                        <a href="/company/">運営会社</a>
                    </li>
                    <li>
                        <a href="/terms/">規約・特定商取引法に基づく表記</a>
                    </li>
                    <li>
                        <a href="/contact/">お問い合わせ</a>
                    </li>
                    <li class="btn">
                        <a href="/order/"><img src="/assets/images/common_img/h-button_pc.svg" alt=""></a>
                    </li>
                </ul>
                <p class="btn_mt">
                    <span class="close">
                        CLOSE
                    </span>
                </p>
            </div>
        </nav>
        <!-- /#g_nav -->

        <div id="mv">
            <div class="container">
                <div class="cat_box">
                    <p class="cat01">大切な人への特別な贈り物や、<br class="rwd_disp_ox">従来のデザインに満足できないあなたへ</p>
                    <p class="cat02">ジュエリー<span class="fs">も</span><br class="rwd_disp_ox">マッチング<span class="fs">の</span>時代<span class="fs">です</span></p>
                    <p class="cat03">簡単システムで依頼を提出すると<br class="rwd_disp_xo">プロのジュエラーがあなたの想いを形にして届けます。</p>
                </div>
                <div class="img_box">
                    <img src="/assets/images/top/mv-img01_sp.png" alt="">
                </div>
            </div>
            <p class="info"><span class="inner">※ai-jewlly（アイジュエリー）ではアクセサリー制作に関わる方の総称として「ジュエラー」と表記します。</span></p>
        </div>
        <!-- /#mv -->

        <div id="cont_wrapper">
            <section id="sec_prod" class="sec_area sec_read">
                <div class="container mode_ll">
                    <h2 class="tit_big">ai-jewellyで生まれた<br class="rwd_disp_ox">ジュエリー達</h2>
                    <ul class="prod_li">
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img01.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img02.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img03.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img01.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img02.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img03.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img01.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img02.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img03.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img01.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img02.jpg" alt=""></a></li>
                        <li><button class="btn_favo mode_s"></button><a href="/jeweller/product/detail.html"><img src="/assets/images/top/prod-img03.jpg" alt=""></a></li>
                    </ul>
                    <p class="btn_mt">
                        <a href="/product/" class="btn01">
                            <span>制作実績をもっと見る</span>
                        </a>
                    </p>
                </div>
            </section>
            <!-- /#sec_prod -->

            <section id="sec_frow" class="sec_area bg01">
                <div class="container">
                    <h2 class="tit_big">ai-jewellyの使い方</h2>
                    <p class="annotation mode03 tac rwd_disp_ox">※下記メニュー上を左右にスワイプすると<br>他メニューの工程が見れます。</p>

                    <ul class="thumb rwd_disp_xo">
                        <li><a href="#sec_frow">１、公開依頼型</a></li>
                        <li><a href="#sec_frow">２、メニュー型</a></li>
                        <li><a href="#sec_frow">３、素材・デザイン選択型</a></li>
                    </ul>
                    <ul class="slider">
                        <li class="match_item">
                            <h3 class="tit_mid">
                                <span>オリジナリティが輝く</span><br>
                                １、公開依頼型
                            </h3>
                            <ul class="frow_li">
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico01.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            依頼する（無料）
                                        </dt>
                                        <dd>
                                            手書きのスケッチやイメージに近いアクセサリーの画像などを用意しイメージが伝わるように依頼表を作成しましょう。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico02.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            契約する
                                        </dt>
                                        <dd>
                                            依頼表を見て応募してきたジュエラーの中からご希望に沿うジュエラーを選んで契約します。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico03.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            作成する
                                        </dt>
                                        <dd>
                                            ジュエラーが作成しますので、作品が思い通りの形になるように細かな打ち合わせを重ねていきましょう。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico04.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            手元に届く
                                        </dt>
                                        <dd>
                                            ジュエラーよりご依頼いただいたアクセサリーがお手元に届きます。
                                        </dd>
                                    </dl>
                                </li>
                            </ul>
                            <p class="btn_mt btn_mb">
                                <a href="/order/" class="btn01">
                                    <span>公開依頼をする</span>
                                </a>
                            </p>
                        </li>
                        <li class="match_item">
                            <h3 class="tit_mid">
                                <span>気軽に相談</span><br>
                                ２、メニュー型
                            </h3>
                            <ul class="frow_li">
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico01.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            観覧・相談（無料）
                                        </dt>
                                        <dd>
                                            各ジュエラーが公開しているメニューを観覧し気に入った方がいればメッセ―ジを送ます。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico02.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            打ち合わせ・契約
                                        </dt>
                                        <dd>
                                            メッセージでやり取りし内容に納得したら契約しましょう。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico03.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            作成する
                                        </dt>
                                        <dd>
                                            ジュエラーが作成しますので作品が思い通りの形になるように細かな打ち合わせを重ねていきましょう。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico04.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            手元に届く
                                        </dt>
                                        <dd>
                                            ご依頼いただいたアクセサリーがお手元に届きます。
                                        </dd>
                                    </dl>
                                </li>
                            </ul>
                            <p class="btn_mt btn_mb">
                                <a href="/menu/" class="btn01">
                                    <span>メニューへ</span>
                                </a>
                            </p>
                        </li>
                        <li class="match_item">
                            <h3 class="tit_mid">
                                <span>素材から選択</span><br>
                                ３、素材・デザイン選択型
                            </h3>
                            <ul class="frow_li">
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico01.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            観覧・相談（無料）
                                        </dt>
                                        <dd>
                                            各ジュエラーがデザインや取り扱い可能な宝石を公開しているので観覧します。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico02.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            打ち合わせ・契約
                                        </dt>
                                        <dd>
                                            素材・デザインが気に入ったらそれを基にできるアクセサリーを聞いてみて、気に入ったら契約しましょう。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico03.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            作成する
                                        </dt>
                                        <dd>
                                            ジュエラーが作成しますので、作品が思い通りの形になるように細かな打ち合わせを重ねていきましょう。
                                        </dd>
                                    </dl>
                                </li>
                                <li>
                                    <div class="img_box">
                                        <img src="/assets/images/top/frow-ico04.png" alt="">
                                    </div>
                                    <dl>
                                        <dt>
                                            手元に届く
                                        </dt>
                                        <dd>
                                            ご依頼いただいたアクセサリーがお手元に届きます。
                                        </dd>
                                    </dl>
                                </li>
                            </ul>
                            <p class="btn_mt btn_mb">
                                <a href="/material/" class="btn01">
                                    <span>素材・デザイン選択へ</span>
                                </a>
                            </p>
                        </li>
                    </ul>
                    <ul class="thumb rwd_disp_ox">
                        <li><a href="#sec_frow">１、公開依頼型</a></li>
                        <li><a href="#sec_frow">２、メニュー型</a></li>
                        <li><a href="#sec_frow">３、素材・デザイン選択型</a></li>
                    </ul>
                </div>
            </section>
            <!-- /#sec_frow -->

            <section id="sec_material" class="sec_area">
                <div class="container">
                    <h2 class="tit_big mode02"><span>皆様に提供する<br class="rwd_disp_ox">素材・デザイン達</span></h2>
                    <ul class="item_box mode_material">
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/material/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/material/img01.jpg" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        <li>素材のカテゴリー名</li>
                                        <li class="css_off">etc</li>
                                    </ul>
                                    <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/material/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/material/img02.jpg" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        <li>素材のカテゴリー名</li>
                                    </ul>
                                    <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/material/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/material/img03.jpg" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        <li>素材のカテゴリー名</li>
                                    </ul>
                                    <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/material/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/material/img01.jpg" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        <li>素材のカテゴリー名</li>
                                    </ul>
                                    <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/material/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/material/img02.jpg" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        <li>素材のカテゴリー名</li>
                                    </ul>
                                    <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/material/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/material/img03.jpg" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        <li>素材のカテゴリー名</li>
                                    </ul>
                                    <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/material/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/material/img01.jpg" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        <li>素材のカテゴリー名</li>
                                    </ul>
                                    <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/material/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/material/img02.jpg" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        <li>素材のカテゴリー名</li>
                                    </ul>
                                    <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <p class="btn_mt">
                        <a href="/material/" class="btn01">
                            <span>素材・デザインをもっと見る</span>
                        </a>
                    </p>
                </div>
            </section>
            <!-- /#sec_material -->

            <section id="sec_menu" class="sec_area sec_border">
                <div class="container">
                    <h2 class="tit_big">メニューから相談する</h2>
                    <ul class="item_box mode_menu">
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/menu/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/mymenu/img01.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li class="price">20,000円~</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/menu/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/mymenu/img02.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li class="price">20,000円~</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/menu/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/mymenu/img01.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li class="price">20,000円~</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/menu/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/mymenu/img02.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li class="price">20,000円~</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/menu/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/mymenu/img01.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li class="price">20,000円~</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/menu/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/mymenu/img02.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li class="price">20,000円~</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/menu/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/mymenu/img01.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li class="price">20,000円~</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/menu/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/mymenu/img02.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li class="price">20,000円~</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <p class="btn_mt">
                        <a href="/menu/" class="btn01">
                            <span>メニューをもっと見る</span>
                        </a>
                    </p>
                </div>
            </section>
            <!-- /#sec_menu -->

            <section id="sec_juweller" class="sec_area sec_border">
                <div class="container">
                    <h2 class="tit_big">在籍ジュエラー</h2>
                    <ul class="item_box mode_menu mode02">
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/jeweller/img01.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>宝石商</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/jeweller/img02.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>デザイナー</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/jeweller/img03.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>宝石商</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/jeweller/img01.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>宝石商</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/jeweller/img02.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>デザイナー</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/jeweller/img03.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>宝石商</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/jeweller/img01.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>宝石商</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <button class="btn_favo mode_s"></button>
                            <a href="/jeweller/detail.html">
                                <div class="img_box mode_thum">
                                    <img src="/assets/images/jeweller/img02.jpg" alt="">
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>デザイナー</li>
                                        </ul>
                                        <p class="txt">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <p class="btn_mt">
                        <a href="/jeweller/" class="btn01">
                            <span>ジュエラーをもっと見る</span>
                        </a>
                    </p>
                    <div class="recruit_bnr">
                        <p class="read01">
                            ai-jewellではアクセサリーにまつわる<br class="rwd_disp_xo">ジュエラーを募集しています。
                        </p>
                        <ul class="tag_li">
                            <li>
                                コーディネーター
                            </li>
                            <li>
                                デザイナー
                            </li>
                            <li>
                                宝石商
                            </li>
                            <li>
                                地金商
                            </li>
                            <li>
                                加工職人
                            </li>
                            <li>
                                リサイクル業者
                            </li>
                        </ul>
                        <p class="read02">
                            あなたのセンスでオリジナルアクセサリーの<br class="rwd_disp_xo">誕生に貢献しませんか？
                        </p>
                        <p class="btn_mt">
                            <a href="/jeweller_login/new_jeweller.html" class="btn01">
                                <span>ジュエラー登録をする</span>
                            </a>
                        </p>
                    </div>
                </div>
            </section>
            <!-- /#sec_juweller -->

            <section id="sec_about" class="sec_area bg01">
                <div class="container">
                    <div>
                        <h2 class="tit_big">ai-jewellyについて</h2>
                        <div class="beginer_box">
                            <p class="read">初めての方へ</p>
                            <ul class="about_li">
                                <li>
                                    <a href="/guide/">
                                        <div class="img_box">
                                            <img src="/assets/images/top/about_ico01.png" alt="">
                                        </div>
                                        <div class="data">
                                            <p class="tit">ご利用ガイド</p>
                                            <p class="txt">初めてご利用の方向けの各種情報を取り扱っております。</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/price/">
                                        <div class="img_box">
                                            <img src="/assets/images/top/about_ico02.png" alt="">
                                        </div>
                                        <div class="data">
                                            <p class="tit">料金の目安</p>
                                            <p class="txt">ai-jewellyを利用すると各種コストが省けるのでオリジナルジュエリーがお手頃な価格で手元に届きます。</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="/tutorial/">
                                        <div class="img_box">
                                            <img src="/assets/images/top/about_ico03.png" alt="">
                                        </div>
                                        <div class="data">
                                            <p class="tit">初めてのご発注</p>
                                            <p class="txt">初めてでも簡単発注！発注登録は無料でできて全国のジュエラーさんからご提案が届きます。</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mid_sec">
                        <h3 class="tit_mid02">このような方に<br class="rwd_disp_ox">ご利用いただいています</h3>
                        <p class="annotation mode03 tac">※吹き出しをクリック / タップすると発注の途中から入力できます。</p>
                        <ul class="baloon_li">
                            <li><a href="/tutorial/">自分だけのジュエリーを作りたい。</a></li>
                            <li><a href="/tutorial/">作りたいけどやりかたがわからない。</a></li>
                            <li><a href="/tutorial/">なんとなくイメージはあるけど自信がない。</a></li>
                            <li><a href="/tutorial/">相談しながら作りたい。</a></li>
                            <li><a href="/tutorial/">作りたいけど素材がない。</a></li>
                            <li><a href="/tutorial/">作りたいけど予算がない。</a></li>
                            <li><a href="/tutorial/">世界でひとつのこだわりのものを作りたい。</a></li>
                            <li><a href="/tutorial/">ジュエリーは高いから安ければ・・・</a></li>
                            <li><a href="/tutorial/">自分好みの素材があったら作りたい。</a></li>
                            <li><a href="/tutorial/">いらないジュエリーを処分したい。</a></li>
                            <li><a href="/tutorial/">いらないジュエリーをリフォームしたい。</a></li>
                            <li><a href="/tutorial/">記念品としてジュエリーを量産したい。</a></li>
                            <li><a href="/tutorial/">珍しい素材のジュエリーがつくりたい。</a></li>
                            <li><a href="/tutorial/">自分のジュエリーを修理したい。</a></li>
                            <li><a href="/tutorial/">会社の社章をまとめて作りたい。</a></li>
                            <li><a href="/tutorial/">自分のブランドのジュエリーを作りたい。</a></li>
                            <li><a href="/tutorial/">自分のジュエリーを査定してもらたい。</a></li>
                            <li><a href="/tutorial/">ジュエリーや宝石の知識をつけたい。</a></li>
                            <li><a href="/tutorial/">できてるデザインから作りたい。</a></li>
                            <li><a href="/tutorial/">過去のデザインを作りたい。</a></li>
                        </ul>
                    </div>
                    <div class="mid_sec">
                        <h3 class="tit_mid02">ai-jewellyの願い</h3>
                        <div class="wish_box">
                            <img src="/assets/images/top/wish-img_pc.jpg" alt="">
                            <p class="txt">美しいアクセサリーは人生を彩ってくれます。<br>
                                誰でも、どこにいても、オリジナルのアクセサリーを自分や大切な人に贈れることが身近になるような世界になれば素敵だと思いす。</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /#sec_about -->
        </div>
        <!-- /#cont_wrapper -->

        <footer id="footer">
            <a href="#pagetop" id="top_btn"></a>
            <div class="container mode_l">
                <div class="f_top">
                    <div class="left">
                        <div class="f_logo">
                            <p class="fs_pc12_sp10 mincho">全国のジュエラーがあなただけの<br class="rwd_disp_ox">オリジナルジュエリーをお作りします</p>
                            <a href="/" id="f_logo"><img src="/assets/images/common_img/logo_white.svg" alt="ai-jewelly"></a>
                        </div>
                        <nav class="f_nav">
                            <ul>
                                <li><a href="/product/">制作実績</a></li>
                                <li><a href="/jeweller/">ジュエラー一覧</a></li>
                                <li><a href="/material/">素材・デザイン一覧</a></li>
                                <li><a href="/menu/">制作メニュー</a></li>
                                <li><a href="/order_list/">公開依頼一覧</a></li>
                                <li><a href="/price/">料金の目安</a></li>
                                <li><a href="/guide/">ご利用ガイド</a></li>
                                <li><a href="/company/">運営会社</a></li>
                            </ul>
                        </nav>
                        <ul class="btn_area">
                            <li><a href="/order/"><img src="/assets/images/common_img/h-button_pc.svg" alt="制作依頼はこちら"></a></li>
                            <li><a href=""><img src="/assets/images/common_img/ico-insta.svg" alt="Instagram"></a></li>
                            <li><a href=""><img src="/assets/images/common_img/ico-twi.svg" alt="Twitter"></a></li>
                        </ul>
                    </div>
                    <div class="right">
                        <div class="sns">SNS_area</div>
                    </div>
                </div>
                <div class="f_bottom">
                    <ul>
                        <li><a href="/contact/#pp">プライバシーポリシー</a></li>
                        <li><a href="/terms/">規約・特定商取引法に基づく表記</a></li>
                    </ul>
                </div>
            </div>
            <div class="copy">
                <div class="container mode_l">
                    <small>@ Rain .inc All Rights Reserved.</small>
                </div>
            </div>
        </footer>
        <!-- /#footer -->
    </body>
</html><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/welcome.blade.php ENDPATH**/ ?>