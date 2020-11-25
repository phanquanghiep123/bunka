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
                                <input type="text" name="price_is_not_vat" value="{{ isset($price_is_not_vat) ? number_format($price_is_not_vat).' VNĐ' : '' }} " class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>_VALUE_HAS_VAT_</label>
                                <input type="text" value="{{ isset($value_has_vat) ? number_format($value_has_vat).' VNĐ' : '' }}" data-value="{{ isset($value_has_vat) ? $value_has_vat : '0' }}" class="form-control value_has_vat" disabled>
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
                    <h4 class="card-title">_CONTRACT_PERIOD_</h4>
                    <div class="repeater">
                        <div class="repeater-items period-items">
                            @if(isset($contract))
                                @foreach($contract->periods as $key => $period)
                                    <div class="repeater-item">
                                        <div class="repeater-item-info">
                                            <p><strong>#{{ $key+1 }}</strong></p>
                                            <p><span>_COMPLETED_</span><strong>{{ $period->percent }}%</strong></p>
                                        </div>
                                        <div class="repeater-content">
                                            <div class="form-row">
                                                <div class="col-12 col-md-2">
                                                    <div class="form-group">
                                                        <label>_BATCH_</label>
                                                        <input type="text" class="form-control" value="{{ $period->title }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <div class="form-group">
                                                        <label>_START_DATE_</label>
                                                        <input type="text" class="form-control" value="{{ date('d/m/Y',strtotime($period->start_date)) }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-2">
                                                    <div class="form-group">
                                                        <label>_END_DATE_</label>
                                                        <input type="text" class="form-control" value="{{ date('d/m/Y',strtotime($period->end_date)) }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>_PERCENT_</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control percent" value="{{ $period->percent }}" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>_AMOUNT_</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" value="{{ number_format($period->period_amount) }}" disabled>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">VND</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="repeater-item period-item">
                                <div class="repeater-content">
                                    <div class="form-row">
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>_BATCH_</label>
                                                <input type="text" name="title[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>_START_DATE_</label>
                                                <input type="text" name="start_date[]" class="form-control date-range">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>_END_DATE_</label>
                                                <input type="text" name="end_date[]" class="form-control date-range">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label>_PERCENT_</label>
                                                <div class="input-group">
                                                    <input type="number" name="percent[]" max="100" min="0" class="form-control percent">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="form-group">
                                                <label>_AMOUNT_</label>
                                                <div class="input-group">
                                                    <input type="text" name="period_amount[]" class="form-control" readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VND</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-icons btn-danger btn-sm btn-delete delete-period"><i class="mdi mdi-delete"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3 mb-4">
                            @if(isset($contract) && count($contract->periods) && false)
                                <button class="btn btn-icons btn-success btn-sm" type="button"><i class="menu-icon mdi mdi-download"></i></button>
                            @endif
                            <button class="btn btn-icons btn-info btn-sm add-period" type="button"><i class="menu-icon mdi mdi-plus"></i></button>
                        </div>
                        <input type="hidden" name="number_period" value="1">
                    </div>
                </div>
            </div>

            <?php if(@$contract->id != null): ?>
                <div class="card grid-margin">
                    <div class="card-body">
                        <h4 class="card-title">_CONTRACT_PAYMENT_</h4>
                        <div class="repeater">
                            <div class="repeater-items payment-items">
                                @if(isset($contract))
                                    @foreach($contract->payments as $payment)
                                        <div class="repeater-item">
                                            <div class="repeater-content">
                                                <div class="form-row">
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label>_FROM_</label>
                                                            <input type="text" class="form-control" value="{{ $payment->from }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label>_TO_</label>
                                                            <input type="text" class="form-control" value="{{ $payment->to }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <div class="form-group">
                                                            <label>_CONTRACT_PERIOD_</label>
                                                            <input type="text" class="form-control" value="{{ @$payment->period->title }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>_AMOUNT_</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" value="{{ number_format($payment->payment_amount) }}" disabled>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">VND</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label>_RECEIPTS_</label>
                                                            <div class="file-upload-holder">
                                                                <div class="input-group col-xs-12">
                                                                    <input type="text" class="form-control file-upload-info" disabled="" value="{{ implode(', ', $payment->receipts) }}">
                                                                    <span class="input-group-append"><button class="file-upload-browse btn btn-secondary btn-fw" type="button">Download</button></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="repeater-item payment-item">
                                    <div class="repeater-content">
                                        <div class="form-row">
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label>_FROM_</label>
                                                    <input type="text" name="from[]" class="form-control" id="" placeholder="From">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="form-group">
                                                    <label>_TO_</label>
                                                    <input type="text" name="to[]" class="form-control" id="" placeholder="To">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                @if(isset($contract))
                                                    <div class="form-group">
                                                        <label>_CONTRACT_PERIOD_</label>
                                                        <select name="periods_id[]" class="form-control">
                                                            @foreach($contract->periods as $key => $period)
                                                                <option value="{{ $period->id }}">{{ $period->title }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label>_AMOUNT_</label>
                                                    <div class="input-group">
                                                        <input type="number" name="payment_amount[]" class="form-control" aria-label="Amount (to the nearest dollar)">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">VND</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
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
                                @if(isset($contract) && count($contract->payments) && false)
                                    <button class="btn btn-icons btn-success btn-sm" type="button"><i class="menu-icon mdi mdi-download"></i></button>
                                @endif
                                <button class="btn btn-icons btn-info btn-sm add-payment" type="button"><i class="menu-icon mdi mdi-plus"></i></button>
                            </div>
                            <input type="hidden" name="number_payment" value="1">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-12 col-xl-auto layout-col-2">
            <div class="layout-col-2-inner">
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
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    @if(isset($contract))
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-danger btn-block" onclick="return confirm('_warning_delete_');" href="{{ route($_SEFF->_ROUTE_FIX .'.delete',$contract->id) }}">_delete_</a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-success btn-block" href="#">_EXPORT_</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @if(isset($contract) && false)
                    <div class="card grid-margin">
                        <div class="card-body">
                            <h4 class="card-title">History</h4>
                            <div class="history-content">
                                @if($contract->date_signed)
                                    <p class="date"><strong>12 May 2019</strong></p>
                                    <div class="history-item success d-flex">
                                        <i class="mdi mdi-checkbox-blank-circle"></i>
                                        <div class="history-item-text ml-2">
                                            <p>Contract Signed <br><span class="text text-muted">15:00</span></p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</form>
@stop
@section('js_add')
<script type="text/javascript">
    $(document).ready(function(){
        
        var addFrom      = $("form.form-ajax");
        var validateAdd  = addFrom.validateform();

        addFrom.submit(function() { 
            var total_percent = 0;
            $('.repeater-item .percent').each(function(){
                if($(this).val() > 0){
                    total_percent += parseInt($(this).val());
                }
            });

            if(total_percent > 100){
                alert('Tổng các đợt lớn hơn 100%.');
                return false;
            }

            if(validateAdd.checkInvalid()){
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
                    }
                });
            }
            return false; 
        });

        $('input.datepicker,input.date-range').each(function(){
            var current = $(this).parent();
            current.daterangepicker({
                singleDatePicker: true,
                opens: 'left',
                parentEl: current,
                buttonClasses: "btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary"
            }, function (a, t, n) {
                current.find('input.datepicker').val(a.format("DD/MM/YYYY"));
                current.find('input.date-range').val(a.format("DD/MM/YYYY"));
            });
        });

        $(document).on('keyup','input.percent',function() {
            var total = $('input.value_has_vat').attr('data-value');
            if($(this).val() != '' && $(this).val() != null){
                $(this).parents('.period-item').find('input[name="period_amount[]"]').val(parseInt(total*parseInt($(this).val())/100).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
            }
            else{
                $(this).parents('.period-item').find('input[name="period_amount[]"]').val(0);
            }
        });

        $(document).on('change','select[name="order_id"]',function() {
            var sub_total = $(this).find(":selected").attr('data-sub-total');
            var total = $(this).find(":selected").attr('data-total');
            if (typeof total !== typeof undefined && total !== false) {
                $('input[name="price_is_not_vat"]').val(parseInt(total).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ' VND');
            }
            else{
                $('input[name="price_is_not_vat"]').val('');
            }

            if (typeof sub_total !== typeof undefined && sub_total !== false) {
                $('input.value_has_vat').val(parseInt(sub_total).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ' VND');
                $('input.value_has_vat').attr('data-value',parseInt(sub_total));
            }
            else{
                $('input.value_has_vat').val('');
                $('input.value_has_vat').attr('data-value','');
            }
            $('input.percent').trigger('keyup');
        });

        $('#btn-view').click(function () {
            var order_id = $( "select#order_id option:checked" ).val();
            if (order_id != '') {
                $('.content-view').show();
            } else {
                $('.content-view').hide();
            }
        });

        $(".add-period").click(function () {
            var number = parseInt($('input[name=number_period]').val()) + 1;
            $('input[name=number_period]').val(number);
            $('.period-item').first().clone(true).find('.daterangepicker').parents('.period-item').remove().find('input').val('').end().appendTo('.period-items');
            $('.period-items input.date-range').each(function(){
                var current = $(this).parent();
                current.daterangepicker({
                    singleDatePicker: true,
                    opens: 'left',
                    parentEl: current,
                    buttonClasses: "btn",
                    applyClass: "btn-primary",
                    cancelClass: "btn-secondary"
                }, function (a, t, n) {
                    current.find('input.datepicker').val(a.format("DD/MM/YYYY"));
                    current.find('input.date-range').val(a.format("DD/MM/YYYY"));
                });
            });
        });

        $(document).on("click", ".delete-period", function(){
            var number = parseInt($('input[name=number_period]').val());
            if (number > 1) {
                number = number - 1;
                $('input[name=number_period]').val(number);
                $(this).closest('.period-item').remove();
            }
        });

        $(".add-payment").click(function () {
            var number = parseInt($('input[name=number_payment]').val()) + 1;
            $('input[name=number_payment]').val(number);
            $('.payment-item').first().clone(true).find('input').val('').end().appendTo('.payment-items');
        });

        $(document).on("click", ".delete-payment", function(){
            var number = parseInt($('input[name=number_payment]').val());
            if (number > 1) {
                number = number - 1;
                $('input[name=number_payment]').val(number);
                $(this).closest('.payment-item').remove();
            }
        });

        $(".file-upload-default").change(function(){
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
    });
</script>
@stop
