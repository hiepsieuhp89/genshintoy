<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cookie;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        if(!Cookie::get('WishData')){
            $data = json_encode([
                'amount' => ['primogem'=> 999999,'intertwined'=> 99999,'acquaint'=> 99999],
                'fates_used' => [0=> 0,1=> 0,2=> 0], 
                'fates_used_from_the_last' => [0=> 0,1=> 0,2=> 0]
            ]);
            Cookie::queue('WishData',$data,3456789);
        }
        */
    }
}
