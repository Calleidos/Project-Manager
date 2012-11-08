<div class="projectRoles index">
	<h2><?php echo __('Project Roles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('role');?></th>
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('foreign_id');?></th>
			<th><?php echo $this->Paginator->sort('foreign_model');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($projectRoles as $projectRole): ?>
	<tr>
		<td><?php echo h($projectRole['ProjectRole']['id']); ?>&nbsp;</td>
		<td><?php echo h($projectRole['ProjectRole']['role']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($projectRole['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectRole['Project']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($projectRole['ClientReferent']['nome'], array('controller' => 'client_referents', 'action' => 'view', $projectRole['ClientReferent']['id'])); ?>
		</td>
		<td><?php echo h($projectRole['ProjectRole']['foreign_model']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $projectRole['ProjectRole']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $projectRole['ProjectRole']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $projectRole['ProjectRole']['id']), null, __('Are you sure you want to delete # %s?', $projectRole['ProjectRole']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Project Role'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Referents'), array('controller' => 'client_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Referent'), array('controller' => 'client_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Referents'), array('controller' => 'supplier_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Referent'), array('controller' => 'supplier_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
