@hook('ReplaceLanguage', true)
<div class="dropdown">
    <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="menu-icon mdi mdi-dots-vertical"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item modal-edit" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.edit',$id)}}">_edit_</a>
        <a class="dropdown-item modal-delete" href="javascript:;" data-href="{{route($_SEFF->_ROUTE_FIX .'.delete',$id)}}">_delete_</a>
    </div>
</div>
@endhook