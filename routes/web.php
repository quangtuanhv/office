<?php

Route::get('/','UserController@xulydangnhap');
Route::get('login',function(){
	return view('user.login');
});
Route::post('login', 'UserController@postLogin')->name('login');
Route::get('checkName', 'UserController@ajaxLogin');

Route::group(['middleware'=>'auth'],function(){
Route::get('dangkytaikhoanmoi', function () {
		return view('user.register');
	});
Route::get('so-do-to-chuc',function(){
	return view('master.dig');
});

Route::post('dangky', 'UserController@dangky')->name('dangky');
Route::get('logout', 'UserController@logout')->name('logout');
Route::get('updateProfile/{id?}', 'UserController@getUpdate')->name('updateProfile');
Route::post('updateProfile/{id?}', 'UserController@postUpdate')->name('updateProfile');
Route::get('showUser', 'UserController@getShowUser');
Route::get('showDetail/{id?}', 'UserController@getShow')->name('detail');
// tin nhắn
Route::get('tinnhan/{id?}', 'ChatController@index')->name('tinnhan');
Route::post('tinnhan/{id?}', 'ChatController@postSendMessage')->name('tinnhan');
Route::get('danhsachnhansu', 'ChatController@chatwithuser');
Route::get('hop-thu-den', 'ChatController@getInbox');
//tin nội bộ
Route::get('news/{id?}', 'NewsController@getNews')->name('news');
Route::post('news/{id?}', 'NewsController@postNews')->name('postnews');
Route::get('listNews', 'NewsController@getlistNews')->name('listNews');
Route::get('detail-news/{id?}', 'NewsController@getdetail')->name('detailNews');
Route::post('{url}', 'NewsController@getDown')->name('download');
Route::get('xulyComment', 'NewsController@ajaxCmt');
Route::get('edit-tin-tuc/{id?}', 'NewsController@edit');
Route::post('edit-news/{id?}', 'NewsController@UpdateNews');
//Công việc
Route::get('danh-sach-cong-viec-nhan/{id?}', 'WorksController@DanhSachViecNhan')->name('receive');
Route::get('tao-cong-viec-moi', 'WorksController@TaoViecMoi')->name('newWork');
Route::post('postCongViec/{id?}', 'WorksController@postWork')->name('postCV');
Route::get('danh-sach-cong-viec-giao/{id?}', 'WorksController@DanhSachViecGiao')->name('send');
Route::get('chi-tiet-cong-viec/{id?}', 'WorksController@getCongViec');
Route::get('getPerson','WorksController@getPerson');
Route::get('getStatus','WorksController@getStatus');
Route::get('sendto','WorksController@sendto');
Route::get('edit-work/{id}','WorksController@editWork');
Route::post('edit-work/{id?}','WorksController@postEditWork')->name('editWork');

// lịch cộng tác cơ quan
Route::get('tao-moi-lich-cong-tac/{id?}', 'TaskController@getLich')->middleware('checkLever');	
Route::get('tao-lich-cong-tac/', 'TaskController@postLich')->name('postLich');
Route::get('lich-cong-tac/{id?}','TaskController@showLich');

//lịch công tác đơn vị
Route::get('tao-moi-lich-cong-tac-don-vi/{id?}', 'TaskDonviController@getLich');
Route::get('tao-lich-cong-tac-don-vi/', 'TaskDonviController@postLich')->name('postLich');
Route::get('lich-cong-tac-don-vi/{id?}','TaskDonviController@showLich');
//Công văn
Route::get('xu-ly-cong-van/{id?}','DocumentController@newDocument');
Route::post('save-document/{id?}','DocumentController@saveDocument')->name('save-document');
Route::get('cong-van-can-duyet-cap-tinh','DocumentController@showDocument')->middleware('checkLever');
Route::get('chi-tiet-cong-van/{id?}','DocumentController@showDetail');
Route::get('changeStatusDocument','DocumentController@ajaxChangeStatus');
Route::get('cong-van-cap-tinh','DocumentController@showDocumentTinh');
Route::get('chi-tiet-cong-van-da-duyet/{id?}','DocumentController@showDetailDaDuyet');
Route::get('cong-van-cap-tinh-da-duyet','DocumentController@showAllDocumentTinh')->middleware('checkLever');
Route::get('cong-van-da-gui/{id?}','DocumentController@ListOfSentDocument');

Route::get('cong-van-can-duyet-cap-donvi/{id?}','DocumentController@showDocumentlever2')->middleware('checkLever2');
Route::get('cong-van-cap-don-vi','DocumentController@showDocumentDonVi');
Route::get('cong-van-cap-don-vi-da-duyet','DocumentController@showAllDocumentDonVi');
//không đủ quyền
Route::get('khong-du-quyen',function(){
	return view('errors.notHaveRole');
});
//van ban
Route::get('van-ban-den', 'DocumentController@vanbanden_captinh');
Route::get('tao-van-ban','DocumentController@taovanban');
Route::post('luu-van-ban/{id?}','DocumentController@luuvanban')->name('luuvanban');
Route::get('chi-tiet-cong-van-den/{id?}','DocumentController@getCongVanDen');
Route::post('chuyen-cong-van-den/{id}','DocumentController@postChuyenCongVan')->name('chuyen-tiep');
Route::get('xu-ly-van-ban/{id?}','DocumentController@getXuLyVanBan')->name('xu-ly-van-ban');
Route::get('tao-van-ban-tra-loi/{id?}','DocumentController@getReply');
Route::get('danh-sach-xu-ly-van-ban', 'DocumentController@getlistxuly');
Route::post('tra-loi-cong-van/{id?}','DocumentController@postReplyDocument');
});
