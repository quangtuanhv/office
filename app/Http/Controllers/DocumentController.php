<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\DonVi;	
use App\Document;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
	public function newDocument($id){
		$dv = DonVi::all();
		$id=$id;
		return view('terms-provincial.newTermProvincial',compact('dv','id'));
	}

	public function saveDocument(Request $req,$id){
		$doc = new Document;
		$doc->title=$req->title;
		$doc->symbol=$req->symbol;
		$doc->urgent=$req->urgent;
		$doc->status=1;
		$doc->user_id=Auth::id();
		$doc->advisory=$req->advisory;
		$doc->lever=$id;
		$doc->note=$doc->note;
		$doc->file=$req->taptin;
		$doc->save();
		return redirect("/")->with('done','Đã gửi xong công văn, vui lòng chờ ký duyệt');
	}

	public function showDocument(){
		$congvan = Document::where([['status','1'],['lever','1']])->orderBy('id', 'desc')->get();

		return view('terms-provincial.showlistcvtinh',compact('congvan'));
	}
	
	public function showDetail($id){
		$vb = Document::where('id',$id)->first();
		return view('terms-provincial.detail',compact('vb'));
	}
	public function ajaxChangeStatus(){
		$note         = $_GET["note"];
		$status       = $_GET["status"];
		$id           = $_GET["id"];

		$vb           = Document::where('id',$id)->first();
		$vb->status   = $status;
		$vb->note     = $note;
		$vb->accept   = Auth::id();
		$vb->save();
		 echo "Đã duyệt thành công";
	}
	public function showDocumentTinh(){
		$congvan = Document::where([['status','2'],['lever','1']])->orderBy('id', 'desc')->get();

		return view('terms-provincial.listDaDuyetCongKhai',compact('congvan'));
	}
	public function showDetailDaDuyet($id){
		$vb = Document::where('id',$id)->first();
		return view('terms-provincial.detaildaduyet',compact('vb'));
	}
	public function showAllDocumentTinh(){
		$congvan = Document::where([['status','2'],['lever','1']])->orwhere([['status','3'],['lever','1']])->orderBy('id', 'desc')->get();

		return view('terms-provincial.listDaDuyetCongKhai',compact('congvan'));
	}


	//don - vi 
	public function showDocumentlever2($id){

		$congvan = Document::where([['status','1'],['lever','2'],['advisory',$id]])->orderBy('id', 'desc')->get();

		return view('terms-provincial.showlistcvtinh',compact('congvan'));
	}
	public function ListOfSentDocument($id){
		$congvan = Document::where('user_id',$id)->get();
		return view('terms-provincial.showlistcvtinh',compact('congvan'));
	}
	public function showAllDocumentDonVi(){
		$id_donvi = Auth::user()->profile->donVi_id;
		$congvan = Document::where([['status','2'],['lever','1'],['advisory',$id_donvi]])->orwhere([['status','3'],['lever','1'],['advisory',$id_donvi]])->orderBy('id', 'desc')->get();

		return view('terms-provincial.listDaDuyetCongKhai',compact('congvan'));
	}
	public function showDocumentDonVi(){
		$id_donvi = Auth::user()->profile->donVi_id;
		$congvan = Document::where([['status','2'],['lever','1'],['advisory',$id_donvi]])->orderBy('id', 'desc')->get();

		return view('terms-provincial.listDaDuyetCongKhai',compact('congvan'));
	}
}
