<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class TaskStatusUpdated extends Notification
{
    use Queueable;

    public $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable): array
    {
        return ['mail', 'broadcast']; 
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Task Status Updated')
            ->line("The task '{$this->task->title}' has been updated.")
            ->line("New status: {$this->task->status->name}")
            ->action('View Task', url("/admin/tasks/{$this->task->id}"))
            ->line('Please review it.');
    }

    public function toBroadcast($notifiable): BroadcastMessage
    {
        return new BroadcastMessage([
            'title' => 'Task Status Updated',
            'message' => "Task '{$this->task->title}' status changed to '{$this->task->status->name}'",
            'task_id' => $this->task->id,
        ]);
    }
}
