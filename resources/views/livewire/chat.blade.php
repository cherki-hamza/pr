<div wire:poll>
    <div class="container">
        <h3 class=" text-center">

            @if (auth()->user()->email == 'hamza@overthetop.ae')
                <a class="btn btn-primary" href="{{ route('delete_chat') }}">Delete All Chat</a>
            @endif
             Chat Messages
        </h3>
        <div class="messaging">
            <div class="inbox_msg">
                <div class="mesgs">
                    <div id="chat" class="msg_history">
                        @forelse ($messages as $message)

                            @if ($message->user->name == auth()->user()->name)
                                <!-- Reciever Message-->
                                <div class="outgoing_msg">
                                    <div class="sent_msg">
                                        <p>{{ $message->message_text }}</p>
                                        <span class="time_date">
                                            {{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                    </div>
                                </div>

                            @else


                                    <div class="incoming_msg_img">
                                        {{-- https://ptetutorials.com/images/user-profile.png --}}
                                        <img src="{{ $message->user->GetPicture() }}" alt="{{$message->user->name}}">
                                    </div>
                                    <div class="incoming_msg">{{ $message->user->name }}
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message->message_text }}</p>
                                            <span
                                                class="time_date">{{ $message->created_at->diffForHumans(null, false, false) }}</span>
                                        </div>
                                    </div>
                                </div>

                            @endif
                        @empty
                            <h5 style="text-align: center;color:red"> Oops There is No Message!  </h5>
                        @endforelse

                    </div>
                    <div class="type_msg my-3">
                        <div class="input_msg_write">
                            <form wire:submit.prevent="sendMessage">
                                <textarea onkeydown='scrollDown()' wire:model.defer="messageText" class="form-control" placeholder="Write Your Message" cols="8" rows="5"></textarea>
                                <button class="btn btn-primary my-3 mx-3" type="submit">Send</button>
                                {{--
                                <input style="border: 2px solid black;border-radius: 10px;" onkeydown='scrollDown()' wire:model.defer="messageText" type="text"
                                    class="write_msg" placeholder="Write Your Message" />
                                <button class="msg_send_btn mx-3" type="submit">Send</button>
                                 --}}
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
