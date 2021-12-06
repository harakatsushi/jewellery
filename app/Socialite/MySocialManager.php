<?php

namespace App\Socialite;

use Laravel\Socialite\SocialiteManager;

class MySocialManager extends SocialiteManager{

    // protected function createYahooJpDriver()
    // {
    //     print_r( $this->config);die();
    //     //services.phpの設定情報を読む
    //     $config = $this->config['services.yahoojp'];
    //     //設定情報と共にプロバイダを生成
    //     return $this->buildProvider(
    //         'App\Socialite\YahooJpProvider',$config
    //     );
    // }
    protected function createYahooJpDriver()
    {
        $config = $this->app->make('config')['services.yahoojp'];

        return $this->buildProvider(
            'App\Socialite\YahooJpProvider',$config
        );
    }
}