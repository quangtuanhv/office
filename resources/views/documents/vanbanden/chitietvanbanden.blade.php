@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row toppad">
		<div class="panel-heading">
			<h1 class="panel-title">
				Chi tiết văn bản số/ký hiệu: {{$doc->kihieu}}
			</h1>
		</div>
		<div class="panel-body">
			<table class="table table-bordered table-striped table-hover" center>
				<tbody  class="odd gradeX" >
					<tr>
						<td align="right">Về việc/trích yếu:</td>
						<td align="left">{{$doc->trichyeu}}</td>
					</tr>
					<tr>
						<td align="right">Phân loại:</td>
						<td align="left">{{$doc->loaivanban->tenloaivanban}}</td>
					</tr>
					<tr>
						<td align="right">Ngày ban hành:</td>
						<td align="left">{{$doc->ngaybanhanh}}</td>
					</tr>
					<tr>
						<td align="right">Đơn vị ban hành:</td>
						<td align="left">{{$doc->coquanbanhanh}}</td>
					</tr>
					<tr>
						<td align="right">Người ký:</td>
						<td align="left">{{$doc->nguoiky}}</td>
					</tr>
					<tr>
						<td align="right">Chức vụ:</td>
						<td align="left">{{$doc->chucvu}}</td>
					</tr>
					<tr>
						<td align="right">Ghi chú:</td>
						<td align="left">{{$doc->ghichu}}</td>
					</tr>
				</tbody>
			</table>
			<div class="row">
				<div class='col-md-6'>
					Tải về máy: <a href="{{route('download',$doc->tepdinhkem)}}">File đính kèm</a>
				</div>
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
									
									<div class="input-append">
										<input id="fieldID2" name="tepdinhkem" type="text">
										<a href="{{asset('../tinymce/filemanager/dialog.php?type=2&field_id=fieldID2&relative_url=1')}}" class="btn iframe-btn" type="button">Chọn tệp đính kèm</a>
									</div>
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
									<div class="input-append">
										<input id="fieldID" name="tepdinhkem" type="text">
										<a href="{{asset('../tinymce/filemanager/dialog.php?type=2&field_id=fieldID&relative_url=1')}}" class="btn iframe-btn" type="button">Chọn tệp đính kèm</a>
									</div>
								</div>

								<input type="submit" class="btn btn-primary" value="Xử lý">

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-md-offset-0 " >

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

					<td>Chỉnh sửa</td>

					<td>Xóa</td>

				</tr>

				@foreach($cxlvb as $cxlvb)
				<tr>
					<td>{{$cxlvb->updated_at}}</td>

					<td>{{$cxlvb->nguoigiao->profile->fullname}}</td>

					<td>{{$cxlvb->nguoinhan->fullname}}</td>

					<td>{{$cxlvb->ykienxuly}}</td>
					@if($cxlvb->tepdinhkem != null)
					<td><a href="{{route('download',$cxlvb->tepdinhkem)}}">File đính kèm</a></td>
					@else
					<td></td>
					@endif
					<td><a href="" >Sửa</a></td>
					<td><a href="">Xóa</a></td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>

</div>
<div class="col-md-12 col-md-offset-0 " >

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
					<td>{{$xlvb->updated_at}}</td>

					<td>{{$xlvb->profile->fullname}}</td>

					<td>{{$xlvb->quatrinhxuly}}</td>
					@if($xlvb->dinhkemtaptin != null)
					<td><a href="{{route('download',$xlvb->dinhkemtaptin)}}">File đính kèm</a></td>
					@else
					<td></td>
					@endif
				</tr>
				@endforeach

			</tbody>
		</table>
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
