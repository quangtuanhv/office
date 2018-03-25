@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Chi tiết văn bản số/ký hiệu: {{$vb->symbol}} {{$vb->lever}}
						</h1>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover">
							<tbody  class="odd gradeX" align="center">
								<tr>
									<td>Về việc/trích yếu:</td>
									<td>{{$vb->title}}</td>
								</tr>
								<tr>
									<td>Ngày ban hành:</td>
									<td>{{$vb->updated_at}}</td>
								</tr>
								<tr>
									<td>Đơn vị tham mưu</td>
									<td>{{$vb->donvi->tenDonVi}}</td>
								</tr>
								<tr>
									<td>Người ký duyệt</td>
									<td>Đang chờ</td>
								</tr>
								<tr>
									<td>Đơn vị ban hành</td>
									<td>{{$vb->user->profile->donVi->tenDonVi}}</td>
								</tr>
								<tr>
									<td>Ghi chú</td>
									<td><input type="text" style="width: 100%" id="noteWithDocument"></td>
								</tr>
							</tbody>

						</table>
						Tải về máy: <a href="{{route('download',$vb->file)}}">File đính kèm</a>
						<div class="row">
							<div class="col-lg-4"></div>
							<div class="col-lg-6">
								<select id="doneDocument"  class="form-control">
									<option value="2">Đã duyệt và công khai</option>
									<option value="3">Đã duyệt và bỏ qua</option>
								</select>
							</div>
							<div class="col-lg-2">
								<button class="btn btn-success" id="btn">Xác nhận</button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn").click(function(){
			var note = $("#noteWithDocument").val();
			var url = "{{asset('changeStatusDocument')}}";
			var redirect = "{{asset('cong-van-can-duyet-cap-tinh')}}";
			var status = $("#doneDocument").val();
			var id = {{$vb->id}};
			// alert(status);
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:url,
				type:"get",
				data: {'note':note,'status':status,'id':id},
				async:true,
				success:function(data){
					$.notify(data);
				// delay(200);
				// window.location.replace(redirect);

				}
			})
		});
	});
</script>
@endsection
