<div class="dropdown">
    <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="menu-icon mdi mdi-dots-vertical"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#" data-id="{{$FactoryCode}}"  data-toggle="modal" data-target="#modal-modify">@lang('Edit')</a>
        @if ($items_count === 0)
        <a class="dropdown-item btn-remove" href="#" data-id="{{$FactoryCode}}">@lang('Delete')</a>
        @endif
    </div>
</div>