@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10">
			<h1 class="page-header">
				<small>Danh sách công việc  </small>
			</h1>
		</div>
		<!-- /.col-lg-12 -->
		<table class="table table-striped table-bordered table-hover" >
			<thead>
				<tr align="center">
					<th>STT</th>
					<th>Tiêu đề</th>
					<th>Người soạn</th>
					<th>Ngày gửi</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="background-color: #00bfff" colspan="5">Công việc đã tạo</td>
				</tr>

				<!-- {{$i=1}}-->
				@foreach($check_1 as $cv)
				@if($cv->status==0)
				<tr class="odd gradeX" align="center">
					<td>{{$i,$i++}}</td>
					<td><a href="{{url('chi-tiet-trao-doi-cong-viec',$cv->id)}}">{!!$cv->noidung!!}</a></td>
					<td>{{$cv->profile->fullname}}</td>
					<td>{{$cv->created_at}}</td>
					<td><a href="{{url('xoa-cong-viec',$cv->id)}}">Xóa</a></td>
				</tr>
				@endif
				@endforeach
				<tr>
					<td style="background-color: #00bfff" colspan="5">Công việc được phân công</td>
				</tr>
				<!-- {{$j=1}}-->
				@foreach($check as $cvpc)
				@if($cvpc->hosophoihop->status==0)
				<tr class="odd gradeX" align="center">
					<td>{{$j,$j++}}</td>
					<td><a href="{{url('chi-tiet-trao-doi-cong-viec',$cvpc->hosophoihop->id)}}">{!!$cvpc->hosophoihop->noidung!!}</a></td>
					<td>{{$cvpc->hosophoihop->profile->fullname}}</td>
					<td colspan="2">{{$cvpc->hosophoihop->created_at}}</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.row -->
</div>
@endsection
