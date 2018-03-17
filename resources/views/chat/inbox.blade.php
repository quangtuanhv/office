@extends('master.index')
@section('content')
<div id="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-offset-0 toppad" >

				<div class="panel panel-info">
					<div class="panel-heading">
						<h1 class="panel-title">
							Hộp thư đến
						</h1>
					</div>
					<div class="panel-body">
						<div class="row">
							<div id="data">
								<div class="chat_left">

									@foreach($mess as $m)
									<a href="{{route('tinnhan',$m->user_1)}}">
										{{$m->user->profile->fullname}}</a>
									<br>
										{{$m->content}}
									<hr>

									@endforeach
{!! $mess->links() !!}
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection