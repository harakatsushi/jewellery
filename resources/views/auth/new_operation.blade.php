
@extends('layouts.app', ['title' => '運営新規登録','css' => 'mymenu'])

@section('content')
    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>

        <div id="page_tit" class="mode_mymenu">
            <div class="container">
                <h2>運営新規登録</h2>
                <nav class="breadcrumbs">
                    <ul>
                        <li><a href="/">ai-jewelly TOPページ</a></li>
                        <li>運営新規登録</li>
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
                            運営新規登録
                        </dt>
                        <dd>
                            <form method="POST"> {{ csrf_field() }}
                                <div class="pc_layout">
     
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
                                                <input type="text" name="name" value="{{old('name')}}" required="required">
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="req">
                                                メールアドレス
                                            </dt>
                                            <dd>
                                                <input type="email" name="email" value="{{old('email')}}" required="required">
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="req">
                                                パスワード
                                            </dt>
                                            <dd>
                                                <input type="password" name="password" value="" required="required">
                                            </dd>
                                        </dl>
                                      
                                    
                                    </div>

                                    <p class="btn_mt">
                                        <input type="submit" value="新規登録" class="btn01">
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