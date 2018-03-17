@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh bạ
					<small>Hội nông dân tỉnh Quảng Nam</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Tên</th>
						<th>Chức vụ</th>
						<th>Đơn vị</th>
						<th>Số điện thoại</th>
						<th>Email</th>
						<th>Chi tiết</th>
						
						{{-- <th>Xóa</th> --}}
					</tr>
				</thead>
				<tbody>
					@foreach($user as $user)
					<tr class="odd gradeX" align="center">
						<td>{{$user->id}}</td>
						<td>{{$user->fullname}}</td>
						<td>{{$user->chucVu->tenChucVu}}</td>
						<td>{{$user->donVi->tenDonVi}}</td>
						<td>{{$user->phone}}</td>
						<td>{{$user->email}}</td>
						<td class="center" ><i class="fa fa-info fa-fw" ></i><a  data-toggle="modal" data-target="#{{$user->id}}""> Chi tiết</a></td>
						{{-- <td class="center"><i class="fa fa-pencil fa-fw" ></i> <a href="{{route('updateProfile',$user->id)}}">Edit</a></td>
						<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td> --}}
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>

	<!-- /.container-fluid -->
	<!-- Modal -->
	@foreach($us as $user)
	<div id="{{$user->id}}" class="modal fade" role="dialog">
		<div class="modal-dialog modal-lg">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Thông tin cá nhân</h4>
				</div>
				<div class="modal-body">
					<div class="container">
						<div class="row">
							<div class="col-md-9 col-md-offset-0 toppad" >

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
										<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary" href="{{route('tinnhan',$user->id)}}"><i class="glyphicon glyphicon-envelope"></i></a>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>
	@endforeach
</div>
@endsection
