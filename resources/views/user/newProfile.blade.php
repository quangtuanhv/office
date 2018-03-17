@extends('master.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <i class="fa fa-user"></i>
                    Cập nhật thông tin cá nhân
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-md-6" style="padding-bottom:120px">

                <form action="{{route('updateProfile',$acc->id)}}" method="POST">

                   <input type="hidden" name="_token" value="{{ csrf_token() }}">

                   <div class="form-group">
                    <label>Họ và tên:</label>
                    <input type="text" class="form-control" name="fullname"/>
                </div>
                <div class="form-group">
                    <label>Đơn vị</label>
                    <select class="form-control" name="donVi_id">
                        @foreach($donVi as $dv)
                        <option value="{{$dv->id}}">{{$dv->tenDonVi}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Chức vụ</label>
                    <select class="form-control" name="chucVu_id">
                        @foreach($chucVu as $cv)
                        <option value="{{$cv->id}}">{{$cv->tenChucVu}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Quyền</label>
                    <select class="form-control" name="role_id">
                        @foreach($role as $l)
                        <option value="{{$l->id}}">{{$l->nameRole}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Số điện thoại:</label>
                    <input type="text" class="form-control" name="phone" />
                </div>
                 <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" />
                </div>
                <div class="form-group">
                    <label>Ảnh đại diện:</label>
                    <input id="ckfinder-input-1" name="avatar" type="text" class="form-control" value="/ckfinder/userfiles/images/avartar/Male-Avatar.png">
                    <br>
                    <input type="button" value="upload" id="ckfinder-popup-1" class="button-a button-a-background">

                </div>
                <div class="form-group">
                    <label>Địa chỉ:</label>
                    <textarea  class="form-control" name="address">Quảng Nam</textarea>
                </div>
                <div class="form-group">
                    <label>Ghi chú:</label>
                    <textarea class="form-control" name="note" ></textarea>
                </div>
                <div class="form-group">
                    <label>Giới tính:</label>
                    <label class="radio-inline">
                        <input name="gender" value="0" checked="" type="radio">Nam
                    </label>
                    <label class="radio-inline">
                        <input name="gender" value="1" type="radio">Nữ
                    </label>
                </div>
            <button type="submit" class="btn btn-default">Cập nhật</button>
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div>
</div>
<script type="text/javascript">
    var button1 = document.getElementById( 'ckfinder-popup-1' );

    button1.onclick = function() {
        selectFileWithCKFinder( 'ckfinder-input-1' );
    };

    function selectFileWithCKFinder( elementId ) {
        CKFinder.modal( {
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                    var file = evt.data.files.first();
                    var output = document.getElementById( elementId );
                    output.value = file.getUrl();
                } );

                finder.on( 'file:choose:resizedImage', function( evt ) {
                    var output = document.getElementById( elementId );
                    output.value = evt.data.resizedUrl;
                } );
            }
        } );
    }
</script>

@endsection
