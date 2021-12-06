@extends('layouts.app', ['title' => 'ジュエラーログイン','css'=>'mymenu'])





@section('content')
        <div id="page_tit" class="mode_mymenu">
            <div class="container">
                <h2>ジュエラーログイン</h2>
                <nav class="breadcrumbs">
                    <ul>
                        <li><a href="/">ai-jewelly TOPページ</a></li>
                        <li>ジュエラーログイン</li>
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
                            ジュエラーログイン
                        </dt>
                        <dd>
                            <form action="/login" method="POST">
                                @csrf
                                <div class="pc_layout">
<!--
<div class="error_txt txt_box">
<p class="tac">メールアドレスまたはパスワードが違います。</p>
<p class="tac">あとx回ログインに失敗すると30分間入力できなくなります。</p>
<p class="tac">只今ログイン制限中です。30分後にお試しください。</p>
</div>
-->
          @if (count($errors) > 0)
          <div class="error_txt txt_box">
              @foreach ($errors->all() as $error)
              <p class="tac"> {!! $error !!}</p>
              @endforeach
          </div>
          @endif

                                    <div>
                                        <p>メールアドレス</p>
                                        <input type="email" name="email" value="">
                                    </div>
                                    <div>
                                        <p>パスワード</p>
                                        <input type="password" name="password" value="">
                                    </div>
                                </div>
                                <p class="btn_mt">
                                    <input type="submit" value="ログイン" class="btn01">
                                </p>
                                <p class="forget_mt">
                                    <a href="/password/reset">パスワードを忘れた場合</a>
                                </p>
                            </form>
        
                        </dd>
                    </dl>
                    <p class="link_mt">
                        <a href="/new_jeweller">新規登録はこちら</a>
                    </p>
                    <p class="link_mt">
                        <a href="/login">ユーザーログインはこちら</a>
                    </p>
                </section>
                <!--/#my_history-->
            </main>
            <!--/#cont_main-->
        </div>
        <!-- /#cont_wrapper -->

@endsection