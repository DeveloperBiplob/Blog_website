<?php 

namespace App\Services\Post;

use App\Mail\SendNewPostMailToSubscriber;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;

class PostSubscriberMail {

    public static function handle(Post $post)
    {
        $subscribers = Subscriber::latest()->get(['email']);

        foreach($subscribers as $subscriber){

            Mail::to($subscriber->email)->send(new SendNewPostMailToSubscriber($post, $subscriber));
        }
    }
}