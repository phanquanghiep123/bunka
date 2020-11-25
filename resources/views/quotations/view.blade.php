@extends('layouts.app')
@section('content')
<div class="angular-main" ng-app="App" ng-controller="QuotationController" >
    <div class="content-main" style="display: none;">
        <form quotationform class="form quotation-form" method="post" action="{{route($_SEFF->_ROUTE_FIX .'.store')}}" autocomplete="off">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row grid-container--fill">
                        <div class="col-md-12">
                            <div class="grid-margin grid-container--fit">
                                <h4 class="card-title">_general_informations_</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-row">
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">_branch_: <% quotation.branch.name%></label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">_area_: <% quotation.area.name%></label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">_quotation_number_: <% quotation.quotation_number%> (@lang('Created by:') <% quotation.created_by.first_name %> <% quotation.created_by.last_name %><% quotation.created_by.code ? ' - quotation.created_by.code' : '' %>)</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">_project_: <% quotation.project%></label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                               <div class="form-group">
                                                    <label for="">_date_: <% quotation.date_start%></label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                               <div class="form-group">
                                                    <label for="">@lang('quotation.winrate.label'): <% quotation.winrate.win_rate || 0 %>%</label>
                                                </div>
                                            </div>
                                            <div style="position: absolute; right: 20px; top:20px;width: auto;">
                                                @if($_SEFF->checkUserAllowAction('add'))
                                                    @if($quotation['status']['options'] > 1 && $quotation['status']['options'] < 4)
                                                        <a style="width: auto;" class="btn btn-success btn-block" href="{{route($_SEFF->_ROUTE_FIX . '.copy',$quotation['id'])}}"><i class="menu-icon mdi mdi-content-copy" aria-hidden="true"></i> _copy_</a>
                                                    @endif
                                                @endif
                                                @if($quotation['status']['options'] == 2)
                                                    @if($_SEFF->checkUserAllowAction('add',$_SEFF->OrDerID))
                                                        <a style="width: auto;" class="btn btn-primary btn-block" href="{{route($_SEFF->_ROUTE_FIX . '.createdorder',$quotation['id'])}}"><i class="menu-icon mdi mdi-plus" aria-hidden="true"></i> _create_order_</a>
                                                    @endif
                                                @endif
                                                @if($quotation['status']['options'] == 3 || $quotation['status']['options'] == 2)
                                                    @if($_SEFF->checkUserAllowAction('add'))
                                                        <a class="btn btn-primary btn-block" href="{{route($_SEFF->_ROUTE_FIX . '.reversion',$quotation['id'])}}"><i class="menu-icon mdi mdi-file-tree" aria-hidden="true"></i> [_reversion_]</a>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if($quotation["id"] > 0)
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="{{route($_SEFF->_ROUTE_FIX .'.downloadSpecial',$quotation['id'])}}" download="" class="btn btn-success btn-block">_dowload_special_quotation_</a>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route($_SEFF->_ROUTE_FIX .'.export',$quotation['id'])}}/<%lang.id%>" download="" class="btn btn-primary btn-block" target="_blank">_dowload_quotation_</a>
                                                </div>
                                                <div class="col-6">
                                                    <select ng-init="lang = langs[0]" ng-model="lang" class="form-control" ng-options="option as option.name for option in langs track by option.id"></select>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route($_SEFF->_ROUTE_FIX .'.exportreceipt',$quotation['id'])}}/<%lang1.id%>" download="" class="btn btn-danger btn-block" target="_blank">[_dowload_order_receipt_]</a>
                                                </div>
                                                <div class="col-6">
                                                    <select ng-init="lang1 = langs[0]" ng-model="lang1" class="form-control" ng-options="option as option.name for option in langs track by option.id"></select>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="grid-margin" ng-if="quotation.customer">
                        <div class="card-body-sub">
                            <h5 class="card-sub-title mb-3">_customer_informations_</h5>
                            <div class="form-row">
                                <div class="col-12 col-md-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">_customer_information_code_</label>
                                        <input disabled="disabled" type="text" class="form-control" id="" name="customer[code]" placeholder="Code" ng-model="quotation.customer.code">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label for="">_customer_information_authorized_name_</label>
                                        <input disabled="disabled" type="text" name="customer[authorized_name]" ng-model="quotation.customer.authorized_name" class="form-control" id="" placeholder="Authorized name">
                                    </div>

                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label for="">_customer_information_owner_</label>
                                        <input disabled="disabled" type="text" name="customer[owner]" ng-model="quotation.customer.owner" class="form-control" id="" placeholder="Owner">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid-margin" ng-if="quotation.construction">
                        <div class="card-body-sub">
                            <h5 class="card-sub-title mb-3 mt-4">_construction_informations_</h5>
                            <div class="form-row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">_construction_information_name_</label>
                                        <input disabled="disabled" type="text" name="construction[construction_name]" ng-model="quotation.construction.name" class="form-control" id="" placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-12 col-md-8">
                                    <div class="form-group">
                                        <label for="">_construction_information_address_</label>
                                        <input disabled="disabled" type="text" name="construction[construction_address]" ng-model="quotation.construction.address" class="form-control" id="" placeholder="Address">
                                    </div>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">_construction_information_phone_</label>
                                        <input disabled="disabled" type="text" name="construction[construction_phone]" ng-model="quotation.construction.phone" class="form-control" id="" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">_construction_information_fax_</label>
                                        <input disabled="disabled" type="text" name="construction[construction_fax]" ng-model="quotation.construction.fax" class="form-control" id="" placeholder="Fax">
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">_construction_information_manager_</label>
                                <input type="text" disabled="disabled" name="construction[construction_manager]" ng-model="quotation.construction.manager" class="form-control" id="" placeholder="Manager">
                            </div>
                        </div>
                    </div>
                    <div class="grid-margin">
                        <div class="row">
                            <div class="ml-auto col-10 col-md-10">
                                <h4 class="card-title">_quotation_</h4>
                            </div>
                            <div class="ml-auto col-2 col-md-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select ng-init="setRate()" class="form-control" ng-model="quotation.rate" ng-options="option as option.ClassName for option in rates track by option.ClassKey"></select>
                                    </div>
                                    <input inputformatrate type="text" class="form-control" ng-disabled ="quotation.rate.is_default == 1 || quotation.rate.is_default == '1'" ng-model="quotation.rate.Value1">
                                </div>
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
                                        <th width="100px;">_action_</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="$product in quotation.products track by $index">
                                        <td><% ($index + 1) %></td>
                                        <td><a href="javascript:;" ng-click="changeProduct($product)"><% $product.ClassName %></a></td>
                                        <td><% (GetTotalSaleProduct($product)).formatPrice(quotation.rate.ClassFullName) %> </td>
                                        <td><% (GetTotalProduct($product)).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                        <td><% (GetTotalDiscountProduct($product)).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                        <td>
                                            <button ng-click="changeProduct($product)" type="button" class="btn btn-icons btn-inverse-primary btn-sm"><i class="mdi mdi-pencil"></i></button>
                                            <button ng-click="deleteProduct($index)" type="button" class="btn btn-icons btn-inverse-danger btn-sm"><i class="mdi mdi-delete"></i></button>
                                        </td>
                                    </tr>
                                    <tr ng-repeat="Otherproduct in quotation.Otherproducts track by $index">
                                        <td><% Otherproduct.saved == 1 ? countProduct(($index + 1)) : '_add_' %></td>
                                        <td><input data-validate="required" ng-attr-validate="<%Otherproduct.saved == 1 ? 'true' : 'false'%>" type="text" ng-model="Otherproduct.name" class="form-control" aria-label="Price" placeholder="Name"></td>
                                        <td>
                                            <div class="d-flex group-discount">
                                                <div class="input-group pr-1">
                                                    <input inputformatprice data-validate="required" ng-attr-validate="<%Otherproduct.saved == 1 ? 'true' : 'false'%>" type="text" ng-model="Otherproduct.saleprice" class="form-control" aria-label="Price" placeholder="0">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex group-discount">
                                                <div class="input-group pr-1">
                                                    <input inputformatprice type="text" data-validate="required" ng-attr-validate="<%Otherproduct.saved == 1 ? 'true' : 'false'%>" ng-model="Otherproduct.price" class="form-control" aria-label="Price" placeholder="0">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex group-discount">
                                                <!--<div class="input-group pr-1">
                                                    <input otherproductdiscount data-active="1" inputformatnumber class="form-control" ng-model="Otherproduct.discount1" aria-label="Discount" placeholder="0" type="text">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <input inputformatprice otherproductdiscount data-active="2" type="text" class="form-control" ng-model="Otherproduct.discount2" aria-label="Amount (to the nearest dollar)" placeholder="0">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"></span>
                                                    </div>
                                                </div>-->
                                            </div>
                                        </td>
                                        <td>
                                            <button ng-if="Otherproduct.saved == false" type="button" ng-click="AddOtherProduct($event,Otherproduct)" class="btn btn-icons btn-inverse-primary btn-sm"><i class="mdi mdi-floppy"></i></button>
                                            <button ng-if="Otherproduct.saved == true" ng-click="RemoveOtherProduct($index)" type="button" class="btn btn-icons btn-inverse-danger btn-sm"><i class="mdi mdi-delete"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="row-noborder no-subtable">
                                        <td></td>
                                        <td>_sub_total_</td>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><% ((GetSubTotalQuotation())).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                        <td></td>
                                    </tr>
                                    <tr ng-if="HasDiscount();" class="row-noborder no-subtable">
                                        <td></td>
                                        <td>_discount_</td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex group-discount">
                                                <div class="input-group pr-1">
                                                    <input quotationdiscount inputformatnumber data-active="1" type="text" class="form-control" name="discount" ng-model="quotation.discount1" aria-label="Amount (to the nearest dollar)" placeholder="_discount_" value="0" name="discount">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">%</span>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <input quotationdiscount inputformatprice data-active="2" type="text" class="form-control" name="discount" ng-model="quotation.discount2" aria-label="Amount (to the nearest dollar)" placeholder="_discount_" value="0" name="discount">
                                                </div>
                                            </div>
                                        </td>
                                        <td align="right">
                                            <% ((GetDiscountQuotation())).formatPrice(quotation.rate.ClassFullName)  %>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr class="row-noborder no-subtable">
                                        <td></td>
                                        <td>_grand_sub_total_</td>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><% ((GetGrandSubTotalQuotation())).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                        <td></td>
                                    </tr>
                                    <tr class="row-noborder no-subtable">
                                        <td></td>
                                        <td>_tax_</td>
                                        <td></td>
                                        <td>
                                            <div class="input-group pr-1">
                                                <input type="text" class="form-control" readonly="readonly" value="<% quotation.tax.value %>" name=""><div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td align="right">
                                            <% ((GetTaxQuotation())).formatPrice(quotation.rate.ClassFullName)  %>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr class="row-noborder no-subtable">
                                        <td></td>
                                        <td><strong>_total_</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td align="right"><strong><%( (GetTotalQuotation())).formatPrice(quotation.rate.ClassFullName)  %> </strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
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
		                                           <a class="btn btn-xs btn-primary index-class" href="{{ route($_SEFF->_ROUTE_FIX . '.DesignRequest',['id' => $id]) }}" download="">[_dowload_]</a>
		                                        </td>
		                                        <?php
		                                            if(@$quotation->download->count() > 0){
		                                                $download = $quotation->download->first();
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
		                                                    $RequestUploads = $quotation->UploadRequests;
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
		                                        <th><a ng-href="<% '/quotations/view/' + quotation.id %>" target="_blank">N<sup>o</sup>. <%quotation.quotation_number%></a></th>
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
		                                            <td><a class="btn btn-xs btn-primary" href="{{ route($_SEFF->_ROUTE_FIX .'.dowloadQuotation',['QuotationId' => $quotation->id,'productID' => $value->ClassKey]) }}" download="">[_dowload_]</a></td>
		                                            <td>
		                                                <ul class="nav nav-list">
		                                                    <li>
		                                                        <a title="[_upload_]" class="btn btn-xs btn-primary index-class" href="javascript:;" onclick="return $('#upload_design_request_detail_{{$value->product_id}}').trigger('click');">[_upload_]</a>
		                                                        <input data-id="{{$value->product_id}}" multiple type="file" class="none upload_design_request_detail" id="upload_design_request_detail_{{$value->product_id}}"  name="upload_design_request_detail_{{$value->product_id}}[]" accept=".application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*">
		                                                    </li>
		                                                    <?php
		                                                        $RequestUploads = $value->UploadDetailRequests($value->product_id,$quotation->id,$order->quotation->id);

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
		                                        <td><a class="btn btn-xs btn-primary" href="{{ route($_SEFF->_ROUTE_FIX .'.dowloadOtherQuotation',['QuotationId' => $quotation->id,'detailID' => 1])}}" download="">[_dowload_]</a></td>
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
		                                        <td><a class="btn btn-xs btn-primary" href="{{ route($_SEFF->_ROUTE_FIX .'.dowloadOtherQuotation',['QuotationId' => $quotation->id,'detailID' => 2])}}" download="">[_dowload_]</a></td>
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
                    </div>
                </div>
            </div>
        </form>
        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 ng-if="product" id="exampleModalLabel" style="position: relative;">_production_ <% product.ClassFullName %><span ng-if="productSaved" class="loader" style="display: inline-block;margin-left: 10px;position: absolute;top: -4px;left: 100%;"></span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form productform method="post" action="" id="product-form">
                        <div class="modal-body">
                            <div id="items-door">
                                <div class="repeater">
                                    <div class="repeater-items">
                                        <div class="repeater-item">
                                            <div class="repeater-content">
                                                <div id="menu1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="menu1-tab">
                                                    <div class="product-list-classs-wrapper">
                                                        <div class="wrapper wrapper-1">
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
                                                                        <th style="width: 100px">_action_</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr ng-if="product.list.length < 1 || !product">
                                                                        <td colspan="10" align="center" style="padding: 10px 10px;">
                                                                            <div class="alert alert-warning text-center">
                                                                                <strong>_warning_!</strong> _please_add_product_group_
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr ng-repeat="$item in product.list track by $index">
                                                                        <td class="text-center"><% ($index + 1) %></td>
                                                                        <td><% $item.code %></td>
                                                                        <td><%($item.quantity ? $item.quantity : 0) %></td>
                                                                        <td><%(($item.productprice ? $item.productprice : 0 )).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                                                        <td><%(($item.installfee ? $item.installfee : 0)).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                                                        <td><%(($item.inlandfreightfee ? $item.inlandfreightfee : 0)).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                                                        <td><%($item.discount ? $item.discount : 0).formatPrice('0,0') %> </td>
                                                                        <td><%(($item.saleprice ? $item.saleprice : 0)).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                                                        <td><%(($item.price ? $item.price : 0) ).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                                                        <td>
                                                                            <button ng-if="$item.on_edit == true" ng-click="CancelEditItem($item,$index)" type="button" class="btn btn-icons btn-inverse-primary btn-sm"><i class="mdi mdi-cancel"></i></button>
                                                                            <button ng-if="$item.on_edit != true" ng-click="editItemList($item,$index)" type="button" class="btn btn-icons btn-inverse-primary btn-sm"><i class="mdi mdi-eye"></i></button>
                                                                        </td>
                                                                    </tr>
                                                                    <tr ng-if="product.list.length < 1" class="row-noborder no-subtable" style="height: 40px;  background:#fff">
                                                                        <td colspan="5" style="padding-left:10px;text-align: right;">_sub_total_:</td>
                                                                        <td colspan="5" style="text-align: right;"><b><% ( GetSubTotalProduct(product)).formatPrice(quotation.rate.ClassFullName)  %> </b></td>
                                                                    </tr>
                                                                    <tr ng-if="product.list.length < 1" class="row-noborder no-subtable" style="height: 40px; background:#fff">
                                                                        <td colspan="5" style="padding-left:10px;text-align: right;">_discount_:</td>
                                                                        <td colspan="5" style="text-align: right;"><b><% (GetTotalDiscountProduct(product)).formatPrice(quotation.rate.ClassFullName)  %> </b></td>
                                                                    </tr>
                                                                    <tr ng-if="product.list.length < 1" class="row-noborder no-subtable" style="height: 40px; background:#fff">
                                                                        <td colspan="5" style="padding-left:10px;text-align: right;">_total_:</td>
                                                                        <td colspan="5" style="text-align: right;"><b><% (GetTotalProduct(product)).formatPrice(quotation.rate.ClassFullName)  %> </b></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div ng-if="currentList != null">
                                                        <div class="form-row">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">_code_</label>
                                                                            <input data-validate="required" validate="true" type="text" name="Code"  disabled="disabled" ng-model="product.code" class="form-control" id="" placeholder="Code">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">_quantity_</label>
                                                                            <input inputformatnumber data-validate="required"  validate="true" name="Quantity" disabled="disabled" ng-model="product.quantity" class="form-control" id="" placeholder="Quantity" value="1">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                         <div class="form-group">
                                                                            <label for="exampleInputEmail1">_discount_</label>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="input-group pr-1">
                                                                                        <input productdiscount number disabled="disabled" data-active="1" class="form-control amout" disabled="disabled" ng-model="product.discount1" aria-label="_discount_" type="text" placeholder="0">
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text">%</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="input-group">
                                                                                        <input inputformatprice productdiscount disabled="disabled" data-active="2" type="text" class="form-control amout" ng-model="product.discount2" aria-label="Amount (to the nearest dollar)" placeholder="0">
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text"><% CuRate.ClassName %></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">_total_sale_price_</label>
                                                                            <input readonly ="" type="text" type="text" name="total" ng-value="((product.saleprice ? product.saleprice : 0)).formatPrice() + ' ' + CuRate.ClassName" class="form-control" id="" placeholder="total">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1">_total_price_</label>
                                                                            <input readonly ="" type="text" type="text" name="total" ng-value="((product.price ? product.price : 0) ).formatPrice() + ' ' + CuRate.ClassName" class="form-control" id="" placeholder="total">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-classs-wrapper">
                                                            <div ng-if="product">
                                                                <div class="wrapper wrapper-1">
                                                                    <table floatThead id="table-1" class="table table-bordered dt-responsive nowrap" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th tyle="width: 50px;" class="text-center">#</th>
                                                                            <th style="width: 200px">_item_class_</th>
                                                                            <th style="width: 170px;text-align: center;">_item_name_</th>
                                                                            <th style="width: 70px;text-align: center;">_width_</th>
                                                                            <th style="width: 70px;text-align: center;">_height_</th>
                                                                            <th style="width: 70px;text-align: center;">_quantity_</th>
                                                                            <th>_remarkes_</th>
                                                                            <th style="width: 170px">_sale_price_</th>
                                                                            <th>_price_</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr classitem ng-model="itemClass" ng-init="MapWatch($index)" ng-repeat="itemClass in product.Classes track by $index">
                                                                            <td class="text-center"><% ($index + 1) %></td>
                                                                            <td style="width: 200px"><%itemClass.type == 0 ? itemClass.ItemClassName : 'Other'%></td>
                                                                            <td style="width: 170px;text-align: center;">
                                                                                <select disabled="disabled" ng-if="itemClass.type == 0" class="form-control" ng-model="itemClass.item" ng-options='option as option.ItemName for option in itemClass.items track by option.ItemId' name="item_<% itemClass.itemClassId %>" >
                                                                                    <option ng-if="itemClass.PricePattern != 11 && itemClass.PricePattern != 10" value="">--_choose_--</option>
                                                                                </select>
                                                                                <input ng-if="itemClass.type == 1" data-validate="required" validate="true" type="text" ng-model="itemClass.name" class="form-control " aria-label="Name" placeholder="Name">
                                                                            </td>
                                                                            <td style="width: 70px;text-align: center;">
                                                                                <input disabled="disabled" ng-if="itemClass.type == 0" inputformatnumber blurinput="WInputFlg" data-validate="required|number" ng-attr-validate="<% (itemClass.WInputFlg && itemClass.item != null) ? false : false %>" ng-model="itemClass.width" class="form-control form-control-short" min="0">
                                                                                <input disabled="disabled" ng-if="itemClass.type == 1" inputformatnumber data-validate="number" ng-attr-validate="true" ng-model="itemClass.width" class="form-control form-control-short" min="0">
                                                                            </td>

                                                                            <td style="width: 70px;text-align: center;">
                                                                                <input disabled="disabled" ng-if="itemClass.type == 0" inputformatnumber blurinput="HInputFlg" data-validate="required|number" ng-attr-validate="<% (itemClass.HInputFlg && itemClass.item != null) ? false : false %>" ng-model="itemClass.height" class="form-control form-control-short" min="0">
                                                                                <input disabled="disabled" ng-if="itemClass.type == 1" inputformatnumber WInputFlg  ng-model="itemClass.height" class="form-control form-control-short" min="0">
                                                                            </td>
                                                                            <td style="width: 70px;text-align: center;">
                                                                                <input disabled="disabled" ng-if="itemClass.type == 0" inputformatnumberquantity blurinput="QInputFlg" data-validate="required|number" ng-attr-validate="<% (itemClass.QInputFlg && itemClass.item != null) ? false : false %>" ng-model="itemClass.quantity" class="form-control form-control-short" min="0">
                                                                                <input disabled="disabled" ng-if="itemClass.type == 1" inputformatnumber WInputFlg data-validate="number" ng-attr-validate="true" ng-model="itemClass.quantity" class="form-control form-control-short" min="0">
                                                                            </td>
                                                                            <td>
                                                                                <span ng-if="itemClass.type == 0 && itemClass.item != null"><%itemClass.FormatPattern | FormatPattern:itemClass%></span>
                                                                                <input disabled="disabled" ng-if="itemClass.type == 1" type="text" ng-model="itemClass.remarks" class="form-control form-control-short" >
                                                                            </td>
                                                                            <td ng-if="itemClass.type == 0" style="width: 170px;">
                                                                                <div ng-if="itemClass.load == 1" class="loader"></div>
                                                                                <span ng-if="itemClass.type == 0 && itemClass.load != 1 && itemClass.item != null && itemClass.saleprice !== null"><% (((itemClass.saleprice ? itemClass.saleprice  : 0))).formatPrice(quotation.rate.ClassFullName)  %></span>
                                                                            </td>
                                                                            <td ng-if="itemClass.type == 0">
                                                                                <div ng-if="itemClass.load == 1" class="loader"></div>
                                                                                <div ng-if="checkInstall(itemClass.PricePattern)">
                                                                                    <input inputformatprice type="text" class="form-control"  name="" ng-model="itemClass.price">
                                                                                </div>
                                                                                <div ng-if="!checkInstall(itemClass.PricePattern)">
                                                                                    <span ng-if="itemClass.type == 0 && itemClass.load != 1 && itemClass.item != null && itemClass.price !== null"><% (((itemClass.price ? itemClass.price : 0) )).formatPrice(quotation.rate.ClassFullName)  %></span>
                                                                                </div>
                                                                            </td>
                                                                            <td ng-if="itemClass.type == 1">
                                                                                <div class="input-group">
                                                                                    <input type="text" disabled="" class="form-control" >
                                                                                </div>
                                                                            </td>
                                                                            <td ng-if="itemClass.type == 1">
                                                                                <div class="input-group">
                                                                                    <input inputformatprice type="text" ng-model="itemClass.price" class="form-control" >
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <button ng-if="itemClass.type == 1" ng-click="RemoveOtherClasses($index)" type="button" class="btn btn-icons btn-inverse-danger btn-sm"><i class="mdi mdi-delete"></i></button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js_add')
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
    #modal-add {
        background-color: #0000005c !important;
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
        position: relative;
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
</style>
<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/select2-bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('js/datetimepicker/jquery.datetimepicker.css')}}">
<script>
    var langs = {!! json_encode($langs) !!}
    var is_view = true;
    var rates = {!! (trim(json_encode($rates))) !!};
    var taxs = {!! json_encode( $taxs ) !!};
    var products = {!! json_encode( $products ) !!};
    var NotPlus = {!! json_encode($NotPlus) !!};
    var OnloadPrice = {!! json_encode($OnloadPrice) !!};
    var quotation =  @if(@$quotation) {!! json_encode($quotation) !!} @else {{ 'false' }} @endif ;
</script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jQuery-Fix-Table-header/dist/jquery.floatThead.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/quotations.js')}}"></script>
@stop
