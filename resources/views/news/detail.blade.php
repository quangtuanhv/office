@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 toppad page-header">
			<h1>{{$news->title}}</h1>
			Đăng bởi: {{$news->user->profile->fullname}}
			<span><i class="fa fa-clock-o fw">  {{$news->updated_at}}</i></span>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-10" >
			{!!$news->content!!}
			@if($news->file!=null)
			Tải về
			<a href="{{route('download',$news->file)}}">File đính kèm</a>
			@endif
		</div>
		<div class="col-md-1"></div>
	</div>
	<!-- /.row -->
	<div class="col-lg-12">
		<h1 class="page-header">
			<small>Phản hồi</small>
		</h1>
		<div class="container-fluid">
			<div class="row">
				@foreach($cmt as $cmt)
				<div class="col-lg-10">
					<div class="panel panel-white post panel-shadow">
						<div class="post-heading">
							<div class="pull-left image">
								<img src="{{$cmt->user->profile->avatar}}" class="img-circle avatar" alt="user profile image">
							</div>
							<div class="pull-left meta">
								<div class="title h5">
									<a href="#"><b>{{$cmt->user->profile->fullname}}</b></a>

								</div>
								<h6 class="text-muted time">{{$cmt->created_at}}</h6>
							</div>
						</div>
						<div class="post-description">
							<p>{{$cmt->content}}</p>

						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div id="post_cmt"></div>
		</div>
		<div class="col-lg-10">
			<textarea style="width: 100%; height: 50px" id="noidung" ></textarea><br>
			<button style="float: right;" class="btn btn-success" id="comment">Bình luận</button>
		</div>
	</div>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#comment").click(function(){

			var noidung = $("#noidung").val();
			var id_post = {{$news->id}};
			var url = "{{asset('xulyComment')}}";

			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url:url,
				type:"get",
				data: {'noidung':noidung,'id_post':id_post},
				async:true,
				success:function(data){
					$("#post_cmt").after(data);
				}
			})
			document.getElementById("noidung").value="";
		});
	});

</script>
@endsection
