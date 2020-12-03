@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">_DASHBOARD_</a></li>
                        <li class="breadcrumb-item"><a href="{{ route($_SEFF->_ROUTE_FIX .'.index') }}">{{$_PAGETITLE}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Construction Comletion Report Sale Accouting</li>
                    </ol>
                </nav>
                <h4>Construction Comletion Report Sale Accouting</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Contracts</h4>
                        <div class="table-form row align-items-center">

                            <div class="col-12 col-xl-8 order-xl-2">
                                <form>
                                    <div class="form-row align-items-center justify-content-end">
                                        <div class="col-12 col-md-auto mb-2">
                                            <input type="text" class="form-control" id="name" placeholder="Order">
                                        </div>

                                        <div class="col-12 col-md-auto mb-2">
                                            <select class="form-control">
                                                <option>Status</option>
                                                <option>Processing</option>
                                                <option>Completed</option>
                                                <option>Closed</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-auto mb-2">
                                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-xl-4 mb-2 order-xl-1">

                                <button type="button" class="btn btn-secondary"><i class="menu-icon mdi mdi-file-excel"></i> Export</button>
                            </div>
                        </div>

                        <div id="example_wrapper" class="dataTables_wrapper no-footer">
                            <table id="example" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="width: 100%;" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th data-priority="1" class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 144px;" aria-sort="ascending" aria-label="Order Id.: activate to sort column descending">Order Id.</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 183px;" aria-label="Total Quotion: activate to sort column ascending">Total Quotion</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 180px;" aria-label="Total Factory: activate to sort column ascending">Total Factory</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 172px;" aria-label="Total Others: activate to sort column ascending">Total Others</th>
                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 222px;" aria-label="Remaining costs: activate to sort column ascending">Remaining costs</th>
                                        <th data-priority="1" class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" style="width: 135px;" aria-label="Status: activate to sort column ascending">Status</th>
                                        <th data-priority="1" data-sortable="false" class="sorting_disabled" rowspan="1" colspan="1" style="width: 224px;" aria-label="Action">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1"><a href="manager-order-edit.php">BVH1658R1</a></td>
                                        <td>1,000,000,000</td>
                                        <td>800,000,000</td>
                                        <td>50,000,000</td>
                                        <td>150,000,000</td>
                                        <td>
                                            <label class="badge badge-success">Completed</label>
                                        </td>
                                        <td>
                                            <a href="manager-order-edit.php" class="btn btn-primary btn-xs">View Order Detail</a>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1"><a href="manager-order-edit.php">BVH1658R2</a></td>
                                        <td>1,000,000,000</td>
                                        <td>800,000,000</td>
                                        <td>50,000,000</td>
                                        <td>150,000,000</td>
                                        <td>
                                            <label class="badge badge-warning">Processing</label>
                                        </td>
                                        <td>
                                            <a href="manager-order-edit.php" class="btn btn-primary btn-xs">View Order Detail</a>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td tabindex="0" class="sorting_1"><a href="manager-order-edit.php">BVH1658R3</a></td>
                                        <td>1,000,000,000</td>
                                        <td>800,000,000</td>
                                        <td>50,000,000</td>
                                        <td>150,000,000</td>
                                        <td>
                                            <label class="badge badge-warning">Processing</label>
                                        </td>
                                        <td>
                                            <a href="manager-order-edit.php" class="btn btn-primary btn-xs">View Order Detail</a>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td tabindex="0" class="sorting_1"><a href="manager-order-edit.php">BVH1658R4</a></td>
                                        <td>1,000,000,000</td>
                                        <td>800,000,000</td>
                                        <td>50,000,000</td>
                                        <td>150,000,000</td>
                                        <td>
                                            <label class="badge badge-warning">Processing</label>
                                        </td>
                                        <td>
                                            <a href="manager-order-edit.php" class="btn btn-primary btn-xs">View Order Detail</a>
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
@stop