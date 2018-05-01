<tr>
	<td>{{$cxlvb->updated_at}}</td>

	<td>{{$cxlvb->nguoigiao->profile->fullname}}</td>

	<td>{{$cxlvb->nguoinhan->fullname}}</td>

	<td>{{$cxlvb->ykienxuly}}</td>
	@if($cxlvb->tepdinhkem != null)
	<td><a href="{{route('download',$cxlvb->tepdinhkem)}}">File đính kèm</a></td>
	@else
	<td></td>
	@endif
	<td><a href="">Sửa</a></td>
	<td><a href="">Xóa</a></td>
</tr>