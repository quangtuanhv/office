@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >
				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Tạo thể loại văn bản
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div id="data" style="margin: 10px;" >
								<form action="{{url('tao-the-loai-van-ban',Auth::id())}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label>Tên thể loại văn bản:</label>
										<input type="text" class="form-control" name="tenloaivanban"
										required />
									</div>
									<div class="form-group">
										<label>Tên viết tắt:</label>
										<input type="text" class="form-control" name="tenviettat"
										required />
									</div>
									<input type="submit" class="btn btn-primary" value="LƯU SỔ">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
