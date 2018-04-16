@extends('master.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header" style="color: red;"> <marquee  direction="left" scrollamount="3">Website Hội nông dân tỉnh Quảng Nam</marquee></h1> 
                <fieldset>
                    <div style="color: red;" class="form-group">
                        @if(session('done'))
                        {{session('done')}}
                        @endif
                    </div>
                </fieldset>
           
            <!-- /.col-lg-12 -->
            <div class="col-lg-4  home">
                <a href="{{url('showUser')}}">
                    <div class="super_menu">
                       Danh bạ <br>
                       <i class="fa fa-users fa-fw"></i>
                   </div>
               </a>
           </div>
           <div class="col-lg-4  home">
            <a href="{{url('hop-thu-den')}}">
                <div class="super_menu">
                    Hộp thư đến <br>
                    <i class="fa fa-wechat fa-fw" style="color: aqua;"></i>
                </div>
            </a>
        </div>
        <div class="col-lg-4  home">
            <a href="{{route('receive',Auth::id())}}">
                <div class="super_menu">
                  Công việc nhận <br>
                  <i class="fa fa-exchange fa-fw" style="color: darkblue;"></i>
              </div>
          </a>
      </div>
      <div class="col-lg-4  home">
         <a href="{{url('lich-cong-tac',Auth::id())}}">
            <div class="super_menu">
                Lịch công tác tuần <br>
                <i class="fa fa-calendar fa-fw" style="color: green;"></i>
            </div>
        </a>

    </div>
    <div class="col-lg-4  home">
     <a href="{{route('detail',Auth::id())}}">
        <div class="super_menu">
           Cá nhân <br>
           <i class="fa fa-user fa-fw" style="color: blue;"></i>
       </div>
   </a>
</div>
<div class="col-lg-4  home">
    <a href="{{url('van-ban-den')}}">
        <div class="super_menu">
            Văn bản đến <br>
            <i class="fa fa-file-text fa-fw" style="color: red;"></i>
        </div>
    </a>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
@endsection
