@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-10">
				<h1 class="page-header">
					<small>Thể loại văn bản</small>
					@if(Auth::user()->profile->donVi_id==2)
					<small style="float: right;"><a href="{{url('tao-the-loai-van-ban')}}" class="btn btn-default">Tạo mới thể loại văn bản</a></small>
					@endif
				</h1>
				
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>STT</th>
						<th>Thể loại văn bản</th>
						<th>Tên viết tắt</th>
					</tr>
				</thead>
				<tbody><!-- {{$i=1}}-->
					@foreach($tl as $tl)
					<tr class="odd gradeX" align="center">
						<td>{{$i,$i++}}</td>

						<td><a href="{{url('danh-sach-the-loai-van-ban',$tl->id)}}">{{$tl->tenloaivanban}}</a></td>

						<td>{{$tl->tenviettat}}</td>
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
