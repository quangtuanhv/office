@extends('master.index')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					<small>Công việc nhận</small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>ID</th>
						<th>Lãnh đạo giao việc</th>
						<th>Tên công việc</th>
						<th>Ngày giao</th>
						<th>Thời hạn báo cáo</th>
						<th>Chi tiết</th>
						<th>Trạng thái</th>
						<th>Sửa</th>
					</tr>
				</thead>
				<tbody>
					<!-- {{$i=1}}-->
					@foreach($work as $work)
					<tr class="odd gradeX" align="center">
						<td>{{$i,$i++}}</td>
						<td>{{$work->user->profile->fullname}}</td>
						<td>{{$work->title}}</td>
						<td>{{$work->receive_date}}</td>
						<td>{{$work->deadline}}</td>
						<td class="center" ><i class="fa fa-info fa-fw" ></i><a href="{{url('chi-tiet-cong-viec',$work->id)}}">Chi tiết</a></td>
						<td class="center">
							@if($work->status == 1)
							Chưa hoàn thành
							@elseif($work->status == 2)
							Đã hoàn thành
							@elseif($work->status == 3)
							Trễ hạn
							@endif
						</td>
						<td class="center"><i class="fa fa-trash-o  fa-fw"></i>
						@if ((Auth::user()->profile->role->nameRole=='lever_3') or
 						(Auth::id()==$work->user_id_send))
							<a href="{{url('edit-work',$work->id)}}">Edit</a></td>
						@else
							<a href="{{url('khong-du-quyen')}}">Edit</a></td>

						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>
@endsection
