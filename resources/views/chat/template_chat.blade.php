<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                    <br>
                <div class="header col-md-6">
                    <a href="{{ url('/') }}/board">К списку заявок</a>
                </div>
                    <hr>
                <div id="accordion">
                    <div class="card">
                        @if($ticket->ticket_status === 'closed')
                            <div class="card-header alert alert-danger" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <a href="{{ url('/') }}/board/<?= $ticket->id ?>/chat">
                                            {{$ticket->ticket_subject}}
                                        </a>
                                    </button>
                                    <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        от {{$ticket->user->name}}
                                    </button>
                                    @if($isManager)
                                        @if(($ticket->ticket_status !== 'closed') && ($ticket->ticket_watched_status !== 'unwatch'))
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <a href="{{ url('/') }}/board/<?= $ticket->id ?>/take-ticket">Ответить на заявку</a>
                                            </button>
                                        @endif
                                    @endif
                                    @if(!$isManager)
                                        @if($ticket->ticket_status !== 'closed')
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <a href="{{ url('/') }}/board/<?= $ticket->id ?>/close">Закрыть заявку</a>
                                            </button>
                                        @endif
                                    @endif

                                </h5>
                            </div>
                        @endif

                            @if($ticket->ticket_watched_status === 'watched' && $ticket->ticket_status !== 'closed')
                                <div class="card-header alert alert-success" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <a href="{{ url('/') }}/board/<?= $ticket->id ?>/chat">
                                                {{$ticket->ticket_subject}}
                                            </a>
                                        </button>
                                        <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            от {{$ticket->user->name}}
                                        </button>
                                        @if($isManager)
                                            @if(($ticket->ticket_status !== 'closed') && ($ticket->ticket_watched_status !== 'unwatch'))
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <a href="{{ url('/') }}/board/<?= $ticket->id ?>/take-ticket">Ответить на заявку</a>
                                                </button>
                                            @endif
                                        @endif
                                        @if(!$isManager)
                                            @if($ticket->ticket_status !== 'closed')
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <a href="{{ url('/') }}/board/<?= $ticket->id ?>/close">Закрыть заявку</a>
                                                </button>
                                            @endif
                                        @endif

                                    </h5>
                                </div>
                            @endif

                            @if($ticket->ticket_watched_status === 'unwatched' && $ticket->ticket_status === 'inactive')
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <a href="{{ url('/') }}/board/<?= $ticket->id ?>/chat">
                                                {{$ticket->ticket_subject}}
                                            </a>
                                        </button>
                                        <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            от {{$ticket->user->name}}
                                        </button>
                                        @if($isManager)
                                            @if($ticket->ticket_status !== 'closed')
                                                @if($ticket->ticket_watched_status === 'unwatched')
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <a href="{{ url('/') }}/board/<?= $ticket->id ?>/take-ticket">Ответить на заявку</a>
                                                    </button>
                                                @endif
                                            @endif
                                        @endif
                                        @if(!$isManager)
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <a href="{{ url('/') }}/board/<?= $ticket->id ?>/close">Закрыть заявку</a>
                                            </button>
                                        @endif
                                    </h5>
                                </div>
                            @endif

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                {{$ticket->ticket_text}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="chat">
                        @if(!empty($messages))
                            @foreach($messages as $message)
                                <li class="left clearfix">
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">{{ $message->message_sender }}</strong>
                                        </div>
                                        <p>
                                            {{ $message->message_text }}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <form method="post" action="{{ url('/') }}/board/<?= $ticket->id ?>/chat/create-message">
                            @csrf
                        <input id="message" name="message" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-warning btn-sm">
                                Send
                            </button>
                        </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="dashboard.js"></script>

</div>
