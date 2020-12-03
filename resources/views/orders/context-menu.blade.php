@hook('ReplaceLanguage', true)
<div class="dropdown">
    <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="menu-icon mdi mdi-dots-vertical"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        @if(($_SEFF->checkUserAllowAction('update') || $_SEFF->checkUserAllowAction('add')) && $status->options == 4)
            <a class="dropdown-item" href="{{route('admin.completion-report.create', ['id' => $id])}}"  data-id="{{$id}}"><i class="menu-icon mdi mdi-plus" aria-hidden="true"></i> @lang('Update completion')</a>
        @endif
        @if($_SEFF->checkUserAllowAction('update'))
            @if($status->options < 2 || $status->options > 5)
                <a class="dropdown-item action-edit" href="{{route($_SEFF->_ROUTE_FIX . '.edit',$id)}}"><i class="menu-icon mdi mdi-pencil" aria-hidden="true"></i>  _edit_</a>
            @endif
            @if($status->options == 5)
                <a class="dropdown-item action-revenue" data-id="{{$id}}" href="javascript:;"><i class="menu-icon mdi mdi-chart-bar"  aria-hidden="true"></i>  [_update_revenue_]</a>
            @endif
        @endif
        @if($_SEFF->checkUserAllowAction('view'))
            <a class="dropdown-item action-edit" href="{{route($_SEFF->_ROUTE_FIX . '.view',$id)}}"><i class="menu-icon mdi mdi-eye" aria-hidden="true"></i> _view_</a>
            @if($_SEFF->checkUserAllowStatus(3) && $status->options == 3)
                <a class="dropdown-item action-edit" href="{{route($_SEFF->_ROUTE_FIX . '.startorder',$id)}}"><i class="menu-icon mdi mdi-run" aria-hidden="true"></i> [_start_order_]</a>
            @endif
        @endif
        
        @if($_SEFF->checkUserAllowAction('add',$_SEFF->ContractID))
            @if($status->options == 2)
                <a class="dropdown-item" href="{{route($_SEFF->_ROUTE_FIX . '.createcontract',['id' => $id])}}"  data-id="{{$id}}"><i class="menu-icon mdi mdi-plus" aria-hidden="true"></i> _create_contact_</a>
            @endif
        @endif
        @if($_SEFF->checkUserAllowAction('delete'))
            @if($status->options < 2 || $status->options > 4)
                <a class="dropdown-item action-delete" href="{{route($_SEFF->_ROUTE_FIX . '.destroy',$id)}}"  data-id="{{$id}}"><i class="menu-icon mdi mdi-delete" aria-hidden="true"></i> _delete_</a>
            @endif
        @endif
        @if($status->options == 4)
         <a class="dropdown-item" href="{{route($_SEFF->_ROUTE_FIX . '.winning_bidding',$id)}}"  data-id="{{$id}}"><i class="menu-icon mdi mdi-check-circle" aria-hidden="true"></i> [_winning_bidding_]</a>
        @endif
    </div>
</div>
@endhook