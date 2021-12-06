
@extends('layouts.app', ['title' => '新規登録','css' => 'mymenu'])

@section('content')


        <div id="page_tit" class="mode_mymenu">
            <div class="container">
                <h2>新規登録</h2>
                <nav class="breadcrumbs">
                    <ul>
                        <li><a href="/">ai-jewelly TOPページ</a></li>
                        <li>新規登録</li>
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
                            ユーザーSNS新規登録
                        </dt>
                        <dd>
                            <form method="POST" action="/new_sns"> {{ csrf_field() }}
                                <div class="pc_layout">
                                    <p class="tac read">
                                        ユーザーネームとメールアドレスの登録をお願いします
                                    </p>
                                    <div class="table_style mode_contact">

        <div class="col-sm-offset-2 col-sm-8">
          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <ul class="list-unstyled">
              @foreach ($errors->all() as $error)
              <li><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {!! $error !!}</li>
              @endforeach
            </ul>
          </div>
          @endif
      </div>



                                        <dl>
                                            <dt class="req">
                                                ユーザーネーム
                                            </dt>
                                            <dd>
                                                <input type="text" name="name" value="{{$user->name}}" required="required">
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="req">
                                                メールアドレス
                                            </dt>
                                            <dd>
                                                <input type="email" name="email" value="{{$user->email}}" required="required">
                                            </dd>
                                        </dl>
    
                                    </div>
                                    <p class="btn_mt tac fs">
                                        <label>
                                            <input type="checkbox" name="agree"  required="required">
                                            <a href="/terms/#sec01">利用規約</a>、<a href="/contact/#pp">プライバシーポリシー</a>に同意する
                                        </label>
                                    </p>
                                    <p class="btn_mt">
                                        <input type="submit" value="更新" class="btn01">
                                    </p>
                                </div>
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