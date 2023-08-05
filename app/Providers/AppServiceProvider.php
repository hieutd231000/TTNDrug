<?php

namespace App\Providers;

use App\Repositories\Categories\CategoryEloquentRepository;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\ExportPrices\ExportPricesEloquentRepository;
use App\Repositories\ExportPrices\ExportPricesRepositoryInterface;
use App\Repositories\Infos\InfoEloquentRepository;
use App\Repositories\Infos\InfoRepositoryInterface;
use App\Repositories\Invoices\InvoiceEloquentRepository;
use App\Repositories\Invoices\InvoiceRepositoryInterface;
use App\Repositories\Notifications\NotificationEloquentRepository;
use App\Repositories\Notifications\NotificationRepositoryInterface;
use App\Repositories\OrderProducts\OrderProductEloquentRepository;
use App\Repositories\OrderProducts\OrderProductRepositoryInterface;
use App\Repositories\OrderReceived\OrderReceivedEloquentRepository;
use App\Repositories\OrderReceived\OrderReceivedRepositoryInterface;
use App\Repositories\OrderReceivedUsers\OrderReceivedUsersEloquentRepository;
use App\Repositories\OrderReceivedUsers\OrderReceivedUsersRepositoryInterface;
use App\Repositories\Orders\OrderEloquentRepository;
use App\Repositories\Orders\OrderRepositoryInterface;
use App\Repositories\ProductionBatches\ProductionBatchEloquentRepository;
use App\Repositories\ProductionBatches\ProductionBatchRepositoryInterface;
use App\Repositories\Products\ProductEloquentRepository;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Sales\SaleEloquentRepository;
use App\Repositories\Sales\SaleRepositoryInterface;
use App\Repositories\SupplierProducts\SupplierProductEloquentRepository;
use App\Repositories\SupplierProducts\SupplierProductRepositoryInterface;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use App\Repositories\Suppliers\SupplierEloquentRepository;
use App\Repositories\UserNotifications\UserNotificationsEloquentRepository;
use App\Repositories\UserNotifications\UserNotificationsRepositoryInterface;
use App\Repositories\Users\UserEloquentRepository;
use App\Repositories\Users\UserRepositoryInterface;
use Faker\Core;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserEloquentRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryEloquentRepository::class
        );

//        $this->app->bind(
//            UnitRepositoryInterface::class,
//            UnitEloquentRepository::class
//        );

        $this->app->bind(
            InfoRepositoryInterface::class,
            InfoEloquentRepository::class
        );

        $this->app->bind(
            SuppierRepositoryInterface::class,
            SupplierEloquentRepository::class
        );

        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductEloquentRepository::class
        );

        $this->app->bind(
            SupplierProductRepositoryInterface::class,
            SupplierProductEloquentRepository::class
        );

        $this->app->bind(
            OrderRepositoryInterface::class,
            OrderEloquentRepository::class
        );

        $this->app->bind(
            OrderProductRepositoryInterface::class,
            OrderProductEloquentRepository::class
        );

        $this->app->bind(
            ExportPricesRepositoryInterface::class,
            ExportPricesEloquentRepository::class
        );

        $this->app->bind(
            ProductionBatchRepositoryInterface::class,
            ProductionBatchEloquentRepository::class
        );

        $this->app->bind(
            OrderReceivedUsersRepositoryInterface::class,
            OrderReceivedUsersEloquentRepository::class
        );

        $this->app->bind(
            OrderReceivedRepositoryInterface::class,
            OrderReceivedEloquentRepository::class
        );
        $this->app->bind(
            SaleRepositoryInterface::class,
            SaleEloquentRepository::class
        );
        $this->app->bind(
            InvoiceRepositoryInterface::class,
            InvoiceEloquentRepository::class
        );
        $this->app->bind(
            NotificationRepositoryInterface::class,
            NotificationEloquentRepository::class
        );
        $this->app->bind(
            UserNotificationsRepositoryInterface::class,
            UserNotificationsEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set('Europe/Isle_of_Man');
        $end_at = date('Y-m-d H:i:s', time());
        //User notification
        $userNotifications = DB::table("users")
            ->select("users.id AS user_id", "users.fullname", "users.email")
            ->get();
        $readNotifications = DB::table("user_notifications")
            ->get();
        foreach ($userNotifications as $user) {
            $countRead = 0;
            $listNotifications = DB::table("notifications")
                ->orderBy("id", "DESC")
                ->get();
            //Get time create ago
            foreach ($listNotifications as $date) {
                $start_at = new \DateTime($date->created_at);
                $period = $start_at->diff(new \DateTime($end_at));
                if($period->y) {
                    $date->createAgo = "Khoảng " . ($period->y) . " năm trước";
                } else {
                    if($period->m) {
                        $date->createAgo = "Khoảng " . ($period->m) . " tháng trước";
                    } else {
                        if($period->d) {
                            $date->createAgo = "Khoảng " . ($period->d) . " ngày trước";
                        } else {
                            if($period->h > 1) {
                                $date->createAgo = "Khoảng " . ($period->h - 1) . " giờ trước";
                            } else {
                                $date->createAgo = "Khoảng " . ($period->i + 1) . " phút trước";
                            }
                        }
                    }
                }
            }
            //Check read
            foreach ($readNotifications as $readNotification) {
                if($user->user_id == $readNotification->user_id) {
                    foreach ($listNotifications as $notification) {
                        if($notification->id == $readNotification->notification_id) {
                            $notification->is_read = 1;
                            $countRead ++;
                        }
                    }
                }
            }
            $user->countNotifi = count($listNotifications);
            $user->unread = count($listNotifications) - $countRead;
            $user->listNotifications = $listNotifications;
        }
//        dd($userNotifications[0]->listNotification[0]->notification);
        \Illuminate\Support\Facades\View::share("shareNotification", $userNotifications);
//        View::share('shareNotification', 0);
    }
}
