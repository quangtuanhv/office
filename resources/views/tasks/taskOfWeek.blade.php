@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<small>Lịch công tác</small>
				@if($role->role->id=='1')
				<small style="float: right;">
					<a type="button" class="btn btn-primary" href="{{url('tao-moi-lich-cong-tac',0)}}">
						Tạo lịch công tác cơ quan
					</a>
				</small>
				@endif
			</h1>

		</div>
		<!-- /.col-lg-12 -->
		<table class="table table-striped table-bordered table-hover">
			<thead style="background-color:#9966ff ; color: white;">
				<tr align="center">
					<th>Thời gian</th>
					<th>Nội dung</th>
					<th>Thành phần</th>
					<th>Địa điểm</th>
					<th colspan="3">Chủ trì</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="background-color: #00bfff" colspan="7">Thứ hai</td>
				</tr>
				<!-- show task -->
				@foreach($t2 as $t2)
				<tr>
					<td>{{$t2->gio}}</td>
					<td>{{$t2->content}}</td>
					<td>{{$t2->thanhphan}}</td>
					<td>{{$t2->address}}</td>
					<td>{{$t2->profile->fullname}}</td>
					<td><a href="{{url('edit-task',$t2->id)}}">Sửa</a></td>
					<td><a href="{{url('xoa-lich-cong-tac',$t2->id)}}">Xóa</a></td>
				</tr>
				@endforeach
				<tr>
					<td style="background-color: #00bfff" colspan="7">Thứ ba</td>
				</tr>
				<!-- show task -->
				@foreach($t3 as $t3)
				<tr>
					<td>{{$t3->gio}}</td>
					<td>{{$t3->content}}</td>
					<td>{{$t3->thanhphan}}</td>
					<td>{{$t3->address}}</td>
					<td>{{$t3->profile->fullname}}</td>
					<td><a href="{{url('edit-task',$t3->id)}}">Sửa</a></td>
					<td><a href="{{url('xoa-lich-cong-tac',$t3->id)}}">Xóa</a></td>
				</tr>
				@endforeach

				<tr>
					<td style="background-color: #00bfff" colspan="7">Thứ tư</td>
				</tr>
				<!-- show task -->
				@foreach($t4 as $t4)
				<tr>
					<td>{{$t4->gio}}</td>
					<td>{{$t4->content}}</td>
					<td>{{$t4->thanhphan}}</td>
					<td>{{$t4->address}}</td>
					<td>{{$t4->profile->fullname}}</td>
					<td><a href="{{url('edit-task',$t4->id)}}">Sửa</a></td>
					<td><a href="{{url('xoa-lich-cong-tac',$t4->id)}}">Xóa</a></td>
				</tr>
				@endforeach

				<tr>
					<td style="background-color: #00bfff" colspan="7">Thứ năm</td>
				</tr>
				<!-- show task -->
				@foreach($t5 as $t5)
				<tr>
					<td>{{$t5->gio}}</td>
					<td>{{$t5->content}}</td>
					<td>{{$t5->thanhphan}}</td>
					<td>{{$t5->address}}</td>
					<td>{{$t5->profile->fullname}}</td>
					<td><a href="{{url('edit-task',$t5->id)}}">Sửa</a></td>
					<td><a href="{{url('xoa-lich-cong-tac',$t5->id)}}">Xóa</a></td>
				</tr>
				@endforeach

				<tr>
					<td style="background-color: #00bfff" colspan="7">Thứ sáu</td>
				</tr>
				<!-- show task -->
				@foreach($t6 as $t6)
				<tr>
					<td>{{$t6->gio}}</td>
					<td>{{$t6->content}}</td>
					<td>{{$t6->thanhphan}}</td>
					<td>{{$t6->address}}</td>
					<td>{{$t6->profile->fullname}}</td>
					<td><a href="{{url('edit-task',$t6->id)}}">Sửa</a></td>
					<td><a href="{{url('xoa-lich-cong-tac',$t6->id)}}">Xóa</a></td>
				</tr>
				@endforeach

				<tr>
					<td style="background-color: #00bfff" colspan="7">Thứ bảy</td>
				</tr>
				<!-- show task -->
				@foreach($t7 as $t7)
				<tr>
					<td>{{$t7->gio}}</td>
					<td>{{$t7->content}}</td>
					<td>{{$t7->thanhphan}}</td>
					<td>{{$t7->address}}</td>
					<td>{{$t7->profile->fullname}}</td>
					<td><a href="{{url('edit-task',$t7->id)}}">Sửa</a></td>
					<td><a href="{{url('xoa-lich-cong-tac',$t7->id)}}">Xóa</a></td>
				</tr>
				@endforeach

				<tr>
					<td style="background-color: #00bfff" colspan="7">Chủ nhật</td>
				</tr>
				<!-- show task -->
				@foreach($t8 as $t8)
				<tr>
					<td>{{$t8->gio}}</td>
					<td>{{$t8->content}}</td>
					<td>{{$t8->thanhphan}}</td>
					<td>{{$t8->address}}</td>
					<td>{{$t8->profile->fullname}}</td>
					<td><a href="{{url('edit-task',$t8->id)}}">Sửa</a></td>
					<td><a href="{{url('xoa-lich-cong-tac',$t8->id)}}">Xóa</a></td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
	<!-- /.row -->
</div>
@endsection
