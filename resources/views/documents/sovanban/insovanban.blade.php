@extends('master.index')
@section('content')
<div class="container-fluid">
	<div class="row">
		<form action="{{url('create-file-word')}}" method="post">
			@csrf
			<div class="col-lg-10 col-lg-offset-1">
				<h1 class="page-header">
					<small>Lọc sổ văn bản</small>
				</h1>
				<div class="row">
					<div class="col-sm-1 form-group" style="padding: 0px;">
						<label>Tháng</label>
						<input type="radio" style="float: right;" id="rd1" value="thang" name="radio">
					</div>
					<div class="col-sm-2 form-group">
						<select name="nam" class="form-control">
							
							<option value="2018">2018</option>
							
						</select>
					</div>
					<div class="col-sm-9 form-group">
						<div class="row" id="thang">
							<div class="col-sm-1 form-group">
								1	<input type="radio" class="th" value="1" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								2	<input type="radio" class="th" value="2" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								3	<input type="radio" class="th" value="3" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								4	<input type="radio" class="th" value="4" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								5	<input type="radio" class="th" value="5" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								6	<input type="radio" class="th" value="6" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								7	<input type="radio" class="th" value="7" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								8	<input type="radio" class="th" value="8" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								9	<input type="radio" class="th" value="9" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								10	<input type="radio" class="th" value="10" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								11	<input type="radio" class="th" value="11" name="thang">
							</div>
							<div class="col-sm-1 form-group">
								12	<input type="radio" class="th" value="12" name="thang">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-1 form-group " style="padding: 0px;">
						<label>Quý </label>
						<input type="radio" style="float: right;" id="rd2" value="quy" name="radio">
					</div>
					<div class="col-sm-2 form-group">
						<select name="nam" class="form-control">
							<option value="2018">2018</option>
						</select>
					</div>
					<div class="row" id="quy">
						<div class="col-sm-1 form-group">
							I	<input type="radio" class="q" value="1" name="quy">
						</div>
						<div class="col-sm-1 form-group">
							II	<input type="radio" class="q" value="2" name="quy">
						</div>
						<div class="col-sm-1 form-group">
							III	<input type="radio" class="q" value="3" name="quy">
						</div>
						<div class="col-sm-1 form-group">
							IV	<input type="radio" class="q" value="4" name="quy">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-1 form-group " style="padding: 0px;">
						<label for="">Năm</label>	
						<input type="radio" style="float: right;" id="rd3" value="nam" name="radio">
					</div>
					<div class="col-sm-2 form-group">
						<select name="nam" class="form-control">
							<option value="2018">2018</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-1 form-group " style="padding: 0px;">
						<label for="">Tùy chọn</label>	
						<input type="radio" style="float: right;" id="rd4" value="tuychon" name="radio">
					</div>
					<div class="col-sm-3 form-group">
						<input type="date" class="form-control">
					</div>
					<div class="col-sm-1 form-group">
						<label>đến</label>
					</div>
					<div class="col-sm-3 form-group">
						<input type="date" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-10 col-lg-offset-1">
				<input type="submit" class="btn btn-lg btn-success" value="In sổ">
			</div>
		</form><div id="content">
		</div>
	</div>
</div>
<script type="text/javascript" src="{{asset('admin/dist/js/printdoc.js')}}">
</script>
@endsection