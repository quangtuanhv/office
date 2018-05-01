$(document).ready(function(){
	$("#thang").hide();
	$("#quy").hide();
	$("#rd1").click(function(event) {
		/* Act on the event */
		$("#thang").show(223);
		$("#quy").hide(234);
		$(".th").change(function(){
			$("#rd2").attr('disabled','disabled');
			$("#rd3").attr('disabled','disabled');
			$("#rd4").attr('disabled','disabled');
		});
	});
	$("#rd2").click(function(event) {
		/* Act on the event */
		$("#quy").show(223);$("#thang").hide(234);
		$(".q").change(function(){
			$("#rd1").attr('disabled','disabled');
			$("#rd3").attr('disabled','disabled');
			$("#rd4").attr('disabled','disabled');
		});
	});
	$("#rd3").click(function(event) {
		
		/* Act on the event */
	});
	$("#rd4").click(function(event) {

		/* Act on the event */
	});

});