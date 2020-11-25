@extends('layouts.app')

@section('content')
<h4 class="card-title">Contract #: <strong>{{$contract->contract_number}}</strong></h4>
@if ($contract->periods)
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Current</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($contract->periods as $period)
    <tr>
      <td>{{$period->id}}</td>
      <td>{{$period->start_date}}</td>
      <td>{{$period->end_date}}</td>
      <td>{{$period->period_amount}}</td>
      <td>
        @if ($period->completion && $period->completion->status > 0)
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="customCheck1" disabled checked>
            <label class="custom-control-label" for="customCheck1"></label>
          </div>
        @else
          @if ($period->id == $current_period->id)
          <a href="{{route('admin.completion-report.create', ['id' => $contract->id])}}" class="btn btn-primary">@lang('Add Completion')</a>
          @else
          <a href="#" class="btn btn-secondary disabled">@lang('Incoming')</a>
          @endif
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@else
<div class="alert alert-info text-center">
    No periods found
</div>
@endif
@stop