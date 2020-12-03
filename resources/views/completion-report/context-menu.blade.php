<div class="dropdown">
    <button class="btn btn-link pl-0 pr-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="menu-icon mdi mdi-dots-vertical"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('admin.completion-report.periods', ['id' => $id]) }}" data-id="{{$id}}">@lang('Update completion')</a>
        {{-- <a class="dropdown-item" href="#" data-id="{{$id}}">Delete</a> --}}
    </div>
</div>