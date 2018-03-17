@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Tin nhắn
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div id="data">
								<div class="text-center">
									<small>{!! $send->links() !!}</small>
								</div>
								@foreach($send as $send)
								<div class="chat">
								@if($send->user_1== Auth::id())
								<div class="chat_right">
								<h5>Tôi</h5>
								<p>{{$send->content}}</p>
								</div>

								@else
								<div class="chat_left">
								<h5>{{$info->fullname}}</h5>
								<p>{{$send->content}}</p>
								</div>
								@endif
								</div>
								@endforeach
							</div>
							<div>
								<form action="{{$info->user_id}}" method="POST">
									{{csrf_field()}}
									<br>
									<br>
									<textarea name="content" rows="5" style="width:100%"></textarea>
									<button type="submit" name="send">Send</button>
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