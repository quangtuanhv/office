@extends('master.index')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">

      <h1 class="page-header" style="color: red;"> <marquee  direction="left" scrollamount="3">Quản lý công văn Hội nông dân tỉnh Quảng Nam</marquee></h1> 
      <fieldset>
        <div style="color: red;" class="form-group">
          @if(session('done'))
          {{session('done')}}
          @endif
        </div>
      </fieldset>
      <div class="form-group">
        <!-- {{$i=0}} -->
        @foreach($check as $check)
        @if($check->hosophoihop->status==0)
        <!-- {{$i++}} -->
        @endif
        @endforeach
        @if($i>0)
        <a href="{{url('danh-sach-cong-viec')}}" style="color: red;" >
        Bạn có {{$i}} cuộc trao đổi công việc chưa hoàn thành
        </a>
        @endif
      </div>
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
      <a href="{{url('danh-sach-cong-viec')}}">
        <div class="super_menu">
          Trao đổi công việc <br>
          <i class="fa fa-wechat fa-fw" style="color: aqua;"></i>
        </div>
      </a>
    </div>
    <div class="col-lg-4  home">
      <a href="{{url('danh-sach-xu-ly-van-ban')}}">
        <div class="super_menu">
          Xử lý văn bản <br>
          <i class="fa fa-download fa-fw" style="color: darkblue;"></i>
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
   <a href="{{url('van-ban-den')}}">
    <div class="super_menu">
     Văn bản đến <br>
     <i class="fa fa-file-text fa-fw" style="color: blue;"></i>
   </div>
 </a>
</div>
<div class="col-lg-4  home">
  <a href="{{url('danh-sach-van-ban-di')}}">
    <div class="super_menu">
      Văn bản đi <br>
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
