@foreach(@$chat->chatDetails()->get() AS $msg)
    @if($msg->user_id == auth()->id())
        <div class="message text-only">
            <div class="response">
                <p class="text">{{ $msg->message }}</p>
            </div>
        </div>
    @else
        <div class="message">
            <p class="text">{{ $msg->message }} </p>
        </div>
    @endif
@endforeach