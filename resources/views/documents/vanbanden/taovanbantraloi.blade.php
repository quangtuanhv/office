@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Tạo văn bản trả lời công văn số: 
						</h1>
					</div>

					<div class="panel-body">
						<div class="row">
							<div id="data" style="margin: 10px;" >
								<form action="{{route('luuvanban',Auth::id())}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Tên Công văn:</label>
										<input type="text" class="form-control" name="trich_yeu"
										/>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Số hiệu:</label>
												<input type="text" class="so_hieu" name="so_van_ban">
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Thể loại:</label>
												<input type="text" class="so_hieu" name="loai">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Lĩnh vực:</label>
												<input type="text" class="so_hieu" name="linh_vuc">
											</div>
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Ngày hết hạn:</label>
												<input type="date" class="so_hieu" name="ngay_het_han">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Độ khẩn:</label>
										<select name="do_khan" class='form-control'>
											<option value="1">Bình thường</option>
											<option value="2">Gấp</option>
											<option value="3">Khẩn cấp</option>
										</select>
									</div>
									<div class="form-group">
										<label>Ghi chú:</label>
										<input type="text" class="form-control" id="ghichu_term" name="ghi_chu">
									</div>
									<div class="form-group">
										<label>Đính kèm tệp:</label>
										<input id="ckfinder-input-1" name="file" type="text" class="form-control" >
										<br>
										<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">
									</div>
									<input type="submit" class="btn btn-primary" value="GỬI CÔNG VĂN">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('/admin/dist/js/chontep.js')}}"></script>
@endsection
