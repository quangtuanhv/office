@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="row">
		<div class="col-lg-10 page-header">
			Đăng bởi: {{$cv->profile->fullname}}
			<span><i class="fa fa-clock-o fw">  {{$cv->updated_at}}</i></span>

		</div>
		<div class="col-lg-2 page-header">
		<a href="{{url('dong-cong-viec',$cv->id)}}" class="btn">Đóng công việc</a></div>
		</div>
		<label for="">Nội dung</label>
		{!!$cv->noidung!!}
		@if($cv->tepdinhkem!=null)
		Tải về
		<a href="{{route('download',$cv->tepdinhkem)}}">File đính kèm</a>
		@endif
	</div>
	<div class="col-lg-10">
		<h1 class="page-header">
			<small>Những người tham gia công việc</small>
		</h1>
		@foreach($member as $mb)
		<h5>&rarr; {{$mb->profile->fullname}}</h5>
		@endforeach
	</div>
	<div class="col-lg-10">
		<h1 class="page-header">
			<small>Phản hồi</small>
		</h1>


		<div class="container-fluid">
			@foreach($cmt as $cmt)
			<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-white post panel-shadow">
						<div class="post-heading">
							<div class="pull-left image">
								<img src="{{$cmt->profile->avatar}}" class="img-circle avatar" alt="user profile image">
							</div>
							<div class="pull-left meta">
								<div class="title h5">
									<a href="#"><b>{{$cmt->profile->fullname}}</b></a>

								</div>
								<h6 class="text-muted time">{{$cmt->created_at}}</h6>
							</div>
						</div>
						<div class="post-description">
							<p>{!!$cmt->ykien!!}</p>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<h1 class="page-header">
			<small>Nội dung phản hồi</small>
		</h1>
		<form action="{{url('post-cmt',$cv->id)}}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<textarea style="width: 100%; height: 50px" id="editor1" name="cmt" ></textarea><br>
			<button style="float: right;" class="btn btn-success">Phản hồi</button>
		</form>
	</div>
</div>
@endsection
