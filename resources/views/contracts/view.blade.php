@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">_DASHBOARD_</a></li>
                        <li class="breadcrumb-item"><a href="{{ route($_SEFF->_ROUTE_FIX .'.index') }}">{{$_PAGETITLE}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ @$contract->contract_number }}</li>
                    </ol>
                </nav>
                <h4>{{ @$contract->contract_number }}</h4>
            </div>
        </div>
        <div class="row flex-xl-nowrap layout-2-cols">
            <div class="col-lg-12 col-xl-auto flex-fill layout-col-1">
                <div class="card grid-margin content-view">
                    <div class="card-body">
                        <h4 class="card-title">_general_informations_</h4>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_CONTRACT_NO_</span> 
                                    <span class="value-holder">{{ @$contract->contract_number }}</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_order_number_</span> 
                                    <span class="value-holder">BVH1658R1</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_DATECREATE_</span> 
                                    <span class="value-holder">12/12/2018</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_DATESIGNED_</span> 
                                    <span class="value-holder">12/12/2019</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">Signed</span> 
                                    <span class="value-holder">Yes</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card grid-margin content-view">
                    <div class="card-body">
                        <h4 class="card-title">Payments</h4>
                        <table class="table table-bordered dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-priority="1">_NAME_</th>
                                    <th>_date_</th>
                                    <th>_AMOUNT_(VND)</th>
                                    <th>_PAY_(VND)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>First Pay</td>
                                    <td>20/10/2019</td>
                                    <td>
                                        10,000,000
                                        <br><span class="text-muted">(30%)</span>
                                    </td>
                                    <td>
                                        10,000,000
                                        <br><span class="text-muted">(30%)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>State #1</td>
                                    <td>30/10/2019</td>
                                    <td>
                                        10,000,000
                                        <br><span class="text-muted">(30%)</span>
                                    </td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>State #2</td>
                                    <td>30/11/2019</td>
                                    <td>
                                        13,000,000
                                        <br><span class="text-muted">(40%)</span>
                                    </td>
                                    <td>0</td>
                                </tr>
                                <tr class="row-noborder">
                                    <td><strong>Total</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <strong>10,000,000</strong>
                                        <br><span class="text-muted">(30%)</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card grid-margin content-view">
                    <div class="card-body">
                        <h4 class="card-title">_customer_informations_</h4>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_code_</span> 
                                    <span class="value-holder">C012 : Obayashi</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_customer_information_authorized_name_</span> 
                                    <span class="value-holder">Obayashi VietNam Corporation</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_customer_information_owner_</span> 
                                    <span class="value-holder">Sanyu Seimitsu Vietnam</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_information_phone_</span> 
                                    <span class="value-holder">0987 23 23 12</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_EMAIL_</span> 
                                    <span class="value-holder"><a href="mailto:contact@Obayashi_vietNam.com">contact@Obayashi_vietNam.com</a></span>
                                </p>
                            </div>
                        </div>
                        <h4 class="card-title">_construction_informations_</h4>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_site_name_</span> 
                                    <span class="value-holder">Sanyu Factory</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_site_address_</span> 
                                    <span class="value-holder">Phuc Dien Industrial Park, Hai Duong</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_manager_</span> 
                                    <span class="value-holder">Nguyễn Xuân Trường</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_information_phone_</span> 
                                    <span class="value-holder">0 220 3546 023</span>
                                </p>
                            </div>
                            <div class="col-12 col-md-4">
                                <p class="display-value">
                                    <span class="label-holder">_construction_information_fax_</span> 
                                    <span class="value-holder">3546 023 FA</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-auto layout-col-2">
                <div class="layout-col-2-inner">
                    <div class="card grid-margin">
                        <div class="card-body">
                            <h4 class="card-title">_publish_</h4>
                            <button class="btn btn-success btn-block" type="button">[_export_]</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop