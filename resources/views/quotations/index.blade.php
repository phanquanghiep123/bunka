@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-8">
		<h1 class="card-title">{{$_PAGETITLE}}
			@if($_SEFF->checkUserAllowAction('add'))
	    		<a href="{{$_SEFF->_ADDURL}}" class="btn btn-sm btn-secondary"><i class="menu-icon mdi mdi-plus"></i> _new_</a>
	    	@endif
	    </h1>
	</div>
</div>
<div ng-app="App" ng-controller="QuotationController">
    <div class="table-form row align-items-center">
        <div class="col-12">
            <form method="get" id="search-data" style="margin-bottom: 20px;">
                <div class="row align-items-center justify-content-end">
                    <div class="col-lg-2">
                        <input type="text" class="form-control" id="project" name="project" placeholder="_project_">
                    </div>
                     <div class="col-lg-2">
                        <input type="text" class="form-control" id="customer" name="customer" placeholder="_customer_">
                    </div>
                     <div class="col-lg-2">
                        <select class="form-control" name="branch">
                            <option value="0">-- _branch_ --</option>
                            @if(@$branchs)
                                @foreach($branchs as $key => $value)
                                    @if($_SEFF->_USER->branch_id == $value->id)
                                        <option selected="" value="{{$value->id}}">{{$value->name}}</option>
                                    @else
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <select class="form-control" name="salesman">
                            <option value="0">-- @lang('quotation.salesman') --</option>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group">
                            <input type="text" class="form-control" name="from_date" id="from_date" placeholder="[_from_date_]" autocomplete="off">
                            <input type="text" class="form-control" name="to_date" id="to_date" placeholder="[_to_date_]" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-primary btn-block">_search_</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
<div class="modal fade" id="modal-viewall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

        </div>
    </div>
