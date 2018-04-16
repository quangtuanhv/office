@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >
				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Chi tiết văn bản số/ký hiệu: {{$doc->kihieu}}
						</h1>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover">
							<tbody  class="odd gradeX" align="center">
								<tr>
									<td>Về việc/trích yếu:</td>
									<td>{{$doc->trichyeu}}</td>
								</tr>
								<tr>
									<td>Phân loại:</td>
									<td>{{$doc->loaivanban->tenloaivanban}}</td>
								</tr>
								<tr>
									<td>Ngày ban hành:</td>
									<td>{{$doc->ngaybanhanh}}</td>
								</tr>
								<tr>
									<td>Đơn vị ban hành</td>
									<td>{{$doc->coquanbanhanh}}</td>
								</tr>
								<tr>
									<td>Người ký</td>
									<td>{{$doc->nguoiky}}</td>
								</tr>
								<tr>
									<td>Chức vụ</td>
									<td>{{$doc->chucvu}}</td>
								</tr>
								<tr>
									<td>Ghi chú</td>
									<td>{{$doc->ghichu}}</td>
								</tr>
							</tbody>
						</table>
						<div class="row">
							<div class='col-md-6'>
								Tải về máy: <a href="{{route('download',$doc->tepdinhkem)}}">File đính kèm</a>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9 col-md-offset-0 toppad" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">
						Xử lý văn bản số/ký hiệu: {{$doc->kihieu}}
					</h1>
				</div>
				<div class="panel-body">
					<button type="button" class="btn btn-outline-primary btn-chuyenxuly">Chuyển xử lý văn bản</button>
					<button type="button" class="btn btn-outline-primary btn-xuly">Xử lý văn bản</button>

					<div class="panel-body">
						<div class="row">
							<div id="data" style="margin: 10px;" class="chuyenxuly" >
								<form action="{{route('chuyenvanban',$doc->id)}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Ý kiến xử lý:</label>
										<input type="text" class="form-control" name="ykienxuly"
										required />
									</div>
									
									<div class="form-group">
										<label>Đính kèm tệp:</label>
										<input id="ckfinder-input-1" name="tepdinhkem" type="text" class="form-control" >
										<br>
										<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">
									</div>
									
									<div class="form-group">
										<label>Người - Đơn vị nhận</label>
										<select class="form-control" name="nguoinhan">

											<option value="18huyen">18 Huyện thị</option>
											@foreach($user as $user)
											<option value="{{$user->id}}">{{$user->fullname}}</option>
											@endforeach
										</select>
									</div>
									<input type="submit" class="btn btn-primary" value="Chuyển xử lý">
									
								</form>
							</div><div id="data" style="margin: 10px;" class="xuly" >
								<form action="{{url('xu-ly-van-ban',$doc->id)}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Quá trình xử lý:</label>
										<input type="text" class="form-control" name="ykienxuly"
										required />
									</div>
									
									<div class="form-group">
										<label>Đính kèm tệp:</label>
										<input id="ckfinder-input-1" name="tepdinhkem" type="text" class="form-control" >
										<br>
										<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">
									</div>
									
									<input type="submit" class="btn btn-primary" value="Xử lý">
									
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-9 col-md-offset-0 toppad" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">
						Thông tin luân chuyển văn bản số/ký hiệu: {{$doc->kihieu}}
					</h1>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover">
						<tbody  class="odd gradeX" align="center">
							<tr>
								<td>Ngày giờ</td>
								
								<td>Người giao</td>

								<td>Người nhận</td>

								<td>Ý kiến xử lý</td>
								
								<td>File đính kèm</td>
								
							</tr>
							
							@foreach($cxlvb as $cxlvb)
							<tr>
								<td>{{$cxlvb->created_at}}</td>

								<td>{{$cxlvb->nguoigiao->profile->fullname}}</td>

								<td>{{$cxlvb->nguoinhan->fullname}}</td>

								<td>{{$cxlvb->ykienxuly}}</td>
								@if($cxlvb->tepdinhkem != null)
								<td><a href="{{route('download',$cxlvb->tepdinhkem)}}">File đính kèm</a></td>
								@else
								<td></td>
								@endif
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-9 col-md-offset-0 toppad" >
			<div class="panel panel-info">
				<div class="panel-heading">
					<h1 class="panel-title">
						Thông tin xử lý văn bản số/ký hiệu: {{$doc->kihieu}}
					</h1>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-bordered table-hover">
						<tbody  class="odd gradeX" align="center">
							<tr>
								<td>Ngày giờ</td>
								
								<td>Người xử lý</td>

								<td>Ý kiến xử lý</td>
								
								<td>File đính kèm</td>
								
							</tr>
							
							@foreach($xlvb as $xlvb)
							<tr>
								<td>{{$xlvb->created_at}}</td>

								<td>{{$xlvb->profile->fullname}}</td>

								<td>{{$xlvb->quatrinhxuly}}</td>
								@if($xlvb->tepdinhkem != null)
								<td><a href="{{route('download',$xlvb->tepdinhkem)}}">File đính kèm</a></td>
								@else
								<td></td>
								@endif
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".chuyenxuly").hide();
		$(".xuly").hide();
		$(".btn-chuyenxuly").click(function() {
			$(".chuyenxuly").show('slow/4000/fast');
			$(".xuly").hide();
		});
		$(".btn-xuly").click(function() {
			$(".xuly").show('slow/4000/fast');
			$(".chuyenxuly").hide();
		});	
	});

</script>
<script src="{{asset('/admin/dist/js/chontep.js')}}"></script>
@endsection
