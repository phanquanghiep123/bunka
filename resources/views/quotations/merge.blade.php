<table border="1px;">
	<?php
		@$quotation1 = $folder1['quotation'];
		@$quotation2 = $folder2['quotation'];
	?>
	<tbody>
		<tr>
			<td colspan="4"><?php echo @$quotation1['quotation_number']?>#<?php echo @$quotation1['reversion']?></td>
			<td colspan="2" style="background-color:#ffffff"></td>
			<td colspan="5"><?php echo @$quotation2['quotation_number']?>#<?php echo @$quotation2['reversion']?></td>
		</tr>
		<tr>
		   <th>Code</th>
           <th>Items</th>
           <th>Remaks</th>
           <th>Price</th>
           <td colspan="2" style="background-color:#ffffff"></td>
           <th>Code</th>
           <th>Items</th>
           <th>Remaks</th>
           <th>Price</th>
           <th>Merge</th>
		</tr>
		<?php

			foreach (@$folder1['folders'] as $key => $value) {
				$value1 =  $value;
				$value2 =  @$folder2['folders'][$key];
				foreach (@$value1['items'] as $key3 => $value3) {
			    	$value4 = $value2['items'][$key3];
			    	echo '<tr style="'.(@$value1['warning'] == false ? 'background-color:#cccccc' : '').'">';
			        if(@$key3 == 0){
			         	echo '
					            <td style="border:1px dashed #000000; background-color:#ffffff ; vertical-align:middle;text-align:center" rowspan="'.(count(@$value1['items']) + 5).'">'.@$value1['code'].'</td>
					            <td style="border:1px dashed #000000;">'.@$value3['ItemName'].'</td>
					            <td style="border:1px dashed #000000;">'.@$value3['FormatPattern'].'</td>
					            <td style="border:1px dashed #000000;">'.floatval (@$value3['price']).'</td>     
						';
			        }else{
			        	echo ' <td style="border:1px dashed #000000;">'.@$value3['ItemClassName'].'</td>
					           <td style="border:1px dashed #000000;">'.@$value3['ItemName'].'</td>
					           <td style="border:1px dashed #000000;">'.floatval (@$value3['price']).'</td>
					    ';
			        }

			        echo '<td colspan="2" style="background-color:#ffffff"></td>';
			        if(@$key3 == 0){
			         	echo '
					            <td style="border:1px dashed #000000;background-color:#ffffff ;vertical-align:middle;text-align:center " rowspan="'.(count(@$value2['items']) + 5).'">'.@$value2['code'].'</td>
					            <td style="border:1px dashed #000000;">'.@$value4['ItemName'].'</td>
					            <td style="border:1px dashed #000000;">'.@$value4['FormatPattern'].'</td>
					            <td style="border:1px dashed #000000;">'.floatval (@$value4['price']).'</td>
					            <td style="border:1px dashed #000000;">'.(floatval (@$value4['price']) - floatval (@$value3['price'])).'</td>
					           
						';
			        }else{
			        	echo ' <td style="border:1px dashed #000000;">'.@$value4['ItemClassName'].'</td>
					           <td style="border:1px dashed #000000;">'.@$value4['ItemName'].'</td>
					           <td style="border:1px dashed #000000;">'.floatval (@$value4['price']).'</td>
					           <td style="border:1px dashed #000000;">'.(floatval (@$value4['price']) - floatval (@$value3['price'])).'</td>
					    ';
			        }
			        echo '</tr>';
			    }
				echo '<tr style="'.(@$value1['quantityCheck'] == false ? 'background-color:#cccccc' : '').'">';   
			    echo '
			    	<td style="border:1px dashed #000000;">Quantity</td>
            		<td style="border:1px dashed #000000;">'.@$value1['quantity'].'</td>
            		<td style="border:1px dashed #000000;" ></td>
					<td colspan="2" style="background-color:#ffffff"></td>
					<td style="border:1px dashed #000000;">Quantity</td>
            		<td style="border:1px dashed #000000;">'.@$value2['quantity'].'</td>
            		<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000;">'.(@$value2['quantity'] - @$value1['quantity']).'</td>
			    ';
			    echo '</tr>';
			    echo '<tr style="'.(@$value1['priceCheck'] == false ? 'background-color:#cccccc' : '').'">';
			    echo '
			    	<td style="border:1px dashed #000000;">Price</td>
			    	<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000;">'.floatval (@$value1['price']).'</td>
					<td colspan="2" style="background-color:#ffffff"></td>
					<td style="border:1px dashed #000000;">Price</td>
					<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000; ">'.floatval (@$value2['price']).'</td>
    				<td style="border:1px dashed #000000;">'.(floatval(@$value2['price']) - floatval(@$value1['price'])).'</td>
			    ';
			    echo '</tr>';
			    echo '<tr style="'.(@$value1['installfeeCheck'] == false ? 'background-color:#cccccc' : '').'">';
			    echo '
			    	<td style="border:1px dashed #000000;">Installfee</td>
			    	<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000;" >'.floatval (@$value1['installfee']).'</td>
					<td colspan="2" style="background-color:#ffffff"></td>
					<td style="border:1px dashed #000000;">Installfee</td>
					<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000;">'.floatval (@$value2['installfee']).'</td>
            		<td style="border:1px dashed #000000;">'.(floatval(@$value2['installfee']) - floatval(@$value1['installfee'])).'</td>
			    ';
			    echo '</tr>';
			    echo '<tr style="'.(@$value1['inlandfreightfeeCheck'] == false ? 'background-color:#cccccc' : '').'">';
			    echo '
			    	<td style="border:1px dashed #000000;">Inlandfreightfee</td>
            		<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000;">'.floatval (@$value1['inlandfreightfee']).'</td>
					<td colspan="2" style="background-color:#ffffff"></td>
					<td style="border:1px dashed #000000;">Inlandfreightfee</td>
					<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000;">'.floatval (@$value2['inlandfreightfee']).'</td>
			    	<td style="border:1px dashed #000000;">'.(floatval(@$value2['inlandfreightfee']) - floatval(@$value1['inlandfreightfee'])).'</td>
			    ';
			    echo '</tr>';
			    echo '<tr style="'.(@$value1['totalCheck'] == false ? 'background-color:#cccccc' : '').'">';
			    echo '
			    	<td style="border:1px dashed #000000;">Total</td>          		
            		<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000;">'.floatval (@$value1['total']).'</td>
					<td colspan="2" style="background-color:#ffffff"></td>
					<td style="border:1px dashed #000000;">Total</td>
					<td style="border:1px dashed #000000;"></td>
            		<td style="border:1px dashed #000000;">'.floatval (@$value2['total']).'</td>
			    	<td style="border:1px dashed #000000;">'.(floatval(@$value2['total']) - floatval(@$value1['total'])).'</td>
			    ';
			    echo '</tr>';   
			}
		?>
		<?php
			
			echo '<tr style="'.(@$quotation1['quantityCheck'] == false ? 'background-color:#cccccc' : '').'">
			 	<td style="border:1px dashed #000000; vertical-align:middle;text-align:center" rowspan="5">Total</td>
	            <td style="border:1px dashed #000000;">Quantity</td>
	            <td style="border:1px dashed #000000;">'.@$quotation1['quantity'].'</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td colspan="2" style="background-color:#ffffff"></td>   
	            <td style="border:1px dashed #000000;vertical-align:middle;text-align:center" rowspan="5">Total</td>
	            <td style="border:1px dashed #000000;">Quantity</td>
	            <td style="border:1px dashed #000000;">'.@$quotation2['quantity'].'</td>
	            <td style="border:1px dashed #000000;"></td> 	 
	            <td style="border:1px dashed #000000;">'.(floatval(@$quotation2['quantity']) - floatval(@$quotation1['quantity'])).'</td>
			</tr>';
			echo '<tr style="'.(@$quotation1['priceCheck'] == false ? 'background-color:#cccccc' : '').'">
	            <td style="border:1px dashed #000000;">Price</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td style="border:1px dashed #000000;">'.floatval (@$quotation1['price']).'</td>
	            <td colspan="2" style="background-color:#ffffff"></td>   
	            <td style="border:1px dashed #000000;">Price</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td style="border:1px dashed #000000;">'.floatval (@$quotation2['price']).'</td>
	            <td style="border:1px dashed #000000;">'.(floatval(@$quotation2['price']) - floatval(@$quotation1['price'])).'</td> 
			</tr>';
			echo '<tr style="'.(@$quotation1['installfeeCheck'] == false ? 'background-color:#cccccc' : '').'">
	            <td style="border:1px dashed #000000;">Installfee</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td style="border:1px dashed #000000;">'.floatval (@$quotation1['installfee']).'</td>
	            <td colspan="2" style="background-color:#ffffff"></td>   
	            <td style="border:1px dashed #000000;">Installfee</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td style="border:1px dashed #000000;">'.floatval (@$quotation2['installfee']).'</td> 	 
				<td style="border:1px dashed #000000;">'.(floatval(@$quotation2['installfee']) - floatval(@$quotation1['installfee'])).'</td> 
			</tr>';
			echo '<tr style="'.(@$quotation1['inlandfreightfeeCheck'] == false ? 'background-color:#cccccc' : '').'">
	            <td style="border:1px dashed #000000;">Inlandfreightfee</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td style="border:1px dashed #000000;">'.floatval (@$quotation1['inlandfreightfee']).'</td>
	            <td colspan="2" style="background-color:#ffffff"></td>   
	            <td style="border:1px dashed #000000;">Inlandfreightfee</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td style="border:1px dashed #000000;">'.floatval (@$quotation2['inlandfreightfee']).'</td> 	 
				<td style="border:1px dashed #000000;">'.(floatval(@$quotation2['inlandfreightfee']) - floatval(@$quotation1['inlandfreightfee'])).'</td> 
			</tr>';
			echo '<tr style="'.(@$quotation1['totalCheck'] == false ? 'background-color:#cccccc' : '').'">
	            <td style="border:1px dashed #000000;">Total</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td style="border:1px dashed #000000;">'.floatval (@$quotation1['total']).'</td>
	            <td colspan="2" style="background-color:#ffffff"></td>   
	            <td style="border:1px dashed #000000;">Total</td>
	            <td style="border:1px dashed #000000;"></td>
	            <td style="border:1px dashed #000000;">'.floatval (@$quotation2['total']).'</td> 	 
				<td style="border:1px dashed #000000;">'.(floatval(@$quotation2['total']) - floatval(@$quotation1['total'])).'</td>
			</tr>'
		?>
	</tbody>
</table>