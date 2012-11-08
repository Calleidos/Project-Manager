<div class="clientReferents index">
	<h2><?php echo __('Client Referents');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('client_id');?></th>
			<th><?php echo $this->Paginator->sort('ruolo');?></th>
			<th><?php echo $this->Paginator->sort('nome');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($clientReferents as $clientReferent): ?>
	<tr>
		<td><?php echo h($clientReferent['ClientReferent']['id']); ?>&nbsp;</td>
		<td><?php echo h($clientReferent['ClientReferent']['client_id']); ?>&nbsp;</td>
		<td><?php echo h($clientReferent['ClientReferent']['ruolo']); ?>&nbsp;</td>
		<td><?php echo h($clientReferent['ClientReferent']['nome']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clientReferent['ClientReferent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientReferent['ClientReferent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientReferent['ClientReferent']['id']), null, __('Are you sure you want to delete # %s?', $clientReferent['ClientReferent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Client Referent'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails'), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Roles'), array('controller' => 'project_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Role'), array('controller' => 'project_roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Telephones'), array('controller' => 'telephones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add')); ?> </li>
	</ul>
</div>
