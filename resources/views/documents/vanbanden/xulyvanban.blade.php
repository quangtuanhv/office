@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-10">
				<h1 class="page-header">
					<small>Văn bản chờ xử lý </small>
				</h1>
				
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>STT</th>
						<th>Ngày giờ</th>
						<th>Người giao</th>
						<th>Người nhận</th>
						<th>Ý kiến xử lý</th>
						<th>Chi tiết</th>
						
					</tr>
				</thead>
				<tbody  class="odd gradeX" align="center">
					<!-- {{$i=1}}-->
					@foreach($search as $search)
					<tr>
						<td>{{$i,$i++}}</td>
						<td>{{$search->created_at}}</td>

						<td>{{$search->nguoigiao->profile->fullname}}</td>

						<td>{{$search->nguoinhan->fullname}}</td>

						<td>{{$search->ykienxuly}}</td>
						<td><a href="{{url('chi-tiet-cong-van-den',$search->id_vanban)}}">Xem</a></td>
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
