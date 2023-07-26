@extends('layouts.admin')
@section('content')

<link rel="stylesheet" href="{{ get_asset('admin_assets') }}/css/chat.css">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="http://localhost/ali_property/public/web_admin">Dashboard</a></li>
                        <li class="breadcrumb-item active">Chat</li>

                    </ol>
                </div>
                <h4 class="page-title">All Chat</h4>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <section class="discussions">
            <!-- <div class="discussion search">
                <div class="searchbar">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Search..."></input>
                </div>
            </div> -->

            <div class="discussion_start">



                @foreach($vendors AS $vendor)
                <div class="discussion " onclick="vendor_chat_profile(this)" data-id="{{ $vendor->hashid }}" data-name="{{ $vendor->full_name }}">
                    <div class="photo" style="background-image: url({{ asset($vendor->image) }});">
                    </div>
                    <div class="desc-contact">
                        <p class="name">{{ $vendor->full_name }}</p>
                        {{-- <p class="message">What the f**k is going on ?</p> --}}
                    </div>
                    {{-- <div class="timer">1 day</div> --}}
                </div>
                @endforeach

            </div>

        </section>
        <section class="chat d-none" id="chat_section">
            <div class="header-chat">
                <i class="icon fa fa-user-o" aria-hidden="true"></i>
                <p class="name" id="vendor_chat_name"></p>
                <!-- <i class="icon clickable fa fa-ellipsis-h right" aria-hidden="true"></i> -->
            </div>
            <div class="messages-chat">

            </div>
            <div class="footer-chat">
                <input type="text" class="write-message" placeholder="Type your message here" id="message"></input>
                <i class="icon send fa-regular fa-paper-plane clickable" aria-hidden="true" onclick="send_messages()"></i>
            </div>
            <span class="text-danger d-none" id="empty_message_alert">please type a message</span>
        </section>
    </div>
</div>
@endsection
@section('page-scripts')
<script>
    var vendor_id = null;

    function vendor_chat_profile(_self) {
        let name = $(_self).data('name');
        let url = "{{ route('vendors.get_messages') }}";
        vendor_id = $(_self).data('id');

        $('#vendor_chat_name').html(name);

        getAjaxRequests(url, {
            vendor_id: vendor_id
        }, 'GET', function(respones) {
            $('#chat_section').removeClass('d-none');
            $('.messages-chat').html(respones.html);
        });
    }

    function send_messages() {
        if (vendor_id != null) { //if vendor or receiver_id is set
            let message = $('#message').val(); //get the message
            if (message != '') { //check its not empty message
                let url = "{{ route('vendors.send_message') }}"
                getAjaxRequests(url, {
                    vendor_id: vendor_id,
                    message: message
                }, 'GET', function(respones) {
                    $('.messages-chat').html(respones.html);
                    $('#message').val('');
                    $('#empty_message_alert').addClass('d-none');
                    // $('.discussion').trigger('click');
                });
            } else {
                $('#empty_message_alert').removeClass('d-none');
            }
        }
    }


    function get_messages() {
        if (vendor_id != null) {
            let url = "{{ route('vendors.get_messages') }}";
            getAjaxRequests(url, {
                vendor_id: vendor_id
            }, 'GET', function(respones) {
                $('.messages-chat').html(respones.html);
            }, false);
        }
    }

    setInterval(get_messages, 2000);
    (get_messages, 2000);
</script>
@endsection