@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">_DASHBOARD_</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$_PAGETITLE}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$_PAGETITLE}}</h4>
                    <div class="table-form row align-items-center">
                        <div class="col-12 col-xl-8 order-xl-2">
                            <form>
                                <div class="form-row align-items-center justify-content-end">
                                    <div class="col-12 col-md-auto mb-2">
                                        <input type="text" class="form-control" value="<?php echo @$_GET['keyword']; ?>" name="keyword" placeholder="_NAME_">
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <input type="text" class="form-control datepicker" name="date" value="<?php echo @$_GET['date']; ?>" placeholder="_date_" autocomplete="off">
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <select class="form-control" name="branch">
                                            <option value="">_branchs_</option>
                                            <?php if(isset($branchs) && $branchs != null): ?>
                                                <?php foreach ($branchs as $key => $branch): ?>
                                                    <option value="<?php echo $branch->id; ?>" <?php echo $branch->id == @$_GET['branch'] ? 'selected' : ''; ?>><?php echo $branch->name; ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="col-12 col-md-auto mb-2">
                                        <button type="submit" class="btn btn-primary btn-block">_SEARCH_</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-xl-4 mb-2 order-xl-1">
                            <div class="wrap-export"></div>
                            <button type="button" class="btn btn-secondary btn-export-excel"><i class="menu-icon mdi mdi-file-excel"></i> [_export_]</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="example1" class="table table-dt-responsive nowrap table2excel" style="width:100%">
                        	<thead>
                        		<tr>
	                                <td>#</td>
	                                <td>_construction_site_name_</td>
	                                <td>_CUSTOMERNAME_</td>
	                                <td>[_user_manager_]</td>
	                                <td>_BIDDING_DATE_</td>
	                                <td>[_date_complate_]</td>
	                                <td>[_winning_bid_](VND)</td>
	                                <td>[_production_expense_](VND)</td>
	                                <td>[_production_costs_are_not_through_the_factory_](VND)</td>
	                                <td>[_installation_fee_]</td>
	                                <td>[_cost_of_installing_products_purchased_outside_]</td>
	                                <td>[_transport_fee_]</td>
	                                <td>[_other_costs_]</td>
	                                <td>[_business_room_profit_](VND)</td>
	                                <td>[_business_room_profit_](%)</td>
	                            </tr>
                        	</thead>
                        	<tbody>
	                            @if(isset($models))
	                                @foreach ($models as $key => $contract)
	                                    <?php
	                                        $quotation = @$contract->order->quotation;
	                                        $customer  = @$contract->order->quotation->customer;
	                                        $construction = @$contract->order->quotation->construction;
	                                        $order      = @$contract->order;

	                                        $value_has_vat = $contract->value_has_vat;
	                                        
	                                        //Chi phí sản xuất
	                                        $production_expense = 0;
	                                        if(@$quotation->product_price != null){
	                                            $production_expense = $quotation->product_price;
	                                        }
	                                        $production_expense_not_factory  = 0;//Chi phí sản xuất ko qua nhà máy
	                                        
	                                        //Chi phí Lắp đặt
	                                        $detail = @$quotation->details;
	                                        $installation = 0;
	                                        if($detail != null){
	                                            $installation = $detail->sum('installfee');
	                                        }
	                                        
	                                        
	                                        //Chi phí lắp đặt sản phẩm mua ngoài
	                                        $production_external = 0;

	                                        //Chi phí Vận chuyển
	                                        $transport = 0;
	                                        if($detail != null){
	                                            $transport = $detail->sum('inlandfreightfee');
	                                        }


	                                        //CP khác
	                                        $production_other = 0;
	                                        if($order != null){
	                                            $production_other = $contract->external($order->order_number);
	                                        }

	                                        //Lợi nhuận phòng kinh doanh VND = I-K-M-O-P
	                                        $business_room_profit = $value_has_vat - $production_expense - $installation - $transport - $production_other;
	                                        
	                                        //Lợi nhuận phòng kinh doanh (%) = Q/I
	                                        $business_room_profit_percent = 0;
	                                        if($value_has_vat != 0 && $business_room_profit > 0){
	                                            $business_room_profit_percent = round(($business_room_profit/$value_has_vat)*100,2);
	                                        }
	                                    ?>
	                                    <tr style="background-color: #f2f8f9;">
	                                        <td data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:left;min-height:150px;"><a href="#" class="show-contact" data-id="{{ $contract->id }}">{{ $key + 1 }}</a></td>
	                                        <td data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;min-height:150px;">{{ @$construction->name }}</td>
	                                        <td data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;min-height:150px;">{{ @$customer->authorized_name }}</td>
	                                        <td data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;min-height:150px;">{{ @$contract->curator }}</td>
	                                        <td data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;min-height:150px;"><?php echo date('d/m/Y',strtotime(@$contract->bidding_date)); ?></td>
	                                        <td data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;min-height:150px;"><?php echo date('d/m/Y',strtotime(@$contract->date_expired)); ?></td>
	                                        <td class="text-right" data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:right;min-height:150px;"><?php echo number_format($value_has_vat); ?> VND</td>
	                                        <td class="text-right" data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:right;min-height:150px;"><?php echo number_format($production_expense); ?> VND</td>
	                                        <td class="text-right" data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:right;min-height:150px;"><?php echo number_format($production_expense_not_factory); ?> VND</td>
	                                        <td class="text-right" data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:right;min-height:150px;"><?php echo number_format($installation); ?> VND</td>
	                                        <td class="text-right" data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:right;min-height:150px;"><?php echo number_format($production_external); ?> VND</td>
	                                        <td class="text-right" data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:right;min-height:150px;"><?php echo number_format($transport); ?> VND</td>
	                                        <td class="text-right" data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:right;min-height:150px;"><?php echo number_format($production_other); ?> VND</td>
	                                        <td class="text-right" data-style="font-size:12pt;vertical-align: top;background-color: #f2f8f9;text-align:right;min-height:150px;"><?php echo number_format($business_room_profit); ?> VND</td>
	                                        <td data-style="font-size:12pt;background-color: #f2f8f9;vertical-align: top;min-height:150px;"><?php echo $business_room_profit_percent; ?>%</td>
	                                    </tr>
	                                    <?php if($detail != null): ?>
	                                    	<tr class="contract-{{ $contract->id }} hidden contract-item">
	                                            <td data-style="font-size:12pt;vertical-align: top;"></td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">#</td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">[_product_name_]</td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">[_installation_fee_](VND)</td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">[_production_expense_](VND)</td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">[_other_costs_](VND)</td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">[_total_](VND)</td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">[_actual_costs_](VND)</td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">[_profit_](VND)</td>
	                                            <td data-style="font-size:12pt;vertical-align: top;">[_profit_](%)</td>
	                                            <?php for ($j = 0; $j < 6; $j++): ?>
	                                            	<td data-style="font-size:12pt;vertical-align: top;"></td>
	                                            <?php endfor; ?>
	                                        </tr>
	                                    	<?php foreach ($detail as $key1 => $item): ?>
	                                    		<?php 
	                                    			$other_price = $item->quotation_detail_other_items->sum('price');
	                                    			$installfee  = @$item->installfee != null ? $item->installfee : 0;
	                                    			$inlandfreightfee =  @$item->inlandfreightfee != null ? $item->inlandfreightfee : 0;
	                                    			$total 		 = @$item->total != null ? $item->total : 0;
	                                    			$mstfactoryitem =  $item->mstfactoryitem_by_code($item->code);
	                                    			$actual_costs = $item->factory_product_by_code($item->code,$order->order_number);
	                                    			$profit = $actual_costs - $total;
	                                    			$profit_percent = 0;
	                                    			$factory_code = $item->get_factory_code($item->id);
	                                    			if($profit > 0){
	                                    				$profit_percent = round(($profit/$total)*100,2);
	                                    			}
	                                    		?>
		                                        <tr class="contract-{{ $contract->id }} hidden contract-item">
		                                            <td data-style="font-size:12pt;vertical-align: top;"></td>
		                                            <td data-style="font-size:12pt;vertical-align: top;text-align:left;">{{ $key1 + 1 }}</td>
		                                            <td data-style="font-size:12pt;vertical-align: top;"><?php echo @$factory_code->FactoryName; ?></td>
		                                            <td class="text-right" data-style="font-size:12pt;vertical-align: top;text-align:right;"><?php echo number_format($installfee); ?> VND</td>
		                                            <td class="text-right" data-style="font-size:12pt;vertical-align: top;text-align:right;"><?php echo number_format($inlandfreightfee); ?> VND</td>
		                                            <td class="text-right" data-style="font-size:12pt;vertical-align: top;text-align:right;"><?php echo number_format($other_price); ?> VND</td>
		                                            <td class="text-right" data-style="font-size:12pt;vertical-align: top;text-align:right;"><?php echo number_format($total); ?> VND</td>
		                                            <td class="text-right" data-style="font-size:12pt;vertical-align: top;text-align:right;"><?php echo number_format($actual_costs); ?> VND</td>
		                                            <td class="text-right" data-style="font-size:12pt;vertical-align: top;text-align:right;"><?php echo number_format($profit); ?> VND</td>
		                                            <td class="text-right" data-style="font-size:12pt;vertical-align: top;text-align:right;"><?php echo number_format($profit_percent); ?>%</td>
		                                        	<?php for ($j = 0; $j < 6; $j++): ?>
		                                            	<td data-style="font-size:12pt;vertical-align: top;"></td>
		                                            <?php endfor; ?>
		                                        </tr>
		                                    <?php endforeach; ?>
	                                        <tr class="hidden contract-{{ $contract->id }}">
	                                        	<?php for ($j = 0; $j < 15; $j++): ?>
	                                            	<td data-style="font-size:12pt;vertical-align: top;"></td>
	                                            <?php endfor; ?>
	                                        </tr>
	                                    <?php endif; ?>
	                                @endforeach
	                            @endif
	                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js_add')
    <script type="text/javascript" src="{{asset('js/jquery.table2excel.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/FileSaver.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Blob.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/xls.core.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/tableexport.js')}}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="{{asset('js/datetimepicker/build/jquery.datetimepicker.full.js')}}"></script>
	<link rel="stylesheet" href="{{asset('js/datetimepicker/build/jquery.datetimepicker.min.css')}}">

    <style type="text/css">
        #example1_wrapper > .dt-buttons{display: none;}
    </style>
    <script type="text/javascript">
        $(function () {
            var table = null;
            $('.btn-export-excel').on('click',function(){
                if(table == null){
                    table = $('#example1').DataTable({
                        dom: 'Bfrtip',
                        searching: false, 
                        paging: false, 
                        info: false,
                        //bInfo: false,
                        ordering: false,
                        buttons: [{
                            extend: 'excelHtml5',
                            title: null,
                            filename: 'main-list',
                            customize: function(xlsx) {
                                //var sheet = xlsx.xl.worksheets['sheet1.xml'];
                                //console.log(xlsx.xl['styles.xml']);
                               
                                /*$('row c[r^="A"]', sheet).attr( 's', '50' );

                                $('row c[r^="K"]', sheet).each( function () {
                                    var color = $('is t', this).css('background-color');
                                    alert("Background color = " + color);
                                });

                                // Loop over the cells in column `C`
                                $('row c[r^="C"]', sheet).each( function () {
                                    // Get the value
                                    if ( $('is t', this).text() == 'New York' ) {
                                        $(this).attr( 's', '20' );
                                    }
                                });*/



                                var sheet = xlsx.xl.worksheets['sheet1.xml'];
		    					// Get reference to the worksheet and parse it to xml nodes
								// Has to be done this way to avoid creation of namespace atributes.
								var afSerializer = new XMLSerializer();
								var xmlString = afSerializer.serializeToString(sheet);
								var parser = new DOMParser();
								var xmlDoc = parser.parseFromString(xmlString,'text/xml');
								//Create header and add it to the worksheet
								var headerFooter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','headerFooter');
								sheet.getElementsByTagName('worksheet')[0].appendChild(headerFooter);
								var nodeHeaderFooter = sheet.getElementsByTagName("headerFooter");
								//Creation of the header
								var oddHeader = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','oddHeader');
								nodeHeaderFooter[0].appendChild(oddHeader);
								var nodeOddHeader = sheet.getElementsByTagName("oddHeader");
								//The header/footer column definitions
								// If unwanted, you can skip a column
								//&L = Left column
								//&F = Filename
								//&A = sheetname
								//&C = Center column
								//&D = Date
								//&T = Time
								//&R = Right Column
								//&P = Pagenumber
								//&N = Total number of pages
								var txtHeader = "&L"+"&F - &A"+"&R"+"&D - &T";
								var nodeHeader = xmlDoc.createTextNode(txtHeader);
								nodeOddHeader[0].appendChild(nodeHeader);
								//Creation of the footer
								var oddFooter = xmlDoc.createElementNS('http://schemas.openxmlformats.org/spreadsheetml/2006/main','oddFooter');
								nodeHeaderFooter[0].appendChild(oddFooter);
								var nodeOddFooter = sheet.getElementsByTagName("oddFooter");
								var txtFooter = "&R"+"Page &P of &N";
								var nodeFooter = xmlDoc.createTextNode(txtFooter);
								nodeOddFooter[0].appendChild(nodeFooter);
								//Add header and footer to the worksheet
								sheet.getElementsByTagName('worksheet')[0].appendChild(headerFooter);
                            	
                            	$('row:first c', sheet).attr('s','17');
                            }
                        }]
                    });
                }
                table.button( '0' ).trigger();
            });

            

            /*$('.btn-export-excel').click(function () {
                $(".table2excel").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "main-list",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true
                });
            });*/

            /*$(".table2excel").tableExport({
                headers: true,
                fileName: 'main-list',
                formats: ["xlsx"],
                ignoreCSS: '',
            });*/


            $("input.datepicker").each(function(){
	            $(this).datetimepicker({
	                format: 'd/m/Y',
	                timepicker: false
	            });
	        });



            $('.show-contact').click(function(){
            	var contract_id = $(this).attr('data-id');
            	if (typeof contract_id !== typeof undefined && contract_id !== false) {
				    $('.contract-' + contract_id).toggle();
				}
            	return false;
            });
        });
    </script>
@stop
