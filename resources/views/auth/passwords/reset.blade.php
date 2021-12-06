@extends('layouts.app', ['title' => 'パスワード再設定','css'=>'mymenu'])

@section('content')
       
        <div id="page_tit" class="mode_mymenu">
            <div class="container">
                <h2>パスワード再設定</h2>
                <nav class="breadcrumbs">
                    <ul>
                        <li><a href="/">ai-jewelly TOPページ</a></li>
                        <li>パスワード再設定</li>
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
                            パスワード再設定
                        </dt>
                        <dd>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
                                <div class="pc_layout">
                                    <p class="tac">再設定画面お願いします</p>
                                    <div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <p>メールアドレス</p>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    <div>
                                         @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        <p>新しいパスワード</p>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    </div>
                                    <div>

                                        <p>新しいパスワード(確認)</p>
                                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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