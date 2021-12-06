
@extends('layouts.app', ['css' => 'top'])

@section('content')

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
                        @foreach($products as $product)
                        <li><button onclick="addBookmark('product',{{$product->id}})" class="btn_favo mode_s @if($product_bookmarks && $product_bookmarks->contains('item_id',$product->id)) active @endif"></button><a href="/jeweller/product/detail/{{$product->id}}"><img src="/upload/profile/{{$product->image}}" alt=""></a></li>
                        @endforeach
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
                        @foreach($materials as $material)
                        <li>
                            <button  onclick="addBookmark('material',{{$material->id}})" class="btn_favo mode_s @if($material_bookmarks && $material_bookmarks->contains('item_id',$material->id)) active @endif"></button>
                            <a href="/jeweller/material/detail/{{$material->id}}">
                                <div class="img_box mode_thum">
                                    <img src="/upload/profile/{{$material->image}}" alt="">
                                </div>
                                <div class="data">
                                    <ul class="tag_li">
                                        @foreach($material->tags as $ind=> $tag)
                                        @if($ind<1)
                                        <li>{{$tag->name}} @if(count($material->tags)>1) etc @endif</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                    <p class="txt">{{$material->name}}</p>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        
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
                        @foreach($menus as $menu)
                        <li>
                            <button onclick="addBookmark('menu',{{$menu->id}})" class="btn_favo mode_s @if($menu_bookmarks && $menu_bookmarks->contains('item_id',$menu->id)) active @endif"></button>
                            <a href="/jeweller/menu/detail/{{$menu->id}}">
                                <div class="img_box mode_thum">
                                    <img src="/upload/profile/{{$menu->image}}" alt="">
                                    <div class="data">
                                        @if($menu->price)
                                        <ul class="tag_li">
                                            <li class="price">{{number_format($menu->price)}}円~</li>
                                        </ul>
                                        @endif
                                        <p class="txt">{{$menu->name}}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                       
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
                        @foreach($jewellers as $jeweller)
                        <li>
                            <button class="btn_favo mode_s @if($jeweller_bookmarks && $jeweller_bookmarks->contains('item_id',$jeweller->id)) active @endif)" onclick="addBookmark('jeweller',{{$jeweller->id}})"></button>
                            <a href="/jeweller/detail/{{$jeweller->id}}">
                                <div class="img_box mode_thum">
                                    @if($jeweller->image)<img src="/upload/profile/{{$jeweller->image}}" alt="">@else<img src="/assets/images/jeweller/img01.jpg" alt="">@endif
                                    <div class="data">
                                        <ul class="tag_li">
                                            <li>{{$jeweller->genre->name}}</li>
                                        </ul>
                                        <p class="txt">{{$jeweller->name}}</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        
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
                            <a href="/new_jeweller" class="btn01">
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
                            <li><a href="/tutorial/1">自分だけのジュエリーを作りたい。</a></li>
                            <li><a href="/tutorial/2">作りたいけどやりかたがわからない。</a></li>
                            <li><a href="/tutorial/3">なんとなくイメージはあるけど自信がない。</a></li>
                            <li><a href="/tutorial/4">相談しながら作りたい。</a></li>
                            <li><a href="/tutorial/5">作りたいけど素材がない。</a></li>
                            <li><a href="/tutorial/6">作りたいけど予算がない。</a></li>
                            <li><a href="/tutorial/7">世界でひとつのこだわりのものを作りたい。</a></li>
                            <li><a href="/tutorial/8">ジュエリーは高いから安ければ・・・</a></li>
                            <li><a href="/tutorial/9">自分好みの素材があったら作りたい。</a></li>
                            <li><a href="/tutorial/10">いらないジュエリーを処分したい。</a></li>
                            <li><a href="/tutorial/11">いらないジュエリーをリフォームしたい。</a></li>
                            <li><a href="/tutorial/12">記念品としてジュエリーを量産したい。</a></li>
                            <li><a href="/tutorial/13">珍しい素材のジュエリーがつくりたい。</a></li>
                            <li><a href="/tutorial/14">自分のジュエリーを修理したい。</a></li>
                            <li><a href="/tutorial/15">会社の社章をまとめて作りたい。</a></li>
                            <li><a href="/tutorial/16">自分のブランドのジュエリーを作りたい。</a></li>
                            <li><a href="/tutorial/17">自分のジュエリーを査定してもらたい。</a></li>
                            <li><a href="/tutorial/18">ジュエリーや宝石の知識をつけたい。</a></li>
                            <li><a href="/tutorial/19">できてるデザインから作りたい。</a></li>
                            <li><a href="/tutorial/20">過去のデザインを作りたい。</a></li>
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
@endsection