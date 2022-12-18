<?php

namespace App\Providers;

use App\Repository\StudentRepository;
use App\Repository\TeacherRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\StudentPromotionRepository;
use App\Repository\StudentRepositoryInterface;
use App\Repository\TeacherRepositoryInterface;
use App\Repository\StudentPromotionRepositoryInterface;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            TeacherRepositoryInterface::class,
            TeacherRepository::class);

            $this->app->bind(
                StudentRepositoryInterface::class,
                StudentRepository::class);

                $this->app->bind(
                    StudentPromotionRepositoryInterface::class,
                    StudentPromotionRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
