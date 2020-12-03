@extends('layouts.app')

@section('dashboad-tiles')
@section("header-page")
  @include("layouts.includes.header-title-page")
@show
<h4 class="card-title font-weight-bold">@lang($_PAGETITLE)</h4>
<form method="post" action="{{route('admin.completion-report.store', ['id' => $order->id])}}" id="completion-form" enctype="multipart/form-data">

  @if ($last_submit->status == $status->where('options', 'status-draft')->first()->id)
  <input type="hidden" name="completion_report_id" value="{{$last_submit->id}}">
  @endif

  <div class="row flex-xl-nowrap layout-2-cols">
  <div class="col-lg-12 col-xl-auto flex-fill layout-col-1">
      <div class="card grid-margin">
        <div class="card-body">
          <h4 class="card-title">@lang('Summary')</h4>
          <div class="row mb-2">
            <div class="col-12 col-md-6">_order_number_: <strong>{{$order->order_number}}</strong></div>
            <div class="col-12 col-md-6">
              <div class="progress" style="height: 20px;">
              <div class="progress-bar" role="progressbar" style="width: {{$progress}}%;" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100">{{$progress}}{{ $progress > 0 ? "%" : ""}}</div>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-12 col-md-6">_receiving_order_date_: <strong>{{ \Carbon\Carbon::parse($order->receiving_order_date)->format('d/m/Y') }}</strong></div>
            <div class="col-12 col-md-6">_planned_delivery_date_: <strong>{{ \Carbon\Carbon::parse($order->planned_delivery_date)->format('d/m/Y') }}</strong></div>
          </div>
          <div class="row mb-2">
            <div class="col-12 col-md-6">_total_: <strong class="formatPrice">{{$order->total}}</strong></div>
            <div class="col-12 col-md-6">_planned_installation_date_: <strong>{{ \Carbon\Carbon::parse($order->planned_installation_date)->format('d/m/Y') }}</strong></div>
          </div>
          <div class="row">
            <div class="col-12 col-md-6">_person_in_charge_: <strong>{{$order->person_in_charge}}</strong></div>
            <div class="col-12 col-md-6">_planned_completion_date_: <strong>{{ \Carbon\Carbon::parse($order->planned_completion_date)->format('d/m/Y') }}</strong></div>
          </div>
        </div>
      </div>

      <div class="card grid-margin">
        <div class="card-body">
          <ul class="list-unstyled m-0">
            @foreach ($completion as $item)
            <li class="media border-top pt-2 pb-2">
              <div class="media-body">
                <h5>@lang('Progress'): {{$item['percent']}}% <span class="badge badge-{{$item->status_detail['class_name']}}">{{$item->status_detail['status_name']['name']}}</span></h5>
                <p class="m-0">{{$item['note']}}</p>
                <small class="text-muted">@lang('Submit at'): {{$item['created_at']}}</small>
              </div>
            </li>
            @endforeach
            @if(count($completion) == 0)
            <li class="media">
              <div class="media-body">
                <h5 class="m-0 text-muted text-center">@lang('No reports found')</h5>
              </div>
            </li>
            @endif
          </ul>
        </div>
      </div>

      @if ($submittable)
      <div class="card grid-margin">
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @csrf

            <div class="form-group">
              <label for="completionNote">@lang('Progress'): <strong>{{$last_submit->percent}}%</strong></label>
              <input class="slider-color" type="range" min="0" max="100" step="10" data-min="{{$last_submit->percent}}" value="{{$last_submit->percent}}">
              <input type="hidden" name="progress" value="{{$last_submit->percent}}" required>
            </div>

            <div class="form-group">
              <label for="completionNote">@lang('Note'):</label>
              <textarea class="form-control" name="note" id="completionNote" cols="30" rows="10"  required></textarea>
            </div>

            <div class="form-group">
              <div class="input-group control-group increment">
                <input type="file" name="documents[]" class="form-control" required>
                <div class="input-group-append">
                  <button class="btn btn-success btn-add-more" type="button"><i class="mdi mdi-plus"></i> @lang('Add file')</button>
                </div>
              </div>
              <div class="clone d-none">
                <div class="control-group input-group" style="margin-top:10px">
                  <input type="file" name="documents[]" class="form-control">
                  <div class="input-group-append">
                    <button class="btn btn-danger" type="button"><i class="mdi mdi-delete"></i> @lang('Remove file')</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
      </div>
      @endif

      @if (count($media) > 0)
      <div class="card grid-margin">
        <div class="card-body">
          <h4 class="card-title font-weight-bold">@lang('Attachments')</h4>
          @foreach ($media as $item)
          <a href="{{url($item->path)}}" class="btn btn-light mb-1 text-dark px-2 py-1"><i class="mdi mdi-attachment"></i> {{$item->name}}</a>
          @endforeach
        </div>
      </div>
      @endif
  </div>

  <div class="col-lg-12 col-xl-auto layout-col-2">
      <div class="layout-col-2-inner">
          <div class="card grid-margin">
              <div class="card-body">
                  <h4 class="card-title">@lang('Actions')</h4>
                  {{-- <div class="form-group">
                    <select name="status" id="inputStatus" class="form-control">
                      @foreach ($status as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                  </div> --}}
                  @if (!$submittable && $_SEFF->checkUserAllowAction('update'))
                  <div class="text-center">
                    <button type="button" class="btn-approved btn btn-primary" data-status="status-approved" data-id="{{$last_submit->id}}">@lang('Approve')</button>
                    <button type="button" class="btn-rejected btn btn-warning" data-status="status-rejected" data-id="{{$last_submit->id}}">@lang('Reject')</button>
                  </div>
                  @elseif (!$_SEFF->checkUserAllowAction('update'))
                    <div class="form-group mb-0 text-center">
                      @if ($submittable)
                        <button type="submit" class="btn btn-primary" value="{{$status->where('options', 'status-draft')->first()->id}}" name="status">@lang('Save')</button>
                        <button type="submit" class="btn btn-success" value="{{$status->where('options', 'status-pending')->first()->id}}" name="status">@lang('Submit')</button>
                      @else
                        <button class="btn btn-primary" disabled>@lang('Pending approval')</button>
                      @endif
                      <a href="{{route('orders.status', ['id' => 41])}}" class="btn btn-secondary">@lang('Cancel')</a>
                    </div>
                  @else
                    <div class="form-group mb-0 text-center">
                      <a href="{{route('orders.status', ['id' => 41])}}" class="btn btn-secondary">@lang('Back to list')</a>
                    </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
</div>
</form>
@stop

@section('css_add')
<style>
.slider-color {
  -webkit-appearance: none;
  width: 100%;
  height: 15px;
  border-radius: 5px;
  background: #d3d3d3;
  outline: none;
  opacity:0.7;
  -webkit-transition: opacity .15s ease-in-out;
  transition: opacity .15s ease-in-out;
}
.slider-color:hover {
  opacity:1;
}
.slider-color::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
.slider-color::-moz-range-thumb {
  width: 25px;
  height: 25px;
  border: 0;
  border-radius: 50%;
  background: #4CAF50;
  cursor: pointer;
}
</style>
@stop

@section('js_add')
<script type="text/javascript">

  $(function() {

    $('.formatPrice').text(function () {
      return $(this).text().formatPrice();
    });

    $(".btn-add-more").click(function(){
        var html = $(".clone").html();
        $(".increment").after(html);
    });

    $("body").on("click",".btn-danger",function(){
        $(this).parents(".control-group").remove();
    });

    $(document)
    .on('change', 'input.slider-color', function () {
      var value = $(this).val();
      var data = $(this).data();

      if (data.min > value) {
        $(this).val(data.min);
        return;
      }

      $('[name=progress]').val(value);
      $('[for="completionNote"] > strong').text(value + '%');
    })
    .on('click', 'button.btn-approved, button.btn-rejected', function () {
      var data = $(this).data();
      $.post('{{route('admin.completion-report.update', ['id' => $order->id])}}', data, function (data, xhr, status) {
        if (data.status) {
          location.reload();
        }
      });
    });

  });

</script>
@stop