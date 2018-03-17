<?php

namespace App\Http\Controllers;

use App\Messenger;

use App\Profile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ChatController extends Controller {
	public function index($id) {
		if (Auth::check()) {

			$send = Messenger::where(function ($query) use ($id) {
					$query->where('user_1', Auth::id())
					->where('user_2', $id);
				})->orwhere(function ($query) use ($id) {
					$query->where('user_2', Auth::id())
						->where('user_1', $id);
				})->orderBy('id', 'desc')->SimplePaginate(4);
			$info = Profile::where('id', $id)->first();

			return view('chat.chat', compact('send', 'info'));
		} else {
			return redirect('/');
		}
	}

	public function chatWithUser() {
		if (Auth::check()) {

			$user = Profile::with('chucVu', 'donVi')->get();

			return view('chat.chatWithUser', compact('user'));
		} else {
			return redirect('/');
		}
	}

	public function postSendMessage(Request $req, $id) {
		$chat          = new Messenger;
		$chat->user_1  = Auth::id();
		$chat->user_2  = $id;
		$chat->content = $req->content;
		$chat->save();
		return back()->withInput();
	}
	public function getInbox() {
		$mess = Messenger::where('user_2', Auth::id())->orderBy('id', 'desc')->Paginate(5);
		return view('chat.inbox', compact('mess'));
	}
}
