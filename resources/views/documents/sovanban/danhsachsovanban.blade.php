@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-10">
				<h1 class="page-header">
					<small>Sổ văn bản</small>
					@if(Auth::user()->profile->donVi_id==2)
					<small style="float: right;"><a href="{{url('tao-so-van-ban')}}" class="btn btn-default">Tạo mới sổ văn bản</a></small>
					@endif
				</h1>
				
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>STT</th>
						<th>Tên sổ văn bản</th>
						<th>Tên viết tắt</th>
						<th>Năm lưu trữ</th>
						<th>Loại</th>
					</tr>
				</thead>
				<tbody><!-- {{$i=1}}-->
					@foreach($svb as $cv)
					<tr class="odd gradeX" align="center">
						<td>{{$i,$i++}}</td>

						<td><a href="{{url('danh-sach-van-ban',$cv->id)}}">{{$cv->tensovanban}}</a></td>

						<td>{{$cv->tenviettat}}</td>

						<td>{{$cv->namluutru}}</td>

						<td>{{$cv->loaivanban}}</td>
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
