<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Classroom;
use App\Models\Classwork;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      if(App::environment('production')){
           $this->app->instance('path.public',base_path('public_html'));
        //
        // $this->app->bind('x',function(){
        //     return new \App\Services\x();
        // });
    }}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            
        //ResourceCollection::withoutWrapping();
        //ما رح يتنفذوا لانه السايكل للارافيل ما بتروح ع session و بتبداه فما حيقدر يحدد اليوزر اذا ،فبنعرفه بiddleware 
        // $user = Auth::user();
        // App::setLocale($user->profile->locale);
        // App::setlocale('ar');
        Paginator::defaultView('vendor.pagination.bootstrap-5');
        Paginator::defaultSimpleView('vendor.pagination.simple-bootstrap-5');
        //Paginator::useBootstrapFive();
        // Paginator::defaultView();
        Relation::enforceMorphMap([
            'classwork' => Classwork::class,
            'post' => Post::class,
            'user' => User::class,
            'classroom'=>Classroom::class,
            'admin'=>Admin::class,
        ]);
    }
}
