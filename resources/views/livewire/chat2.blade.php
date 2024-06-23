
    <!-- Chat Button -->
    <button id="chatToggleBtn" class="btn btn-primary" style="position: fixed; bottom: 80px; right: 40px; z-index: 1051;">Chat</button>

<!-- Chat Container -->
<div  wire:poll>

<div id="chatContainer">
    <div class="chat-header">
        Chat
        <button id="hideChatBtn">&times;</button>
    </div>
    <div id="chat"  class="chat-messages">
        @forelse ($messages as $message)

        @if ($message->user->name == auth()->user()->name)
            <!-- Reciever Message-->
            <div class="message right">
                <img style="width: 45px;border-radius: 100%;"  src="{{ auth()->user()->GetPicture() }}" alt="the User">
                <div class="message-content">
                    {{ $message->message_text }}
                </div>
                <span class="timestamp">
                    {{ $message->created_at->diffForHumans() }}
                </span>
               <hr style="border: 1px solid rgb(130, 121, 121)">
            </div>


        @else

            <div class="message left">
                <img style="width: 45px;border-radius: 100%;" src="{{ $message->user->GetPicture() }}" alt="anther">
                <div class="message-content">
                    {{ $message->message_text }}
                </div>
                <span class="timestamp">
                    {{ $message->created_at->diffForHumans(null, false, false) }}
                </span>
            </div>

        @endif

        @empty
            <h5 style="text-align: center;color:red"> Oops There is No Message!  </h5>
        @endforelse


    </div>
    <div class="chat-input mb-3">

        <form wire:submit.prevent="sendMessage">

                <div class="input-row">
                    <textarea  rows="2" wire:model.defer="messageText" placeholder="Type a message..."></textarea>
                    <button class="btn btn-primary my-3 mx-3" type="submit">Send</button>
                </div>

            {{--
            <input style="border: 2px solid black;border-radius: 10px;" onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                class="write_msg" placeholder="Write Your Message" />
            <button class="msg_send_btn mx-3" type="submit">Send</button>
             --}}
        </form>


    </div>
</div>
</div>
