<div class="articles view">
	<h2><?php  echo __('Not possible to disactivate articles');?></h2>
	<p><?php echo __("It's not possible to deactivate this article because some quotes that contain these articles have been confirmed") ?></p>
	<p><?php echo __("You can deactivate the following quotes (if you haven't created invoices or DDTs connected to them)") ?>:</p>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Date'); ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($confirmed as $quote): ?>
			<tr>
				<td><?php echo $quote['Quote']['name']; ?></td>
				<td><?php echo $quote['Quote']['data'] ?></td>
				<td class="actions">
					<?php echo $this->Html->link(__("Unconfirm"), array('controller' => 'quotes', 'action' => 'confirm', $quote['Quote']['id'], $project_id)); ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('Back to the Project'), array('controller' => 'projects', 'action' => 'view', $project_id)); ?> </li>
	</ul>
</div>