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

	</div>
	<!-- /.container-fluid -->
</div>
<script>
	$(document).ready(function(){
		$("#check").change(function(){
			var status = $("#check").val();
			var url = "{{asset('getStatus')}}";
			var post_id = {{$work->id}};
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:url,
				type:"get",
				data: {'status':status,'post_id':post_id},
				async:true,
				success:function(data){
					alert(data);
				// $.noty("data","success");
				}
			})
		});
		$("#id_donvi").change(function(){
		var id_donvi = $("#id_donvi").val();
		var url = "{{asset('getPerson')}}";
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			url:url,
			type:"get",
			data: {'id_donvi':id_donvi},
			async:true,
			success:function(data){
				$("#user_receive").html(data);
			}
		})
		});
		$("#sendWork").click(function(){
			var id_user = $("#user_receive").val();
			var post_id = {{$work->id}};
			var url = "{{asset('sendto')}}"
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:url,
				type:"get",
				data: {'id_user':id_user,'post_id':post_id},
				async:true,
				success:function(data){
					alert(data);
				}
			})
		});
	});
</script>
@endsection
