<?php

namespace App\Http\Livewire;

use App\Models\Message;
use Livewire\Component;

class Chat extends Component
{

    public $messageText;

    public function render()
    {
        $messages = Message::with('user')->latest()->get()->sortBy('id');  // ->take(10)

        return view('livewire.chat2', compact('messages'));
    }

    public function sendMessage()
    {

        dd($this->messageText);

        Message::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }

}
