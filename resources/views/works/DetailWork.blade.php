@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<small>{{$work->title}}</small>
			</h1>
		</div>
		{!!$work->content!!}
		@if($work->file!=null)
		Tải về
		<a href="{{route('download',$work->file)}}">File đính kèm</a>
		@endif
	</div>
	<!-- /.row -->
	<div class="col-lg-12">
		<h1 class="page-header" >
			<small >Trạng thái:</small>
			<p id="status"></p>
			@if($work->status==1)
			<small>Chưa hoàn thành</small>
			@elseif($work->status==2)
			<small>Hoàn thành</small>
			@else($work->status==3)
			<small>Trễ hạn</small>
			@endif
		</h1>
		<form>
			<select class="form-control" id="check" name="status" >
				<option value="1">Chưa hoàn thành</option>
				<option value="2">Hoàn thành</option>
				<option value="3">Trễ hạn</option>
			</select>
		</form>
	</div>
	<div class="col-lg-12">
		<h1 class="page-header">
			<small>Ngày hết hạn:</small>
			<small>{{$work->deadline}}</small>
		</h1>
	</div>
	@if((Auth::user()->profile->role->nameRole=='lever_3')
		or
		(Auth::user()->profile->role->nameRole=='lever_2'))

		<div class="col-lg-12">
			<h1 class="page-header">
				<small>Chuyển tiếp công việc</small>
			</h1>
			<label>Đơn vị:</label><br>
			<select class="form-control" id="id_donvi" >
				<option value="">Chọn đơn vị</option>
				@foreach($dv as $dv)
				<option value="{{$dv->id}}">{{$dv->tenDonVi}}</option>
				@endforeach
			</select><br>
			<label>Tên:</label><br>
			<select class="form-control" name = "user_id_receive" id="user_receive" >
				<option value="">Chọn tên</option>
			</select><br>
			<button type="button" id="sendWork">Chuyển tiếp</button>
		</div>
		@endif
	</div>
<script type="text/javascript" src="{{asset('admin/dist/js/detailWork.js')}}"></script>
	@endsection
