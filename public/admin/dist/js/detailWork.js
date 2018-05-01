		$(document).ready(function(){
			$("#check").change(function(){
				var status = $("#check").val();
				var url = "{{asset('getStatus')}}";
				var post_id = {{$work->id}};
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url:url,
					type:"get",
					data: {'status':status,'post_id':post_id},
					async:true,
					success:function(data){
						alert(data);
				// $.noty("data","success");
			}
		})
			});
			$("#id_donvi").change(function(){
				var id_donvi = $("#id_donvi").val();
				var url = "{{asset('getPerson')}}";
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url:url,
					type:"get",
					data: {'id_donvi':id_donvi},
					async:true,
					success:function(data){
						$("#user_receive").html(data);
					}
				})
			});
			$("#sendWork").click(function(){
				var id_user = $("#user_receive").val();
				var post_id = {{$work->id}};
				var url = "{{asset('sendto')}}"
				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url:url,
					type:"get",
					data: {'id_user':id_user,'post_id':post_id},
					async:true,
					success:function(data){
						alert(data);
					}
				})
			});
		});