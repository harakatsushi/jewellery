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
        <?php if(isset($title)): ?>
        <title><?php echo e($title, false); ?>｜オリジナルジュエリー制作「ai-jewelly」</title>
        <?php else: ?>
        <title>オリジナルジュエリー制作「ai-jewelly」</title>
        <?php endif; ?>

        <link rel="apple-touch-icon-precomposed" href="画像のURL" />   <!-- スマホ用アイコン画像 -->
        <link rel="stylesheet" href="/assets/css/common.css">
        <?php if(isset($css)): ?><link rel="stylesheet" href="/assets/css/<?php echo e($css ?? 'price', false); ?>.css"><?php endif; ?>

        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js"></script>
        <script src="/assets/js/common.js"></script>

    </head>

    <body id="pagetop">
        <div class="shade"></div>
        <div class="shade mode02"></div>
        <header id="header">
            <div id="seo">
                <div class="pc_container">
                    <!--                    <h1><span>全国のジュエラーがあなただけのオリジナルジュエリーをお作りします</span></h1>-->
                    <?php if(isset($title)): ?>
                    <h1><span><?php echo e($title, false); ?>｜オリジナルジュエリー制作をオンラインで「ai-jewelly」</span></h1>
                    <?php else: ?>
                     <h1><span>オリジナルジュエリー制作をオンラインで「ai-jewelly」</span></h1>
                    <?php endif; ?>
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
                <?php if(Auth::check()): ?>
                <?php if(Auth::user()->role==1): ?>
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
                <?php endif; ?>
                 <?php if(Auth::user()->role==2): ?>
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
                <?php endif; ?>
                <?php if(Auth::user()->role==3 || Auth::user()->role==4): ?>
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
                 <?php endif; ?>
                <?php endif; ?>
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

            <?php echo $__env->yieldContent('content'); ?>

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
</html><?php /**PATH /home/raindiamond/ai-jewelly.com/resources/views/layouts/app.blade.php ENDPATH**/ ?>