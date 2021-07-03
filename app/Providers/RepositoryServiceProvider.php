<?php

namespace App\Providers;

use App\Repository\TeacherRepository;
use App\Repository\ITeacherRepository;
use App\Repository\StudentRepository;
use App\Repository\IStudentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ITeacherRepository::class, TeacherRepository::class);
        $this->app->bind(IStudentRepository::class, StudentRepository::class);
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
