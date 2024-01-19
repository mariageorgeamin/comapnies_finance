<?php

namespace App\Providers;

use App\Domain\Company\Repository\CompanyRepository;
use App\Domain\Company\Repository\CompanyRepositoryInterface;
use App\Domain\Company\Service\Company\CompanyService;
use App\Domain\Company\Service\Company\CompanyServiceInterface;
use App\Domain\Company\Service\Nasdaq\NasdaqService;
use App\Domain\Company\Service\Nasdaq\NasdaqServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CompanyServiceInterface::class, CompanyService::class);
        $this->app->bind(CompanyRepositoryInterface::class, CompanyRepository::class);
        $this->app->bind(NasdaqServiceInterface::class, NasdaqService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