</div>
<div class="modal fade" id="modal-viewreversion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="width: 100%;max-width:100%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="app-main">
                <div class="row">
                    <div class="col-md-6" >
                        <div class="row">
                            <div class="col-md-7"><h3>[_old_verstion_] <span ng-if="FOLDER1"><% FOLDER1.quotation.quotation_number%>#<%FOLDER1.quotation.reversion%></span></h3></div>
                            <div class="col-md-5">
                                <select ng-options='option as (option.quotation_number + "#"+option.reversion) for option in reversions track by option.id' class="form-control" name="reversion" ng-model="reversion"></select>
                            </div>

                        </div>
                        <div id="table-1" class="wrapper wrapper-1">
                            <table  ng-init="initFolders()" data-index="<%$index%>" ng-if="FOLDER1" class="sturdy">
                                <thead>
                                   <tr>
                                       <th style="width:15%;">Code</th>
                                       <th style="width:35%;">Items</th>
                                       <th style="width:35%">Remaks</th>
                                       <th style="width:15%">Price</th>
                                    </tr>
                                </thead>
                               <tbody>
                                <tr>
                                    <td colspan="4" style="padding: 0;margin: 0 ;width: 100%">
                                        <table class="table">
                                            <tbody class="parent-root" ui-sortable="sortableOptions" ng-model="FOLDER1.folders">
                                                <tr ng-init="initFolder($index)" ng-repeat="folder in FOLDER1.folders track by $index">
                                                    <td colspan="4" style="padding: 0;margin: 0 ;width: 100% ;">
                                                        <table data-index="<%$index%>" class="table" style="padding: 0 !important;margin: 0!important;">
                                                            <tbody>
                                                                <tr>
                                                                    <td rowspan="<%getLength(folder.items) + 6%>" style="padding: 0;margin:0;width:15%;text-align: center;vertical-align:middle;" valign="top" align="left"><% folder.code%></td>
                                                                    <td colspan="3" style="padding: 0;margin:0; border:none;" >
                                                                        <table class="table" style="padding: 0 !important;margin: 0!important;" data-index="<%$index%>">
                                                                            <tbody class="parent-tr-class" ui-sortable="sortableOptionsClass" ng-model="folder.items">
                                                                                <tr my-tr-init data-index="<%$index%>" ng-class="{'warning' : item.warning == false,'hover' : item.hover == true}" ng-repeat="item in folder.items track by $index">
                                                                                    <td ng-class="item.ItemNameCheck == false ? 'warning' : ''" style="width:35%" ng-if="$index == 0"><%item.ItemName%></td>
                                                                                    <td ng-class="item.ItemClassNameCheck == false ? 'warning' : ''" style="width:35%" ng-if="$index != 0"><%item.ItemClassName%></td>
                                                                                    <td ng-class="item.FormatPatternCheck == false ? 'warning' : ''" style="width:35%" ng-if="$index == 0"><%item.FormatPattern | FormatPattern:item %></td>
                                                                                    <td ng-class="item.ItemNameCheck == false ? 'warning' : ''" style="width:35%" ng-if="$index != 0"><%item.ItemName%></td>
                                                                                    <td ng-class="item.priceCheck == false ? 'warning' : ''" style="width:15%"><%item.price.formatPrice()%></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4" style="padding: 0;margin:0;">
                                                                        <table data-index="<%$index%>" style="padding: 0 !important;margin: 0!important;">
                                                                            <tbody>
                                                                                <tr my-chil-tr class="my-chil-tr quantity" ng-attr-data-key="quantity" ng-class="{
                                                                                    'warning': (folder.quantityCheck == false),
                                                                                    'hover'  : folder.quantityHover == true
                                                                                }">
                                                                                    <td style="width:35%;">[_quantity_]</td>
                                                                                    <td style="width:35%;"><% folder.quantity ? folder.quantity : '0' %></td>
                                                                                    <td style="width:15%;"></td>
                                                                                </tr>
                                                                                <tr my-chil-tr class="my-chil-tr" ng-attr-data-key="price" ng-class="{
                                                                                    'warning': (folder.priceCheck == false),
                                                                                    'hover'  : folder.priceHover == true
                                                                                }">
                                                                                    <td style="width:35%;">[_price_]</td>
                                                                                    <td style="width:35%;"></td>
                                                                                    <td style="width:15%;"><% folder.price ?  folder.price.formatPrice() : '0' %></td>
                                                                                </tr>
                                                                                <tr my-chil-tr class="my-chil-tr" ng-attr-data-key="installfee" ng-class="{
                                                                                    'warning': (folder.installfeeCheck == false),
                                                                                    'hover'  : folder.installfeeHover == true
                                                                                }">
                                                                                    <td style="width:35%;">[_installation_]</td>
                                                                                    <td style="width:35%;"></td>
                                                                                    <td style="width:15%;"><% folder.installfee ? folder.installfee.formatPrice() : '0'%></td>
                                                                                </tr>
                                                                                <tr my-chil-tr class="my-chil-tr" ng-attr-data-key="inlandfreightfee" ng-class="{
                                                                                    'warning': (folder.inlandfreightfeeCheck == false),
                                                                                    'hover'  : folder.inlandfreightfeeHover == true
                                                                                }">
                                                                                    <td style="width:35%;">[_inland_freight_]</td>
                                                                                    <td style="width:35%;"></td>
                                                                                    <td style="width:15%;"><% folder.inlandfreightfee ? folder.inlandfreightfee.formatPrice() : '0' %></td>
                                                                                </tr>
                                                                                <tr my-chil-tr class="my-chil-tr" ng-attr-data-key="total" ng-class="{
                                                                                    'warning': (folder.totalCheck == false),
                                                                                    'hover'  : folder.totalHover == true
                                                                                }">
                                                                                    <td style="width:35%;">[_sub_total_]</td>
                                                                                    <td style="width:35%;"></td>
                                                                                    <td style="width:15%;"><% folder.total ? folder.total.formatPrice() : '0' %></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="padding: 0;margin: 0;width: 100%;border-right: none;">
                                        <table class="table table-bordered" style="padding: 0 !important;margin: 0!important;">
                                            <tbody>
                                                <tr>
                                                    <td rowspan="6" style="width:15%;text-align: center;vertical-align:middle;border-left: none;" valign="top" align="left">[_total_]</td>
                                                    <td colspan="3" style="width:85%;padding: 0;margin: 0;border: none;border-bottom: 1px solid #000;">
                                                        <table class="table table-bordered" style="padding: 0 !important;margin: 0!important;">
                                                            <tbody>
                                                                <tr my-parent-tr class="my-parent-tr"
                                                                ng-attr-data-key="quantity" ng-class="{
                                                                    'warning': (FOLDER1.quotation.quantityCheck == false),
                                                                    'hover'  : FOLDER1.quotation.quantityHover == true
                                                                }">
                                                                    <td style="width:35%; border-top: 1px solid #000;">[_quantity_]</td>
                                                                    <td style="width:35%; border-top: 1px solid #000;"><% FOLDER1.quotation.quantity %></td>
                                                                    <td style="width:15%; border-top: 1px solid #000;"></td>
                                                                </tr>
                                                                <tr my-parent-tr class="my-parent-tr"
                                                                ng-attr-data-key="price" ng-class="{
                                                                    'warning': (FOLDER1.quotation.priceCheck == false),
                                                                    'hover'  : FOLDER1.quotation.priceHover == true
                                                                }">
                                                                    <td style="width:35%;">[_price_]</td>
                                                                    <td style="width:35%;"></td>
                                                                    <td style="width:15%;"><% FOLDER1.quotation.price.formatPrice() %></td>
                                                                </tr>
                                                                <tr my-parent-tr class="my-parent-tr" ng-attr-data-key="installfee" ng-class="{
                                                                    'warning': (FOLDER1.quotation.installfeeCheck == false),
                                                                    'hover'  : FOLDER1.quotation.installfeeHover == true
                                                                }">
                                                                    <td style="width:35%;">[_installation_]</td>
                                                                    <td style="width:35%;"></td>
                                                                    <td style="width:15%;"><% FOLDER1.quotation.installfee.formatPrice() %> </td>
                                                                </tr>
                                                                <tr my-parent-tr class="my-parent-tr" ng-attr-data-key="inlandfreightfee" ng-class="{
                                                                    'warning': (FOLDER1.quotation.inlandfreightfeeCheck == false),
                                                                    'hover'  : FOLDER1.quotation.inlandfreightfeeHover == true
                                                                }">
                                                                    <td style="width:35%;">[_inland_freight_]</td>
                                                                    <td style="width:35%;"></td>
                                                                    <td style="width:15%;"><% FOLDER1.quotation.inlandfreightfee.formatPrice() %></td>
                                                                </tr>
                                                                <tr my-parent-tr class="my-parent-tr" ng-attr-data-key="total" ng-class="{
                                                                    'warning': (FOLDER1.quotation.totalCheck == false),
                                                                    'hover'  : FOLDER1.quotation.totalHover == true
                                                                }">
                                                                    <td style="width:35%;">[_sub_total_]</td>
                                                                    <td style="width:35%;"></td>
                                                                    <td style="width:15%;"><% FOLDER1.quotation.total.formatPrice() %></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                               </tbody>
                           </table>
                        </div>
                    </div>
                    <div class="col-md-6" style="border-left: 2px solid #dddddd">
                        <h3>[_current_verstion_] <span ng-if="FOLDER2"><% FOLDER2.quotation.quotation_number%>#<%FOLDER2.quotation.reversion%></span></h3>
                        <div id="table-2" class="wrapper wrapper-1">
                            <table data-index="<%$index%>" ng-if="FOLDER2" class="sturdy">
                                <thead>
                                   <tr>
                                       <th style="width:10%;">Code</th>
                                       <th style="width:30%;">Items</th>
                                       <th style="width:30%">Remaks</th>
                                       <th style="width:15%">Price</th>
                                       <th style="width:15%">Merge Price</th>
                                    </tr>
                                </thead>
                               <tbody>
                                <tr>
                                    <td colspan="5" style="padding: 0;margin: 0 ;width: 100%">
                                        <table class="table">
                                            <tbody class="parent-root" ui-sortable="sortableOptions" ng-model="FOLDER2.folders">
                                                <tr ng-repeat="folder in FOLDER2.folders track by $index">
                                                    <td colspan="5" style="padding: 0;margin: 0 ;width: 100% ;">
                                                        <table data-index="<%$index%>" class="table" style="padding: 0 !important;margin: 0!important;">
                                                            <tbody>
                                                                <tr>
                                                                    <td rowspan="<%getLength(folder.items) + 6%>" style="padding: 0;margin:0;width:10%;text-align: center;vertical-align:middle;" valign="top" align="left"><% folder.code%></td>
                                                                    <td colspan="4" style="padding: 0;margin:0; border:none; width: 90%;" >
                                                                        <table class="table" style="padding: 0 !important;margin: 0!important;" data-index="<%$index%>">
                                                                            <tbody class="parent-tr-class" ui-sortable="sortableOptionsClass" ng-model="folder.items">
                                                                                <tr my-tr-onload data-index="<%$index%>" ng-class="{'warning' : item.warning == false,'hover' : item.hover == true}" ng-repeat="item in folder.items track by $index">
                                                                                    <td ng-class="item.ItemNameCheck == false ? 'warning' : ''" style="width:30%" ng-if="$index == 0"><%item.ItemName%></td>
                                                                                    <td ng-class="item.ItemClassNameCheck == false ? 'warning' : ''" style="width:30%" ng-if="$index != 0"><%item.ItemClassName%></td>
                                                                                    <td ng-class="item.FormatPatternCheck == false ? 'warning' : ''" style="width:30%" ng-if="$index == 0"><%item.FormatPattern | FormatPattern:item %></td>
                                                                                    <td ng-class="item.ItemNameCheck == false ? 'warning' : ''" style="width:30%" ng-if="$index != 0"><%item.ItemName%></td>
                                                                                    <td ng-class="item.priceCheck == false ? 'warning' : ''" style="width:15%"><%item.price.formatPrice()%></td>
                                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (item.mergePrice).formatPrice() %></th>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4" style="padding: 0;margin:0;">
                                                                        <table data-index="<%$index%>" style="padding: 0 !important;margin: 0!important;">
                                                                            <tbody>
                                                                                <tr my-chil-tr class="my-chil-tr quantity" ng-attr-data-key="quantity" ng-class="{
                                                                                    'warning': (folder.quantityCheck == false),
                                                                                    'hover'  : folder.quantityHover == true
                                                                                }">
                                                                                    <td style="width:30%;">[_quantity_]</td>
                                                                                    <td style="width:30%;"><% folder.quantity ? folder.quantity : '0' %></td>
                                                                                    <td style="width:15%;"></td>
                                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (folder.quantity - FOLDER1.folders[$index].quantity) %></th>
                                                                                </tr>
                                                                                <tr my-chil-tr class="my-chil-tr" ng-attr-data-key="price" ng-class="{
                                                                                    'warning': (folder.priceCheck == false),
                                                                                    'hover'  : folder.priceHover == true
                                                                                }">
                                                                                    <td style="width:30%;">[_price_]</td>
                                                                                    <td style="width:30%;"></td>
                                                                                    <td style="width:15%;"><% folder.price ?  folder.price.formatPrice() : '0' %></td>
                                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (folder.price - FOLDER1.folders[$index].price).formatPrice() %></th>
                                                                                </tr>
                                                                                <tr my-chil-tr class="my-chil-tr" ng-attr-data-key="installfee" ng-class="{
                                                                                    'warning': (folder.installfeeCheck == false),
                                                                                    'hover'  : folder.installfeeHover == true
                                                                                }">
                                                                                    <td style="width:30%;">[_installation_]</td>
                                                                                    <td style="width:30%;"></td>
                                                                                    <td style="width:15%;"><% folder.installfee ? folder.installfee.formatPrice() : '0'%></td>
                                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (folder.installfee - FOLDER1.folders[$index].installfee).formatPrice() %></th>
                                                                                </tr>
                                                                                <tr my-chil-tr class="my-chil-tr" ng-attr-data-key="inlandfreightfee" ng-class="{
                                                                                    'warning': (folder.inlandfreightfeeCheck == false),
                                                                                    'hover'  : folder.inlandfreightfeeHover == true
                                                                                }">
                                                                                    <td style="width:30%;">[_inland_freight_]</td>
                                                                                    <td style="width:30%;"></td>
                                                                                    <td style="width:15%;"><% folder.inlandfreightfee ? folder.inlandfreightfee.formatPrice() : '0' %></td>
                                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (folder.inlandfreightfee - FOLDER1.folders[$index].inlandfreightfee).formatPrice() %></th>
                                                                                </tr>
                                                                                <tr my-chil-tr class="my-chil-tr" ng-attr-data-key="total" ng-class="{
                                                                                    'warning': (folder.totalCheck == false),
                                                                                    'hover'  : folder.totalHover == true
                                                                                }">
                                                                                    <td style="width:30%;">[_sub_total_]</td>
                                                                                    <td style="width:30%;"></td>
                                                                                    <td style="width:15%;"><% folder.total ? folder.total.formatPrice() : '0' %></td>
                                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (folder.total - FOLDER1.folders[$index].total).formatPrice() %></th>
                                                                                </tr>

                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="padding: 0;margin: 0;width: 100%;border-right: none;">
                                        <table class="table table-bordered" style="padding: 0 !important;margin: 0!important;">
                                            <tbody>

                                                <tr>
                                                    <td rowspan="6" style="width:10%;text-align: center;vertical-align:middle;border-left: none;" valign="top" align="left">[_total_]</td>
                                                    <td colspan="4" style="width:90%;padding: 0;margin: 0;border: none;border-bottom: 1px solid #000;">
                                                        <table class="table table-bordered" style="padding: 0 !important;margin: 0!important;">
                                                            <tbody>
                                                                <tr my-parent-tr class="my-parent-tr"
                                                                ng-attr-data-key="quantity" ng-class="{
                                                                    'warning': (FOLDER2.quotation.quantityCheck == false),
                                                                    'hover'  : FOLDER2.quotation.quantityHover == true
                                                                }">
                                                                    <td style="width:30%; border-top: 1px solid #000;">[_quantity_]</td>
                                                                    <td style="width:30%; border-top: 1px solid #000;"><% FOLDER2.quotation.quantity %></td>
                                                                    <td style="width:15%; border-top: 1px solid #000;"></td>
                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (FOLDER2.quotation.quantity - FOLDER1.quotation.quantity) %></td>
                                                                </tr>
                                                                <tr my-parent-tr class="my-parent-tr"
                                                                ng-attr-data-key="price" ng-class="{
                                                                    'warning': (FOLDER2.quotation.priceCheck == false),
                                                                    'hover'  : FOLDER2.quotation.priceHover == true
                                                                }">
                                                                    <td style="width:30%;">[_price_]</td>
                                                                    <td style="width:30%;"></td>
                                                                    <td style="width:15%;"><% FOLDER2.quotation.price.formatPrice() %></td>
                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (FOLDER2.quotation.price - FOLDER1.quotation.price).formatPrice() %></td>
                                                                </tr>
                                                                <tr my-parent-tr class="my-parent-tr" ng-attr-data-key="installfee" ng-class="{
                                                                    'warning': (FOLDER2.quotation.installfeeCheck == false),
                                                                    'hover'  : FOLDER2.quotation.installfeeHover == true
                                                                }">
                                                                    <td style="width:30%;">[_installation_]</td>
                                                                    <td style="width:30%;"></td>
                                                                    <td style="width:15%;"><% FOLDER2.quotation.installfee.formatPrice() %> </td>
                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (FOLDER2.quotation.installfee - FOLDER1.quotation.installfee).formatPrice() %></td>
                                                                </tr>
                                                                <tr my-parent-tr class="my-parent-tr" ng-attr-data-key="inlandfreightfee" ng-class="{
                                                                    'warning': (FOLDER2.quotation.inlandfreightfeeCheck == false),
                                                                    'hover'  : FOLDER2.quotation.inlandfreightfeeHover == true
                                                                }">
                                                                    <td style="width:30%;">[_inland_freight_]</td>
                                                                    <td style="width:30%;"></td>
                                                                    <td style="width:15%;"><% FOLDER2.quotation.inlandfreightfee.formatPrice() %></td>
                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (FOLDER2.quotation.inlandfreightfee - FOLDER1.quotation.inlandfreightfee).formatPrice() %></td>
                                                                </tr>
                                                                <tr my-parent-tr class="my-parent-tr" ng-attr-data-key="total" ng-class="{
                                                                    'warning': (FOLDER2.quotation.totalCheck == false),
                                                                    'hover'  : FOLDER2.quotation.totalHover == true
                                                                }">
                                                                    <td style="width:30%;">[_sub_total_]</td>
                                                                    <td style="width:30%;"></td>
                                                                    <td style="width:15%;"><% FOLDER2.quotation.total.formatPrice() %></td>
                                                                    <td style="width:15%; background-color:#ffaf00; font-weight:bold;"><% (FOLDER2.quotation.total - FOLDER1.quotation.total).formatPrice() %></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                               </tbody>
                           </table>
                        </div>
                    </div>
                    <div class="col-md-12 text-center"><hr></div>
                    <div class="col-md-12 text-center"><a class="btn btn-primary" href="javascript:;" ng-click="exportMerge()">[_dowload_]</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop
