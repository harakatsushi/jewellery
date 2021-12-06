<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Socialite;

use App\User;
use MetzWeb\Instagram\Instagram;

class SocialController extends Controller
{
    protected $redirectTo = '/home';        //your-redirect-url-after-login
    private $instagram;

    function __construct() {
        # configからAppの値を取得し、インスタンス化
        $this->instagram = new Instagram(array(
            'apiKey' => config('services.instagram.client_id'),
            'apiSecret' => config('services.instagram.client_secret'),
            'apiCallback' => config('services.instagram.redirect')
        ));
    }
    // twitter

    public function getTwitterAuth()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function getTwitterAuthCallback()
    {
        $twitterUser = Socialite::driver('twitter')->user();
//         echo getcwd();
// print_r( $twitterUser );die();
        $user = $this->createOrGetUser($twitterUser, 'twitter');
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    // facebook

    public function getYahooAuth()
    {
        return Socialite::driver('yahoojp')->redirect();
    }

    public function getYahooAuthCallback()
    {
        $facebookUser = Socialite::driver('yahoojp')->user(); // (1)

        $user = $this->createOrGetUser($facebookUser, 'yahoojp');
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    // Google

    public function getGoogleAuth()
    {
        return Socialite::driver('google')->redirect();
    }

    public function getGoogleAuthCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = $this->createOrGetUser($googleUser, 'google');
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    // nstagram

    public function getInstagramAuth ()
    {
        return redirect($this->instagram->getLoginUrl(array(
            # アクセスする権限をここで指定可能
            # ただし、対応していない権限も存在しているので、その場合はURLを生で書くようにする
            'basic'
        )));
    }

    public function getInstagramAuthCallback(Request $request)
    {
        # URLにcodeが入っているので取得
        $code = $request->code;

        # 取得したcodeを利用し、OAhtu認証
        $data = $this->instagram->getOAuthToken($code);
        $this->instagram->setAccessToken($data);

        # OAuth認証が完了したので、$instagram->"method"で好きなAPIが叩けるようになっている
        # 今回はInstagramでログイン機能なので、getUser()を使用
        $user_data = $this->instagram->getUser();
        print_r($user_data);
        die();
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
    public function createOrGetUser($providerUser, $provider)
    {

        $user=User::where('provider_user_id' ,$providerUser->getId())->where('provider', $provider)->first();

        //既にある場合
        if($user){
            return $user;
        }
        if($providerUser->getEmail()){
            $user=User::where('email' ,$providerUser->getEmail())->first();
            if($user){
             return $user;
            }
        }
        

        //始めてきた場合
        $user= new user();
        $user->provider_user_id=$providerUser->getId();
        $user->provider=$provider;
        $user->role=1;
        $user->name=$providerUser->getName();
        $user->email=$providerUser->getEmail();
        if($providerUser->getAvatar()){
            $url = $providerUser->getAvatar();
            $img = file_get_contents($url);
            $imginfo = pathinfo($url);

            $img_name = $imginfo['basename'];

            //画像を保存
            file_put_contents('/home/raindiamond/ai-jewelly.com/public_html/upload/profile/' . $img_name, $img);
            $user->image=$img_name;
        }
        $user->role=1;
        $user->save();
        // $account = SocialAccount::firstOrCreate([
        //     'provider_user_id' => $providerUser->getId(),
        //     'provider'         => $provider,
        // ]);

        // if (empty($account->user))
        // {
        //     $user = User::create([
        //         'name'   => $providerUser->getName(),
        //         // 'email'  => $providerUser->getEmail(), # 削除 (2017.05.19)
        //         'avatar' => $providerUser->getAvatar(),
        //     ]);
        //     $account->user()->associate($user);
        // }

        // $account->provider_access_token = $providerUser->token;
        // $account->save();

        return $user;
    }
}