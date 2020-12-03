@extends('layouts.app')

@section('content')
<h4 class="mb-3">@lang('Exporting Item Price')</h4>
<div class="row mb-4">
  <div class="col-12">
      <a href="{{route('admin.item-price.export')}}" class="btn btn-secondary" title="@lang('Download item prices')"><i class="menu-icon mdi mdi-file-excel"></i> @lang('Download / Exporting Data')</a>
  </div>
</div>
<h4 class="mb-3">@lang('Importing Item Price')</h4>
<div class="row">
  <div class="col-12">
    <form action="{{route('admin.item-price.importing')}}" method="POST" enctype="multipart/form-data">
      @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
      @endif
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      @csrf
      <div class="form-row">
        <div class="form-group col">
          <label for="importing_file">Excel File</label>
          <input class="form-control pt-2 pb-2" type="file" name="importing_file" id="importing_file">
          <small id="passwordHelpBlock" class="form-text text-muted">
            @lang('Accept only xls and xlsx.')
          </small>
        </div>
        <div class="form-group col">
          <label for="validDate">Valid Date</label>
          <input type="date" class="form-control" name="valid_date" id="validDate">
          <small id="passwordHelpBlock" class="form-text text-muted">
            @lang('Please pick a valid date to apply.')
          </small>
        </div>
        <div class="form-group col-auto pt-4">
          <button class="btn btn-primary" type="submit">@lang('Importing')</button>
        </div>
      </div>
    </form>
  </div>
</div>
@stop