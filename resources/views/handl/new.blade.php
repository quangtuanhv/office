@extends('master.index')
@section('content')

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
			<h1 class="page-header">Đăng tin nội bộ
				<small>Hội nông dân tỉnh Quảng Nam</small>
			</h1>
		</div>
			<div class="col-lg-12 col-lg-offset-0 toppad" >
					
					<div class="panel-body">
						<div class="row">
							<div id="data">
								<form action="{{url('posthandl',Auth::id())}}" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">

								</div>
								<div class="form-group">
									<label>Nội dung:</label>
									<textarea name="content" class="form-control " id="editor1" required="required"></textarea>
								</div>
								<div class="form-group">
									<label>Đính kèm tệp:</label>
									{{-- <input id="ckfinder-input-1" name="file" type="text" class="form-control" >
									<br>
									<input type="button" value="Chọn tệp đính kèm" id="ckfinder-popup-1" class="button-a button-a-background"> --}}
									<div class="input-append">
										<input id="fieldID2" name="file" type="text">
										<a href="{{asset('tinymce/filemanager/dialog.php?type=2&field_id=fieldID2&relative_url=1')}}" class="btn iframe-btn" type="button">Chọn tệp đính kèm</a>
									</div>

								</div><label for="">Người nhận:</label>
								<div class="form-group" id="scroll">
									
									<div class="row">
										@foreach($user as $user)
										<div class="col-md-3">
											<input type="checkbox" name="nguoinhan[]" value="{{$user->id}}">{{$user->fullname}}
											<br>
											<br>
										</div>
										@endforeach
									</div>
								</div>
								<div class="form-group">
									<label>Ghi chú:</label>
									<input name="note" type="text" class="form-control" >
								</div>
								<button type="submit" class="btn btn-default">Tạo việc</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- <script type="text/javascript">

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});

</script> --}}
@endsection