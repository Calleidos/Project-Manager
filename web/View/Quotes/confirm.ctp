<div class="articles view">
	<h2><?php  echo __('Not possible to change quote status');?></h2>
	<?php if (!empty($articles)) { ?> 
	<p><?php echo __("It's not possible to confirm this quote because the following articles have been disactivated") ?>:</p>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo __('Description'); ?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($articles as $article): ?>
			<tr>
				<td><?php echo $article['Article']['description'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php } ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('Back to the Project'), array('controller' => 'projects', 'action' => 'view', $project_id)); ?> </li>
	</ul>
</div>