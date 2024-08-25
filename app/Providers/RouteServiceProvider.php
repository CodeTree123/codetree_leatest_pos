<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapProductRoutes();
        $this->mapSalesRoutes();

        $this->mapPurchaseRoutes();

        $this->mapPeopleRoutes();

        $this->mapSettingRoutes();
        $this->mapSmsRoutes();

        $this->mapReportRoutes();

        $this->mapPosRoutes();



        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/admin.php'));
    }

    protected function mapPosRoutes()
    {
        Route::prefix('pos')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/pos.php'));
    }
    protected function mapProductRoutes()
    {
        Route::prefix('product')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/product.php'));
    }
    protected function mapSalesRoutes()
    {
        Route::prefix('sales')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/sales.php'));
    }
    protected function mapPurchaseRoutes()
    {
        Route::prefix('purchase')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/purchase.php'));
    }
    protected function mapPeopleRoutes()
    {
        Route::prefix('people')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/people.php'));
    }
    protected function mapSettingRoutes()
    {
        Route::prefix('setting')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/setting.php'));
    }
    protected function mapSmsRoutes()
    {
        Route::prefix('sms')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/sms.php'));
    }
    protected function mapReportRoutes()
    {
        Route::prefix('reports')
        ->middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/report.php'));
    }
}
