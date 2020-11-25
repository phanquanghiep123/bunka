@extends('layouts.app')
@section('content') 
<div class="angular-main" ng-app="App" ng-controller="OrdersController" >
    <div class="content-main" style="display: none;">  
        <h1 class="card-title">{{$_PAGETITLE}}</h1>
        <form id="order-form" class="row flex-xl-nowrap layout-1-cols" method="post">
            <div class="col-lg-12">
                <div class="card grid-margin">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">_general_informations_</h4>
                            </div>
                            <div class="col-md-6 text-right">
                                @if($_SEFF->checkUserAllowAction('add',$_SEFF->ContractID))
                                    <ul style="display: inline-block; text-align: right;">
                                        @if($status->options == 2)
                                            <li style="display: inline-block;"> <a class="btn btn-xs btn-primary" href="{{route($_SEFF->_ROUTE_FIX . '.createcontract',$id)}}"  data-id="{{$id}}"><i class="menu-icon mdi mdi-plus" aria-hidden="true"></i> _create_contact_</a></li>
                                        @endif
                                        <li style="display: inline-block;"><a href="{{route($_SEFF->_ROUTE_FIX .'.ExportRevenueSlip',$order['id'])}}/<%lang.id%>" download="" class="btn btn-xs btn-primary" target="_blank"><i class="menu-icon mdi mdi-download" aria-hidden="true"></i> [_revenue_slip_]</a></li>
                                        <li style="display: inline-block;"><select ng-init="lang = langs[0]" style="height: 27px;" ng-model="lang" ng-options="option as option.name for option in langs track by option.id"></select></li>
                                    </ul>   
                                @endif       
                            </div>
                        
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">_order_number_</label>
                                    <input type="text" data-validate="required" validate="true" disabled="disabled" ng-model="order.order_number" name="order_number" class="form-control" id="" placeholder="Order No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="person_in_charge">_person_in_charge_</label>
                                    <input disabled="disabled" ng-model="order.person_in_charge" data-validate="required" validate="true" name="person_in_charge" type="text" class="form-control" id="" placeholder="Person in charge">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">_receiving_order_date_</label>
                                    <input day disabled="disabled" ng-model="order.receiving_order_date" data-validate="required|date" validate="true" type="text" name="receiving_order_date" class="form-control" placeholder="_receiving_order_date_" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="planned_delivery_date"></label>
                                    <input day disabled="disabled" ng-model="order.planned_delivery_date" data-validate="required|date" validate="true" type="text" name="planned_delivery_date" class="form-control" id="" placeholder="_planned_delivery_date_">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">_planned_installation_date_</label>
                                    <input day disabled="disabled" ng-model="order.planned_installation_date" data-validate="required|date" validate="true" type="text" name="planned_installation_date" class="form-control" placeholder="Receiving order date" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">_planned_completion_date_</label>
                                    <input day disabled="disabled" ng-model="order.planned_completion_date" data-validate="required|date" validate="true"type="text" name="planned_completion_date" class="form-control" placeholder="_planned_completion_date_" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card grid-margin content-view">
                    <div class="card-body">
                        <h4 class="card-title">_customer_informations_</h4>

                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_customer_information_code_</span> <span class="value-holder"><a href="sales-customer-edit.php" target="_blank"><%order.quotation.customer.code%></a></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_customer_information_authorized_name_</span> <span class="value-holder"><%order.quotation.customer.authorized_name%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_customer_information_owner_</span> <span class="value-holder"><%order.quotation.customer.owner%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_PHONE_</span> <span class="value-holder"><%order.quotation.customer.phone%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_EMAIL_</span> <span class="value-holder"><a href="mailto:<%order.quotation.customer.email%>"><%order.quotation.customer.email%></a></span></p>
                            </div>

                        </div>

                        <h4 class="card-title">_construction_informations_</h4>
                        <div class="row">

                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_construction_site_name_</span> <span class="value-holder"><%order.quotation.construction.name%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_construction_site_address_</span> <span class="value-holder"><%order.quotation.construction.address%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_construction_manager_</span> <span class="value-holder"><%order.quotation.construction.manager%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_PHONE_</span> <span class="value-holder"><%order.quotation.construction.phone%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_FAX_</span> <span class="value-holder"><%order.quotation.construction.fax%></span></p>
                            </div>
                        </div>

                    </div>
                </div>
                <div ng-if="order.products" class="grid-margin">
                    <div class="row">
                        <div class="ml-auto col-12 col-md-12">
                            <h4 class="card-title">_quotation_detail_ <a ng-href="<% '/quotations/view/' + order.quotation.id %>" target="_blank">N<sup>o</sup>. <%order.quotation.quotation_number%></a></h4>
                        </div>
                    </div>
                    <div id="price-before-holder">
                        <table id="price-before" class="table table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>_production_</th>
                                    <th>_sale_price_</th>
                                    <th>_price_</th>
                                    <th>_discount_</th>
                                    <th>_action_</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(@$order['products'] as $key => $value)
                                    <tr data-id="{{$value->id}}" class="parent parent-{{$value->id}}">
                                        <td>{{($key + 1)}}</td>
                                        <td><a data-id="{{$value->id}}" class="on-open" href="javascript:;" ng-click="changeProduct($product)">{{$value->ClassName}}</a></td>
                                        <td><% ({{$value->NUMSP}}).formatPrice() %></td>
                                        <td><% ({{$value->NUMP}}).formatPrice() %></td>
                                        <td><% ({{$value->NUMD}}).formatPrice() %></td>
                                        <td>
                                            <a data-id="{{$value->id}}" class="on-open btn btn-icons btn-inverse-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php if(@$value->details->count() > 0):?>
                                    <tr class="child child-{{$value->id}}">
                                        <td colspan="6">
                                            <table id="table-1" class="table table-bordered dt-responsive nowrap" style="width:100%">
                                                <tbody>
                                                    <tr><td><h4>{{$value->ClassName}} Detail</h4></td></tr>
                                                    <tr>
                                                        <td>
                                                            <table id="table-1" class="table table-bordered dt-responsive nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 50px;" class="text-center">#</th>
                                                                        <th>_code_</th>
                                                                        <th>_quantity_</th>
                                                                        <th>_product_price_</th>
                                                                        <th>_installation_fee_</th>
                                                                        <th>_inland_freight_fee_</th>
                                                                        <th>_discount_</th>
                                                                        <th>_sale_price_</th>
                                                                        <th>_price_</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($value->details as $key1 => $value1)
                                                                    <tr>
                                                                        <td class="text-center">{{($key1 + 1)}}</td>
                                                                        <td>{{$value1->code}}</td>
                                                                        <td>{{$value1->quantity}}</td>
                                                                        <td><% ({{$value1->productprice}}).formatPrice() %></td>
                                                                        <td><% ({{$value1->installfee}}).formatPrice() %></td>
                                                                        <td><% ({{$value1->inlandfreightfee}}).formatPrice() %></td>
                                                                        <td><% ({{$value1->discount}}).formatPrice() %></td> 
                                                                        <td><% ({{$value1->saleprice}}).formatPrice() %></td>
                                                                        <td><% ({{$value1->price}}).formatPrice() %></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php endif;?>
                                    <?php if(@$value->factorys->count() > 0):?>
                                    <tr class="child child-{{$value->id}}">
                                        <td colspan="6">
                                            <table id="table-1" class="table table-bordered dt-responsive nowrap" style="width:100%">
                                                <tbody>
                                                    <tr><td><h4>{{$value->ClassName}} Factory</h4></td></tr>
                                                    <tr>
                                                        <td>
                                                            <table id="table-1" class="table table-bordered dt-responsive nowrap" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 50px;" class="text-center">#</th>
                                                                        <th>{{$value->ClassName}} No</th>
                                                                        <th>[_receiving_date_]</th>
                                                                        <th>[_width_]</th>
                                                                        <th>[_height_]</th>
                                                                        <th>[_acreage_]</th>
                                                                        <th>[_product_no_]</th>
                                                                        <th>[_price_factory_]</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($value->factorys as $key1 => $value1)
                                                                    <tr>
                                                                        <td class="text-center">{{($key1 + 1)}}</td>
                                                                        <td>{{$value1->ss_no}}</td>
                                                                        <td>{{$value1->received_date}}</td>
                                                                        <td>{{$value1->w}}</td>
                                                                        <td>{{$value1->h}}</td>
                                                                        <td>{{$value1->m2}}</td> 
                                                                        <td>{{$value1->produce_code}}</td>
                                                                        <td><% ({{$value1->price_factory}}).formatPrice() %></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <?php endif;?>
                                @endforeach
                                 <?php if($Otherproducts):
                                    $index = $order['products']->count() + 1;
                                    foreach ($Otherproducts as $key2 => $value2): ?>
                                        <tr>
                                            <td>{{$index}}</td>
                                            <td>{{$value2->name}}</td>
                                            <td><% ({{$value2->saleprice}}).formatPrice()%></td>
                                            <td><% ({{$value2->price}}).formatPrice() %></td>
                                            <td></td> 
                                            <td></td>  
                                        </tr>
                                    <?php $index++ ;?>
                                    <?php endforeach ;
                                endif;?>
                                <tr ng-init="initP(Otherproduct)" ng-repeat="Otherproduct in quotation.Otherproducts track by $index">
                                    <td colspan="3"><% countProduct(($index + 1)) %></td>
                                    <td colspan="3"><input disabled="disabled" type="text" ng-model="Otherproduct.name" class="form-control amout" aria-label="Price" placeholder="Name"></td>
                                </tr>
                                <tr class="row-noborder no-subtable">
                                    <td colspan="3">_sub_total_:</td>
                                    <td colspan="3"><% order.quotation.sub_total.formatPrice() %> </td>
                                   
                                </tr>
                                <tr class="row-noborder no-subtable">
                                    <td colspan="3">_discount_:</td>
                                    <td colspan="3"><% order.quotation.discount.formatPrice() %> </td>
                                </tr>
                                <tr class="row-noborder no-subtable"> 
                                    <td colspan="3">_grand_sub_total_:</td>
                                    <td colspan="3"><% order.quotation.grand_sub_total.formatPrice() %></td>
                                </tr>
                                <tr class="row-noborder no-subtable">
                                    <td colspan="3">_tax_:</td>
                                    <td colspan="3"><% order.quotation.tax_price.formatPrice() %></td>
                                </tr>
                                <tr class="row-noborder no-subtable">
                                    <td colspan="3"><strong>_total_:</strong></td>
                                    <td colspan="3"><strong><% order.quotation.total.formatPrice() %></strong></td>  
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if(@$is_download):?>
                    <div class="card grid-margin">
                        <div class="card-body">
                            <h4 class="card-title">[_download_templates_]</h4>
                            <table class="table table-bordered" style="width:100%">
                                <thead class="thead-light">
                                    <tr><th colspan="2">[_design_request_]</th>
                                        <th>[_dowload_]/[_upload_]</th>
                                        <th>[_dowload_time_]</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">[dowload_design_request]</td>
                                        <td>
                                           <a  class="btn btn-xs btn-primary index-class" href="{{ route($_SEFF->_ROUTE_FIX . '.DesignRequest',['id' => $id]) }}" download="">[_dowload_]</a>  
                                        </td>
                                        <?php
                                            if(@$order->download->count() > 0){
                                                $download = $order->download->first();
                                                echo '<td>'.$download->created_at.'</td>';
                                            }else{
                                                echo '<td>[_not_one_dowload_]</td>';
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td colspan="2">[upload_design_request]</td>
                                        <td colspan="2">
                                            
                                            <ul class="nav nav-list"> 
                                                <li>
                                                    <a title="[_upload_] [upload_design_request]" class="btn btn-xs btn-primary index-class" href="javascript:;" onclick="return $('#upload_design_request').trigger('click');">[_upload_]</a>
                                                    <input multiple type="file" class="none" id="upload_design_request" name="upload_design_request[]" accept=".application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                                                </li>
                                                <?php 
                                                    $RequestUploads = $order->quotation->UploadRequests;
                                                    if($RequestUploads){
                                                        foreach ($RequestUploads as $key => $value) {
                                                            echo '<li style="margin-left:5px"><a href="'.asset($value->path).'">#'.($key + 1).'</a></li>';
                                                        }
                                                    }
                                                ?>
                                            </ul>
                                        </td>
            
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered" style="width:100%">
                                <thead class="thead-light">
                                    <tr><th colspan="5">[_production_request_]</th></tr>
                                    <tr>
                                        <th><a ng-href="<% '/quotations/view/' + order.quotation.id %>" target="_blank">N<sup>o</sup>. <%order.quotation.quotation_number%></a></th>
                                        <th>[_group_quotaiton_]</th>
                                        <th>[_dowload_]</th>
                                        <th>[_upload_]</th>
                                        <th>[_dowload_time_]</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(@$products as $key => $value)
                                        <tr>
                                            <td>{{($key + 1)}}</td>
                                            <td>{{$value->ClassFullName}}</td>
                                            <td><a class="btn btn-xs btn-primary" href="{{ route('quotations.dowloadQuotation',['quotation_id' => $quotation->id,'productID' => $value->ClassKey]) }}" download="">[_dowload_]</a></td>
                                            <td>
                                                <ul class="nav nav-list"> 
                                                    <li>
                                                        <a title="[_upload_]" class="btn btn-xs btn-primary index-class" href="javascript:;" onclick="return $('#upload_design_request_detail_{{$value->product_id}}').trigger('click');">[_upload_]</a>
                                                        <input data-id="{{$value->product_id}}" multiple type="file" class="none upload_design_request_detail" id="upload_design_request_detail_{{$value->product_id}}"  name="upload_design_request_detail_{{$value->product_id}}[]" accept=".application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
                                                    </li>
                                                    <?php 
                                                        $RequestUploads = $value->UploadDetailRequests($value->product_id,$order->id,$order->quotation->id);

                                                        if($RequestUploads){
                                                            foreach ($RequestUploads as $key => $value) {
                                                                echo '<li style="margin-left:5px"><a href="'.asset($value->path).'">#'.($key + 1).'</a></li>';
                                                            }
                                                        }
                                                    ?>
                                                </ul>
                                            </td>
                                            <?php
                                                if(@$value->created_at != null){
                                                    echo '<td>'.$value->created_at.'</td>';
                                                }else{
                                                    echo '<td>[_not_one_dowload_]</td>';
                                                }
                                            ?>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered" style="width:100%">
                                <thead class="thead-light">
                                    <tr><th colspan="2">Other Request</th>
                                        <th>[_dowload_]</th>
                                        <th>[_dowload_time_]</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="2">[_application_for_purchasing_]</td>
                                        <td><a class="btn btn-xs btn-primary" href="{{ route('quotations.dowloadOtherQuotation',['quotationID' => $quotation->id,'detailID' => 1])}}" download="">[_dowload_]</a></td>
                                        <?php
                                            if(@$OtherDownload1){
                                                echo '<td>'.$OtherDownload1->created_at.'</td>';
                                            }else{
                                                echo '<td>[_not_one_dowload_]</td>';
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td colspan="2">[_manage_buying_items_]</td>
                                        <td><a class="btn btn-xs btn-primary" href="{{ route('quotations.dowloadOtherQuotation',['quotationID' => $quotation->id,'detailID' => 2])}}" download="">[_dowload_]</a></td>
                                        <?php
                                            if(@$OtherDownload2){
                                                echo '<td>'.$OtherDownload2->created_at.'</td>';
                                            }else{
                                                echo '<td>[_not_one_dowload_]</td>';
                                            }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif;?>

                <?php if(@$internal != null):?>
                	<div class="card grid-margin">
                        <div class="card-body">
		                    <h4 class="card-title">[_internal_]</h4>
		                    <div class="table-responsive">
		                        <table class="table table-bordered">
		                            <thead>
		                                <tr>
		                                    <th>#</th>
		                                    <th>[_received_date_]</th>
		                                    <th>[_code_works_]</th>
		                                    <th>[_produce_code_]</th>
		                                    <th>[_ss_no_]</th>
		                                    <th>_type_</th>
		                                    <th>_width_</th>
		                                    <th>_height_</th>
		                                    <th>M²</th>
		                                    <th>[_position_]</th>
		                                    <th>[_factory_price]</th>
		                                    <th>[_actual_production_price]</th>
		                                    <th>[_prices_are_not_discounted_]</th>
		                                    <th>[_price_of_sales_department_]</th>
		                                    <th>[_registration_date_of_separation_]</th>
		                                    <th>[_date_registration_]</th>
		                                    <th>[_date_registration_complete_]</th>
		                                    <th>[_date_complete_]</th>
		                                    <th>[_date_registration_export_]</th>
		                                    <th>[_date_export_]</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                @if(isset($internal))
		                                    @foreach ($internal as $key => $value)
		                                        <tr>
		                                            <td>{{ $key+1 }}</td>
		                                            <td><?php echo date('d/m/Y',strtotime(@$value->received_date)); ?></td>
		                                            <td>{{ $value->code_works }}</td>
		                                            <td>{{ $value->produce_code }}</td>
		                                            <td>{{ $value->ss_no }}</td>
		                                            <td>{{ $value->type }}</td>
		                                            <td>{{ $value->w }}</td>
		                                            <td>{{ $value->h }}</td>
		                                            <td>{{ $value->m2 }}</td>
		                                            <td>{{ $value->position }}</td>
		                                            <td class="text-right">{{ number_format($value->price_factory) }} VND</td>
		                                            <td class="text-right">{{ number_format($value->price_real) }} VND</td>
		                                            <td class="text-right">{{ number_format($value->price_no_sale) }} VND</td>
		                                            <td class="text-right">{{ number_format($value->price_of_sales_department) }} VND</td>
		                                            <td><?php echo @$value->registration_date_of_separation != null ? date('d/m/Y',strtotime(@$value->registration_date_of_separation)) : ''; ?></td>
		                                            <td><?php echo @$value->date_registration != null ? date('d/m/Y',strtotime(@$value->date_registration)) : ''; ?></td>
		                                            <td><?php echo @$value->date_registration_complete != null ? date('d/m/Y',strtotime(@$value->date_registration_complete)) : ''; ?></td>
		                                            <td><?php echo @$value->date_complete != null ? date('d/m/Y',strtotime(@$value->date_complete)) : ''; ?></td>
		                                            <td><?php echo @$value->date_registration_export != null ? date('d/m/Y',strtotime(@$value->date_registration_export)) : ''; ?></td>
		                                            <td><?php echo @$value->date_export != null ? date('d/m/Y',strtotime(@$value->date_export)) : ''; ?></td>
		                                        </tr>
		                                    @endforeach
		                                @endif
		                            </tbody>
		                        </table>
		                    </div>
		                </div>
		            </div>
                <?php endif;?>

                <?php if(@$external != null):?>
                	<div class="card grid-margin">
                        <div class="card-body">
		                    <h4 class="card-title">[_external_]</h4>
		                    <div class="table-responsive">
		                        <table class="table table-bordered">
		                            <thead>
		                                <tr>
		                                    <th>#</th>
		                                    <th></th>
		                                    <th>[_code_works_]</th>
		                                    <th>[_sales_]</th>
		                                    <th>[_back_order_]</th>
		                                    <th>[_document_date_]</th>
		                                    <th>[_document_number_]</th>
		                                    <th>[_reciprocal_account_]</th>
		                                    <th>[_debt_side_]</th>
		                                    <th>[_have_side_]</th>
		                                    <th>_total_</th>
		                                    <th>[_explains_]</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                                @foreach ($external as $key => $value)
		                                    <tr>
		                                        <td>{{ $key+1 }}</td>
		                                        <td>{{ $value->number }}</td>
		                                        <td>{{ $value->building_code }}</td>
		                                        <td>{{ $value->sales }}</td>
		                                        <td>{{ $value->back_order }}</td>
		                                        <td><?php echo date('d/m/Y',strtotime(@$value->document_date)); ?></td>
		                                        <td>{{ $value->document_number }}</td>
		                                        <td>{{ $value->reciprocal_account }}</td>
		                                        <td class="text-right">{{ number_format($value->debt_side) }} VND</td>
		                                        <td class="text-right">{{ number_format($value->have_side) }} VND</td>
		                                        <td class="text-right">{{ number_format($value->total) }} VND</td>
		                                        <td>{{ $value->explains }}</td>
		                                    </tr>
		                                @endforeach
		                            </tbody>
		                        </table>
		                    </div>
		                </div>
		            </div>
                <?php endif;?>
            </div>
        </form>
    </div>
</div>
@stop
@section('css_add')

    <style type="text/css">
        .wrapper {
            overflow-y: auto;
            overflow-x: hidden;
            position: relative;
            max-height: 400px;
            width: 100%;
            margin-bottom: 30px;
        }
        .table.table-bordered thead {
            border: 1px solid #e0e0e0;
            border-bottom: none;
            background-color: #fff;
        }
        .wrapper::-webkit-scrollbar {
            width: 10px;
        }
        .aftet-quotation{
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            text-align: center;
            padding: 7px;
            border-top: 1px solid #ccc;
            margin-top: 110px;
        }
        .wrapper::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 10px rgba(0,0,0,0.3); 
            border-radius: 5px;
        }
         
        .wrapper::-webkit-scrollbar-thumb {
            border-radius: 5px;
            -webkit-box-shadow: inset 0 0 10px rgba(0,0,0,0.5); 
        }
        .wrapper .table td {
            padding: 5px 5px;
            vertical-align: middle;
            border-top: 1px solid #e0e0e0;
            position: relative;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .wrapper select{
            max-width: 170px;
        }
        .repeater .repeater-item {
            background-color: #f6f6f6;
            padding: 30px 15px 20px 13px;
            border: 1px solid #eee;
            position: relative;
        }
        .wrapper .form-control-short {
            width: 100%;
            margin: 0 auto;
        }
        #modal-add #myTabContent{
            padding: 30px 0;
        }
        .error{
            border: 1px solid red;
        }
        #modal-add .modal-full{
            width: 1138px;
            max-width: 100%;
        }
        body .card{
            background: transparent;
            padding: 0;
        }
        body .card .card-body{
            padding: 0
        }
        body .card .card-body .grid-margin{
            padding: 1.88rem 1.81rem;
            background: #fff;
        }
        .grid-container--fill {
          grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        }
        .grid-container--fit {
          grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        }
        .error{
            border: 1px solid red !important;
        }
        .child{
            display: none;
        }
        .child.open{
            display: table-row;
        }
        .table-responsive{max-width: 1550px;}
        @media (max-width: 1366px) {
            .table-responsive{max-width: 970px;}
        }
    </style>
