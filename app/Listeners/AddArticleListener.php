<?php

namespace App\Listeners;

use App\Events\onAddArticleEvent;
use App\Mail\NewArticlesClass;
use App\Subscription;
use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AddArticleListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subscription = new Subscription();
    }

    /**
     * Handle the event.
     *
     * @param  onAddArticleEvent  $event
     * @return void
     */
    public function handle(onAddArticleEvent $event)
    {
        $idSubscr = [];
        $subscriptions = $this->subscription->getAllSubscriptionsFromUser($event->user->id);

        foreach ($subscriptions AS $subscription) {
            $idSubscr[] = $subscription->subscription_id;
        }

        $subscriptionsInfo = User::select('email')->whereIn('id', $idSubscr)->get();

        if (count($subscriptionsInfo)) {
            foreach ($subscriptionsInfo AS $subscriptionInfo) {
                //после успеха отправляем  сообщение
                Mail::to($subscriptionInfo->email)
                    ->send(new NewArticlesClass($event->user->name,$event->article->title));
            }
        }


    }
}
