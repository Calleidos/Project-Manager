<div class="emails index">
	<h2><?php echo __('Emails');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('foreign_id');?></th>
			<th><?php echo $this->Paginator->sort('foreign_model');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('email_address');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($emails as $email): ?>
	<tr>
		<td><?php echo h($email['Email']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($email['Client']['ragione_sociale'], array('controller' => 'clients', 'action' => 'view', $email['Client']['id'])); ?>
		</td>
		<td><?php echo h($email['Email']['foreign_model']); ?>&nbsp;</td>
		<td><?php echo h($email['Email']['type']); ?>&nbsp;</td>
		<td><?php echo h($email['Email']['email_address']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $email['Email']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $email['Email']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $email['Email']['id']), null, __('Are you sure you want to delete # %s?', $email['Email']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Email'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Referents'), array('controller' => 'client_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Referent'), array('controller' => 'client_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Referents'), array('controller' => 'supplier_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Referent'), array('controller' => 'supplier_referents', 'action' => 'add')); ?> </li>
	</ul>
</div>
