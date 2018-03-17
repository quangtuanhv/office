@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					<small>{{$work->title}}</small>
				</h1>
			</div>
			{!!$work->content!!}
			@if($work->file!=null)
			<p>File đính kèm </p>
			<a href="{{route('download',$work->file)}}">xem </a>
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
				</select>
				{{-- <label class="radio-inline">
					<input type="radio" name="status" id="check_1" value="1" checked >Chưa hoàn thành
				</label>
				<label class="radio-inline">
					<input type="radio" name="status" value="2" id="check_2">Đã hoàn thành
				</label>
				<label class="radio-inline">
					<input type="button" name="status" value="xác nhận" id="check_2">
				</label> --}}
			</form>
		</div>
		<div class="col-lg-12">
			<h1 class="page-header">
				<small>Chuyển tiếp công việc</small>
			</h1>
		</div>

	</div>
	<!-- /.container-fluid -->
</div>
@endsection
