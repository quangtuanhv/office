@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 page-header">
				<h1>{{$news->title}}</h1>
				Đăng bởi: {{$news->user->profile->fullname}}

			</div>
			{!!$news->content!!}
			@if($news->file!=null)
			<p>File đính kèm </p>
			<a href="{{route('download',$news->file)}}">xem </a>
			@endif
		</div>
		<!-- /.row -->
		<div class="col-lg-12">
			<h1 class="page-header">
				<small>Phản hồi</small>
			</h1>


			<div class="container">
				<div class="row">
					@foreach($cmt as $cmt)
					<div class="col-sm-8">
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
								{{-- <div class="stats">
									<a href="#" class="btn btn-default stat-item">
										<i class="fa fa-thumbs-up icon"></i>2
									</a>
									<a href="#" class="btn btn-default stat-item">
										<i class="fa fa-thumbs-down icon"></i>12
									</a>
								</div> --}}
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div id="post_cmt"></div>
			</div>
			<textarea style="width: 100%; height: 50px" id="noidung" ></textarea><br>
			<button style="float: right;" class="btn btn-success" id="comment">Bình luận</button>
		</div>
		<br>
		<br>
		<br>
	</div>
	<!-- /.container-fluid -->
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
