@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 col-md-offset-0 toppad" >

			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">
						CÔNG VĂN ĐÊN
					</h1>
				</div>

				<div class="panel-body">
					<div class="row">
						<div id="data" style="margin: 10px;" >
							<form action="{{route('luuvanban',1)}}" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Tên công văn (Trích yếu):</label>
									<input type="text" class="form-control" name="trichyeu"
									required />
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Số hiệu:</label>
											<input type="text" class=" form-control" name="so" required>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Thể loại:</label>
											{{-- <input type="text" class="so_hieu" name="loai"> --}}
											<select name="loai" class="form-control" required>
												@foreach($tl as $tl)
												<option value="{{$tl->id}}">{{$tl->tenloaivanban}} ({{$tl->tenviettat}})</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Ngày ban hành:</label>
											<input type="date" class="form-control" name="ngaybanhanh" required>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Ngày đến:</label>
											<input type="date" class="form-control" name="ngayden" required>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Sổ văn bản :</label>

											<select name="sovanban" class="form-control" required>
												@foreach($svb as $svb)
												<option value="{{$svb->id}}">{{$svb->tensovanban}} {{$svb->loaivanban}} ({{$svb->namluutru}})</option>
												@endforeach
											</select>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Cơ quan ban hành:</label>
											<input type="text" class="form-control" name="coquanbanhanh" required>
										</div>

									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Người ký:</label>
											<input type="text" class="form-control" name="nguoiky" required>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
											<label>Chức vụ:</label>
											<input type="text" class="form-control" name="chucvu" >
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Đính kèm tệp:</label>
									<div class="input-append">
										<input id="fieldID2" name="tepdinhkem" type="text" required="required">
										<a href="{{asset('tinymce/filemanager/dialog.php?type=2&field_id=fieldID2&relative_url=1')}}" class="btn iframe-btn" type="button">Chọn tệp đính kèm</a>
									</div>
								</div>
								<div class="form-group">
									<label>Ghi chú:</label>
									<input type="text" class="form-control" id="ghichu_term" name="ghichu" >
								</div>
								<input type="submit" class="btn btn-primary" value="LƯU CÔNG VĂN">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('/admin/dist/js/chontep.js')}}"></script>
@endsection
