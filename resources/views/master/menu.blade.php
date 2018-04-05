 <div class="navbar-default sidebar" role="navigation" >
 	<div class="sidebar-nav navbar-collapse">
 		<ul class="nav" id="side-menu">
 			{{-- <li class="sidebar-search">
 				<div class="input-group custom-search-form">
 					<input type="text" class="form-control" placeholder="Search...">
 					<span class="input-group-btn">
 						<button class="btn btn-default" type="button">
 							<i class="fa fa-search"></i>
 						</button>
 					</span>
 				</div>

 			</li> --}}
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
 				<a href="#"><i class="fa fa-file-text-o fa-fw"></i> Văn bản pháp luật</a>
 			</li>
 			<li>
 				<a href="#"><i class="fa fa-calendar fa-fw"></i> Lịch công tác<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">

 					<li>
 						<a href="{{url('lich-cong-tac',Auth::id())}}">Lịch công tác tuần cơ quan</a>
 					</li>
 					<li>
 						<a href="{{url('lich-cong-tac-don-vi',Auth::id())}}">Lịch công tác tuần đơn vị</a>
 					</li>
 				</ul>
 			</li>
 			<li>
 				<a href="#" ><i class="fa fa-exchange fa-fw"></i> Xử lý công việc<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">
 					@if((Auth::user()->profile->role->nameRole=='lever_3') or
 					(Auth::user()->profile->role->nameRole=='lever_2'))
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
 				<a href="#"><i class="fa fa-file-word-o fa-fw"></i> Văn bản tỉnh<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">
 					<li>
 						<a href="{{url('van-ban-den')}}">Văn bản đến</a>
 					</li>
 					<li>
 						<a href="{{url('cong-van-cap-tinh')}}">Văn bản đi </a>
 					</li>
 					<li>
 						<a href="{{url('danh-sach-xu-ly-van-ban')}}">Xử lý văn bản</a>
 					</li>
 				</ul>
 				<!-- /.nav-second-level -->
 			</li>
 			<li>
 				<a href="#"><i class="fa fa-file-word-o fa-fw"></i> Văn bản đơn vị<span class="fa arrow"></span></a>
 				<ul class="nav nav-second-level">
 					<li>
 						<a href="{{url('cong-van-can-duyet-cap-donvi',Auth::user()->profile->donVi_id)}}">Văn bản đến</a>
 					</li>
 					<li>
 						<a href="{{url('cong-van-cap-don-vi')}}">Văn bản đi</a>
 						</li>
 						<li>
 							<a href="{{url('cong-van-cap-don-vi-da-duyet')}}">Xử lý văn bản</a>
 						</li>
 					</ul>
 					<!-- /.nav-second-level -->
 				</li>
 				<li>
 					<a href="#"><i class="fa fa-file-word-o fa-fw"></i> Văn bản cá nhân<span class="fa arrow"></span></a>
 					<ul class="nav nav-second-level">
 						<li>
 							<a href="{{url('xu-ly-cong-van',1)}}">Gửi văn bản đến tỉnh</a>
 						</li>
 						<li>
 							<a href="{{url('xu-ly-cong-van',2)}}">Gửi văn bản đến đơn vị</a>
 						</li>
 						<li>
 							<a href="{{url('cong-van-da-gui',Auth::id())}}">Văn bản đã gửi</a>
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
