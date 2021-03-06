<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use App\Models\Book;
use App\Models\Content;
use Mail;
use Log;

class SendNotificationEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    protected $user, $book, $content;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user,Book $book,Content $content)
    {
      $this->user = $user;
      $this->book = $book;
      $this->content = $content;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      Log::info('send email');
      $user = $this->user;
      Mail::send('emails.notification', ['user' => $this->user, 'book' => $this->book, 'content' => $this->content, 'link' => url('/books'.'/'.$this->book->id.'/content'.'/'.$this->content->chapter)], function ($m) use ($user) {
          $m->from('readi.notification@gmail.com', 'Readi');
          $m->to($user->email, $user->username)->subject('Readi Notification');
      });
    }
}
