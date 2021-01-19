<?php

namespace App\Providers;

use App\Mail\UserCreated;
use App\Mail\UserMailChanged;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Product::updated(function ($product){
            if ($product->quantity ==0 && $product->estaDisponible()){
                $product->status = Product::PRODUCTO_NO_DISPONIBLE;
                $product->save();
            }
        });
        User::created(function ($user){
            retry(20,function () use ($user){
                Mail::to($user)->send(new UserCreated($user));
            },100);
        });

        User::updated(function ($user){
            if($user->isDirty('email')){
                retry(20,function () use($user){
                    Mail::to($user)->send(new UserMailChanged($user));
                },100);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
