
@extends('layouts.app', ['title' => '新規登録','css' => 'mymenu'])

@section('content')
    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>

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
                    <dl class="login_box mode_jeweller">
                        <dt>
                            ジュエラー新規登録
                        </dt>
                        <dd>
                            <form method="POST"> {{ csrf_field() }}
                                <div class="pc_layout">
                                    <p class="tac read">
                                        日本中のお客様に素敵なジュエリーを届けましょう！
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
                                        <dl>
                                            <dt class="req">
                                                業界経験歴
                                            </dt>
                                            <dd>
                                                <input type="number" name="year" value="{{old('ex_year')}}" class="input_ss"> 年
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="req">
                                                メインジャンル
                                            </dt>
                                            <dd>
                                                <ul>
                                                    @foreach($genres as $genre)
                                                    <li>
                                                        <label>
                                                            <input type="radio" value="{{$genre->id}}" name="genre_id" @if(old('genre_id')==$genre->id)checked @endif> {{$genre->name}}
                                                        </label>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="any">
                                                サブジャンル<br class="rwd_disp_xo"><span class="fs">（複数選択可）</span>
                                            </dt>
                                            <dd>
                                                <ul>
                                                    @foreach($genres as $genre)
                                                    <li>
                                                        <label>
                                                            <input type="checkbox" value="{{$genre->id}}" name="sub_genre_id[]" 
                                                            @if(is_array(old('genre_id')) && in_array($genre->id,old('genre_id')))checked @endif> {{$genre->name}}
                                                        </label>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="req">
                                                お名前<span class="fs">（非公開）</span>
                                            </dt>
                                            <dd>
                                                <input type="text" name="name2" value="{{old('name2')}}" required="required">
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="req">
                                                所在地<span class="fs">（非公開）</span>
                                            </dt>
                                            <dd class="adrress">
                                                <p class="annotation mt00">※郵便番号は半角数字でご入力ください</p><br>
                                                &#12306; <input type="text" class="input_m" name="zip" size="10" maxlength="8" onkeyup="AjaxZip3.zip2addr(this,'','pref','address');" autocomplete="postal-code" value="{{old('zip')}}" placeholder="例：000-0000"  required="required">
                                                <br>
                                                <input type="text" name="pref" value="{{old('pref')}}" class="input_l mt10" placeholder="都道府県"  required="required">
                                                <br>
                                                <input type="text" name="address" value="{{old('address')}}" class="input_lll mt10" placeholder="住所"  required="required">
                                            </dd>
                                        </dl>
                                        <dl>
                                            <dt class="any">
                                                コメント
                                            </dt>
                                            <dd>
                                                <textarea name="comment" class="resize">{{old('comment')}}</textarea>
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
                                        <input type="submit" value="新規登録" class="btn01">
                                    </p>
                                </div>
                            </form>

                        </dd>
                    </dl>
                    <p class="link_mt">
                        <a href="/jeweller_login">ジュエラーログインはこちら</a>
                    </p>
                    <p class="link_mt">
                        <a href="/register">ユーザー新規登録はこちら</a>
                    </p>
                </section>
                <!--/#my_history-->
            </main>
            <!--/#cont_main-->
        </div>
        <!-- /#cont_wrapper -->
@endsection