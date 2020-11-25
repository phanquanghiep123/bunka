@hook('ReplaceLanguage', true)
<div class="dropdown">
    <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="menu-icon mdi mdi-dots-vertical"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        @if($_SEFF->checkUserAllowAction('update'))
            @if($status->options < 2 || $status->options > 3)
            	<a class="dropdown-item action-edit" href="{{route($_SEFF->_ROUTE_FIX . '.edit',$id)}}"><i class="menu-icon mdi mdi-pencil" aria-hidden="true"></i> _edit_</a>
            @endif
        @endif
        @if($_SEFF->checkUserAllowAction('view'))
            <a class="dropdown-item action-edit" href="{{route($_SEFF->_ROUTE_FIX . '.view',$id)}}"><i class="menu-icon mdi mdi-eye" aria-hidden="true"></i> _view_</a>
        @endif
        @if($_SEFF->checkUserAllowAction('add'))
           <a class="dropdown-item" href="{{route($_SEFF->_ROUTE_FIX . '.copy',$id)}}"><i class="menu-icon mdi mdi-content-copy" aria-hidden="true"></i> _copy_</a>
        @endif
        @if($status->options > 1 && $status->options < 4)
            @if($_SEFF->checkUserAllowAction('add',$_SEFF->OrDerID))
            	@if($status->options == 2 )
            		<a class="dropdown-item" href="{{route($_SEFF->_ROUTE_FIX . '.createdorder',$id)}}"><i class="menu-icon mdi mdi-plus" aria-hidden="true"></i> _create_order_</a>
            	@endif
            @endif
            @if($status->options == 3 || $status->options == 2)
                @if($_SEFF->checkUserAllowAction('add'))
                    <a class="dropdown-item" href="{{route($_SEFF->_ROUTE_FIX . '.reversion',$id)}}"><i class="menu-icon mdi mdi-file-tree" aria-hidden="true"></i> [_reversion_]</a> 
                @endif
        	@endif       
        @endif
        @if($_SEFF->checkUserAllowAction('delete'))
            @if($status->options < 2 || $status->options > 3)
            	<a class="dropdown-item action-delete" href="{{route($_SEFF->_ROUTE_FIX . '.destroy',$id)}}"  data-id="{{$id}}"><i class="menu-icon mdi mdi-delete" aria-hidden="true"></i> _delete_</a>
        	@endif
        @endif
    </div>
</div>
@endhook