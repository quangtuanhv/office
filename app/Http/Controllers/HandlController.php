<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\DonVi;
use App\HoSoPhoiHop;
use App\XuLyHoSoPhoiHop;
use Illuminate\Support\Facades\Auth;
class HandlController extends Controller
{
	public function gettaocongviecnoibo(){
		$user = Profile::all();
		$dv   = DonVi::all();
		return view('handl.new',compact('user','dv'));
	}
	public function deleteTask($id)
	{
		$peo = HoSoPhoiHop::where('id',$id)->first();
		if (Auth::id()==$peo->nguoisoan) {
			$delete = XuLyHoSoPhoiHop::where('id_hoso',$id)->delete();
			$del = HoSoPhoiHop::where('id',$id)->delete();
			return redirect()->back();

		} else {
			return redirect('khong-du-quyen');	
		}
		
		
	}
	public function closeTask($id)
	{
		$peo = HoSoPhoiHop::where('id',$id)->first();
		if (Auth::id()==$peo->nguoisoan) {
			$peo->status = 1;
			$peo->save();
			return redirect('danh-sach-cong-viec');

		} else {
			return redirect('khong-du-quyen');	
		}
		
		
	}
	public function posttaocongviecnoibo(Request $req){
		$work = new HoSoPhoiHop;
		$work->noidung		= $req->content;
		$work->tepdinhkem	= $req->file;
		$work->nguoisoan	= Auth::id();
		$work->ghichu		= $req->note;
		$work->status 		= 0;
		$work->save();
		$id = $work->id;
		$nguoinhan = $req->input('nguoinhan');
		foreach ($nguoinhan as $nguoinhan) {
			$nhan = new XuLyHoSoPhoiHop;
			$nhan->id_hoso		= $id;
			$nhan->nguoigopy	= $nguoinhan;
			$nhan->save();
		}
		return redirect("danh-sach-cong-viec");
	}
	public function getdanhsach(){
		$check   = XuLyHoSoPhoiHop::where('nguoigopy',Auth::id())->orderBy('id', 'desc')->get();
		$check_1 = HoSoPhoiHop::where('nguoisoan',Auth::id())->orderBy('id', 'desc')->get();

		return view('handl.list',compact('check_1','check'));
	} 

	public function getchitiet($id){
		$cv  = HoSoPhoiHop::where('id',$id)->first();
		$cmt = XuLyHoSoPhoiHop::where([['id_hoso',$id],['ykien','<>',null]])->get();
		$member = XuLyHoSoPhoiHop::where([['id_hoso',$id],['ykien',null]])->get();
		return view('handl.detail',compact('cv','cmt','member'));
	}

	public function postcmt(Request $req,$id){
		
		$new = new XuLyHoSoPhoiHop;
		$new->id_hoso	= $id;
		$new->nguoigopy = Auth::id();
		$new->ykien 	= $req->cmt;
		$new->save();
		
		return redirect()->back();
	}
}