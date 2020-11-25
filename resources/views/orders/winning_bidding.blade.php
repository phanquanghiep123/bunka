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
                	<div class="table-form row align-items-center">
                        <div class="col-12 col-xl-8 order-xl-2">
                        </div>
                        <div class="col-12 col-xl-4 mb-2 order-xl-1">
                            <button type="button" class="btn btn-secondary btn-export-excel"><i class="menu-icon mdi mdi-file-excel"></i> _EXPORT_</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered nowrap table2excel">
                            <tbody>
                                <tr>
                                    <td colspan="17" style="font-size: 24px;font-weight: 600;text-align: center;">PHIẾU TRÚNG THẦU</td>
                                </tr>
                                <tr>
                                    <td colspan="17" style="text-align: center;">( Dùng cho các Dự án đã trúng thầu hoặc có khả năng trúng thầu)</td>
                                </tr>
                                <tr>
                                    <?php for ($i=0; $i < 17; $i++): ?>
                                    	<?php if($i < 6 || $i >= 13): ?>
                                    		<td style="border-bottom:thin solid #000000;">&nbsp;</td>
                                    	<?php else: ?>
                                    		<td>&nbsp;</td>
                                    	<?php endif; ?>
                                    <?php endfor; ?>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Ngày trúng thầu</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;border-top:0;">
	                                    <?php echo @$contract->bidding_date != null ? date('d/m/Y',strtotime($contract->bidding_date)) : ""; ?>
	                                </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right:thin solid #000000;"></td>
                                    <td style="border:thin solid #000000;border-top:0;">Số phiếu trúng thầu</td>
                                    <td style="border:thin solid #000000;border-top:0;">&nbsp;</td>
                                    <td style="border:thin solid #000000;border-top:0;">
                                    	<?php echo @$order->order_number; ?>
                                    </td>
                                    <td style="border:thin solid #000000;border-top:0;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Người phụ trách hợp đồng</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;">
                                    	<?php echo @$contract->curator; ?>
                                    </td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right:thin solid #000000;"></td>
                                    <td style="border:thin solid #000000;border-top:0;">Ngày ghi nhận doanh thu	</td>
                                    <td style="border:thin solid #000000;border-top:0;">&nbsp;</td>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">&hellip;&hellip;./&hellip;&hellip;&hellip;./&hellip;&hellip;&hellip;&hellip;&hellip;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Mã Đơn vị ký HĐ</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;">
	                                    <?php echo @$customer->code; ?>
	                                </td>
                                    <td style="border-bottom:thin solid #000000;"></td>
                                    <td style="border-bottom:thin solid #000000;">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right:thin solid #000000;"></td>
                                    <td style="border:thin solid #000000;border-top:0;">Số tiền ghi nhận doanh thu</td>
                                    <td style="border:thin solid #000000;border-top:0;">&nbsp;</td>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Tên chính thức</td>
                                    <td colspan="6" style="background-color: #ffffcc;border:thin solid #000000;border-top:0;">
                                    	{{ @$customer->authorized_name }}
                                    </td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-bottom:thin solid #000000;"></td>
                                    <td style="border-bottom:thin solid #000000;"></td>
                                    <td style="border-bottom:thin solid #000000;"></td>
                                    <td style="border-bottom:thin solid #000000;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Nhà thầu chính (Nhà thầu)</td>
                                    <td colspan="6" style="background-color: #ffffcc;border:thin solid #000000;">&nbsp;</td>
                                    <td colspan="2"></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right:thin solid #000000;border-bottom:thin solid #000000;">&nbsp;</td>
                                    <td style="border:thin solid #000000;border-top:0;">Người phụ trách</td>
                                    <td style="border:thin solid #000000;border-top:0;">Trưởng phòng KD</td>
                                    <td style="border:thin solid #000000;border-top:0;">Trưởng phòng HC</td>
                                    <td style="border:thin solid #000000;border-top:0;">Kế toán</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Chủ đầu tư</td>
                                    <td colspan="6" style="background-color: #ffffcc;border:thin solid #000000;border-top:0;">
                                    	
                                    </td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-top: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Đơn vị thiết kế</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;border-top:0;">&nbsp;</td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">Xác nhận trúng thầu</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Mã quản lý</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;border-top:0;">
                                    	<?php echo @$order->order_number; ?>
                                    </td>
                                    <td style="border-bottom:thin solid #000000;"></td>
                                    <td style="border-bottom:thin solid #000000;">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;"></td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Tên Công trường</td>
                                    <td colspan="6" style="background-color: #ffffcc;border:thin solid #000000;">
                                    	{{ @$construction->name }}
                                    </td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Địa chỉ công trường</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;">
                                    	{{ @$construction->address }}
                                    </td>
                                    <td colspan="2">&nbsp;</td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">Ghi nhận Doanh thu</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Ngày đặt hàng bên nhà máy</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;">
                                    	
                                    </td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;"></td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Ngày thi công dự kiến</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;">
                                    	<?php echo @$contract->date_of_construction != null ? date('d/m/Y',strtotime($contract->date_of_construction)) : ""; ?>
                                    </td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border:thin solid #000000;border-top:0;">Ngày hoàn thành dự kiến</td>
                                    <td colspan="4" style="background-color: #ffffcc;border:thin solid #000000;border-top:0;">
                                    	<?php echo @$contract->completion_date != null ? date('d/m/Y',strtotime($contract->completion_date)) : ""; ?>
                                    </td>
                                    <td></td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <?php for ($i=0; $i < 17; $i++): ?>
                                    	<td <?php echo $i != 0 ? 'style="border-bottom: thin solid #000;"' : ''; ?>>&nbsp;</td>
                                    <?php endfor; ?>
                                </tr>
                                <tr>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <?php for ($i=1; $i < 17; $i++): ?>
                                    	<td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;text-align: center;">&nbsp;(<?php echo $i; ?>)&nbsp;</td>
                                    <?php endfor; ?>
                                </tr>
                                <tr>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;border-left: thin solid #000;">
	                                    Số
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Tên sản phẩm
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Số lượng
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Diện tích (m²)
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Tổng giá trị theo Báo giá
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Tổng giá trị trúng thầu	
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Giá thành sản xuất	
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Chi phí ko qua nhà máy
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Chi phí lắp đặt
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Chi phí lắp đặt sản phẩm mua ngoài	
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Vận chuyển trong nước VN
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    CP Thiết kế
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Chi phí công trường
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Chi phí đại lý	
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    CP khác
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Lợi nhuận
	                                </td>
                                    <td style="background-color: #ccecff;border-bottom: thin solid #000;border-right: thin solid #000;">
	                                    Tổng giá thành
	                                </td>
                                </tr>
                                <?php if(@$quotation->details != null): ?>
	                                <?php foreach ($quotation->details as $key1 => $item): ?>
		                                <?php 
                                			$other_price = $item->quotation_detail_other_items->sum('price');
                                			$installfee  = @$item->installfee != null ? $item->installfee : 0;
                                			$inlandfreightfee =  @$item->inlandfreightfee != null ? $item->inlandfreightfee : 0;
                                			$total 		 = @$item->total != null ? $item->total : 0;
                                			$mstfactoryitem =  $item->mstfactoryitem_by_code($item->code);
                                			$actual_costs = $item->factory_product_by_code($item->code,$order->order_number);
                                			$profit = $actual_costs - $total;
                                			$profit_percent = 0;
                                			//$products = $item->get_product_by_detail($item->id);
                                			if($profit > 0){
                                				$profit_percent = round(($profit/$total)*100,2);
                                			}
                                			$rowspan = '';
                                			//if($products->count() > 0){
                                				//$rowspan = 'rowspan="' . $products->count() . '"';
                                			//}
                                		?>
		                                <tr>
		                                    <td rowspan="2" style="border-bottom: thin solid #000;border-right: thin solid #000;border-left: thin solid #000;">0<?php echo $key1+1; ?></td>
		                                    <td style="border-right: thin solid #000;">05:SD</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;"><?php ?></td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">126,257,400</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">108,974,251</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">94,692,976</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ffffcc;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="background-color: #ccffcc;border-right: thin solid #000;">14,281,275</td>
		                                    <td style="background-color: #ccffcc;border-right: thin solid #000;">94,692,976</td>
		                                </tr>
		                                <tr>
		                                    <td style="background-color: #ffffcc;border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">86.3%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">86.9%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
		                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
		                                    <td style="background-color: #ccffcc;border-bottom: thin solid #000;border-right: thin solid #000;">13.1%</td>
		                                    <td style="background-color: #ccffcc;border-bottom: thin solid #000;border-right: thin solid #000;">86.9%</td>
		                                </tr>
		                            <?php endforeach; ?>
		                        <?php endif; ?>
                                <tr>
                                    <td colspan="2" style="border-right: thin solid #000;border-left: thin solid #000;">
	                                    ＊＊　TỔNG CỘNG　＊＊
	                                </td>
                                    <td style="border-right: thin solid #000;">
	                                    30
	                                </td>
                                    <td style="border-right: thin solid #000;">
	                                    0.0
	                                </td>
                                    <td style="border-right: thin solid #000;">
	                                    543,783,500
	                                </td>
                                    <td style="border-right: thin solid #000;">
	                                    481,617,518
	                                </td>
                                    <td style="border-right: thin solid #000;">
	                                    407,837,460
	                                </td>
                                    <td style="border-right: thin solid #000;">0</td>
                                    <td style="border-right: thin solid #000;">0</td>
                                    <td style="border-right: thin solid #000;">0</td>
                                    <td style="border-right: thin solid #000;">0</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-right: thin solid #000;">0</td>
                                    <td style="border-right: thin solid #000;">0</td>
                                    <td style="background-color: #ccffcc;border-right: thin solid #000;">73,780,058</td>
                                    <td style="background-color: #ccffcc;border-right: thin solid #000;">515,171,893</td>
                                </tr>
                                <tr>
                                	<td colspan="2" style="border-bottom: thin solid #000;border-right: thin solid #000;border-left: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">88.6%</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">84.7%</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;" >0.0%</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">0.0%</td>
                                    <td style="background-color: #ccffcc;border-bottom: thin solid #000;border-right: thin solid #000;">15.3%</td>
                                    <td style="background-color: #ccffcc;border-bottom: thin solid #000;border-right: thin solid #000;">107.0%</td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border-bottom: thin solid #000;border-left: thin solid #000;">GHI CHÚ CỦA PHÒNG KINH DOANH</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td colspan="3" style="border-bottom: thin solid #000;">GHI CH&Uacute; TRONG QU&Aacute; TR&Igrave;NH K&Yacute; KẾT HỢP ĐỒNG</td>
                                    <td style="border-bottom: thin solid #000;">&nbsp;</td>
                                    <td style="border-bottom: thin solid #000;border-right: thin solid #000;">&nbsp;</td>
                                </tr>
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
    <script type="text/javascript">
        $(function () {
            $('.btn-export-excel').click(function () {
            	$(".table2excel th,.table2excel td").each(function(){
            		var style = $(this).attr('style');
            		if (typeof style !== typeof undefined && style !== false) {
            			//var res = style.replace("border", "outline");
            			if(style.indexOf("font-size") > -1){
            				$(this).attr('data-style',style);
            			}
					    else{
					    	$(this).attr('data-style',style + ';font-size:12pt;');
					    }
					}
            		else{
						$(this).attr('data-style','font-size:12pt;');
            		}
            	});


                $(".table2excel").table2excel({
                    exclude: ".noExl",
                    name: "Excel Document Name",
                    filename: "winning-bidding",
                    fileext: ".xls",
                    exclude_img: true,
                    exclude_links: true,
                    exclude_inputs: true
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
