@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1 toppad" >

			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">
						Sửa lịch công tác
					</h1>
				</div>
				<div class="panel-body">
					<div class="row">
						<div id="data">
							<form style="margin-left: 10px;" action="{{url('save-edit-task',$task->id)}}" method="post" >
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Nội dung:</label>
									<input type="text" class="form-control" name="content" value="{{$task->content}}"
									required="required" />
								</div>
								<div class="form-group">
										<label>Thời gian:</label><br>
										<input type="time" name="gio" value="<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
echo date('H:i');
?>">
										<input type="date" name="ngay" value="<?php echo date('Y-m-d');?>">
									</div>
								<div class="form-group">
									<label>Người chủ trì:</label><br>
									<select  name="nguoichutri" class=" form-control">
										@foreach($user as $user)
										<optgroup label="{{$user->donvi->tenDonVi}} - {{$user->chucvu->tenChucVu}}">
											<option value="{{$user->id}}">
												{{$user->fullname}}
											</option>
										</optgroup>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Địa điểm:</label><br>
									<input type="text" name="address" value="{{$task->address}}" required="required">
								</div>
								<div class="form-group">
									<label>Thành phần tham dự:</label><br>
									<input type="text" id="thanhphan"  name="thanhphan" value="{{$task->thanhphan}}"required="required">
								</div>
								<button class="btn btn-default">Lưu</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection