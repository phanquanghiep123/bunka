@extends('layouts.app')
@section('content')
<div class="angular-main" ng-app="App" ng-controller="QuotationController" >
    <div class="content-main" style="display: none;">
        <form quotationform class="form quotation-form" method="post" action="{{route($_SEFF->_ROUTE_FIX .'.store')}}" autocomplete="off">
            <div class="row">
                <div class="col-lg-12">
                    @if(@$request->message)
                        <div class="grid-margin">
                             <h4 class="card-title">[_message_]</h4>
                            @php
                                $user = $request->user;
                            @endphp
                            @if($user)
                                <p>_name_: {{ $user->first_name}} {{ $user->last_name}}</p>
                                <p>[_role_]: {{ $user->role->name }}</p>

                            @endif
                            <p>[_message_]: {{ $request->message }}</p>
                        </div>
                    @endif
                    <div class="row grid-container--fill">
                        <div class="col-md-8">
                            <div class="grid-margin grid-container--fit">
                                <h4 class="card-title">_general_informations_</h4>
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">_branch_</label>
                                            <div select2branch class="input-group"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">_area_</label>
                                            <div select2area class="input-group"></div>
                                        </div>
                                    </div> 
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">_quotation_number_</label>
                                            <input type="text" disabled="true" value="<% getQuotationNo() %>" class="form-control" id="" placeholder="Quotation No.">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">_project_</label>
                                            <input type="text" validate="true" data-validate="required" ng-model="quotation.project" class="form-control" id="" placeholder="Project">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                       <div class="form-group">
                                            <label for="">_date_</label>
                                            <div>
                                                <input day type="text" min="0" class="form-control" placeholder="Date" validate="true" data-validate="required|date" ng-model="quotation.date_start" name="date_start">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">_customer_</label>
                                            <div select2customer class="input-group"></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">_address_</label>
                                            <div class="input-group">
                                                <input type="text" validate="true" data-validate="required" ng-model="quotation.construction_address" class="form-control" id="" placeholder="[_construction_address_]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="">@lang('quotation.winrate.label')</label>
                                            <div class="input-group">
                                                <input type="number" validate="true" data-validate="required" ng-model="quotation.winrate" class="form-control" id="" placeholder="@lang('quotation.winrate.placeholder')" min="0">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="grid-container--fit">
                                <div class="grid-margin" style="margin-bottom: 0;">
                                    <div class="card-body">
                                        <h4 class="card-title"><span style="position: relative;">_publish_ <span ng-if="quotation.saved" class="loader" style="display: inline-block;margin-left: 10px;position: absolute;top: -4px;left: 100%;"></span></span></h4>
                                        <div class="form-group">
                                            <select validate="true" data-validate="required" ng-options='option as option.name for option in taxs track by option.id' class="form-control" name="tax_id" ng-model="quotation.tax"></select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button style="background-color:#4F0B0B;color:#FFFFFF" ng-click="quotation.status_id = 0" ng-disabled="quotation.saved" class="btn btn-block" type="submit">[_save_draft_]</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button style="background-color:#FFAF00;color:#FFFFFF" ng-click="quotation.status_id = 1" ng-disabled="quotation.saved" class="btn btn-block" type="submit">[_save_submit_]</button>
                                            </div>
                                            @if($_SEFF->_USER->hasTypeUserForQuotation() == 1)
                                                <div style="height: 10px ;width: 100%"></div>
                                                <div class="col-md-12">
                                                    <button style="background-color:#DF0302;color:#FFFFFF" ng-click="quotation.status_id = 4" ng-disabled="quotation.saved" class="btn btn-block" type="submit">[_save_rejected]</button>
                                                    <div style="height: 15px;"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <button style="background-color:#00CE68;color:#FFFFFF" ng-click="quotation.status_id = 2" ng-disabled="quotation.saved" class="btn btn-block" type="submit">[_save_accepted]</button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if($quotation["id"] > 0)
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{route($_SEFF->_ROUTE_FIX .'.downloadSpecial',$quotation['id'])}}" download="" class="btn btn-success btn-block">_dowload_special_quotation_</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 order-2">
                                            <a href="{{route($_SEFF->_ROUTE_FIX .'.export',$quotation['id'])}}/<%lang.id%>" download="" class="btn btn-primary btn-block" target="_blank">_dowload_quotation_</a>
                                        </div>
                                        <div class="col-12 order-1">
                                            <select ng-init="lang = langs[0]" ng-model="lang" class="form-control" ng-options="option as option.name for option in langs track by option.id"></select>
                                            <div style="height: 15px;"></div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 order-2">
                                            <a href="{{route($_SEFF->_ROUTE_FIX .'.exportreceipt',$quotation['id'])}}/<%lang1.id%>" download="" class="btn btn-danger btn-block" target="_blank">[_dowload_order_receipt_]</a>
                                        </div>
                                        <div class="col-12 order-1">
                                            <select ng-init="lang1 = langs[0]" ng-model="lang1" class="form-control" ng-options="option as option.name for option in langs track by option.id"></select>
                                            <div style="height: 15px;"></div>
                                        </div>
                                    </div>
                                </div>
                                @endif
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
                            <div class="ml-auto col-12 col-md-5">
                                <h4 class="card-title">_quotation_</h4>
                            </div>
                            <div class="ml-auto col-12 col-md-2">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <select ng-init="setRate()" class="form-control" ng-model="quotation.rate" ng-options="option as option.ClassName for option in rates track by option.ClassKey"></select>
                                    </div>
                                    <input inputformatrate type="text" class="form-control" ng-disabled ="quotation.rate.is_default == 1 || quotation.rate.is_default == '1'" ng-model="quotation.rate.Value1">
                                </div>
                            </div>
                            <div class="ml-auto col-12 col-md-5">
                                <button type="button" ng-click="AddProduct()" class="btn btn-secondary btn-block"><i class="menu-icon mdi mdi-plus"></i>_new_production_</button>
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
                    </div>
                </div>
            </div>
        </form>
        <div ng-class="dialogOpenAlert == true ? 'open' : ''" class="alert-message">
            <div class="alert alert-<% alert_type %> alert-dismissible fade show" role="alert">
              <% message %>
              <button type="button" class="close" ng-click="dialogOpenAlert = false;" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        </div>
        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-full" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" style="position: relative;">_add_new_quotation_ <span ng-if="productSaved" class="loader" style="display: inline-block;margin-left: 10px;position: absolute;top: -4px;left: 100%;"></span></h4>
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
                                                                        <th>_installation_fee_</th>
                                                                        <th>_inland_freight_fee_</th>
                                                                        <th>_discount_</th>
                                                                        <th>_sale_price_</th>
                                                                        <!--<th>_price_</th>-->
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
                                                                        <td><%(($item.installfee ? $item.installfee : 0)).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                                                        <td><%(($item.inlandfreightfee ? $item.inlandfreightfee : 0)).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                                                        <td><%($item.discount ? $item.discount : 0).formatPrice('0,0') %> </td>
                                                                        <td><%(($item.saleprice ? $item.saleprice : 0)).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                        								<!--<td><%(($item.productprice ? $item.productprice : 0)).formatPrice(quotation.rate.ClassFullName)  %> </td>-->
                                                                        <td><%(($item.price ? $item.price : 0) ).formatPrice(quotation.rate.ClassFullName)  %> </td>
                                                                        <td>
                                                                            <button ng-if="$item.on_edit == true" ng-click="CancelEditItem($item,$index)" type="button" class="btn btn-icons btn-inverse-primary btn-sm"><i class="mdi mdi-cancel"></i></button>
                                                                            <button ng-if="$item.on_edit != true" ng-click="editItemList($item,$index)" type="button" class="btn btn-icons btn-inverse-primary btn-sm"><i class="mdi mdi-pencil"></i></button>
                                                                            <button ng-click="deleteProductItem($index)" type="button" class="btn btn-icons btn-inverse-danger btn-sm"><i class="mdi mdi-delete"></i></button>
                                                                            <button ng-click="copyProductItem($index)" type="button" class="btn btn-icons btn-sm btn-warning"><i class="mdi mdi-content-copy"></i></button>
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
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <select class="form-control" ng-model="product_s" ng-options='option as option.ClassName for option in products track by option.ClassKey' >
                                                                        <option value="">_select_group_</option>
                                                                    </select>
                                                                    <div class="input-group-append bg-secondary border-secondary">
                                                                        <button id="btn-door" ng-disabled="product_s == null || product_s == ''" type="button" class="btn btn-secondary btn-fw" ng-click="GetItemsProduct(product_s)"><% ProductAddEdit() %></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div ng-if="product" class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">_code_</label>
                                                                        <input ng-disabled="product == null" data-validate="required" validate="true" type="text" name="Code" ng-model="product.code" class="form-control" id="" placeholder="Code">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">_quantity_</label>
                                                                        <input inputformatnumberquantity data-validate-type="number" data-validate="required|min:1" validate="true" ng-disabled="product == null" name="Quantity" ng-model="product.quantity" class="form-control" id="" placeholder="Quantity" value="1">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                     <div class="form-group">
                                                                        <label for="exampleInputEmail1">_discount_</label>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="input-group pr-1">
                                                                                    <input productdiscount inputformatnumber ng-disabled="product == null" data-active="1" class="form-control" ng-model="product.discount1" aria-label="_discount_" type="text" placeholder="0">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">%</span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="input-group">
                                                                                    <input inputformatprice productdiscount ng-disabled="product == null" data-active="2" type="text" class="form-control" ng-model="product.discount2" aria-label="Amount (to the nearest dollar)" placeholder="0">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">_total_sale_price_</label>
                                                                        <input readonly ="" type="text" type="text" name="total" ng-value="(((product.saleprice ? product.saleprice : 0))).formatPrice(quotation.rate.ClassFullName) " class="form-control" id="" placeholder="total">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">_total_price_</label>
                                                                        <input readonly ="" type="text" type="text" name="total" ng-value="(((product.price ? product.price : 0) )).formatPrice(quotation.rate.ClassFullName) " class="form-control" id="" placeholder="total">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-classs-wrapper">
                                                        <div ng-if="product">
                                                            <button ng-if="checkExitsProduct();" type="button" ng-click="deleteCurrentProduct()" class="btn btn-icons btn-danger btn-sm btn-delete"><i class="mdi mdi-delete"></i></button>
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
                                                                                <select ng-if="itemClass.type == 0" selectchange ng-disabled="itemClass.disabled" class="form-control" ng-model="itemClass.item" ng-options='option as option.ItemName for option in itemClass.items track by option.ItemId' name="item_<% itemClass.itemClassId %>" >
                                                                                    <option ng-if="itemClass.PricePattern != 11 && itemClass.PricePattern != 10" value="">--_choose_--</option>
                                                                                </select>
                                                                                <input ng-if="itemClass.type == 1" data-validate="required" validate="true" type="text" ng-model="itemClass.name" class="form-control " aria-label="Name" placeholder="Name">
                                                                            </td>
                                                                            <td style="width: 70px;text-align: center;">
                                                                                <input ng-if="itemClass.type == 0" inputformatnumber blurinput="WInputFlg" data-validate="required|number" ng-attr-validate="<% (itemClass.WInputFlg && itemClass.item != null) ? false : false %>" ng-disabled="itemClass.WInputFlg != 1 || itemClass.item == null" ng-model="itemClass.width" class="form-control form-control-short" min="0">
                                                                                <input ng-if="itemClass.type == 1" inputformatnumber data-validate="number" ng-attr-validate="true" ng-model="itemClass.width" class="form-control form-control-short" min="0">
                                                                            </td>

                                                                            <td style="width: 70px;text-align: center;">
                                                                                <input ng-if="itemClass.type == 0" inputformatnumber blurinput="HInputFlg" data-validate="required|number" ng-attr-validate="<% (itemClass.HInputFlg && itemClass.item != null) ? false : false %>" ng-disabled="itemClass.HInputFlg != 1 || itemClass.item == null" ng-model="itemClass.height" class="form-control form-control-short" min="0">
                                                                                <input ng-if="itemClass.type == 1" inputformatnumber WInputFlg  ng-model="itemClass.height" class="form-control form-control-short" min="0">

                                                                            </td>
                                                                            <td style="width: 70px;text-align: center;">
                                                                                <input ng-if="itemClass.type == 0" inputformatnumberquantity blurinput="QInputFlg" data-validate="required|number" ng-attr-validate="<% (itemClass.QInputFlg && itemClass.item != null) ? false : false %>" ng-disabled="itemClass.QInputFlg != 1 || itemClass.item == null" ng-model="itemClass.quantity" class="form-control form-control-short" min="0">
                                                                                <input ng-if="itemClass.type == 1" inputformatnumber WInputFlg data-validate="number" ng-attr-validate="true" ng-model="itemClass.quantity" class="form-control form-control-short" min="0">
                                                                            </td>
                                                                            <td>
                                                                                <span ng-if="itemClass.type == 0 && itemClass.item != null"><%itemClass.FormatPattern | FormatPattern:itemClass%></span>
                                                                                <input ng-if="itemClass.type == 1" type="text" ng-model="itemClass.remarks" class="form-control form-control-short" >
                                                                            </td>
                                                                            <td ng-if="itemClass.type == 0" style="width: 140px;">
                                                                                <div ng-if="itemClass.load == 1" class="loader"></div>
                                                                                <span ng-if="itemClass.type == 0 && itemClass.load != 1 && itemClass.item != null && itemClass.saleprice !== null"><% (((itemClass.saleprice ? itemClass.saleprice  : 0))).formatPrice(quotation.rate.ClassFullName)  %></span>
                                                                            </td>
                                                                            <td ng-if="itemClass.type == 0">
                                                                                <div ng-if="itemClass.load == 1" class="loader"></div>
                                                                                <div ng-if="checkInstall(itemClass.PricePattern)" >
                                                                                    <input inputformatprice type="text" class="form-control"  name="" ng-model="itemClass.price">
                                                                                </div>
                                                                                <div ng-if="!checkInstall(itemClass.PricePattern)">
                                                                                    <span ng-if="itemClass.type == 0 && itemClass.load != 1 && itemClass.item != null && itemClass.price !== null"><% (((itemClass.price ? itemClass.price : 0) )).formatPrice(quotation.rate.ClassFullName)  %></span>
                                                                                </div>
                                                                            </td>
                                                                            <td ng-if="itemClass.type == 1">
                                                                                <div class="input-group">
                                                                                    <input inputformatprice type="text" ng-model="itemClass.saleprice" class="form-control" >
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
                                                    <div ng-if="product" class="product-other-classes-wrapper">
                                                        <div class="row">
                                                            <div class="col-xs-6 col-md-6"><button type="button" name="addOtherItem" ng-disabled="product == null" ng-click="addOtherItem()" class="btn btn-primary">_add_other_item_</button></div>
                                                            <div class="col-xs-6 col-md-6 text-right">
                                                                <button type="button" ng-disabled="product == null" ng-click="addlistProduct()" class="btn btn-primary"><% ButtonStatusAddList %></button>
                                                                <button type="button" ng-disabled="product == null" ng-click="addanCloselistProduct()" class="btn btn-primary">[_save_and_close_]</button>
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
        <div class="modal fade" id="modal-message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="exampleModalLabel" style="position: relative;">_add_new_quotation_ <span ng-if="productSaved" class="loader" style="display: inline-block;margin-left: 10px;position: absolute;top: -4px;left: 100%;"></span></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea style="min-height: 100px;" ng-model="quotation.message" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">_cancel_</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js_add')

