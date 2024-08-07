<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(QuestionServiceInterface::class, QuestionService::class);

        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
       

      
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
