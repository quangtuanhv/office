<?php

namespace App\Http\Controllers;
use App\Comment;
use App\News;
use App\Profile;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller {
	public function getNews($id) {
		if (Auth::check()) {
			$profile = Profile::where('user_id', $id)->first();
			return view('news.postNews', compact('profile'));
		} else {
			return redirect('/');
		}
	}
	public function postNews(Request $req, $id) {
		$news             = new News;
		$news->title      = $req->title;
		$news->content    = $req->content;
		$news->profile_id = $id;
		$news->file       = $req->file;
		$news->save();
		return redirect('listNews')->with('success');
	}
	public function getlistNews() {
		if (Auth::check()) {
			$post = News::orderBy('id', 'desc')->get();

			return view('news.ListNews', compact('post', 'user'));
		} else {
			return redirect('/');
		}
	}
	public function getdetail($id) {
		if (Auth::check()) {

			$news = News::where('id', $id)->first();
			$cmt  = Comment::where('post_id', $id)->get();
			return view('news.detail', compact('news', 'cmt'));
		} else {
			return redirect('/');
		}
	}
	public function getDown($url) {
		return response()->download($url);
	}
	public function ajaxCmt() {
		// echo "string mvc";
		$content      = $_GET["noidung"];
		$id           = $_GET["id_post"];
		$cmt          = new Comment;
		$cmt->user_id = Auth::id();
		$cmt->content = $content;
		$cmt->post_id = $id;
		$cmt->save();

		echo "<div class='col-sm-8'>";
		echo "<div class='panel panel-white post panel-shadow'>";
		echo "<div class='post-heading'>";
		echo "<div class='pull-left image'>";
		echo "	<img src='{$cmt->user->profile->avatar}' class='img-circle avatar' alt='user profile image'>";
		echo "</div>";
		echo "<div class='pull-left meta'>";
		echo "<div class='title h5'>";
		echo "	<a href='#'><b>{$cmt->user->profile->fullname}</b></a>";

		echo "</div>";
		echo "<h6 class='text-muted time'>{$cmt->created_at}</h6> ";
		echo "</div>";
		echo "</div>";
		echo "<div class='post-description'>";
		echo "<p>{$cmt->content}</p>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
	}
	public function edit($id) {
		$post = News::where('id', $id)->first();
		return view('news.edit', compact('post'));
	}
	public function UpdateNews(Request $req, $id) {

		$news             = News::where('id', $id)->first();
		$news->title      = $req->title;
		$news->content    = $req->content;
		$news->profile_id = Auth::id();
		$news->file       = $req->file;
		$news->save();
		return redirect('/');
	}
}
