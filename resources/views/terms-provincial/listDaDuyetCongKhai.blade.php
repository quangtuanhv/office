@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					<small>Văn bản đã duyệt </small>
				</h1>
			</div>
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>STT</th>
						<th>Số/Ký hiệu</th>
						<th>Ngày tháng của văn bản</th>
						<th>Người yêu cầu</th>
						<th>Trạng thái</th>
						<th>Trích yếu</th>
						<th>Đơn vị tham mưu</th>
						<th>Chi tiết</th>
					</tr>
				</thead>
				<tbody><!-- {{$i=1}}-->
					@foreach($congvan as $cv)
					<tr class="odd gradeX" align="center">
						<td>{{$i,$i++}}</td>
						<td>{{$cv->symbol}}</td>
						<td>{{$cv->updated_at}}</td>
						<td>{{$cv->profile->fullname}}</td>
						<td>
						@if($cv->status==1)
						Chờ duyệt
						@elseif($cv->status==2)
						Đã duyệt
						@else($cv->status==3)
						Bỏ qua
						@endif
						</td>
						<td>{{$cv->title}}</td>
						<td>{{$cv->donVi->tenDonVi}}</td>
						<td class="center"><i class="fa fa-info fa-fw"></i><a href="{{url('chi-tiet-cong-van-da-duyet',$cv->id)}}">Chi tiết</a></td>
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
