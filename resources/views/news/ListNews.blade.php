@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					<small>Tin nội bộ</small>
				</h1>
			</div>
			@if(session('success'))
				<param class="kiemtra" value="true">
			@endif
			<!-- /.col-lg-12 -->
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<tr align="center">
						<th>STT</th>
						<th>Tiêu đề</th>
						<th>Người đăng</th>
						<th>Thời gian</th>
						<th>Chi tiết</th>

						<th>Sửa</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
					<!-- {{$i=1}}-->
					@foreach($post as $post)

					<tr class="odd gradeX" align="center">
						<td>{{$i,$i++}}</td>
						<td>{{$post->title}}</td>
						<td>{{$post->user->profile->fullname}}</td>
						<td>{{$post->created_at}}</td>
						<td class="center" ><i class="fa fa-info fa-fw" ></i><a href="{{route('detailNews',$post->id)}}">Chi tiết</a></td>

						<td class="center"><i class="fa fa-pencil fa-fw" ></i> <a href="{{url('edit-tin-tuc',$post->id)}}">Edit</a></td>
						<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var kt = $(".kiemtra").val();
		if (kt) {
		$.notify("Đăng bài thành công", "success");
		}
	});
</script>
@endsection
