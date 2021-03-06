<?php defined('_JEXEC') or die('Restricted access');?>

<?php if ($this->lists['userAccess']) { ?>
	<table>
	<tbody>
		<?php
		if (count($this->locationlist) > 0) { 
			$k = 2;
			for ($i=0, $n=$this->lists['numberRows']; $i < $n; $i++) {
				$rowclass = 'jt-index-entry' . $k;
		?>
				<tr class="<?php echo $rowclass; ?>">
					<td class="jt-small">&nbsp;</td>				
					<?php for ($j=0, $m=$this->lists['columns']; $j < $m; $j++) {
							if (isset($this->locationlist[$i+($j*$this->lists['numberRows'])])) {
								$cell = $this->locationlist[$i+($j*$this->lists['numberRows'])];
								if ($cell->location != null) {
					?>
									<td class="jt-small">
						<?php 		if (($this->lists['interactiveMap']) && ($cell->indGeocode)) {
										$link = $this->lists['linkMap'].'&locId='.(int) ($cell->loc_id);
						?>
										<a href="javascript:void(0);" onclick="jt_show_map('<?php echo $cell->location; ?>','<?php echo $link; ?>');"><?php echo $cell->location; ?></a>
						<?php 
									} else {
										//$link = JRoute::_($this->lists['linkList'].'&search4='.base64_encode($cell->location));
										$link = $this->lists['linkList'].'&search4='.base64_encode($cell->location);
						?>
										<a href="javascript:void(0);" onclick="jt_show_list('<?php echo $cell->location; ?>','<?php echo $link; ?>');"><?php echo $cell->location; ?></a>
						<?php 
									}
						?>
										
									</td>
						<?php 	} else { ?>
									<td class="jt-small">&nbsp;</td>
						<?php 	} ?>
						<?php } else { ?>
								<td class="jt-small">&nbsp;</td>
						<?php } ?>
					<?php } ?>
				</tr>
				<?php $k = 3 - $k; ?>
		<?php } } ?>
		
		<?php if (count($this->locationlist) == 0) { ?>
				<tr class="jt-index-entry2">
					<td class="jt-small">&nbsp;</td>
					<td class="jt-small"><?php echo JText::_('JT_NOLOCATIONS'); ?></td>
				</tr>
		<?php } ?>
	</tbody>
	</table>

<?php } else { ?>
<!-- user has NO access to information -->
	<div class="jt-content-th" >
		<div class="jt-noaccess"><?php echo JText::_( 'JT_NOACCESS' ); ?></div>
	</div>
<?php } ?>

