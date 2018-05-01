<?php
namespace App\Http\Controllers;
use App\Profile;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskDonviController extends Controller {
	public function getLich() {
		$user = Profile::all();
		return view('tasks.newTaskDonvi', compact('user'));
	}
	public function editTask($id){
		$task = Task::where('id',$id)->first();
		return view('tasks.editCaNhan',compact('task'));

	}
	public function saveTask(Request $req, $id){
		$task = Task::where('id',$id)->first();
		$task->content    = $req->content;
		$task->gio        = $req->gio;
		$task->ngay       = $req->ngay;
		$task->address    = $req->address;
		$task->thanhphan  = $req->thanhphan;
		$task->save();
		return redirect("lich-cong-tac-ca-nhan");
	}
	public function delTask($id){
		$task = Task::where('id',$id)->delete();
		return redirect("lich-cong-tac-ca-nhan");
	}
	public function postLich() {
		$content          = $_GET["content"];
		$gio              = $_GET["gio"];
		$ngay             = $_GET["ngay"];
		$diadiem          = $_GET["diadiem"];
		$thanhphan        = $_GET["thanhphan"];
		$type             = $_GET["type"];
		$task             = new Task;
		$task->content    = $content;
		$task->gio        = $gio;
		$task->ngay       = $ngay;
		$task->profile_id = Auth::id();
		$task->address    = $diadiem;
		$task->thanhphan  = $thanhphan;
		$task->type       = $type;
		$task->user_id    = Auth::id();
		$task->save();
		echo "Thêm lịch thành công";
	}

	public function showLich(){
		$date = getdate();
		switch ($date['wday']) {
			case '1':
			$day_t2 = date('Y-m-d');
			$t2 = Task::where('ngay',$day_t2)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t3_int = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
			$day_t3 = date('Y-m-d',$day_t3_int);
			$t3 = Task::where('ngay',$day_t3)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t4_int = mktime(0, 0, 0, date("m"), date("d")+2, date("Y"));
			$day_t4 = date('Y-m-d',$day_t4_int);
			$t4 = Task::where('ngay',$day_t4)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t5_int = mktime(0, 0, 0, date("m"), date("d")+3, date("Y"));
			$day_t5 = date('Y-m-d',$day_t5_int);
			$t5 = Task::where('ngay',$day_t5)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t6_int = mktime(0, 0, 0, date("m"), date("d")+4, date("Y"));
			$day_t6 = date('Y-m-d',$day_t6_int);
			$t6 = Task::where('ngay',$day_t6)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t7_int = mktime(0, 0, 0, date("m"), date("d")+5, date("Y"));
			$day_t7 = date('Y-m-d',$day_t7_int);
			$t7 = Task::where('ngay',$day_t7)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t8_int = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
			$day_t8 = date('Y-m-d',$day_t8_int);
			$t8 = Task::where('ngay',$day_t8)->where([['type',1],['user_id',Auth::id()]])->get();

			return view('tasks.taskDonVi',compact('t2','t3','t4','t5','t6','t7','t8'));

			case '2':
			$day_t3 = date('Y-m-d');
			$t3 = Task::where('ngay',$day_t3)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t2_int = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
			$day_t2 = date('Y-m-d',$day_t2_int);
			$t2 = Task::where('ngay',$day_t2)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t4_int = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
			$day_t4 = date('Y-m-d',$day_t4_int);
			$t4 = Task::where('ngay',$day_t4)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t5_int = mktime(0, 0, 0, date("m"), date("d")+2, date("Y"));
			$day_t5 = date('Y-m-d',$day_t5_int);
			$t5 = Task::where('ngay',$day_t5)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t6_int = mktime(0, 0, 0, date("m"), date("d")+3, date("Y"));
			$day_t6 = date('Y-m-d',$day_t6_int);
			$t6 = Task::where('ngay',$day_t6)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t7_int = mktime(0, 0, 0, date("m"), date("d")+4, date("Y"));
			$day_t7 = date('Y-m-d',$day_t7_int);
			$t7 = Task::where('ngay',$day_t7)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t8_int = mktime(0, 0, 0, date("m"), date("d")-2, date("Y"));
			$day_t8 = date('Y-m-d',$day_t8_int);
			$t8 = Task::where('ngay',$day_t8)->where([['type',1],['user_id',Auth::id()]])->get();



			return view('tasks.taskDonVi',compact('t2','t3','t4','t5','t6','t7','t8'));
			case '3':
			$day_t4 = date('Y-m-d');
			$t4 = Task::where('ngay',$day_t4)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t2_int = mktime(0, 0, 0, date("m"), date("d")-2, date("Y"));
			$day_t2 = date('Y-m-d',$day_t2_int);
			$t2 = Task::where('ngay',$day_t2)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t3_int = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
			$day_t3 = date('Y-m-d',$day_t3_int);
			$t3 = Task::where('ngay',$day_t3)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t5_int = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
			$day_t5 = date('Y-m-d',$day_t5_int);
			$t5 = Task::where('ngay',$day_t5)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t6_int = mktime(0, 0, 0, date("m"), date("d")+2, date("Y"));
			$day_t6 = date('Y-m-d',$day_t6_int);
			$t6 = Task::where('ngay',$day_t6)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t7_int = mktime(0, 0, 0, date("m"), date("d")+3, date("Y"));
			$day_t7 = date('Y-m-d',$day_t7_int);
			$t7 = Task::where('ngay',$day_t7)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t8_int = mktime(0, 0, 0, date("m"), date("d")-3, date("Y"));
			$day_t8 = date('Y-m-d',$day_t8_int);
			$t8 = Task::where('ngay',$day_t8)->where([['type',1],['user_id',Auth::id()]])->get();

			return view('tasks.taskDonVi',compact('t2','t3','t4','t5','t6','t7','t8'));

			case '4':
			$day_t5 = date('Y-m-d');
			$t5 = Task::where('ngay',$day_t5)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t2_int = mktime(0, 0, 0, date("m"), date("d")-3, date("Y"));
			$day_t2 = date('Y-m-d',$day_t2_int);
			$t2 = Task::where('ngay',$day_t2)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t3_int = mktime(0, 0, 0, date("m"), date("d")-2, date("Y"));
			$day_t3 = date('Y-m-d',$day_t3_int);
			$t3 = Task::where('ngay',$day_t3)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t4_int = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
			$day_t4 = date('Y-m-d',$day_t4_int);
			$t4 = Task::where('ngay',$day_t4)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t6_int = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
			$day_t6 = date('Y-m-d',$day_t6_int);
			$t6 = Task::where('ngay',$day_t6)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t7_int = mktime(0, 0, 0, date("m"), date("d")+2, date("Y"));
			$day_t7 = date('Y-m-d',$day_t7_int);
			$t7 = Task::where('ngay',$day_t7)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t8_int = mktime(0, 0, 0, date("m"), date("d")-4, date("Y"));
			$day_t8 = date('Y-m-d',$day_t8_int);
			$t8 = Task::where('ngay',$day_t8)->where([['type',1],['user_id',Auth::id()]])->get();

			return view('tasks.taskDonVi',compact('t2','t3','t4','t5','t6','t7','t8'));

			case '5':
			$day_t6 = date('Y-m-d');
			$t6 = Task::where('ngay',$day_t6)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t2_int = mktime(0, 0, 0, date("m"), date("d")-4, date("Y"));
			$day_t2 = date('Y-m-d',$day_t2_int);
			$t2 = Task::where('ngay',$day_t2)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t3_int = mktime(0, 0, 0, date("m"), date("d")-3, date("Y"));
			$day_t3 = date('Y-m-d',$day_t3_int);
			$t3 = Task::where('ngay',$day_t3)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t4_int = mktime(0, 0, 0, date("m"), date("d")-2, date("Y"));
			$day_t4 = date('Y-m-d',$day_t4_int);
			$t4 = Task::where('ngay',$day_t4)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t5_int = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
			$day_t5 = date('Y-m-d',$day_t5_int);
			$t5 = Task::where('ngay',$day_t5)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t7_int = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
			$day_t7 = date('Y-m-d',$day_t7_int);
			$t7 = Task::where('ngay',$day_t7)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t8_int = mktime(0, 0, 0, date("m"), date("d")-5, date("Y"));
			$day_t8 = date('Y-m-d',$day_t8_int);
			$t8 = Task::where('ngay',$day_t8)->where([['type',1],['user_id',Auth::id()]])->get();

			return view('tasks.taskDonVi',compact('t2','t3','t4','t5','t6','t7','t8'));
			
			case '6':
			$day_t7 = date('Y-m-d');
			$t7 = Task::where('ngay',$day_t7)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t2_int = mktime(0, 0, 0, date("m"), date("d")-5, date("Y"));
			$day_t2 = date('Y-m-d',$day_t2_int);
			$t2 = Task::where('ngay',$day_t2)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t3_int = mktime(0, 0, 0, date("m"), date("d")-4, date("Y"));
			$day_t3 = date('Y-m-d',$day_t3_int);
			$t3 = Task::where('ngay',$day_t3)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t4_int = mktime(0, 0, 0, date("m"), date("d")-3, date("Y"));
			$day_t4 = date('Y-m-d',$day_t4_int);
			$t4 = Task::where('ngay',$day_t4)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t5_int = mktime(0, 0, 0, date("m"), date("d")-2, date("Y"));
			$day_t5 = date('Y-m-d',$day_t5_int);
			$t5 = Task::where('ngay',$day_t5)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t6_int = mktime(0, 0, 0, date("m"), date("d")-1, date("Y"));
			$day_t6 = date('Y-m-d',$day_t6_int);
			$t6 = Task::where('ngay',$day_t6)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t8_int = mktime(0, 0, 0, date("m"), date("d")-6, date("Y"));
			$day_t8 = date('Y-m-d',$day_t8_int);
			$t8 = Task::where('ngay',$day_t8)->where([['type',1],['user_id',Auth::id()]])->get();

			return view('tasks.taskDonVi',compact('t2','t3','t4','t5','t6','t7','t8'));
			
			case '0':
			$day_t8 = date('Y-m-d');
			$t8 = Task::where('ngay',$day_t8)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t2_int = mktime(0, 0, 0, date("m"), date("d")+1, date("Y"));
			$day_t2 = date('Y-m-d',$day_t2_int);
			$t2 = Task::where('ngay',$day_t2)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t3_int = mktime(0, 0, 0, date("m"), date("d")+2, date("Y"));
			$day_t3 = date('Y-m-d',$day_t3_int);
			$t3 = Task::where('ngay',$day_t3)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t4_int = mktime(0, 0, 0, date("m"), date("d")+3, date("Y"));
			$day_t4 = date('Y-m-d',$day_t4_int);
			$t4 = Task::where('ngay',$day_t4)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t5_int = mktime(0, 0, 0, date("m"), date("d")+4, date("Y"));
			$day_t5 = date('Y-m-d',$day_t5_int);
			$t5 = Task::where('ngay',$day_t5)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t6_int = mktime(0, 0, 0, date("m"), date("d")+5, date("Y"));
			$day_t6 = date('Y-m-d',$day_t6_int);
			$t6 = Task::where('ngay',$day_t6)->where([['type',1],['user_id',Auth::id()]])->get();

			$day_t7_int = mktime(0, 0, 0, date("m"), date("d")+6, date("Y"));
			$day_t7 = date('Y-m-d',$day_t7_int);
			$t7 = Task::where('ngay',$day_t7)->where([['type',1],['user_id',Auth::id()]])->get();

			return view('tasks.taskDonVi',compact('t2','t3','t4','t5','t6','t7','t8'));
		}
	}

}
