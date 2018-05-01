<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Quang Tuan Vo">

    <title>E-office</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Core CSS -->
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
    .app-login{
        background: url("../bg-login.jpg")  ;
        background-size: cover;

    }
    .center-form{
        margin-top: 100px;
    }
    .panel-heading {
        font-size: 25px;
        font-style: bold;
        text-align: center;
    }
</style>
</head>

<body class="app-login">
    <div class="container">
     @if (session('status'))
     <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4 col-md-offset-8">
            <div class="login-panel panel panel-default center-form">
                <div class="panel-heading">
                    <h3 class="panel-title">Vui Lòng Đăng Nhập</h3>

                </div>
                <div class="panel-body">

                    <form role="form" action="{{route('login')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <div style="color: red;" class="form-group">
                                @if(session('error'))
                                {{session('error')}}
                                @endif
                                @if(session('notification'))
                                {{session('notification')}}
                                @endif
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="name" type="text" id="name" autofocus>
                            </div>
                            <div class="form-group" id="name_error" style="color: red;"></div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" id="password" value="123456">
                            </div>

                            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-lg btn-success btn-block">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="admin/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="admin/dist/js/sb-admin-2.js"></script>

<script type="text/javascript">
   $(document).ready(function(){
    $("#name").blur(function(){
        var name = $(this).val();
        $.get("checkName",{name:name},function(data){
            $("#name_error").html(data);
        });
    });
});
</script>
</body>

</html>
