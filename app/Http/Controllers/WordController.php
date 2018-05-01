<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
class WordController extends Controller
{
	public function getsovanban() {
		// $years = Document::all()->value('ngaybanhanh');
	return view('documents.sovanban.insovanban'/*,compact('years')*/);
}

public function ExportWord(Request $req){
	$x = $req->radio;
	switch ($x) {
		case 'thang':
		$m = $req->thang;
		$y = $req->nam;
		$doc = Document::where('ngaybanhanh', '<=', $y.'-'.$m.'-31')
		->where('ngaybanhanh', '>=',  $y.'-'.$m.'-1' )->get();
		$title = "Sổ văn bản tháng ".$m." năm ".$y;
		break;
		case 'quy':
		$q = $req->quy;
		$y = $req->nam;
		switch ($q) {
			case '1':
			$doc = Document::where('ngaybanhanh', '<=', $y.'-3-31')
			->where('ngaybanhanh', '>=',  $y.'-1-1' )->get();

			break;
			case '2':
			$doc = Document::where('ngaybanhanh', '<=', $y.'-6-31')
			->where('ngaybanhanh', '>=',  $y.'-4-1' )->get();

			break;
			case '3':
			$doc = Document::where('ngaybanhanh', '<=', $y.'-9-31')
			->where('ngaybanhanh', '>=',  $y.'-7-1' )->get();

			break;
			case '4':
			$doc = Document::where('ngaybanhanh', '<=', $y.'-12-31')
			->where('ngaybanhanh', '>=',  $y.'-10-1' )->get();

			break;
			default:
			break;
		}
		$title = "Sổ văn bản quý ".$q." năm ".$y;
		break;
		case 'nam':
		$y = $req->nam;
		$doc = Document::where('ngaybanhanh', '<=', $y.'-12-31')
		->where('ngaybanhanh', '>=',  $y.'-1-1' )->get();
		$title = "Sổ văn bản năm ".$y;
		break;
		case 'tuychon':
		break;
		default:
		break;
	}
	$word  =  new \PhpOffice\PhpWord\PhpWord();
	$newSection = $word->addSection(array('orientation' => 'landscape'));
	$word->addTitleStyle(1, array('name'=>'HelveticaNeueLT Std Med', 'size'=>16, 'color'=>'990000','bold' => true,),array('align' => 'center','spaceAfter'=>20 ));
	$newSection->addTitle($title,1);

	$fancyTableStyleName = 'Fancy Table';
	$fancyTableStyle = array('borderSize' => 1, 'borderColor' => 'd2d2d2', 'cellMargin' => 50,'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
	$fancyTableFirstRowStyle = array('bgColor' => 'DDDDDD');
	$fancyTableCellStyle = array('valign' => 'center');
	$fancyTableFontStyle = array('bold' => true);
	$word->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
	$table = $newSection->addTable($fancyTableStyleName);
	$table->addRow(1000);
	$table->addCell(1000, $fancyTableCellStyle)->addText('STT', $fancyTableFontStyle);
	$table->addCell(2000, $fancyTableCellStyle)->addText('Số/Kí hiệu', $fancyTableFontStyle);
	$table->addCell(2000, $fancyTableCellStyle)->addText('Ngày ban hành', $fancyTableFontStyle);
	$table->addCell(5000, $fancyTableCellStyle)->addText('Trích yếu', $fancyTableFontStyle);
	$table->addCell(4000, $fancyTableCellStyle)->addText('Đơn vị ban hành', $fancyTableFontStyle);
	$stt=1;
	foreach ($doc as $doc) {
		$table->addRow();
		$table->addCell(2000)->addText($stt);
		$table->addCell(2000)->addText($doc->kihieu);
		$table->addCell(2000)->addText($doc->ngaybanhanh);
		$table->addCell(2000)->addText($doc->trichyeu);
		$table->addCell(2000)->addText($doc->coquanbanhanh);
		$stt++;
	}

	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment;filename="sovanban.docx"');

	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($word, 'Word2007');

	$objWriter->save('php://output');

}
}
