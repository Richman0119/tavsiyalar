<?php

namespace App\Providers;

use App\Models\Recommendation;
use App\Policies\RecommendationPolicy;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        // Manually register the policy for the Recommendation model
        Gate::policy(Recommendation::class, RecommendationPolicy::class);
    }
}
