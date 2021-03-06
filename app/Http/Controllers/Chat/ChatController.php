<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ChatController extends Controller
{
    public function viewChat(int $ticketId)
    {
        return view('chat/chat',[
            'messages' => Ticket::find($ticketId)->messages,
            'ticket' => Ticket::find($ticketId),
            'user' => Auth::user(),
            'isManager' => Auth::user()->role === 'manager'
        ]);
    }
}
