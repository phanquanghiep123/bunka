
@extends('layouts.app')
@section('content')
<h1 class="card-title">{{$_PAGETITLE}}</h1>
<div class="table-form row align-items-center">
    <div class="col-12 col-xl-11 order-xl-2">
        <form method="get" id="search-data">
            <div class="form-row align-items-center justify-content-end">
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" id="name" name="keyword" placeholder="_order_number_">
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <input type="text" class="form-control" name="created_at" id="created_at" placeholder="_start_date_end_date_" autocomplete="off">
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <select class="form-control" name="branch">
                        <option value="">_branchs_</option>
                        <?php if(isset($branchs) && $branchs != null): ?>
                            <?php foreach ($branchs as $key => $branch): ?>
                                <option value="<?php echo $branch->id; ?>"><?php echo $branch->name; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <select class="form-control" name="status" {{@$status_id ? 'disabled' : ''}}>
                        <option value="">_status_</option>
                        <?php if(isset($status) && $status != null): ?>
                            <?php foreach ($status as $key => $item): ?>
                                <option value="<?php echo $item->id; ?>" {{ (@$status_id == $item->id) ? 'selected' : ''}}><?php echo $item->status_name->name; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-12 col-md-auto mb-2">
                    <button type="submit" class="btn btn-primary btn-block">_search_</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-xl-1 mb-2 order-xl-1">
        @if($_SEFF->checkUserAllowAction('add'))
            <a href="{{$_SEFF->_ADDURL}}" class="btn btn-secondary"><i class="menu-icon mdi mdi-plus"></i> _new_</a>
        @endif 
    </div>
