{{--  <a href="#menu" id="toggle" id="slide-menu"><span></span></a>
 --}} 
 <div class="navbar-default sidebar" role="navigation" id="menu">
 	<div class="sidebar-nav navbar-collapse">
 		<ul class="nav" id="side-menu">
 			
 			<li>
 				<a href="{{route('detail',Auth::id())}}" class="text-center">{{Auth::user()->profile->fullname}}</a>
 			</li>
 			<li>
 				<a href="{{url('/')}}"><i class="fa fa-dashboard fa-fw"></i>Trang chủ</a>
 			</li>
 			<li>
 				<a href="{{url('showUser')}}"><i class="fa fa-book fa-fw"></i> Danh Bạ</a>
 			</li>
 			<li>
 				<a href="#"><i class="fa fa-wechat fa-fw"></i> Tin nhắn<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">
 					<li>
 						<a href="{{route('listNews')}}">Tin nội bộ</a>
 					</li>
 					<li>
 						<a href="{{route('news',Auth::id())}}">Đăng tin nội bộ</a>
 					</li>
 					<li>
 						<a href="{{url('danhsachnhansu')}}">Gửi tin nhắn</a>
 					</li>
 					<li>
 						<a href="{{url('hop-thu-den')}}">Hộp thư đến</a>
 					</li>
 				</ul>
 				<!-- /.nav-second-level -->
 			</li>
 			<li>
 				<a href="#"><i class="fa fa-file-text-o fa-fw"></i> Trao đổi công việc nội bộ<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">

 					<li>
 						<a href="{{url('tao-cong-viec-trao-doi-noi-bo')}}">Tạo công việc</a>
 					</li>
 					<li>
 						<a href="{{url('danh-sach-cong-viec')}}">Xem công việc</a>
 					</li>
 				</ul>
 			</li>
 			<li>
 				<a href="#"><i class="fa fa-calendar fa-fw"></i> Lịch công tác<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">

 					<li>
 						<a href="{{url('lich-cong-tac',Auth::id())}}">Lịch công tác tuần cơ quan</a>
 					</li>
 					<li>
 						<a href="{{url('lich-cong-tac-ca-nhan')}}">Lịch công tác tuần cá nhân</a>
 					</li>
 				</ul>
 			</li>
 			<li>
 				<a href="#" ><i class="fa fa-exchange fa-fw"></i> Xử lý công việc<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">
 					@if((Auth::user()->profile->role->nameRole=='3') or
 					(Auth::user()->profile->role->nameRole=='2'))
 					<li>
 						<a href="{{route('newWork')}}">Tạo mới công việc</a>
 					</li>
 					<li>
 						<a href="{{route('send',Auth::id())}}">Công việc giao</a>
 					</li>
 					@endif
 					<li>
 						<a href="{{route('receive',Auth::id())}}">Công việc nhận</a>
 					</li>
 				</ul>
 				<!-- /.nav-second-level -->
 			</li>
 			<li>
 				<a href="#"><i class="fa fa-file-word-o fa-fw"></i> Văn bản <span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">
 					<li>
 						<a href="{{url('van-ban-den')}}">Văn bản đến</a>
 					</li>
 					<li>
 						<a href="{{url('danh-sach-van-ban-di')}}">Văn bản đi </a>
 					</li>
 					<li>
 						<a href="{{url('danh-sach-xu-ly-van-ban')}}">Xử lý văn bản</a>
 					</li>
 					<li>
 						<a href="{{url('so-van-ban')}}">Sổ văn bản</a>
 					</li>
 					<li>
 						<a href="{{url('loai-van-ban')}}">Loại văn bản</a>
 					</li>
 				</ul>
 				<!-- /.nav-second-level -->
 			</li>
 			
 			<li>
 				<a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">
 					<li>
 						<a href="{{route('detail',Auth::id())}}">Xem thông tin</a>
 					</li>
 					<li>
 						<a href="{{route('updateProfile',Auth::id())}}">Cập nhật thông tin</a>
 					</li>
 				</ul>
 				<!-- /.nav-second-level -->
 			</li>
 			<li>
 				<a href="{{url('so-do-to-chuc')}}"><i class="fa fa-sitemap fa-fw"></i> Sơ đồ tổ chức</a>
 			</li>
 			<li>
 				<a href="{{route('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
 			</li>
 		</ul>
 	</div>
 	<!-- /.sidebar-collapse -->
 </div>
