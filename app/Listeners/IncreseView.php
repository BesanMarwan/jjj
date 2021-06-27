<?php

namespace App\Listeners;

use App\Events\PostViewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreseView
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
     * @param  object  $event
     * @return void
     */
    public function handle(PostViewer $event)
    {
        $this->updateView($event->post);
    }
    public function updateView($post){
        $post->viewer_count++;
        $post->save();
    }
}
