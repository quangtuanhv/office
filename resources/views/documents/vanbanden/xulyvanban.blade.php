@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Chi tiết văn bản số/ký hiệu: {{$check->document->so_van_ban}}
						</h1>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover">
							<thead class="odd gradeX" align="center">
								<tr>
									<th>Người chuyển</th>
									<th>Nội dung</th>
									<th>Người thực hiện</th>
									<th>File bổ sung</th>
									<th>Ghi chú	</th>
								</tr>
							</thead>
							<tbody >
								@foreach($doc as $doc)
								<tr>
									<td>{{$doc->profile->fullname}}
										<br>
										{{$doc->created_at}}
									</td>
									<td>{{$doc->noidungchuyen}}</td>
									<td>{{$doc->user->profile->fullname}}</td>
									<td>
										@if($doc->filedinhkem!=null)
										<a href="{{route('download',$doc->filedinhkem)}}">Tải về</a>
										@endif
									</td>
									<td>{{$doc->ghichu}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<a href="{{url('chi-tiet-cong-van-den',$check->id_congvan)}}" class="btn btn-info">Đến văn bản gốc</a>

						@if(Auth::id()==$doc->lanh_dao_xu_ly)
						<a href="{{url('tao-van-ban-tra-loi',$check->id_congvan)}}" class="btn btn-primary">Tạo văn bản trả lời</a>
						@endif
						@foreach($nv as $nv)
						@if(Auth::id()==$nv->nguoinhan)
						<a href="{{url('tao-van-ban-tra-loi',$check->id_congvan)}}" class="btn btn-primary">Tạo văn bản trả lời</a>
						@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('/admin/dist/js/chontep.js')}}"></script>
@endsection
