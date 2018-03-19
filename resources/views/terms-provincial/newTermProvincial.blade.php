@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							GỬI CÔNG VĂN CẤP TỈNH
						</h1>
					</div>

					<div class="panel-body">
						<div class="row">
							<div id="data" style="margin: 10px;" >
								<form action="#" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Tên Công văn:</label>
										<input type="text" class="form-control" name="title"
										/>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Người gửi công văn:</label>

												<select  name = "user_id_receive" class="nguoi_gui_term">
													<option>Nguyễn Văn Đẹp Trai</option>
													<option>Lê Thị Đẹp Gái</option>
													<option>Hoàng Văn Đế</option>
												</select>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Người nhận công văn:</label>

												<select  name = "user_id_receive" >
													<option>Hoàng Thị Hậu</option>
													<option>Trần Văn Công</option>
													<option>Huỳnh Trân Công Chúa</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Đơn vị gửi công văn:</label>

												<select  name = "user_id_receive">
													<option>Hội đồng nhân dân xã</option>
													<option>Hội đồng nhân dân huyện</option>
													<option>Hội đồng nhân dân thôn</option>
												</select>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Đơn vị nhận công văn:</label>

												<select  name = "user_id_receive" >
													<option>Hội đồng nhân dân xã</option>
													<option>Hội đồng nhân dân huyện</option>
													<option>Hội đồng nhân dân thôn</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Độ khẩn:</label>

												<select  name = "user_id_receive" class="do_khan">
													<option>Thường</option>
													<option>Khẩn</option>
													<option>Rất khẩn</option>
												</select>
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Loại văn bản:</label>

												<select  name = "user_id_receive" class="loai_vanban">
													<option>Công văn</option>
													<option>Thư họp</option>
													<option>Triển khai dự án</option>
													{{-- @foreach($user as $user)
													<optgroup label="{{$user->donvi->tenDonVi}} - {{$user->chucvu->tenChucVu}}">
														<option value="{{$user->id}}">
														{{$user->fullname}}</option>
													</optgroup>
													@endforeach --}}
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Ngày gửi công văn:</label>
												<input type="date" class="ngaygui_term"  name="receive" value="<?php echo date('Y-m-d');?>">
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Số hiệu:</label>
												<input type="text" class="so_hieu" name="receive" value="">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Ghi chú:</label>
										<input type="text" class="form-control" id="ghichu_term" name="Note">
									</div>


									<div class="form-group">
										<label>Đính kèm tệp:</label>
										<input id="ckfinder-input-1" name="file" type="text" class="form-control" >
										<br>
										<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">
									</div>
									<button type="submit" class="btn btn-primary">GỬI CÔNG VĂN</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
