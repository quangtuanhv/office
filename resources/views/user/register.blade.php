<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Quang Tuan Vo">

    <title>E-office</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <!-- jQuery -->


 <script src="admin/bower_components/jquery/dist/jquery-3.3.1.min.js"></script>
  <script src="admin/bower_components/jquery/dist/jquery.validate.min.js"></script>
    <style>
    form{
        width: 300px;
        margin: auto;
    }
    form input{
        margin-bottom: 10px;
    }
    label.error{
        color: #c0392b;
    }
</style>
</head>

<body>

    <form method="post" action="{{route('dangky')}}" id="form-register">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <h2>Đăng ký</h2>
        <input type="text" name="name" id="username" placeholder="Username" class="form-control" autofocus="autofocus" />
        <input type="password" name="password" id="password" placeholder="Password" class="form-control" value="123456" />
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Re-password" class="form-control" value="123456" />

        <button class="btn btn-lg btn-primary btn-block">Đăng kí</btn>
    </form>
        <!-- end slide -->


        <!-- Bootstrap Core JavaScript -->
        <script src="admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="dist/js/sb-admin-2.js"></script>
        <script type="text/javascript">
            $("#form-register").validate({
                rules:{
                    name:{
                        required:true,
                        minlength:3,
                        // remote:{
                        //     url:"{{Asset('check/check-username')}}",
                        //     type:"POST"
                        // }
                    },
                    password:{
                        required:true,
                        minlength:6
                    },
                    password_confirmation:{
                        equalTo:"#password"
                    },
                    // email:{
                    //     required:true,
                    //     email:true,
                    //     // remote:{
                    //     //     url:"{{Asset('check/check-email')}}",
                    //     //     type:"POST"
                    //     // }
                    // }
                },
                messages:{
                    name:{
                        required:"Vui lòng nhập username",
                        minlength:"Phải nhập 3 kí tự trở lên",
//                        remote:"Username đã tồn tại"
                    },
                    password:{
                        required:"Vui lòng nhập mật khẩu",
                        minlength:"Mật khẩu phải 6 kí tự trở lên",
                    },
                    password_confirmation:{
                        equalTo:"Mật khẩu xác nhận không đúng"
                    },
  //                   email:{
  //                       required:"Vui lòng nhập email",
  //                       email:"Không dúng định dạng email",
  // //                      remote:"Email này đã tồn tại"
  //                   }
                }
            })
        </script>

    </body>

    </html>
