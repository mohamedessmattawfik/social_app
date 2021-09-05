<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PostLike implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $post_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($post_id)
    {
        $this->post_id = $post_id;
        //

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Like::updateOrCreate(
            [
                "user_id" => auth()->user()->id,
                "post_id" => $this->post_id,
                "liked" => true
            ]
        );
        return redirect()->back();

        //
    }
}
