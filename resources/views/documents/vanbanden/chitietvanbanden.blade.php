@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Chi tiết văn bản số/ký hiệu: {{$doc->so_van_ban}}
						</h1>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover">
							<tbody  class="odd gradeX" align="center">
								<tr>
									<td>Về việc/trích yếu:</td>
									<td>{{$doc->trich_yeu}}</td>
								</tr>
								<tr>
									<td>Ngày ban hành:</td>
									<td>{{$doc->updated_at}}</td>
								</tr>
								<tr>
									<td>Đơn vị ban hành</td>
									<td>{{$doc->donVi->tenDonVi}}</td>
								</tr>
								<tr>
									<td>Ghi chú</td>
									<td>{{$doc->note}}</td>
								</tr>
							</tbody>
						</table>
						<div class="row">
							<div class='col-md-6'>
								Tải về máy: <a href="{{route('download',$doc->file)}}">File đính kèm</a>
							</div>
							@if(Auth::id()==$doc->lanh_dao_xu_ly)
							<div class='col-md-6'>
								<button id="btnsend" style="float: right;">Chuyển tiếp</button>
							</div>
							@else
							@foreach($nv as $nv)
							@if((Auth::id()==$nv->nguoinhan)or(Auth::id()==$doc->lanh_dao_xu_ly))
							<div class='col-md-6'>
								<button id="btnsend" style="float: right;">Chuyển tiếp</button>
							</div>
							@break
							@endif
							@endforeach
							@endif
						</div>
						<div class="row chuyentiep" style="margin: 7px">
							<form action="{{route('chuyen-tiep',$doc->id)}}" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label>Nội dung chuyển:</label>
									<input type="text" php artisan migrate:rollback --step=1 class="form-control" id="ghichu_term" name="noidungchuyen">
								</div>
								<div class="form-group">
									<label>Người nhận:</label>
									<select class="form-control" name="nguoi_nhan">
										@foreach($ten as $ten)
										<option value="{{$ten->id}}">{{$ten->fullname}}</option>
										@endforeach
									</select>
								</div>
								<div class="form-group">
									<label>Ghi chú:</label>
									<input type="text" class="form-control" id="ghichu_term" name="ghichu">
								</div>
								<div class="form-group">
									<label>Đính kèm tệp (nếu có):</label>
									<input id="ckfinder-input-1" name="taptin" type="text" class="form-control" >
									<br>
									<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">
								</div>
							<input type="submit" value="xác nhận" style="float: right;" class="btn btn-success">
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$(".chuyentiep").hide();
		$("button").click(function(){
			$(".chuyentiep").show(500);
			$("#btnsend").hide();
		});
	});
</script>
<script src="{{asset('/admin/dist/js/chontep.js')}}"></script>
@endsection
