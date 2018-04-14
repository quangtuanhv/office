<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonVi;	
use App\Document;
use App\Profile;
use App\SendDocument;
use App\Reply_Documents;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
	// public function newDocument($id){
	// 	$dv = DonVi::all();
	// 	$id=$id;
	// 	return view('terms-provincial.newTermProvincial',compact('dv','id'));
	// }

	// public function saveDocument(Request $req,$id){
	// 	$doc = new Document;
	// 	$doc->title=$req->title;
	// 	$doc->symbol=$req->symbol;
	// 	$doc->urgent=$req->urgent;
	// 	$doc->status=1;
	// 	$doc->user_id=Auth::id();
	// 	$doc->advisory=$req->advisory;
	// 	$doc->lever=$id;
	// 	$doc->note=$doc->note;
	// 	$doc->file=$req->taptin;
	// 	$doc->save();
	// 	return redirect("/")->with('done','Đã gửi xong công văn, vui lòng chờ ký duyệt');
	// }

	// public function showDocument(){
	// 	$congvan = Document::where([['status','1'],['lever','1']])->orderBy('id', 'desc')->get();

	// 	return view('terms-provincial.showlistcvtinh',compact('congvan'));
	// }
	
	// public function showDetail($id){
	// 	$vb = Document::where('id',$id)->first();
	// 	return view('terms-provincial.detail',compact('vb'));
	// }
	// public function ajaxChangeStatus(){
	// 	$note         = $_GET["note"];
	// 	$status       = $_GET["status"];
	// 	$id           = $_GET["id"];

	// 	$vb           = Document::where('id',$id)->first();
	// 	$vb->status   = $status;
	// 	$vb->note     = $note;
	// 	$vb->accept   = Auth::id();
	// 	$vb->save();
	// 	echo "Đã duyệt thành công";
	// }
	// public function showDocumentTinh(){
	// 	$congvan = Document::where([['status','2'],['lever','1']])->orderBy('id', 'desc')->get();

	// 	return view('terms-provincial.listDaDuyetCongKhai',compact('congvan'));
	// }
	// public function showDetailDaDuyet($id){
	// 	$vb = Document::where('id',$id)->first();
	// 	return view('terms-provincial.detaildaduyet',compact('vb'));
	// }
	// public function showAllDocumentTinh(){
	// 	$congvan = Document::where([['status','2'],['lever','1']])->orwhere([['status','3'],['lever','1']])->orderBy('id', 'desc')->get();

	// 	return view('terms-provincial.listDaDuyetCongKhai',compact('congvan'));
	// }


	// //don - vi 
	// public function showDocumentlever2($id){

	// 	$congvan = Document::where([['status','1'],['lever','2'],['advisory',$id]])->orderBy('id', 'desc')->get();

	// 	return view('terms-provincial.showlistcvtinh',compact('congvan'));
	// }
	// public function ListOfSentDocument($id){
	// 	$congvan = Document::where('user_id',$id)->get();
	// 	return view('terms-provincial.showlistcvtinh',compact('congvan'));
	// }
	// public function showAllDocumentDonVi(){
	// 	$id_donvi = Auth::user()->profile->donVi_id;
	// 	$congvan = Document::where([['status','2'],['lever','1'],['advisory',$id_donvi]])->orwhere([['status','3'],['lever','1'],['advisory',$id_donvi]])->orderBy('id', 'desc')->get();

	// 	return view('terms-provincial.listDaDuyetCongKhai',compact('congvan'));
	// }
	// public function showDocumentDonVi(){
	// 	$id_donvi = Auth::user()->profile->donVi_id;
	// 	$congvan = Document::where([['status','2'],['lever','1'],['advisory',$id_donvi]])->orderBy('id', 'desc')->get();

	// 	return view('terms-provincial.listDaDuyetCongKhai',compact('congvan'));
	// }

	public function vanbanden_captinh(){
		$doc = Document::orderBy('id', 'desc')->get();
		return view('documents.vanbanden.listvanbanden',compact('doc'));
	}

	public function taovanban() {
		$dv = DonVi::all();
		$ld = Profile::where('role_id',2)->orwhere('role_id',3)->get();
		return view('documents.vanbanden.nhapvanban',compact('dv','ld'));
	}

	public function luuvanban(Request $req, $id){
		$doc = new Document;
		$doc->trich_yeu = $req->trich_yeu;
		$doc->loai = $req->loai;
		$doc->do_khan = $req->do_khan;
		$doc->linh_vuc = $req->linh_vuc;
		$doc->y_kien = $id;
		$doc->file = $req->file;
		$doc->lanh_dao_xu_ly = $req->lanh_dao_xu_ly;
		$doc->ngay_het_han = $req->ngay_het_han;
		$doc->so_van_ban = $req->so_van_ban;
		$doc->trang_thai = 1;
		$doc->ghi_chu = $req->ghi_chu;
		$doc->co_quan_ban_hanh = $req->co_quan_ban_hanh;
		$doc->save();
		return redirect("/")->with('done','Đã gửi xong công văn, vui lòng chờ ký duyệt');
	}

	public function getCongVanDen($id){
		$doc = Document::where('id',$id)->first();
		$ten = Profile::all();
		$nv  = SendDocument::where('id_congvan',$id)->orderBy('id', 'desc')->get();
		return view('documents.vanbanden.chitietvanbanden',compact('doc','ten','nv'));
	}

	public function postChuyenCongVan(Request $req,$id){
		$doc = New SendDocument;
		$doc->nguoichuyen   = Auth::id();
		$doc->noidungchuyen = $req->noidungchuyen;
		$doc->nguoinhan     = $req->nguoi_nhan;
		$doc->ghichu        = $req->ghichu;
		$doc->filedinhkem   = $req->taptin;
		$doc->id_congvan    = $id;
		$doc->trang_thai     = 1;
		$doc->save();
		$oldDoc = SendDocument::where([['id_congvan',$id],['nguoinhan',Auth::id()]])->first();
		$oldDoc->trang_thai = 2;
		$oldDoc->save();
		$cv = Document::where('id',$id)->first();
		$cv->trang_thai = 2;
		$cv->save();
		return redirect()->route('xu-ly-van-ban', ['id' => $id]);
	}
	public function getXuLyVanBan($id){
		$doc = SendDocument::where('id_congvan',$id)->get();
		$check = SendDocument::where('id_congvan',$id)->first();
		$nv = SendDocument::where('id_congvan',$id)->get();
//
		$rep = Reply_Documents::where('id_van_ban',$id)->orderBy('id','desc')->get();
		return view('documents.vanbanden.xulyvanban',compact('doc','check','nv','rep'));
	}
	public function getReply($id){
		$doc = Document::where('id',$id)->first();
		return view('documents.vanbanden.taovanbantraloi',compact('doc'));
	}
	public function getlistxuly(){
		$doc = Document::where('trang_thai',2)->orderBy('id', 'desc')->get();
		return view('documents.xulyvanban.listxulivanban',compact('doc'));
	}

	public function postReplyDocument(Request $req,$id){
		$rep = new Reply_Documents;
		$rep->tencongvan = $req->trich_yeu;
		$rep->so_ky_hieu = $req->so_van_ban;
		$rep->file       = $req->filedinhkem;
		$rep->id_van_ban = $id;
		$rep->user_id    = Auth::id();
		$rep->ghichu     = $req->ghichu;
		$rep->save();
		$oldDoc = SendDocument::where([['id_congvan',$id],['nguoinhan',Auth::id()]])->first();
		$oldDoc->trang_thai = 2;
		$oldDoc->save();
		return redirect()->route('xu-ly-van-ban',['id'=>$id]);
	}
	
}
