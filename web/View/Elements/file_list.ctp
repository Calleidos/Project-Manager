<div class="related">
	<h3><?php echo ucwords($details['type']); ?></h3>
	<table class="file-list" id="<?php echo $details['type']; ?>-list">
		<tbody>
			<tr>
				<th>&nbsp;</th>
                <th><strong><?php echo __('Name'); ?></strong></th>
				<th><strong><?php echo __('Type'); ?></strong></th>
                <th><strong><?php echo __('Details'); ?></strong></th>
                <th><strong><?php echo __('Data'); ?></strong></th>
                <th><strong><?php echo __('File Link'); ?></strong></th>
			</tr><?php 
			if (!empty($project[ucwords($details['type'])])) {
				foreach ($project[ucwords($details['type'])] as $key=>$file) {
					if (isset($project[$details['model']]['id']))
						$file['foreign_id']=$project[$details['model']]['id'];
					$this->set('element',$file);
					echo $this->element('/'.Inflector::pluralize($details['type']).'/list');
				}
			}?>
		</tbody>
	</table>
	<a class="fancy-modal" href="<?php echo $this->Html->url(array('controller'=>Inflector::pluralize($details['type']), "action"=>'add', $details['id'])); ?>">
		<button onclick="return false;" class="add-button"><?php echo __("Add"); ?><?php echo ucwords($details['type']); ?></button>
	</a>
</div>