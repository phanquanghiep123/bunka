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
    <input type="hidden" name="id" value="<?php echo @$order_id; ?>">
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
                                    <input type="text" name="price_is_not_vat" validate="true" data-validate="required" data-tax="{{  isset($tax_value) ? $tax_value : '0' }}" value="{{ isset($price_is_not_vat) ? $price_is_not_vat : '' }} " class="form-control currency-mask">
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
                                    <input type="text" name="value_has_vat" value="{{ isset($value_has_vat) ? $value_has_vat : '' }}" data-value="{{ isset($value_has_vat) ? $value_has_vat : '0' }}" class="form-control value_has_vat currency-mask" readonly>
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
                                                <option data-sub-total="{{ $item->grand_sub_total }}" data-tax="{{ @$item->quotation->tax_value }}" data-total="{{ $item->total }}" value="{{ $item->id }}">{{ $item->order_number }}</option>
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
                            <div class="repeater-item period-item">
                                <div class="repeater-content">
                                    <div class="form-row">
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>_BATCH_</label>
                                                <input type="text" validate="true" data-validate="required" name="title[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>_START_DATE_</label>
                                                <input type="text" validate="true" data-validate="required" name="start_date[]" class="form-control date-range">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>_END_DATE_</label>
                                                <input type="text" validate="true" data-validate="required" name="end_date[]" class="form-control date-range">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>_PERCENT_</label>
                                                <div class="input-group">
                                                    <input type="number" validate="true" data-validate="required" name="percent[]" max="100" min="0" class="form-control percent">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" style="padding-left: 5px;padding-right: 5px;">%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label>_AMOUNT_</label>
                                                <div class="input-group">
                                                    <input type="text" validate="true" data-validate="required" name="period_amount[]" class="form-control text-right" readonly>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" style="padding-left: 5px;padding-right: 5px;">VND</span>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                						<div class="col-12 col-md-8">
                                            <div class="form-group">
                                                <label>_contract_period_comment_</label>
                                                <input type="text" name="comment[]" class="form-control">
                                            </div>
                                        </div>
                						<div class="col-12 col-md-2">
                                            <div class="form-group">
                                                <label>_contract_is_remind_</label>
                                                <select name="is_remind[]" class="form-control">
                									<option value="0">_NO_</option>
                									<option value="1">_YES_</option>
                                                </select>
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
                            <button type="submit" class="btn btn-primary btn-block">[_save_submit_]</button>
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
    </div>
</form>
<div class="custom-loading" style="display: none;">
    <div>
        <div class="loader"></div>
    </div>
</div>
<style type="text/css">
    /*LOADING*/
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
            var total_percent = 0;
            $('.repeater-item .percent').each(function(){
                if($(this).val() > 0){
                    total_percent += parseInt($(this).val());
                }
            });
            var message_percen = "[_CONTRACT_PERIOD_100_]";
            if(total_percent != 100){
                alert(message_percen);
                return false;
            }

            if(validateAdd.checkInvalid()){
                $('.custom-loading').show();
                $(this).ajaxSubmit({
                    success: function(response){
                        console.log(response);
                        if(response['response'] == 0){
                            $.each(response.message,function(key,val){
                                validateAdd.addError(key,val);
                            });
                            validateAdd.showError();
                            if(response.message == 'error_percent'){
                                alert(message_percen);
                            }
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

        $("input.datepicker,input.date-range").each(function(){
            $(this).datetimepicker({
                format: 'd/m/Y',
                timepicker: false
            });
        });

        /*
        $('input.datepicker,input.date-range').each(function(){
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
                buttonClasses: "btn",
                applyClass: "btn-primary",
                cancelClass: "btn-secondary",
                minYear: 1901
            }, function (a, t, n) {
                current.find('input.datepicker').val(a.format("DD/MM/YYYY"));
                current.find('input.date-range').val(a.format("DD/MM/YYYY"));
            });
        });*/

        $(document).on('change','select[name="order_id"]',function() {
            var sub_total = $(this).find(":selected").attr('data-sub-total');
            var tax       = $(this).find(":selected").attr('data-tax');
            var total     = $(this).find(":selected").attr('data-total');
            if (typeof total !== typeof undefined && total !== false) {
                $('input[name="value_has_vat"]').val(parseInt(total));
            }
            else{
                $('input[name="value_has_vat"]').val('');
            }

            if (typeof sub_total !== typeof undefined && sub_total !== false) {
                $('input[name="price_is_not_vat"]').val(parseInt(sub_total));
                $('input[name="price_is_not_vat"]').attr('data-value',parseInt(sub_total));
            }
            else{
                $('input[name="price_is_not_vat"]').val('');
                $('input[name="price_is_not_vat"]').attr('data-value','');
            }
            if (typeof tax !== typeof undefined && tax !== false) {
                $('input[name="price_is_not_vat"]').attr('data-tax',parseInt(tax));
            }
            else{
                $('input[name="price_is_not_vat"]').attr('data-tax',0);
            }
            $('input.percent').trigger('keyup');
        });

        $(document).on('keyup','input[name="price_is_not_vat"]',function() {
            var vat = $(this).attr('data-tax');
            var price = parseInt($(this).val().replace(/[^0-9.-]+/g,""));
            if (typeof vat !== typeof undefined && vat !== false) {
                $('input.value_has_vat').val(price + price*(parseInt(vat)/100));
            }
            else{
                $('input.value_has_vat').val(price);
            }
            $('input.percent').trigger('keyup');
        });

        $(document).on('keyup','input.percent',function() {
            var total = parseInt($('input.value_has_vat').val().replace(/[^0-9.-]+/g,""));
            //console.log(total);
            if($(this).val() != '' && $(this).val() != null && !isNaN(total)){
                $(this).parents('.period-item').find('input[name="period_amount[]"]').val(parseInt(total*parseInt($(this).val())/100).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
            }
            else{
                $(this).parents('.period-item').find('input[name="period_amount[]"]').val(0);
            }
        });

        $('#btn-view').click(function () {
            var order_id = $("select#order_id option:checked").val();
            if(order_id != '') {
                $('.content-view').show();
            } else {
                $('.content-view').hide();
            }
        });

        $(".add-period").click(function () {
            var number = parseInt($('input[name=number_period]').val()) + 1;
            $('input[name=number_period]').val(number);
            var item = $('.period-item').first().html();
            $('.period-items').append('<div class="repeater-item period-item period-item-new">' + item + '</div>');
            $('.period-item-new').each(function(){
                $(this).find('input').val('');
                $(this).removeClass('period-item-new');
            });
            /*$('.period-items input.date-range').each(function(){
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
                    minYear: 1901
                }, function (a, t, n) {
                    current.find('input.datepicker').val(a.format("DD/MM/YYYY"));
                    current.find('input.date-range').val(a.format("DD/MM/YYYY"));
                });
            });*/
            $('.period-items input.date-range').datetimepicker({
                format: 'd/m/Y',
                timepicker: false
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

        $(document).on("blur","input.datepicker,input.date-range", function(){
            checkdate(this);
        });
    });
</script>
@stop
