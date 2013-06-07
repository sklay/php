<? $layoutIndex=0 ; $layoutNames_length =count($layoutNames) ;  foreach ($layoutNames as $layout) {
	if ($layoutIndex%4==0) {
		?>
<div class="row-fluid">
<? } ?>
	<div class="span3">
	
		<div class="layout-demo" layout="<?=$layout ?>.tpl">
		<? 
		$layIndex=0 ; 
		$layout_array = preg_split('/_/',$layout) ; 
		foreach ($layout_array as $row) {
			$layout_length = count($layout_array) ;
			$rowClass =  "row-1-".$layout_length ;
			$counter = 0 ;
			$split_row = preg_split('/-/',$row) ;
			foreach ($split_row as $col) {
				$counter += $col ;
				$unit = 12/$counter ;
			}
			
			?>
			<div class="row-fluid">
			<?
			foreach ($split_row as $col) {
				?>
				<div
					class="span<?=$col*$unit ?> <?=$rowClass ?> <?=($layIndex ==$layout_length)? 'last' :'' ?>"></div>
					<?
			}
			?>
			</div>
			<?
		}?>

		</div>
	</div>

	<? if($layoutIndex==$layoutNames_length || ($layoutIndex+1)%4==0){
		?>
</div>
		<?
	}
	$layoutIndex ++ ;
}?>
