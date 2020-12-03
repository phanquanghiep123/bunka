@extends('layouts.app')
@section('content')
<div class="angular-main" ng-app="App" ng-controller="OrdersController" >
    <div class="content-main" style="display: none;">
        <h1 class="card-title">[_order_]</h1>
        <form id="order-form" class="row" method="post">
            <div class="col-lg-12">
                <div class="card grid-margin">
                    <div class="card-body">
                        <h4 class="card-title">_general_informations_</h4>
                        <div class="form-row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">_order_number_</label>
                                    <input type="text" disabled="disabled" value="<% getOrderNo() %>" name="order_number" class="form-control" id="" placeholder="Order No.">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="person_in_charge">_person_in_charge_</label>
                                    <div class="input-group" select2user></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">_receiving_order_date_</label>
                                    <input day ng-model="order.receiving_order_date" min="0" data-validate="required|date" validate="true" type="text" name="receiving_order_date" class="form-control" placeholder="_receiving_order_date_" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="planned_delivery_date">_planned_delivery_date_</label>
                                    <input day ng-attr-datamin="true" ng-model="order.planned_delivery_date" min="order.receiving_order_date" data-validate="required|date" validate="true" type="text" name="planned_delivery_date" class="form-control" id="" placeholder="_planned_delivery_date_">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">_planned_installation_date_</label>
                                    <input day ng-model="order.planned_installation_date" data-validate="required|date" validate="true" type="text" min="0" name="planned_installation_date" class="form-control" placeholder="Receiving order date" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <div class="form-group">
                                    <label for="">_planned_completion_date_</label>
                                    <input day ng-attr-datamin="true" min="order.planned_installation_date" ng-model="order.planned_completion_date" data-validate="required|date" validate="true"type="text" name="planned_completion_date" class="form-control" placeholder="_planned_completion_date_" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">[_construction_]</label>
                                    <div class="input-group" select2construction></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">_quotation_</label>
                                    <div class="input-group" select2quotation></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div ng-if="order.construction ">
                    <div class="grid-margin"> 
                        <h4 class="card-title">_construction_informations_</h4>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_construction_site_name_</span> <span class="value-holder"><%order.construction.name%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_construction_site_address_</span> <span class="value-holder"><%order.construction.address%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_construction_manager_</span> <span class="value-holder"><%order.construction.manager%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_PHONE_</span> <span class="value-holder"><%order.construction.phone%></span></p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value"><span class="label-holder">_FAX_</span> <span class="value-holder"><%order.construction.fax%></span></p>
                            </div>
                        </div>
                    </div>
                </div> 
                <div ng-if="order.quotation.not != false">
                    <div ng-if="order.quotation.products" class="grid-margin">
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
                                    <tr class="parent parent-<% product.id %>" data-id="<% product.id %>" ng-repeat="product in order.quotation.products track by $index">
                                        <td><% ($index + 1) %></td>
                                        <td><a data-id="<% product.id %>" ng-click="ViewProduct(product)" class="on-open" href="javascript:;" ><% product.ClassName %></a></td>
                                        <td><% (product.NUMSP).formatPrice() %></td>
                                        <td><% (product.NUMP).formatPrice() %></td>
                                        <td><% (product.NUMD).formatPrice() %></td>
                                        <td>
                                            <a data-id="<% product.id %>" ng-click="ViewProduct(product)" class="on-open btn btn-icons btn-inverse-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                        </td>
                                    </tr>
                                    <tr ng-repeat="othproduct in order.quotation.othproducts track by $index">
                                        <td><%countProduct(($index + 1))%></td>
                                        <td><% othproduct.name %></td>
                                        <td><% othproduct.saleprice.formatPrice()  %></td>
                                        <td><% othproduct.price.formatPrice()  %></td>
                                        <td></td> 
                                        <td></td>  
                                    </tr>
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
                </div>
            </div>
            <div class="col-lg-12">
                <div class="layout-col-2-inner">
                    <div>
                        <div class="card grid-margin">
                            <h4 class="card-title"><span style="position: relative;">_publish_ <span ng-if="order.saved" class="loader" style="display: inline-block;margin-left: 10px;position: absolute;top: -4px;left: 100%;"></span></span></h4>
                            <ul style="display: inline-block; text-align: center;">
                                <li style="display: inline-block; text-align: center;">
                                    <button style="background-color:#4F0B0B;color:#FFFFFF" ng-click="SaveOrder(0)" ng-disabled="order.saved == true" class="btn btn-small btn-block" type="submit">[_save_draft_]</button>
                                </li>
                                <li style="display: inline-block; text-align: center;">
                                    <button style="background-color:#FFAF00;color:#FFFFFF" ng-click="SaveOrder(1)" ng-disabled="order.saved == true" class="btn btn-small btn-block" type="submit">[_save_submit_]</button>
                                </li>  
                                @if($_SEFF->_USER->hasTypeUserForOrder() == 1)
                                     
                                    <li style="display: inline-block; text-align: center;">
                                        <button style="background-color:#DF0302;color:#FFFFFF" ng-click="SaveOrder(5)" ng-disabled="order.saved == true" class="btn btn-small btn-block" type="submit">[_save_rejected]</button>
                                    </li>
                                    <li style="display: inline-block; text-align: center;">
                                        <button style="background-color:#00CE68;color:#FFFFFF" ng-click="SaveOrder(2)" ng-disabled="order.saved == true" class="btn btn-small btn-block" type="submit">[_save_accepted]</button>
                                    </li>        
                                @endif
                                
                            </ul>
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
    </div>
    <div class="modal fade" id="modal-view-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 ng-if="product" id="exampleModalLabel" style="position: relative;"><% product.ClassFullName %><span ng-if="productSaved" class="loader" style="display: inline-block;margin-left: 10px;position: absolute;top: -4px;left: 100%;"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
               <div class="modal-body">
                   <table class="table table-bordered dt-responsive nowrap" style="width:100%">
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
                            <tr ng-repeat="$item in product.details track by $index">
                                <td class="text-center"><% ($index + 1) %></td>
                                <td><%$item.code%></td>
                                <td><%($item.quantity ? $item.quantity : 0).formatPrice('0,0') %></td>
                                <td><%($item.productprice ? $item.productprice : 0 ).formatPrice() %> <% CuRate.ClassName %></td>
                                <td><%($item.installfee ? $item.installfee : 0).formatPrice()%> <% CuRate.ClassName %></td>
                                <td><%($item.inlandfreightfee ? $item.inlandfreightfee : 0).formatPrice()%> <% CuRate.ClassName %></td>
                                <td><%($item.discount ? $item.discount : 0).formatPrice('0,0') %> <% CuRate.ClassName %></td>
                                <td><%($item.saleprice ? $item.saleprice : 0).formatPrice()%> <% CuRate.ClassName %></td>
                                <td><%($item.price ? $item.price : 0).formatPrice()%> <% CuRate.ClassName %></td>
                            </tr>
                            <tr ng-if="product.list.length < 1" class="row-noborder no-subtable" style="height: 40px;  background:#fff">
                                <td colspan="5" style="padding-left:10px;text-align: right;">_sub_total_:</td>
                                <td colspan="5" style="text-align: right;"><b><% GetSubTotalProduct(product).formatPrice() %> <% CuRate.ClassName %></b></td>
                            </tr>
                            <tr ng-if="product.list.length < 1" class="row-noborder no-subtable" style="height: 40px; background:#fff">
                                <td colspan="5" style="padding-left:10px;text-align: right;">_discount_:</td>
                                <td colspan="5" style="text-align: right;"><b><% GetTotalDiscountProduct(product).formatPrice() %> <% CuRate.ClassName %></b></td>
                            </tr>
                            <tr ng-if="product.list.length < 1" class="row-noborder no-subtable" style="height: 40px; background:#fff">
                                <td colspan="5" style="padding-left:10px;text-align: right;">_total_:</td>
                                <td colspan="5" style="text-align: right;"><b><% GetTotalProduct(product).formatPrice() %> <% CuRate.ClassName %></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
        #modal-view-product .modal-full {
            width: 1138px;
            max-width: 100%;
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
        #order-form .btn.btn-small {
            width: auto;
        }
    </style>
@stop
@section('js_add')
<link rel="stylesheet" type="text/css" href="{{asset('css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/select2-bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('js/datetimepicker/jquery.datetimepicker.css')}}">
<script type="text/javascript" src="{{asset('js/jquery.lockfixed.min.js')}}"></script>
<script type="text/javascript">
    var order = {!! json_encode(@$order) !!};
    var rate    = {!! json_encode(@$rate) !!};
    var langs = null;
    $(document).on("click","#price-before-holder .on-open",function(){
        var id = $(this).attr("data-id");
        $.each($("#price-before-holder .child.child-"+id),function(){
            $(this).toggleClass("open");
        });
    });
    $(document).ready(function(){
        $.lockfixed(".sidebar-contract .outpart",{offset: {top: 65}});
    });
    
</script>
<script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/select2.js')}}"></script>
<script type="text/javascript" src="{{asset('js/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jQuery-Fix-Table-header/dist/jquery.floatThead.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/orders.js')}}"></script>
@stop