@stop
@section('js_add')
<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/select2-bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('js/datetimepicker/jquery.datetimepicker.css')}}">
<script type="text/javascript">
    var order   = {!! json_encode(@$order) !!};
    var rate    = {!! json_encode(@$rate) !!};
    var langs = {!! json_encode(@$langs) !!}
</script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jQuery-Fix-Table-header/dist/jquery.floatThead.min.js')}}"></script>  
<script type="text/javascript" src="{{asset('js/orders.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".class-select").change(function(){
            var _this = $(this);
            var R = _this.val();
            _this.closest(".input-group").find(".index-class").attr("href",R);
        });
        $(document).on("click","#price-before-holder .on-open",function(){
            var id = $(this).attr("data-id");
            $.each($("#price-before-holder .child.child-"+id),function(){
                $(this).toggleClass("open");
            });
        });
        $("#upload_design_request").change(function(){
            var file_datas = $(this).prop('files');   
            var form_data = new FormData();   
            var ins = $(this).prop('files').length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", file_datas[x]);
            }   
            form_data.append("order_id",'{{$order->id}}');
            form_data.append("quotation_id",'{{$order->quotation->id}}')          
            $.ajax({
                url :"{{route($_SEFF->_ROUTE_FIX.'.uploadRequest')}}",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                success : function(data){
                    location.reload();
                }

            })
        });
        $("body .upload_design_request_detail").change(function(){
            var product_id = $(this).attr("data-id");
            var file_datas = $(this).prop('files');   
            var form_data = new FormData();   
            var ins = $(this).prop('files').length;
            for (var x = 0; x < ins; x++) {
                form_data.append("files[]", file_datas[x]);
            }   
            form_data.append("order_id",'{{$order->id}}');
            form_data.append("quotation_id",'{{$order->quotation->id}}');
            form_data.append("product_id",product_id);          
            $.ajax({
                url :"{{route($_SEFF->_ROUTE_FIX.'.uploadRequest')}}",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                xhr: function() {
                    var myXhr = $.ajaxSettings.xhr();
                    return myXhr;
                },
                success : function(data){
                    
                    location.reload();
                }

            }).done(function(){
                
            })
        });
        
    });
</script>
@stop