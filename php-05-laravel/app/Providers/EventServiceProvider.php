<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Image;
use App\Events\OrderCreatedEvent;
use App\Listeners\OrderCreatedListener;
use App\Models\Product;
use App\Models\Order;
use App\Observers\CategoryObserver;
use App\Observers\ImageObserver;
use App\Observers\ProductObserver;
use App\Observers\OrdersObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

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
        OrderCreatedEvent::class => [
            OrderCreatedListener::class
        ],
    ];

    protected $observers = [
        Image::class => [ImageObserver::class],
        Product::class => [ProductObserver::class],
        Category::class => [CategoryObserver::class],
        Order::class => [OrdersObserver::class]
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
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
