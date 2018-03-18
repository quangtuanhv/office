<?php

namespace App\Http\Controllers;
use App\Profile;
use App\Work;
use App\DonVi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WorksController extends Controller {
	public function DanhSachViecNhan($id) {
		$work = Work::where('user_id_receive', $id)->with('user', 'profile')->get();
		return view('works.ListReceiveWorks', compact('work'));
	}
	public function TaoViecMoi() {
		$user = Profile::all();
		$dv = DonVi::all();
		return view('works.NewWork', compact('user','dv'));
	}
	public function postWork(Request $req, $id) {

		$work                  = new Work;
		$work->title           = $req->title;
		$work->user_id_send    = $id;
		$work->user_id_receive = $req->user_id_receive;
		$work->receive_date    = $req->receive;
		$work->content         = $req->content;
		$work->deadline        = $req->deadline;
		$work->status          = 1;
		$work->file            = $req->file;
		$work->save();
		return redirect()->route('send',['id'=>Auth::id()])->with('success');
	}
	public function DanhSachViecGiao($id) {
		$work = Work::orderBy('id', 'desc')->where('user_id_send', $id)->get();
		return view('works.ListSendWorks', compact('work'));
	}
	public function getCongViec($id) {
		$work = Work::where('id', $id)->first();
			$dv = DonVi::all();
		return view('works.DetailWork', compact('work','dv'));
	}

	public function getPerson()
	{
		$id_donvi=$_GET["id_donvi"];
		$list = Profile::where('donVi_id',$id_donvi)->get();

		foreach ($list as $row) {
			echo '<option value="'.$row["id"].'">'.$row["fullname"].'</option>';
		}
	}
	public function getStatus(){
		$status=$_GET["status"];
		$post_id    =$_GET['post_id'];
		$post = Work::where('id',$post_id)->first();
		$post->status = $status;
		$post->save();
		return "thay đổi trạng thái thành công !";
	}
	public function sendto(){
		$post_id = $_GET["post_id"];
		$user_id = $_GET["id_user"];
		$post = Work::where('id',$post_id)->first();
		$post->user_id_receive = $user_id;
		$post->save();
		echo " Chuyển việc thành công.";
	}

}
