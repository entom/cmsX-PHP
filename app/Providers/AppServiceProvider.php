<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Model\ContactMessage;
use Illuminate\Support\Facades\View;
/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $action = app('request')->route()->getAction();
            $controller = class_basename($action['controller']);
            list($controller, $action) = explode('@', $controller);
            $view->with(compact('controller', 'action'));

            if(Auth::check())
            {
                if(Auth::user()->admin == 1 || Auth::user()->admin == true)
                {
                    $unread_messages_counter = ContactMessage::where('readed', '=', 0)->count();
                    $unread_messages = ContactMessage::where('readed', '=', 0)->limit(3)->get();

                    foreach ($unread_messages as &$message)
                    {
                        ContactMessage::convertCreatedDates($message);
                        ContactMessage::convertUpdatedDates($message);
                    }

                    View::share('unread_messages_counter', $unread_messages_counter);
                    View::share('unread_messages', $unread_messages);
                }
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
