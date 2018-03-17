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
						<th>Gửi tin nhắn</th>

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
						<td class="center"><i class="fa fa-info fa-fw"></i><a href="{{route('detail',$user->id)}}"> Chi tiết</a></td>
						<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('tinnhan',$user->id)}}">Gửi tin nhắn</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
@endsection
