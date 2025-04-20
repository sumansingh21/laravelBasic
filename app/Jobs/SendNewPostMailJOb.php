<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Mail\PostMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class SendNewPostMailJOb implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $incoming)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->incoming['email'])->send(new PostMail(['name' => $this->incoming['name'], 'title'=> $this->incoming['title'],]));
    }
}
