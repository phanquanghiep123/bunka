@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">_DASHBOARD_</a></li>
                <li class="breadcrumb-item"><a href="{{ route($_SEFF->_ROUTE_FIX .'.index') }}">{{$_PAGETITLE}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php if(@$contract->contract_number != null): ?>
                        <?php echo $contract->contract_number; ?>
                    <?php else: ?>
                        _addnew_
                    <?php endif; ?>
                </li>
            </ol>
        </nav>
        <h4>
            <?php if(@$contract->contract_number != null): ?>
                <?php echo $contract->contract_number; ?>
            <?php else: ?>
                _addnew_
            <?php endif; ?>
        </h4>
    </div>
</div>
<form class="form form-ajax" method="post" action="{{isset($contract) ? $_SEFF->_STOREURL : $_SEFF->_ADDURL}}" enctype="multipart/form-data" autocomplete="off" style="margin-bottom: 100px;">
    <input type="hidden" name="id" value="{{ isset($contract) ? $contract->id : '0' }}">
    <input type="hidden" name="page" value="1">
    <div class="row flex-xl-nowrap layout-2-cols">
        <div class="col-lg-12 col-xl-auto flex-fill layout-col-1">
            <div class="card grid-margin">
                <div class="card-body">
                    <h4 class="card-title">_general_informations_</h4>
                    <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_CONTRACT_NO_</label>
                                <input type="text" validate="true" data-validate="required" name="contract_number" value="{{ isset($contract) && $contract->contract_number ? $contract->contract_number : '' }}" class="form-control" placeholder="_CONTRACT_NO_">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_BIDDING_DATE_</label>
                                <div id="bidding_date">
                                    <input type="text"  name="bidding_date" value="{{ isset($contract) && $contract->bidding_date ? date('d/m/Y',strtotime($contract->bidding_date)) : '' }}" class="form-control datepicker" placeholder="_BIDDING_DATE_" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_DATE_ON_THE_CONTRACT_</label>
                                <div id="date_on_the_contract">
                                    <input type="text" validate="true" data-validate="required" name="date_on_the_contract" value="{{ isset($contract) && $contract->date_on_the_contract ? date('d/m/Y',strtotime($contract->date_on_the_contract)) : '' }}" class="form-control datepicker" placeholder="_DATE_ON_THE_CONTRACT_" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_DATE_SIGNED_</label>
                                <div id="date_signed">
                                    <input type="text" validate="true" data-validate="required" name="date_signed" value="{{ isset($contract) && $contract->date_signed ? date('d/m/Y',strtotime($contract->date_signed)) : '' }}" class="form-control datepicker" placeholder="_DATE_SIGNED_" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_DATE_OF_ACCEPTANCE_</label>
                                <div id="date_expired">
                                    <input type="text" validate="true" data-validate="required" name="date_expired" value="{{ isset($contract) && $contract->date_expired ? date('d/m/Y',strtotime($contract->date_expired)) : '' }}" class="form-control datepicker" placeholder="_DATE_OF_ACCEPTANCE_" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_PRICE_IS_NOT_VAT_</label>
                                <div class="input-group">
                                    <input type="text" name="price_is_not_vat" validate="true" data-validate="required" data-tax="{{ @$tax_value }}" value="{{ isset($price_is_not_vat) ? $price_is_not_vat : '' }} " class="form-control currency-mask" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_VALUE_HAS_VAT_</label>
                                <div class="input-group">
                                    <input type="text" name="value_has_vat" value="{{ isset($value_has_vat) ? $value_has_vat : '' }}" data-value="{{ isset($value_has_vat) ? $value_has_vat : '0' }}" class="form-control value_has_vat currency-mask" disabled>
                                    <div class="input-group-append">
                                        <span class="input-group-text">VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_GUARANTEE_</label>
                                <input type="text" name="guarantee" value="{{ isset($contract) && $contract->guarantee ? $contract->guarantee : '' }}" class="form-control" placeholder="_GUARANTEE_" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_date_of_construction_</label>
                                <div id="date_of_construction">
                                    <input type="text" validate="true" data-validate="required" name="date_of_construction" value="{{ isset($contract) && $contract->date_of_construction ? date('d/m/Y',strtotime($contract->date_of_construction)) : '' }}" class="form-control datepicker" placeholder="_date_of_construction_" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_completion_date_</label>
                                <div id="completion_date">
                                    <input type="text" validate="true" data-validate="required" name="completion_date" value="{{ isset($contract) && $contract->completion_date ? date('d/m/Y',strtotime($contract->completion_date)) : '' }}" class="form-control datepicker" placeholder="_completion_date_" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_CURATOR_</label>
                                <input type="text" validate="true" data-validate="required" name="curator" value="{{ isset($contract) ? $contract->curator : '' }}" class="form-control" id="" placeholder="_CURATOR_">
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>[_order_]</label>
                                <?php if(isset($order) && @$order->id != null): ?>
                                    <input type="text" value="{{ @$order->order_number }}" class="form-control" disabled>
                                <?php else: ?>
                                    <select class="form-control" validate="true" data-validate="required" name="order_id">
                                        <option value="">Select order</option>
                                        <?php if(isset($orders) && $orders != null): ?>
                                            <?php foreach ($orders as $key => $item): ?>
                                                <option data-sub-total="{{ $item->grand_sub_total }}" data-total="{{ $item->tax_price + $item->grand_sub_total }}" value="{{ $item->id }}">{{ $item->order_number }}</option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(isset($order) && $order->id != null): ?>
                <div class="card grid-margin content-view">
                    <div class="card-body">
                        <?php $customer = @$order->quotation->customer; ?>
                        <h4 class="card-title">_customer_informations_ <a href="{{ route('customers.edit',@$customer->id) }}" target="_blank">{{ @$customer->authorized_name }}</a></h4>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_customer_information_authorized_name_</span> 
                                    <span class="value-holder">{{ @$customer->authorized_name }}</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_customer_information_owner_</span> 
                                    <span class="value-holder">{{ @$customer->owner }}</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_information_phone_</span> 
                                    <span class="value-holder">{{ @$customer->phone }}</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_EMAIL_</span> 
                                    <span class="value-holder"><a href="mailto:{{ @$customer->email }}">{{ @$customer->email }}</a></span>
                                </p>
                            </div>
                        </div>

                        <h4 class="card-title pt-3">_construction_informations_</h4>
                        <?php $construction = @$order->quotation->construction; ?>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_site_name_</span> 
                                    <span class="value-holder">{{ @$construction->name }}</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_site_address_</span> 
                                    <span class="value-holder">{{ @$construction->address }}</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_manager_</span> 
                                    <span class="value-holder">{{ @$construction->manager }}</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_PHONE_</span> 
                                    <span class="value-holder">{{ @$construction->phone }}</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_FAX_</span> 
                                    <span class="value-holder">{{ @$construction->fax }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card grid-margin">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <a title="[_download_] [_download_payment_order_]" class="btn btn-success btn-block" href="{{ route($_SEFF->_ROUTE_FIX .'.DownloadPaymentOrder',$contract->id) }}" download=""><i class="mdi-cloud-download mdi"></i> [_download_] [_download_payment_order_]</a>
                            <div class="space-30"></div>
                        </div>
                        @if(!$contract->upload_orderpay)
                            <div class="col-sm-4">
                                <a title="[_upload_] [_download_payment_order_]" class="btn btn-secondary btn-block" href="javascript:;" onclick="return $('#upload_orderpay').trigger('click');"><i class="mdi-cloud-upload mdi"></i> [_upload_] [_download_payment_order_]</a>
                                <div class="space-30"></div>
                            </div>
                        @else
                            <div class="col-sm-4">
                                <a title="[_upload_] [_download_payment_order_]" class="btn btn-secondary btn-block" href="javascript:;" onclick="return $('#upload_orderpay').trigger('click');"><i class="mdi-cloud-upload mdi"></i> [_upload_] [_download_payment_order_]</a>
                                <div class="space-30"></div>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-secondary btn-block" href="{{asset($contract->upload_orderpay)}}" target="_blank"><i class="mdi-eye mdi"></i> _view_ [_download_payment_order_]</a>
                                <div class="space-30"></div>
                            </div>
                        @endif
                        @if(!$contract->upload_acceptance)
                            <div class="col-sm-4">
                                <a title="[_upload_] [_acceptance_download_]" class="btn btn-secondary btn-block" href="javascript:;" onclick="return $('#upload_acceptance').trigger('click');"><i class="mdi-cloud-upload mdi"></i> [_upload_] [_acceptance_download_]</a>
                                <div class="space-30"></div>
                            </div>
                        @else
                            <div class="col-sm-4">
                                <a title="[_upload_] [_acceptance_download_]" class="btn btn-secondary btn-block" href="javascript:;" onclick="return $('#upload_acceptance').trigger('click');"><i class="mdi-cloud-upload mdi"></i> [_upload_] [_acceptance_download_]</a>
                                <div class="space-30"></div>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-secondary btn-block" href="{{asset($contract->upload_acceptance)}}" target="_blank" ><i class="mdi-eye mdi"></i> _view_ [_acceptance_download_]</a>
                                <div class="space-30"></div>
                            </div>
                        @endif
                            
                        <div class="col-sm-4">
                            <a title="[_download_] [_settlement_of_volume_with_subcontractors_]" class="btn btn-success btn-block" href="{{ route($_SEFF->_ROUTE_FIX .'.subcontractors',$contract->id) }}" download=""><i class="mdi-cloud-download mdi"></i> [_download_] [_settlement_of_volume_with_subcontractors_]</a>
                            <div class="space-30"></div>
                        </div>
                        @if(!$contract->upload_subcontractors)
                            <div class="col-sm-4">
                                <a title="[_upload_] [_settlement_of_volume_with_subcontractors_]" class="btn btn-secondary btn-block" href="javascript:;" onclick="return $('#upload_subcontractors').trigger('click');"><i class="mdi-cloud-upload mdi"></i> [_upload_] [_settlement_of_volume_with_subcontractors_]</a>
                                <div class="space-30"></div>
                            </div>
                        @else
                            <div class="col-sm-4">
                                <a title="[_upload_] [_settlement_of_volume_with_subcontractors_]" class="btn btn-secondary btn-block" href="javascript:;" onclick="return $('#upload_subcontractors').trigger('click');"><i class="mdi-cloud-upload mdi"></i> [_upload_] [_settlement_of_volume_with_subcontractors_]</a>
                                <div class="space-30"></div>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-secondary btn-block" href="{{asset($contract->upload_subcontractors)}}" target="_blank" ><i class="mdi-eye mdi"></i> _view_ [_settlement_of_volume_with_subcontractors_]</a>
                                <div class="space-30"></div>
                            </div>
                        @endif
                    </div>
                    <input type="file" class="none" id="upload_orderpay" name="upload_orderpay" accept=".application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                    <input type="file" class="none" id="upload_acceptance" name="upload_acceptance" accept=".application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                    <input type="file" class="none" id="upload_subcontractors" name="upload_subcontractors" accept=".application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                </div>
            </div>

            <div class="card grid-margin">
                <div class="card-body">
                    <h4 class="card-title">_CONTRACT_PERIOD_</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>_BATCH_</td>
                                    <td>_START_DATE_</td>
                                    <td>_END_DATE_</td>
                                    <td>_PERCENT_</td>
                					<td>_AMOUNT_</td>
                					<td>_contract_is_remind_</td>
                                    <?php 
                                        /*
                                            <td>_CONTRACT_PAYMENT_</td>
                                            <td>[_rest_]</td>
                                            <td>_AMOUNT_</td>
                                        */
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($contract))
                                    @foreach($contract->periods as $key => $period)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $period->title }}</td>
                                            <td>{{ date('d/m/Y',strtotime($period->start_date)) }}</td>
                                            <td>{{ date('d/m/Y',strtotime($period->end_date)) }}</td>
                                            <td>{{ $period->percent }}%</td>
                                            <td align="right">{{ number_format($period->period_amount) }} VND</td>
                                            <td>
                                            	@if($period->is_remind == 0)
                                            		<input type="checkbox" disabled />
                                            	@else
                                            		<input type="checkbox" checked disabled />
                                            	@endif
                                            </td>
                                            <?php 
                                                /*
                                                    <td class="text-right">{{ number_format($total) }} VND</td>
                                                    <td class="text-right">{{ number_format(($period->period_amount - $total) > 0 ? ($period->period_amount - $total) : 0) }} VND</td>
                                                    <td class="text-right">{{ number_format($period->period_amount) }} VND</td>
                                                */ 
                                            ?>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card grid-margin">
                <div class="card-body">
                    <h4 class="card-title">_CONTRACT_PAYMENT_</h4>
                    @if(@$contract->payments != null && count($contract->payments) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>_DATE_</td>
                                        <td width="300px">_RECEIPTS_</td>
                                        <td>_AMOUNT_</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contract->payments as $key1 => $payment)
                                        <tr>
                                            <td>{{ $key1+1 }}</td>
                                            <td>{{ date('d/m/Y',strtotime($payment->date)) }}</td>
                                            <td width="300px">
                                                @if(@$payment->receipts != null)
                                                    @foreach($payment->receipts as $key2 => $receipt)
                                                        <a target="_blank" href="{{ URL::to('/') }}/uploads/contracts/{{ $contract->id }}/{{ $receipt }}">{{ $receipt }}</a> <br/> 
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-right">{{ number_format($payment->payment_amount) }} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div style="height: 10px;"></div>
                    @endif
                    <div class="repeater">
                        <div class="repeater-items payment-items">
                            <div class="repeater-item payment-item">
                                <div class="repeater-content">
                                    <div class="form-row">
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label>_DATE_</label>
                                                <input type="text" name="date[]" class="form-control date-range">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label>_AMOUNT_</label>
                                                <div class="input-group">
                                                    <input type="text" name="payment_amount[]" class="form-control currency-mask">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VND</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <div class="form-group">
                                                <label>_RECEIPTS_</label>
                                                <div class="file-upload-holder">
                                                    <input type="file" name="receipts[]" class="file-upload-default" multiple>
                                                    <input type="hidden" name="receipts_name[]">
                                                    <div class="input-group col-xs-12">
                                                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Receipts">
                                                        <span class="input-group-append"><button class="file-upload-browse btn btn-secondary btn-fw" type="button">Upload</button></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-icons btn-danger btn-sm btn-delete delete-payment"><i class="mdi mdi-delete"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3 mb-4">
                            <button class="btn btn-icons btn-info btn-sm add-payment" type="button"><i class="menu-icon mdi mdi-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-auto layout-col-2">
            <div class="layout-col-2-inner sidebar-contract">
                <div class="outpart">
                    <div class="card grid-margin">
                        <div class="card-body">
                            <h4 class="card-title">_publish_</h4>
                            <div class="form-group">
                                <select name="status_id" class="form-control" validate="true" data-validate="required">
                                    @foreach($status as $key => $value)
                                        <option value="{{$value->id}}" <?php echo @$contract->status_id == $value->id ? 'selected' : ""; ?>>{{$value->get_name()}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">[_save_submit_] </button>
                        </div>
                        @if(isset($contract))
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a class="btn btn-danger btn-block" onclick="return confirm('_warning_delete_');" href="{{ route($_SEFF->_ROUTE_FIX .'.delete',$contract->id) }}">_delete_</a>
                                        <div class="space-30"></div>
                                    </div>
                                    <div class="col-sm-12">
                                        <a class="btn btn-success btn-block" href="#">[_export_]</a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="custom-loading" style="display: none;">
    <div>
        <div class="loader"></div>
    </div>
</div>
<style type="text/css">
    /*LOADING*/
    .table th, .table td{padding: 8px 12px;}
    .table .daterangepicker .calendar-table th, 
    .table .daterangepicker .calendar-table td{padding: 0;}
    .custom-loading{position: fixed;top: 0;bottom: 0;left: 0;right: 0;background: rgba(0, 0, 0, 0.55);z-index: 99999999;display: none;text-align: center;}
    .custom-loading > div {position: absolute;top: 45%;text-align: center;left: 0;right: 0;}
    .custom-loading > div .loader{border: 8px solid #f3f3f3;border-radius: 50%;border-top: 8px solid #3498db;width: 60px;height: 60px;-webkit-animation: spin 2s linear infinite;animation: spin 2s linear infinite;display: inline-block;}
    .custom-loading div > span{display: block;color: #fff;}
    .loading{border: 4px solid #f3f3f3;border-radius: 50%;border-top: 4px solid #3498db;width: 20px;height: 20px;-webkit-animation: spin 2s linear infinite;animation: spin 2s linear infinite;display: inline-block;}
    .none {display: none;}
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @media (min-width: 1200px) and (max-width: 1600px) {
        .layout-2-cols .layout-col-2 .layout-col-2-inner {
            width: 240px;
        }
        .layout-2-cols .layout-col-1 {
            max-width: calc(100% - 240px);
            padding-right: 0;
        }
    }
</style>
@stop
@section('js_add')
<script type="text/javascript" src="{{asset('js/jquery.lockfixed.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datetimepicker/build/jquery.datetimepicker.full.js')}}"></script>
<link rel="stylesheet" href="{{asset('js/datetimepicker/build/jquery.datetimepicker.min.css')}}">
<script type="text/javascript">
    $(document).ready(function(){
        $.lockfixed(".sidebar-contract .outpart",{offset: {top: 65}});

        var addFrom      = $("form.form-ajax");
        var validateAdd  = addFrom.validateform();

        addFrom.submit(function() { 
            if(validateAdd.checkInvalid()){
                $('.custom-loading').show();
                $(this).ajaxSubmit({
                    success: function(response){
                        console.log(response);
                        if(response.status == 0){
                            $.each(response.message,function(key,val){
                                validateAdd.addError(key,val);
                            });
                            validateAdd.showError();
                        }
                    },
                    error: function(data){
                        console.log(data['responseText']);
                    },
                    complete: function(){
                        $('.custom-loading').hide();
                    }
                });
            }
            return false; 
        });


        function checkdate(input){
            var validformat=/^\d{2}\/\d{2}\/\d{4}$/ //Basic check for format validity
            var returnval = false
            if (!validformat.test(input.value)) {
                $(input).val('');
            }
            else{ 
                //Detailed check for valid date ranges
                var dayfield   = $(input).val().split("/")[0]
                var monthfield = $(input).val().split("/")[1]
                var yearfield  = $(input).val().split("/")[2]
                var dayobj     = new Date(yearfield, monthfield-1, dayfield)
                if ((dayobj.getMonth() +1 != monthfield) ||
                (dayobj.getDate() != dayfield) ||(dayobj.getFullYear() != yearfield)){
                    $(input).val('');
                }
            }
            return returnval
        }

        /*$('input.datepicker,input.date-range').each(function(){
            var current = $(this).parent();
            $(this).daterangepicker({
                singleDatePicker: true,
                autoUpdateInput: false,
                opens: 'left',
                locale: {
                   format: 'DD/MM/YYYY'
                },
                //parentEl: current,
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                maxYear: parseInt(moment().format('YYYY'),10)
            }, function (a, t, n) {
                current.find('input.datepicker').val(a.format("DD/MM/YYYY"));
                current.find('input.date-range').val(a.format("DD/MM/YYYY"));
            });
        });*/

        $("input.datepicker,input.date-range").each(function(){
            $(this).datetimepicker({
                format: 'd/m/Y',
                timepicker: false
            });
        });

        $(document).on('click',".repeater .add-payment", function () {
            var item = $(this).parents(".repeater").find('.payment-item').first().html();
            $('.payment-items').append('<div class="repeater-item payment-item payment-item-new">' + item + '</div>');
            $('.payment-item-new').each(function(){
                $(this).find('input').val('');
                $(this).removeClass('payment-item-new');
                $(this).find('input.currency-mask').inputmask({
                    "alias": "decimal",
                    "digits": 0,
                    "autoGroup": true,
                    "allowMinus": false,
                    "rightAlign": false,
                    "groupSeparator": ".", // <-- this is &puncsp;
                    "radixPoint": "."
                });
            });

            $(this).parents(".repeater").find('.payment-item input.date-range').each(function(){
                var current = $(this).parent();

                $(this).datetimepicker({
                    format: 'd/m/Y',
                    timepicker: false
                });
                
                /*$(this).daterangepicker({
                    singleDatePicker: true,
                    autoUpdateInput: false,
                    opens: 'left',
                    locale: {
                        format: 'DD/MM/YYYY'
                    },
                    //parentEl: current,
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1901,
                }, function (a, t, n) {
                    current.find('input.datepicker').val(a.format("DD/MM/YYYY"));
                    current.find('input.date-range').val(a.format("DD/MM/YYYY"));
                });*/
            });
            return false;
        });

        $(document).on("click", ".delete-payment", function(){
            var length = $(this).parents('.payment-items').find('.payment-item').length;
            if(length > 1){
                $(this).closest('.payment-item').remove();
            }
            return false;
        });

        $(document).on('keyup','input[name="price_is_not_vat"]',function() {
            var vat = parseInt($(this).attr('data-tax'));
            var price = parseInt($(this).val().replace(/[^0-9.-]+/g,""));
            $('input.value_has_vat').val(price*(vat/100));
        });

        $(document).on("change",".file-upload-default", function(){
            var files = $(this)[0].files;
            var number_files = files.length;
            var name_files = '';
            if (number_files > 0) {
                $.each(files, function (index, value) {
                    if (index === 0) {
                        name_files = name_files + value.name;
                    } else {
                        name_files = name_files + ', ' + value.name;
                    }
                })
            }
            $(this).next().val(name_files);
            $(this).parent().find('.file-upload-info').first().val(name_files);
        });

        $(document).on("blur","input.datepicker,input.date-range", function(){
            checkdate(this);
        });
    });
</script>
@stop