<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\MessageSent;
use App\Mesage;
use App\User;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        $receiver = User::where('id', $request->get('id'))->first();

        return view('chat', compact('receiver'));
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()
    {
        return Mesage::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {


        $user = Auth::user();
        $receiver = $request->get('receiver');
        $receiverId = $receiver['id'];

        $receiverObj = User::where('id', $receiverId)->first();

        $message = $user->messages()->create([
            'message' => $request->input('message'), 
            'receiver_id'=>(int)$request->input('receiver_id')

        ]);



        broadcast(new MessageSent($user, $message, $receiverObj))->toOthers();

        return ['status' => 'Message sent!'];
    }
}
