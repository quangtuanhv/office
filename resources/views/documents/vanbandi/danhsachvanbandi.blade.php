@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10">
			<h1 class="page-header">
				<small>Danh sách văn bản  </small>
				@if(Auth::user()->profile->donVi_id==2)
				<small style="float: right;"><a href="{{url('tao-van-ban-di')}}" class="btn btn-default">Nhập công văn</a></small>
				@endif
			</h1>
			
		</div>
		<!-- /.col-lg-12 -->
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr align="center">
					<th>STT</th>
					<th>Số/Ký hiệu</th>
					<th>Ngày đến</th>
					<th>Trích yếu</th>
					<th>Đơn vị ban hành</th>
					<th>Chi tiết</th>
					<th>Tệp văn bản</th>
					<th>Xóa</th>
				</tr>
			</thead>
			<tbody><!-- {{$i=1}}-->
				@foreach($doc as $cv)
				<tr class="odd gradeX" align="center">
					<td>{{$i,$i++}}</td>
					<td>{{$cv->kihieu}}</td>
					<td>{{$cv->ngayden}}</td>
					<td>{{$cv->trichyeu}}</td>
					<td>{{$cv->coquanbanhanh}}</td>
					<td class="center"><i class="fa fa-info fa-fw"></i><a href="{{url('chi-tiet-cong-van-den',$cv->id)}}">Chi tiết</a></td>
					<td><a href="{{route('download',$cv->tepdinhkem)}}">Tải File</a></td>
					<td><a href="{{url('del-bai-viet',$cv->id)}}">xóa</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /.row -->
</div>
@endsection
