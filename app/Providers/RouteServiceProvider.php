<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/giangvien.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/monhoc.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/phongthi.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/buoithi.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/lichcoithi.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/khoa.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/mail.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/donxinvang.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/bomon.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/tinnhan.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/quanlyroutes.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/phanquyen.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
