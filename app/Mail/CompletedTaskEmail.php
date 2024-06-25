<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CompletedTaskEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(private $task)
    {
        //
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Completed Task Email',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail.task_completed_mail',
            with: [
                'id' => $this->task->id,
                'type' => $this->task->task_type,
                'name' => $this->task->user->name,
                'email' => $this->task->user->email,
                'task_type' => ($this->task->task_type == 'c_p')? 'Content Placment' : 'Content Creation And Placment',
                'site'  => $this->task->site->site_url,
                'price' => $this->task->order->price,
                'project_id' => $this->task->project_id,
                'date'   => $this->task->site->site_time,
                'task_url' =>  $this->task->task_post_placement_url // ($this->task->task_type == 'c_p')?
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
