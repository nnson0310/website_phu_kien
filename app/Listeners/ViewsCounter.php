<?php

namespace App\Listeners;

use App\Events\NewsViews;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ViewsCounter
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewsViews  $event
     * @return void
     */
    public function handle(NewsViews $event)
    {
        //
        $event->news->increment('count_views', 1);
    }
}
