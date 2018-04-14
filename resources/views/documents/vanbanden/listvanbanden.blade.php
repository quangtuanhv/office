@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-10">
				<h1 class="page-header">
					<small>Văn bản đến </small>
					@if(Auth::user()->profile->donVi_id==2)
					<small style="float: right;"><a href="{{url('tao-van-ban')}}" class="btn btn-default">Nhập công văn</a></small>
					@endif
				</h1>
				
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>STT</th>
						<th>Số/Ký hiệu</th>
						<th>Ngày hết hạn</th>
						<th>Đơn vị ban hành</th>
						<th>Trạng thái</th>
						<th>Trích yếu</th>
						<th>Chi tiết</th>
					</tr>
				</thead>
				<tbody><!-- {{$i=1}}-->
					@foreach($doc as $cv)
					<tr class="odd gradeX" align="center">
						<td>{{$i,$i++}}</td>
						<td>{{$cv->so_van_ban}}</td>
						<td>{{$cv->ngay_het_han}}</td>
						<td>{{$cv->donvi->tenDonVi}}</td>
						<td>
						@if($cv->trang_thai==1)
						Chờ duyệt
						@elseif($cv->trang_thai==2)
						Đang duyệt
						@elseif($cv->trang_thai==3)
						Đã duyệt
						@endif
						</td>
						<td>{{$cv->trich_yeu}}</td>
						<td class="center"><i class="fa fa-info fa-fw"></i><a href="{{url('chi-tiet-cong-van-den',$cv->id)}}">Chi tiết</a></td>
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