@section('css_add')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
    #modal-viewall tr.activer {
        background-color: yellow;
    }
    #modal-viewall .list {
        list-style: none outside none;
        margin: 10px 0 30px;
    }
    .sortable-placeholder {
        height: 50px !important;
        background: yellow;
        border: 1px dashed #ccc;
    }

    .app-main{
        padding: 20px 15px;
        background-color: #ffffff;
    }
    table.sturdy {
        width: 100%;
         table-layout:fixed;
    }
    table.sturdy table {
        table-layout:fixed;
        width: 100%;
    }
    table.sturdy table td {
        overflow: hidden;
        text-overflow: ellipsis;
    }
    table.sturdy table{
        padding: 0;
        margin: 0;
        width: 100%;
        border: none;
    }
    table.sturdy table > tbody tr > td{
        padding: 0;
        border: none;
    }
    table.sturdy table > tbody tr > td td{
        border: 1px solid #000;
    }
    table.sturdy table > tbody tr > td td td{
        padding: 5px;
        border: 1px dashed #000;
    }
    table.sturdy tr  td[colspan="3"]{
        border-right: 1px solid #000 !important;
    }
    table.sturdy table > tbody tr > td td tr:last-child td{
        border-bottom: none !important;
    }
    table.sturdy table > tbody tr > td td tr.quantity:first-child > td {
        border-top: 3px double #000 !important;
    }
    table.sturdy table > tbody tr > td td tr:first-child > td{
        border-top: 1px solid #000!important;
    }
    table.sturdy > tbody > tr td[colspan="4"] tr td[colspan="4"],table.sturdy > tbody > tr td[colspan="5"] tr td[colspan="4"]{
        border-top: none;
    }
    table.sturdy > tbody > tr:nth-child(2) > td[colspan="4"] table tbody tr td {
        border: 1px solid #000;
    }
    table.sturdy > tbody > tr:nth-child(2) > td[colspan="4"] table tbody tr td tr td,table.sturdy > tbody > tr:nth-child(2) > td[colspan="5"] table tbody tr td tr td{
        padding: 5px;
        border: 1px dashed #000;
    }
    table.sturdy > tbody > tr:nth-child(2) td[colspan="4"],table.sturdy > tbody > tr:nth-child(2) td[colspan="5"]{
        border: 1px solid #000;
    }
    table.sturdy > tbody td[colspan="3"] {
        width: 85%;
    }
    table.sturdy th {
        border-bottom: 1px solid #000;
    }

    tr.hover{
        background: yellow !important;
    }
    tr.warning{
        background: #2521212e;
    }
    tr.warning td.warning{
        font-weight: bold;
    }
