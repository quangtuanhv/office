@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							GỬI CÔNG VĂN
						</h1>
					</div>

					<div class="panel-body">
						<div class="row">
							<div id="data" style="margin: 10px;" >
								<form action="{{route('save-document',$id)}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Tên Công văn:</label>
										<input type="text" class="form-control" name="title"
										/>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Đơn vị nhận công văn:</label>
												<select name="advisory" class=" form-control" >
												@foreach($dv as $dv)
													<option value="{{$dv->id}}">{{$dv->tenDonVi}}</option>
												@endforeach
												</select>
											</div>
											<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
												<label>Độ khẩn:</label>
												<select  name="urgent" class="do_khan form-control">
													<option value="1">Thường</option>
													<option value="2">Khẩn</option>
													<option value="3">Rất khẩn</option>
												</select>
											</div>

										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
												<label>Số hiệu:</label>
												<input type="text" class="so_hieu" name="symbol">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Ghi chú:</label>
										<input type="text" class="form-control" id="ghichu_term" name="note">
									</div>


									<div class="form-group">
										<label>Đính kèm tệp:</label>
										<input id="ckfinder-input-1" name="taptin" type="text" class="form-control" >
										<br>
										<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">
									</div>
									<input type="submit" class="btn btn-primary" value="GỬI CÔNG VĂN">
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
