<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonVi;	
use App\Document;
use App\Profile;
use App\SoVanBan;
use App\LoaiVanBan;
use App\ChuyenXuLyVanBan;
use App\XuLyVanBan;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
	
	public function taovanban() {
		$tl  = LoaiVanBan::all();
		$svb = SoVanBan::all(); 
		return view('documents.vanbanden.nhapvanban',compact('tl','svb'));
	}

	public function luuvanban(Request $req, $id){
		$doc                 = new Document;
		$doc->trichyeu		 = $req->trichyeu;
		$doc->kihieu		 = $req->so;
		$doc->id_loaivanban	 = $req->loai;
		$doc->ngaybanhanh	 = $req->ngaybanhanh;
		$doc->id_sovanban	 = $req->sovanban;
		$doc->ngayden 	     = $req->ngayden;
		$doc->coquanbanhanh  = $req->coquanbanhanh;
		$doc->nguoiky 		 = $req->nguoiky;
		$doc->chucvu		 = $req->chucvu;
		$doc->tepdinhkem	 = $req->tepdinhkem;
		$doc->ghichu		 = $req->ghichu;
		$doc->id_nguoisoan   = Auth::id();
		$doc->status 		 = $id;
		$doc->save();
		return redirect("/")->with('done','Đã gửi xong công văn, vui lòng chờ ký duyệt');
	}

	public function getvanbanden(){
		$doc = Document::where('status',1)->orderBy('id', 'desc')->get();
		return view('documents.vanbanden.listvanbanden',compact('doc'));
	}
	public function getchitietvanban($id){
		$doc  	= Document::where('id',$id)->first();
		$user 	= Profile::all();
		$cxlvb  = ChuyenXuLyVanBan::where('id_vanban',$id)->orderBy('id', 'desc')->get();
		$xlvb 	= XuLyVanBan::where('id_vanban',$id)->orderBy('id', 'desc')->get();
		return view('documents.vanbanden.chitietvanbanden',compact('doc','user','cxlvb','xlvb'));
	}
	public function chuyenvanban(Request $request,$id){
		$value     = $request->nguoinhan;
		if(is_numeric($value)){
			$xuly  = new ChuyenXuLyVanBan;
			$xuly->ykienxuly    = $request->ykienxuly;
			$xuly->tepdinhkem   = $request->tepdinhkem;
			$xuly->id_nguoinhan = $request->nguoinhan;
			$xuly->id_vanban 	= $id;
			$xuly->status 		= 0;
			$xuly->id_nguoitao	= Auth::id();
			$xuly->save();
			$doc = ChuyenXuLyVanBan::where([['id_nguoinhan',Auth::id()],['id_vanban',$id]])->first();
			if (!is_null($doc)) {
				$doc->status = 1;
				$doc->save();
			}
		}
		else{
			for ($i=12; $i <30 ; $i++) { 
			$tendonvi  = DonVi::where('id',$i)->value('tenDonVi');
			$nguoidung = Profile::where('fullname',$tendonvi)->value('id');
			$xuly  = new ChuyenXuLyVanBan;
			$xuly->ykienxuly    = $request->ykienxuly;
			$xuly->tepdinhkem   = $request->tepdinhkem;
			$xuly->id_nguoinhan = $nguoidung;
			$xuly->id_vanban 	= $id;
			$xuly->id_nguoitao	= Auth::id();
			$xuly->status 		= 0;
			$xuly->save();
			}
			$doc = ChuyenXuLyVanBan::where([['id_nguoinhan',Auth::id()],['id_vanban',$id]])->first();
			if (!is_null($doc)) {
				$doc->status = 1;
				$doc->save();
			}
		}
		return redirect()->route("chi-tiet-cong-van-den",['id'=>$id]);
	}
	public function postXuLyVanBan(Request $req,$id){
		$xuly = new XuLyVanBan;
		$xuly->quatrinhxuly		= $req->ykienxuly;
		$xuly->dinhkemtaptin	= $req->tepdinhkem;
		$xuly->nguoixuly		= Auth::id();
		$xuly->id_vanban 		= $id;
		$xuly->save();
		$doc = ChuyenXuLyVanBan::where([['id_nguoinhan',Auth::id()],['id_vanban',$id]])->first();
			if (!is_null($doc)) {
				$doc->status = 1;
				$doc->save();
			}
		return redirect()->route("chi-tiet-cong-van-den",['id'=>$id]);
	}

	public function getsovanban(){
		$svb  =  SoVanBan::all();
		return view('documents.sovanban.danhsachsovanban',compact('svb'));
	}

	public function getdanhsachvanban($id){
		$doc  = Document::where('id_sovanban',$id)->orderBy('id', 'desc')->get();
		return view('documents.vanbanden.listvanbanden',compact('doc'));
	}
	public function gettaosovanban(){
		return view('documents.sovanban.new');
	}
	public function posttaosovanban(Request $re){
		$svb = new SoVanBan;
		$svb->tensovanban	= $re->tensvb;
		$svb->tenviettat	= $re->tenviettat;
		$svb->loaivanban 	= $re->loaivanban;
		$svb->namluutru		= $re->namluutru;
		$svb->save();
		return redirect("so-van-ban");
	}

	public function getdsxuly(){

	/*	$dv  = Profile::where('id',Auth::id())->first()->value('donVi_id');
		$set = Profile::where('donVi_id',$dv)->first();
		if (!is_null($set)) {
		$search  = ChuyenXuLyVanBan::where('status',0)->orderBy('id', 'desc')->get();
		} else {
		$search  = ChuyenXuLyVanBan::where([['id_nguoinhan',Auth::id()],['status',0]])->orderBy('id', 'desc')->get();
		}*/
		$search  = ChuyenXuLyVanBan::where([['id_nguoinhan',Auth::id()],['status',0]])->orderBy('id', 'desc')->get();
		return view('documents.vanbanden.xulyvanban',compact('search'));
		
	}

	public function gettaovanbandi(){
		$tl  = LoaiVanBan::all();
		$svb = SoVanBan::all(); 
		$dv  = DonVi::all();
		$nk  = Profile::where('donVi_id',1)->get();
		return view('documents.vanbandi.nhapvanban',compact('tl','svb','dv','nk'));
	}

	public function getdanhsachvanbandi(){
		$doc = Document::where('status',0)->orderBy('id', 'desc')->get();
		return view('documents.vanbandi.danhsachvanbandi',compact('doc'));
	}

	public function getdanhsachloaivanban(){
		$tl  = LoaiVanBan::all();
		return view('documents.loaivanban.danhsachvanban',compact('tl','svb','dv','nk'));
	}
	public function getloaivanbantuongung($id){
		$doc = Document::where('id_loaivanban',$id)->get();
		return view('documents.vanbandi.danhsachvanbandi',compact('doc'));
	}

	public function gettaotheloaivanban(){
		return view('documents.loaivanban.new');
	}
	public function posttaotheloaivanban(Request $req){
		$theLoai = new LoaiVanBan;
		$theLoai->tenloaivanban = $req->tenloaivanban;
		$theLoai->tenviettat 	= $req->tenviettat;
		$theLoai->save();
		return redirect('loai-van-ban');
	}
	public function xoabaiviet($id){
		$chuyenvanban = ChuyenXuLyVanBan::where('id_vanban',$id)->get();
		foreach ($chuyenvanban as $chuyenvanban ) {
			$chuyenvanban->delete();
		}
		$xulyvanban   = XuLyVanBan::where('id_vanban',$id)->get();
		
		foreach ($xulyvanban as $xulyvanban ) {
			$xulyvanban->delete();
		}
		
		Document::destroy($id);
		return redirect("/");
	}
}
