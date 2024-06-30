@extends('admin.layouts.master')

@section('style')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        overflow-x: hidden;
    }
    #chatContainer {
        position: fixed;
        top: 0;
        right: -350px; /* Initially hidden */
        height: 100%;
        width: 350px;
        background: #f8f9fa;
        border-left: 2px solid #6496c8;
        transition: right 0.3s;
        z-index: 1050; /* Ensure it is above other elements */
    }
    #chatContainer.active {
        right: 0;
    }
    .chat-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background: #343a40;
        color: white;
        text-align: center;
    }
    .chat-header button {
        background: transparent;
        border: none;
        color: white;
        font-size: 20px;
    }
    .chat-messages {
        height: calc(100% - 180px);
        overflow-y: auto; /* Added overflow-y to enable vertical scrolling */
        padding: 15px;
    }
    .chat-input {
        padding: 15px;
        border-top: 1px solid #dee2e6;
    }
    .chat-input .input-row {
        display: flex;
        align-items: center;
    }
    .chat-input textarea {
        flex: 1;
        border: 1px solid #ced4da;
        padding: 10px;
        border-radius: 5px;
        resize: none;
        margin-right: 10px;
    }
    .chat-input button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }
    .message {
        display: flex;
        flex-direction: column; /* Adjusted to column to accommodate timestamp */
        align-items: flex-start;
        margin-bottom: 10px;
    }
    .message-info {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
        font-size: 0.8em;
        color: #868e96;
    }
    .message-info img {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        margin-right: 5px;
    }
    .message-info .username {
        font-weight: bold;
        margin-right: 5px;
    }
    .message-content {
        background: #e9ecef;
        border-radius: 10px;
        padding: 10px;
        max-width: 70%;
    }
    .message.left {
        align-items: flex-start;
    }
    .message.right {
        align-items: flex-end;
        text-align: right;
    }
    .message.right .message-content {
        background: #cfe2ff;
    }
    .hidden {
        display: none !important;
    }
</style>

@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Chat Messages</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col mb-3">

                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="mt-n2 mb-n2 d-flex">
                                    <h5 class="align-middle text-white">All Chat Messages</h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-body table-responsive">
                                       <!-- Chat Button -->

                                    <livewire:chat />
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Order Form -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')
<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('chatToggleBtn').addEventListener('click', function() {
        document.getElementById('chatContainer').classList.add('active');
        document.getElementById('chatToggleBtn').classList.add('hidden');
    });

    document.getElementById('hideChatBtn').addEventListener('click', function() {
        document.getElementById('chatContainer').classList.remove('active');
        document.getElementById('chatToggleBtn').classList.remove('hidden');
    });

   /*  document.getElementById('sendBtn').addEventListener('click', function(e) {
        e.preventDefault();
        const textarea = document.querySelector('.chat-input textarea');
        const message = textarea.value.trim();
        if (message) {
            const messageContainer = document.createElement('div');
            messageContainer.classList.add('message', 'right');
            messageContainer.innerHTML = `
                <img src="https://via.placeholder.com/40" alt="User">
                <div class="message-content">
                    ${message}
                 </div>
            `;
            document.querySelector('.chat-messages').appendChild(messageContainer);
            textarea.value = '';
            document.querySelector('.chat-messages').scrollTop = document.querySelector('.chat-messages').scrollHeight;
        }
    }); */
</script>
@endsection
