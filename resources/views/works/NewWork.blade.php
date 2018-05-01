@extends('master.index')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Tạo công việc mới
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div id="data" style="margin: 10px;" >
								<form action="{{route('postCV',Auth::id())}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Tiêu đề:</label> <br>
										<input type="text" class="form-control" name="title"
										/>
									</div>
									<div class="form-group">
										<label>Nội dung:</label> <br>
										<textarea name="content" class="form-control " id="editor1"></textarea>
									</div>
									<div class="form-group">
										<label>Đính kèm tệp:</label> <br>
										<div class="input-append">
											<input id="fieldID2" name="tepdinhkem" type="text" required="required">
											<a href="{{asset('tinymce/filemanager/dialog.php?type=2&field_id=fieldID2&relative_url=1')}}" class="btn iframe-btn" type="button">Chọn tệp đính kèm</a>
										</div>
									</div>
									<div class="form-group">

									</div>
									<div class="form-group">
										<label>Ngày nhận:</label> <br>
										<input type="date" name="receive" id="day_1" value="<?php echo date('Y-m-d');?>">
									</div>
									<div class="form-group">
										<label>Ngày hết hạn:</label> <br>
										<input type="date" name="deadline" id="day_2" value="<?php echo date('Y-m-d');?>" onchange="CheckDay()">
									</div>
									<div class="form-group">
										<center><strong> NƠI NHẬN VIỆC</strong> </center><br>
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

									</div>
									{{-- <div class="form-group">
										<label>Nơi nhận việc:</label> <br>

										<select  name = "user_id_receive">
											@foreach($user as $user)
											<optgroup label="{{$user->donvi->tenDonVi}} - {{$user->chucvu->tenChucVu}}">
												<option value="{{$user->id}}">
												{{$user->fullname}}</option>
											</optgroup>
											@endforeach
										</select>

									</div> --}}
									<button id="myBtn" type="submit" class="btn btn-success">Giao việc</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function(){
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
	});
</script>
@endsection
