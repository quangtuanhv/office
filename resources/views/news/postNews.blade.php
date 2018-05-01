@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-10 col-lg-offset-1 toppad" >
			<h1 class="page-header">Đăng tin nội bộ
			</h1>
			<div class="panel-body">
				<div class="row">
					<div id="data">
						<form action="{{route('postnews',Auth::id())}}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label>Tiêu đề:</label>
								<input type="text" class="form-control" name="title" required="required"/>
							</div>
							<div class="form-group">
								<label>Nội dung:</label>
								<textarea name="content" id="ckview" cols="30" rows="10" required="required"></textarea>
							</div>

							<div class="input-append">
								<input id="fieldID2" name="file" type="text">
								<a href="{{asset('../tinymce/filemanager/dialog.php?type=2&field_id=fieldID2&relative_url=1')}}" class="btn iframe-btn" type="button">Chọn tệp đính kèm</a>
							</div>
							<!-- <div class="form-group">
								<label>Đính kèm tệp:</label>
								<input id="ckfinder-input-1" name="file" type="text" class="form-control" >
								<br>
								<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background">
							</div> -->
							<button type="submit" class="btn btn-default">Đăng bài</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection