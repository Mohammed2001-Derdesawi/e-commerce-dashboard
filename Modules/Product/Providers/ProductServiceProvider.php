<?php

namespace Modules\Product\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Product\Repository\Actions\ActionUserInterface;
use Modules\Product\Repository\Brand\BrandRepository;
use Modules\Product\Repository\Cart\CartRepository;
use Modules\Product\Repository\Cart\CartRepositoryInterface;
use Modules\Product\Repository\WishList\WishListRepository;
use Modules\Product\Repository\Product\ProductRepository;
use Modules\Product\Repository\Category\CategoryRepository;
use Modules\Product\Repository\Attribute\AttributeInterface;
use Modules\Product\Repository\Attribute\AttributeRepository;
use Modules\Product\Repository\Brand\BrandRepositoryInterface;
use Modules\Product\Repository\Product\ProductRepositoryInterface;
use Modules\Product\Repository\Category\CategoryRepositoryInterface;
use Modules\Product\Repository\WishList\WishListRepositoryInterface;
use Modules\Product\Repository\Comment\CommentRepository;
use Modules\Product\Repository\Comment\CommenttInterface;
use Modules\Product\Repository\Like\LikeRepository;
use Modules\Product\Repository\Rate\RateInterface;
use Modules\Product\Repository\Rate\RateRepository;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Product';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'product';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->bind(AttributeInterface::class,AttributeRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        $this->app->bind(BrandRepositoryInterface::class,BrandRepository::class);
        $this->app->bind(ProductRepositoryInterface::class,ProductRepository::class);
        $this->app->bind(ActionUserInterface::class, function (){
            if(request()->is('api/admin/comments') || request()->is('api/admin/comments/*'))
            return new CommentRepository;

            if(request()->is('api/admin/rates') || request()->is('api/admin/rates/*'))
            return new RateRepository;

            return new LikeRepository;
        });

        $this->app->bind(CartRepositoryInterface::class,CartRepository::class);
        $this->app->bind(WishListRepositoryInterface::class,WishListRepository::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
