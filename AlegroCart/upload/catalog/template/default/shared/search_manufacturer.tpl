<?php if (count($manufacturers_data) > 1){?>
	<table>
		<tr><td><?php echo $text_manufacturer;?></td></tr>
		<tr><td>
		<select id="manufacturer_option" name="manufacturer" class="man_select" onchange="$('#model').load('index.php?controller=<?php echo $this_controller;?>&amp;action=model&amp;manufacturer='+this.value);">
			<option value="0*_*<?php echo $search;?>" <?php if($manufacturer_id == "*_*".$search){?> selected <?php }?>><?php echo $text_manufacturer_all;?></option>
			<?php foreach($manufacturers_data as $manufacturer_data){?>
				<option value="<?php echo $manufacturer_data['manufacturer'];?>"<?php if($manufacturer_data['manufacturer'] == $manufacturer_id){?> selected <?php }?>><?php echo $manufacturer_data['name'];?></option>
			<?php }?>
		</select>
		</td></tr>
	</table>
	<div class="divider"></div>
<?php }?>
