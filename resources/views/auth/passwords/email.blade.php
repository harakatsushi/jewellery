@extends('layouts.app', ['title' => 'パスワードを忘れた場合','css'=>'mymenu'])

@section('content')
       
        <div id="page_tit" class="mode_mymenu">
            <div class="container">
                <h2>パスワードを忘れた場合</h2>
                <nav class="breadcrumbs">
                    <ul>
                        <li><a href="/">ai-jewelly TOPページ</a></li>
                        <li>パスワードを忘れた場合</li>
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
                            再送信
                        </dt>
                        <dd>
                            <form method="POST" action="{{ route('password.email') }}">
                                 @csrf
                                <div class="pc_layout">
                                    <p class="tac">ご登録いただいているアドレスに再設定画面を送りいたします。</p>
                                    <div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p>メールアドレス</p>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                </div>
                                <p class="btn_mt">
                                    <input type="submit" value="送信" class="btn01">
                                </p>
                            </form>
                        </dd>
                    </dl>

                </section>
                <!--/#my_history-->
            </main>
            <!--/#cont_main-->
        </div>
        <!-- /#cont_wrapper -->

       @endsection