<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/select2-bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('js/datetimepicker/jquery.datetimepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/quotation.css')}}">
<style type="text/css">
    .alert-message .alert {

        }
        .alert-message {
            position: fixed;
            left: 5px;
            bottom: -200px;
            min-width: 200px;
            z-index: 100;
           -webkit-transition: bottom 1s; /* Safari prior 6.1 */
            transition: bottom 1s;
        }
        .alert-message.open{
            bottom: 15px;
            -webkit-transition: bottom 1s; /* Safari prior 6.1 */
            transition: bottom 1s;
        }
        .alert-message .alert.alert-error{
            background-color: red;
        }
        .alert-message .alert.alert-success{
            background-color: #099e3c;
        }
        .alert-message .alert{
            padding: 5px 10px;
            color: #FFFFFF;
            padding-right: 30px;
            margin: 0;
        }
        .alert-message .alert-dismissible .close {
            position: absolute;
            top: 0;
            right: 0;
            padding: 6px 8px;
            color: inherit;
            color: #FFFFFF
        }
</style>
<script>
    var is_view = false;
    var rates = {!! (trim(json_encode($rates))) !!};
    var taxs = {!! json_encode( $taxs ) !!};
    var products = {!! json_encode( $products ) !!};
    var NotPlus = {!! json_encode($NotPlus) !!};
    var OnloadPrice = {!! json_encode($OnloadPrice) !!};
    var langs = {!! json_encode($langs) !!}
    var quotation =  @if(@$quotation) {!! json_encode($quotation) !!} @else {{ 'false' }} @endif ;
</script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/accounting.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jQuery-Fix-Table-header/dist/jquery.floatThead.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/quotations.js')}}"></script>
@stop
