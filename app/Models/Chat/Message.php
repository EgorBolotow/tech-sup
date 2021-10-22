<?php

namespace App\Models\Chat;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_text',
        'ticket_id'
    ];

    public static function createMessage(array $fields, int $ticketId)
    {
        Message::create([
            'message_text' => $fields['message'],
            'ticket_id' => $ticketId
        ]);

        Ticket::changeTicketStatus(Auth::user(), $ticketId);
    }
}