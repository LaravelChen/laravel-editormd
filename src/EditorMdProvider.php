<?php

namespace LaravelChen\Editormd;

use Illuminate\Support\ServiceProvider;

class EditorMdProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //发布公共资源
        $this->publishes([__DIR__ . '/../public/' => public_path('')]);

        //发布配置文件
        $this->publishes([__DIR__ . '/../config/editormd.php' => config_path('editormd.php')]);

        //路由
        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
