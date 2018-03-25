@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Chi tiết văn bản số/ký hiệu: {{$vb->symbol}} {{$vb->leve}}
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
									<td>{{$vb->profile->fullname}}</td>
								</tr>
								<tr>
									<td>Đơn vị ban hành</td>
									<td>{{$vb->user->profile->donVi->tenDonVi}}</td>
								</tr>
								<tr>
									<td>Ghi chú</td>
									<td>{{$vb->note}}</td>
								</tr>
							</tbody>

						</table>
						Tải về máy: <a href="{{route('download',$vb->file)}}">File đính kèm</a>
						{{-- <div class="row">
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
 --}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