</style>
@stop
@section('js_add')
    {!! $html->scripts() !!}
    <script type="text/javascript">
        var DDURL = window.LaravelDataTables["dataTableBuilder"].ajax.url();
        function funDowloadQuotation ($event){
            var _this = $(event.target);
            var lang = _this.closest(".parent-row").find(".select-value-lang").val();
            var href = _this.attr("data-href") + '/'+lang;
            var element = document.createElement('a');
            element.setAttribute('href', href);
            element.setAttribute('download','true')
            element.style.display = 'none';
            document.body.appendChild(element);
            element.click();
            document.body.removeChild(element);
            return false;
        }
        $(document).on("click",".action-delete",function(event){
            event.stopPropagation();
            event.preventDefault();
            var url = $(this).attr("href");
            var warning = '_warning_delete_';
            if (confirm(warning)){
                $.ajax({
                    url : url,
                    type:"get",
                    success : function(data){
                        if(data.status == 1)
                            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
                        else{
                            alert("_error_!!!");
                        }
                    }
                })
            }
            return false;

        });
        $(document).on("click",".treeview",function(event){
            event.stopPropagation();
            event.preventDefault();
            var url = $(this).attr("href");
            $.ajax({
                dataType:"json",
                url : url,
                type:"get",
                success : function(data){
                    if(data.status == 1) {
                        $("#modal-viewall .modal-content").html(data.data);
                        $("#modal-viewall").modal();
                    }
                    else{
                        alert("Error!!!");
                    }
                }
            })
            return false;

        });
        $('#search-data').submit(function(){
            event.stopPropagation();
            event.preventDefault();
            var data = $(this).serialize();
            var ADDD = DDURL;
            if(ADDD.indexOf("?")){
                ADDD += '?search=true';
            }
            ADDD += '&' + data;
            window.LaravelDataTables["dataTableBuilder"].ajax.url(ADDD);
            window.LaravelDataTables["dataTableBuilder"].ajax.reload( null, false );
            return false;
        });
    </script>
    <script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.table2excel.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{asset('js/sortable.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jQuery-Fix-Table-header/dist/jquery.floatThead.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/merge-quotations.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('js/datetimepicker/jquery.datetimepicker.css')}}">
    <script type="text/javascript" src="{{asset('js/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
    <script type="text/javascript">
        $("#date_start").datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',

        });
        var from_date,to_date;
        from_date = $("#from_date").datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
            onSelectDate : function(date){
            	to_date.datetimepicker('setOptions', {
                    minDate: date
                });
            }
        });

        to_date = $("#to_date").datetimepicker({
            timepicker: false,
            format: 'd/m/Y',
            formatDate: 'd/m/Y',
        });

        function onBranchChanged(event) {
            var params = {
                branch: $(this).val()
            }

            $.getJSON("{{route('quotations.salesman')}}", params,
                function (salesman, textStatus, jqXHR) {
                    // -- @lang('quotation.salesman') --
                    if (typeof salesman == 'object') {
                        var salesman = _.union([{
                            id: 0,
                            first_name: "-- @lang('quotation.salesman') --",
                            last_name: "",
                            code: null
                        }], salesman);

                        $('[name="salesman"]')
                            .empty()
                            .append(
                                _.map(
                                    salesman,
                                    function (item, key) {
                                        return $('<option>', {
                                            value: item.id,
                                            text: _.join([item.first_name, item.last_name], ' ') + (item.code ? " (" + item.code + ")" : "")
                                        });
                                    }
                                )
                            );
                    }
                }
            );
        }

        $(function() {
            $('[name="branch"]')
                .on('change', onBranchChanged)
                .trigger('change');
        });
    </script>
@stop
