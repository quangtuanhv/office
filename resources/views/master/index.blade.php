<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="author" content="Quang Tuan Vo"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Office</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"/>
{{-- 
    
    <link href="{{asset('admin/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    --}}    <!-- Custom CSS -->
    <link href="{{asset('admin/dist/css/sb-admin-2.css')}}" rel="stylesheet"/>
    <link href="{{asset('admin/dist/css/menu.css')}}" rel="stylesheet"/>
    <!-- Custom Fonts -->
    <link href="{{asset('admin/bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>

    <!-- DataTables CSS -->
    <link href="{{asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet"/>
    {{--  --}}
    <link rel="stylesheet" href="{{asset('/css/terms.css')}}"/>
    <!-- DataTables Responsive CSS -->
    <link href="{{asset('admin/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/profile.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/footer.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/scroll.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/css.css')}}"/>

    <script src="{{asset('admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('js/notify.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('fancybox/dist/jquery.fancybox.min.css')}}" media="screen" />
    <script type="text/javascript" src="{{asset('fancybox/dist/jquery.fancybox.min.js')}}"></script>
</head>

<body>
    {{-- <div id="wrapper"> --}}

<div class="page-wrap">
  
        <!-- Navigation -->
        @include('master.header')
        <!-- Page Content -->
        <button id="menu-toggle"></button>
        @yield('content')
        <!-- /#page-wrapper -->
        <br>
        @include('master.footer')
    </div>
    <!-- /#wrapper -->
</div>
    <!-- jQuery -->


    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('admin/bower_components/metisMenu/dist/metisMenu.min.js')}}"></script>
    {{--  --}}
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('/admin/dist/js/sb-admin-2.js')}}"></script>
    <script src="{{asset('/admin/dist/js/menu.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{url('tinymce/jquery.tinymce.min.js')}}"></script>
    <script src="{{url('tinymce/tinymce.min.js')}}"></script>
    <script type="text/javascript"> 
     $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });      
    });
     
</script>
<script>
    tinymce.init({
        selector: "#ckview",theme: "modern"/*,width: 880,height: 300*/,
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true ,

        external_filemanager_path:"{{url('tinymce/filemanager')}}/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "{{url('tinymce')}}/filemanager/plugin.min.js"}
    });
</script>
<script src="{{asset('/admin/dist/js/filemanager.js')}}"></script>
</body>
</html>
