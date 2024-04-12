<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Course;
use App\Observers\CategorySlug;
use App\Observers\CourseSlugObserver;
use App\Repository\Category\CategoryInterface;
use App\Repository\Category\CategoryService;
use App\Repository\Course\CourseInterface;
use App\Repository\Course\CourseService;
use App\Repository\SubCategory\SubCategoryInterface;
use App\Repository\SubCategory\SubCategoryService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Course::observe(CourseSlugObserver::class);
        Category::observe(CategorySlug::class);
        $this->app->bind(CourseInterface::class,CourseService::class);
        $this->app->bind(CategoryInterface::class,CategoryService::class);
        $this->app->bind(SubCategoryInterface::class,SubCategoryService::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
