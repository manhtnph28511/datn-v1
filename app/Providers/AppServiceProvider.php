<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Clients\ClientsNotificationController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $notificationController = new NotificationController();
            $unreadNotificationsCount = $notificationController->getUnreadNotificationsCount();
            $view->with('unreadNotificationsCount', $unreadNotificationsCount);
        });
        View::composer('*', function ($view) {
            $clientUnreadNotificationsCount = session('clientUnreadNotificationsCount', 0);
            $view->with('clientUnreadNotificationsCount', $clientUnreadNotificationsCount);
        });
    }
}
