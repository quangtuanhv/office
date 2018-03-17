@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Thông tin cá nhân
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4 " align="center"> <img alt="User Pic" src="{{$user->avatar}}" class="img-circle" width="236" height="236">

							</div>
							<div class=" col-md-7 ">
								<table class="table table-user-information">
									<tbody>
										<tr>
											<td>Tên</td>
											<td>{{$user->fullname}}</td>
										</tr>
										<tr>
											<td>Đơn vị</td>
											<td>{{$user->donVi->tenDonVi}}</td>
										</tr>
										<tr>
											<td>Chức vụ</td>
											<td>{{$user->chucVu->tenChucVu}}</td>
										</tr>

										<tr>
											<tr>
												<td>Giới tính</td>
												<td>@if($user->gender)
													Nữ
													@else
													Nam
													@endif
												</td>
											</tr>
											<tr>
												<td>Địa chỉ</td>
												<td>{{$user->address}}</td>
											</tr>
											<tr>
												<td>Email</td>
												<td>{{$user->email}}</td>
											</tr>
											<td>Số điện thoại</td>
											<td>{{$user->phone}}
											</td>

										</tr>

									</tbody>
								</table>

							</div>
						</div>
					</div>
					<div class="panel-footer">
						<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
						<span class="pull-right">
							<a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
							<a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
						</span>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection