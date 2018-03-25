@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Sửa công việc
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div id="data" style="margin: 10px;" >
								<form action="{{route('editWork',$work->id)}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Tiêu đề:</label> <br>
										<input type="text" class="form-control" name="title"
										value="{{$work->title}}" />
									</div>
									<div class="form-group">
										<label>Nội dung:</label> <br>
										<textarea name="content" class="form-control " id="editor1">{{$work->content}}</textarea>
									</div>
									<div class="form-group">
										<label>Đính kèm tệp:</label> <br>
										<input id="ckfinder-input-1" name="file" type="text" class="form-control" value="{{$work->file}}">
										<br>
										<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">

									</div>
									<div class="form-group">

									</div>
									<div class="form-group">
										<label>Ngày nhận:</label> <br>
										<input type="date" name="receive" id="day_1" value="{{$work->receive_date}}">
									</div>
									<div class="form-group">
										<label>Ngày hết hạn:</label> <br>
										<input type="date" name="deadline" id="day_2" value="{{$work->deadline}}" onchange="CheckDay()">
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
												<option value="{{$work->profile->id}}">{{$work->profile->fullname}}</option>
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

<script type="text/javascript">
	var button1 = document.getElementById( 'ckfinder-popup-1' );

	button1.onclick = function() {
		selectFileWithCKFinder( 'ckfinder-input-1' );
	};

	function selectFileWithCKFinder( elementId ) {
		CKFinder.modal( {
			chooseFiles: true,
			width: 800,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
				} );
			}
		} );
	}
</script>
@endsection