</div>
{!! $html->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
<div class="modal fade" id="modal-viewall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<div ng-app="App" ng-controller="RevenueController" >
    <div class="modal fade" id="modal-revenue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 100%;">
            <div ng-if="order" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">[_update_revenue_] [_order_] <% order.order_number %></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <table cellspacing="0" border="0">
                        <tbody>
                            <tr>
                                <td colspan="19" align="center" valign="middle"><font size="6" style="text-transform: uppercase;font-weight: bold;" color="#000000">[_revenue_recognition_]</font></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="40" align="left" valign="bottom"><font size="2" color="#000000">_quotation_number_</font></td>
                                <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font size="2" color="#000000"><% order.quotation_number %></font></td>
                                <td align="left" style="border-right: 1px solid #000;" colspan="15" valign="bottom"><font color="#000000"></font></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="40" align="left" valign="bottom"><font color="#000000">_order_number_</font></td>
                                <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font size="2" color="#000000"><% order.order_number %></font></td>
                                <td colspan="15" style="border-right: 1px solid #000;" align="center" valign="bottom"><font size="2" color="#000000">( [_order_for_received _] )</font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">_receiving_order_date_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="4" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.receiving_order_date %></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"><font color="#000000">[_order_no_by_quotation_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle" sdval="0" sdnum="1033;"><font color="#000000">0</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="middle"><font color="#000000">R0</font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">_person_in_charge_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="4" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.user_change %></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="center" valign="middle"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"><font color="#000000">[_revenue_recognition_date_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="left" valign="middle"><font color="#000000">……. / ………. / ……………</font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">[_customer_code_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="4" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.customer_code %></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td colspan="4" align="center" valign="bottom"><font color="#000000">NON-EPE </font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td colspan="2" align="left" valign="bottom"><font color="#000000">Revenue Recognition amount</font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">_customer_information_authorized_name_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="6" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.authorized_name %></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="4" rowspan="2" align="left" valign="bottom"><font color="#000000">[_note_]:</font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">_customer_information_owner_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="6" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.owner %></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">_person_in_charge_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_Sales_Manager_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">G.A [_Manager_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_Accountant_]</font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">[_order_code_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="6" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" align="center" valign="middle"><font color="#000000">_receiving_order_date_ </font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">_construction_site_name_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="6" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.construction_name %></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">_construction_site_address_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="6" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.construction_address %></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" align="center" valign="middle"><font color="#000000">[_revenue_recognition_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="left" valign="middle"><font size="2" color="#000000">_planned_installation_date_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="4" align="left" valign="middle" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.planned_installation_date %></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left" valign="bottom"><font color="#000000"></font></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="40" align="left" valign="bottom"><font size="2" color="#000000">[_panned_completation_date_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="4" align="left" valign="bottom" bgcolor="#FFFFE1"><font size="2" color="#000000"><% order.planned_completion_date %></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font size="2" color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000"></font></td>
                                <td align="left" valign="bottom"><font color="#000000">[_Check_List_]</font></td>
                                <td align="left" valign="bottom"><font color="#000000">[_contracts_]</font></td>
                                <td align="left" valign="bottom"><font color="#000000">BBNT</font></td>
                            </tr>
                            <tr height="29">
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#0000CC"></font></td>
                            </tr>
                            <tr height="29">
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000"></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(1)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(2)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(3)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(4)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(5)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(6)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(7)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(8)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(9)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(10)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(11)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(12)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(13)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(14)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(15)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(16)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(17)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCECFF"><font color="#000000">(18)</font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_number_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_product_service_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">_AMOUNT_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_area_](m²)</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_quotation_price_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_Accepted_amount_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_production_cost_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_installation_fee_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">Paintcost</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_Monitoring_cost_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_Container_rental_costs_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_working_travel_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_design_cost_]</td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_shipping _in_vn_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_import_export_cost_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">_tax_</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_Agency_cost_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">[_profit_]</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000">_total_price_</font></td>
                            </tr>
                            
                            <tr ng-repeat-start="product in order.products track by $index" height="29">
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan="2" align="center" valign="middle" sdval="1" sdnum="1033;"><font color="#000000"><% $index %></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% product.FactoryName%></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% product.Squantity%></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% product.Acreage %></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% round(product.Sprice).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.accepted_amount" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% round(product.Sproductprice).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% round(product.Sinstallfee).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.paint_cost" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.monitoring_cost" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.container_rental_costs" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.working_fee" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.design_costs" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% round(product.Sinlandfreightfee).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.import_export_costs" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.tax" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><input inputformatprice="" style="padding: 5px 5px;font-size: 10px;" type="text" data-validate="required" validate="true" ng-model="product.agency_costs" class="form-control"></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCFFCC"><font color="#000000"><% ProductProfit(product).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCFFCC"><font color="#000000"><% GetTotalProduct(product).formatPrice() %></font></td>
                            </tr>
                            <tr ng-repeat-end height="29">
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% percentPrice( round(product.Sprice),round(product.accepted_amount))%></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% percentPrice(round(product.accepted_amount),round(product.Sproductprice) )%></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% percentPrice(round(product.accepted_amount) ,round(product.Sinstallfee) )%></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"><% percentPrice( round(product.accepted_amount),round(product.Sinlandfreightfee) )%></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle"><font color="#000000"></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCFFCC"><font color="#000000"><% percentPrice(round(product.accepted_amount),ProductProfit(product) )%></font></td>
                                <td style="border-top: 1px dashed #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" bgcolor="#CCFFCC"><font color="#000000"><% percentPrice (round(product.accepted_amount),GetTotalProduct(product))%></font></td>
                            </tr>
                            <tr>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan="2" height="40" align="center" valign="middle"><font color="#000000">** TOTAL **</font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="3" sdnum="1033;"><font color="#000000"><% GetProductsTotalByKey('Squantity',order.products) %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0.104796" sdnum="1033;"><font color="#000000"><% GetProductsTotalByKey('Acreage',order.products) %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="6081960000" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('Sprice',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="6081960000" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('accepted_amount',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="434570000" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('Sproductprice',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="19990000" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('installfee',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('paint_cost',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('monitoring_cost',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('container_rental_costs',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('working_fee',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('design_costs',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="523390000" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('inlandfreightfee',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('import_export_costs',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('tax',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="0" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotalByKey('agency_costs',order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="5104010000" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsProfit(order.products)).formatPrice() %></font></td>
                                <td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="center" valign="middle" sdval="977950000" sdnum="1033;0;###,000"><font color="#000000"><% (GetProductsTotal(order.products)).formatPrice() %></font></td>
                            </tr>
                            <tr>
                                <td colspan="4" height="40" align="left" valign="bottom"><font color="#000000">NOTES OF THE BUSINESS ROOM</font></td>
                                <td colspan="6" align="left" valign="bottom"><font color="#000000"></font></td>
                                <td colspan="4" align="left" valign="bottom"><font color="#000000">NOTES IN THE CONTRACT PROCESS OF THE CONTRACT</font></td>
                                <td colspan="5" align="left" valign="bottom"><font color="#000000"></font></td>
                            </tr>
                        </tbody>
                    </table>             
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">_cancel_</button>
                    <button type="submit" ng-click="UpdateRevenue()" class="btn btn-primary">[_update_]</button>
                </div>
            </div>
        </div>
    </div> 
    <div ng-class="dialogOpenAlert == true ? 'open' : ''" class="alert-message">
        <div class="alert alert-<% alert_type %> alert-dismissible fade show" role="alert">
          <% message %>
          <button type="button" class="close" ng-click="dialogOpenAlert = false;" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    </div>
</div>
@stop
@section('css_add')
<style type="text/css">
    #modal-viewall tr.activer {
        background-color: yellow;
    }
    #modal-revenue {
        padding:0 !important;
    }
    #modal-revenue .modal-dialog{
        width: 100%;
        float: left;
        display: contents;
    }
    #modal-revenue .modal-dialog td{
        font-size: 10px;
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
        z-index: 99999;
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
    {!! $html->scripts() !!}
    <script type="text/javascript">
        var DDURL = window.LaravelDataTables["dataTableBuilder"].ajax.url();
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
                        alert("_error_!!!");
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

        $(document).ready(function(){
            $('input[name="created_at"]').daterangepicker({
                locale: {
                  format: 'DD/MM/YYYY'
                }
            });
            $('input[name="created_at"]').val('');
        })
        
    </script>
    <script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
    <script type="text/javascript">
        var App = angular.module('App', [], function($interpolateProvider) {
            $interpolateProvider.startSymbol('<%');
            $interpolateProvider.endSymbol('%>');
        });
        App.config(['$httpProvider', ($httpProvider) => {
            $httpProvider.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded; charset=UTF-8";
            $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
            $httpProvider.interceptors.push(['$q', function($q) {
                return {
                    request: function(config) {
                        if (config.data && typeof config.data === 'object') {
                            config.data = $.param(config.data);
                        }
                        return config || $q.when(config);
                    }
                };
            }]);
        }]);
        App.controller('RevenueController', ($scope, $http, $compile, $filter) => {
            $scope.order = null;
            $scope.message = '';
            $scope.dialogOpenAlert = false;
            $scope.alert_type = 'success';
            $(document).on("click","#dataTableBuilder_wrapper .action-revenue",function(){
                var id = $(this).attr("data-id");
                if(id){
                    $.ajax({
                        type:'GET',
                        url : '{{route('orders.revenueView')}}/' + id,
                        success : function(response){
                            if(response.status == 1){
                                $scope.order = response.data.order;
                                $scope.$apply();
                                $("#modal-revenue").modal();
                            }
                        }
                    })
                }
            });
            $scope.round_to_precision = (x, precision) => {
                x = Number(x);
                var y = +x + (precision === undefined ? 0.5 : precision/2);
                return y - (y % (precision === undefined ? 1 : +precision));
            }
            $scope.round = ($number) => {
                $number = Number($number);
                if(!angular.isNumber($number))  return '';
                return (Math.round($number/10000) * 10000);
            }
            $scope.percentPrice = ($s1,$s2) => {
                $s1 = Number($s1);
                $s2 = Number($s2);
                if(!angular.isNumber($s1) || $s1 < 1)  return '0%';
                if(!angular.isNumber($s2) || $s2 < 1)  return '0%';
                try{  
                    const IsR = $s2/$s1;
                    if(angular.isNumber(IsR)){
                        return $scope.round_to_precision ( (IsR * 100),5) + '%' ;
                    }
                    return '0%';
                }catch(e){
                    return '0%';
                }
            }
            $scope.ProductProfit = (product) => {
                const {
                    accepted_amount = 0, 
                    paint_cost = 0, 
                    monitoring_cost = 0, 
                    container_rental_costs = 0, 
                    working_fee = 0, 
                    design_costs = 0, 
                    import_export_costs = 0, 
                    tax = 0,
                    agency_costs = 0,
                } = product || {};
                const TT =   (
                    Number(accepted_amount) - (
                        Number(paint_cost) 
                        + Number(monitoring_cost) 
                        + Number(container_rental_costs)
                        + Number(working_fee)
                        + Number(design_costs)
                        + Number(import_export_costs)
                        + Number(tax)
                        + Number(agency_costs)
                    )
                );

                return Number(TT);
            }
            $scope.GetProductsTotalByKey = (key,products) =>{
                let DataR = 0;
                angular.forEach(products,(product)=>{
                    const N = Number(product[key]);
                    if(angular.isNumber(N)){
                        DataR += Number(N);
                    }
                });
                return DataR;
            }
            $scope.GetProductsProfit = (products) => {
                let DataR = 0;
                angular.forEach(products,(product) => {
                    const N = Number($scope.ProductProfit(product));
                    if(angular.isNumber(N)){
                        DataR += Number(N);
                    }
                });
                return DataR;
            }
            $scope.GetTotalProduct = (product) => {
                const {
                    paint_cost = 0, 
                    monitoring_cost = 0, 
                    container_rental_costs = 0, 
                    working_fee = 0, 
                    design_costs = 0, 
                    import_export_costs = 0, 
                    tax = 0,
                    agency_costs = 0,
                } = product || {};
                const TT =  (
                    Number(paint_cost) 
                    + Number(monitoring_cost) 
                    + Number(container_rental_costs)
                    + Number(working_fee)
                    + Number(design_costs)
                    + Number(import_export_costs)
                    + Number(tax)
                    + Number(agency_costs)
                );
                return Number(TT);
            }
            $scope.GetProductsTotal = (products) => {
                let DataR = 0;
                angular.forEach(products,(product) => {
                    const N = Number($scope.GetTotalProduct(product));
                    if(angular.isNumber(N)){
                        DataR += Number(N);
                    }
                });
                return DataR;
            }
            $scope.UpdateRevenue = () => {
                $scope.dialogOpenAlert = true;
                $scope.message = '[_saved_please_wait_]';
                $scope.alert_type = 'success';
                $.ajax({
                    url : '{{route($_SEFF->_ROUTE_FIX . ".revenueUpdate")}}/' + $scope.order.id,
                    type : "POST",
                    data : {products : $scope.order.products},
                    success : function(response){
                        setTimeout(()=>{
                            $scope.dialogOpenAlert = true;
                            $scope.message = '[_save_success_]';
                            $scope.alert_type = 'success';
                            $scope.$apply();
                            $("#modal-revenue").modal("hide");
                        },3000);
                    }
                })
            }
        });
        App.directive('inputformatprice', ['$filter', function($filter) {
            return {
                require: 'ngModel',
                restrict: 'A',
                link: function(scope, element, attrs, ctrl) {
                    //element.attr('placeholder',_LANGS._enter_price_);
                    ctrl.$parsers.push(function(input) {
                        if (!angular.isUndefined(input)) {
                            try {
                                var inputNumber = input.toString().replace(/[^0-9]/g, '');
                                ctrl.$setViewValue(inputNumber.formatPrice());
                                ctrl.$render();
                            } catch (e) {}
                            return Number(inputNumber);
                        }
                    });
                    scope.$watch(function() {
                        return ctrl.$modelValue;
                    }, function() {
                        if (ctrl.$modelValue) {
                            element.val(ctrl.$modelValue.formatPrice());
                        }
                    });
                }
            };
        }]);
    </script>
@stop