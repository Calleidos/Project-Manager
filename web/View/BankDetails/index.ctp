<div class="bankDetails index">
	<h2><?php echo __('Bank Details');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('foreign_id');?></th>
			<th><?php echo $this->Paginator->sort('foreign_model');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('iban');?></th>
			<th><?php echo $this->Paginator->sort('banca');?></th>
			<th><?php echo $this->Paginator->sort('agenzia_di');?></th>
			<th><?php echo $this->Paginator->sort('abi');?></th>
			<th><?php echo $this->Paginator->sort('cab');?></th>
			<th><?php echo $this->Paginator->sort('conto');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($bankDetails as $bankDetail): ?>
	<tr>
		<td><?php echo h($bankDetail['BankDetail']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($bankDetail['Client']['ragione_sociale'], array('controller' => 'clients', 'action' => 'view', $bankDetail['Client']['id'])); ?>
		</td>
		<td><?php echo h($bankDetail['BankDetail']['foreign_model']); ?>&nbsp;</td>
		<td><?php echo h($bankDetail['BankDetail']['type']); ?>&nbsp;</td>
		<td><?php echo h($bankDetail['BankDetail']['iban']); ?>&nbsp;</td>
		<td><?php echo h($bankDetail['BankDetail']['banca']); ?>&nbsp;</td>
		<td><?php echo h($bankDetail['BankDetail']['agenzia_di']); ?>&nbsp;</td>
		<td><?php echo h($bankDetail['BankDetail']['abi']); ?>&nbsp;</td>
		<td><?php echo h($bankDetail['BankDetail']['cab']); ?>&nbsp;</td>
		<td><?php echo h($bankDetail['BankDetail']['conto']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bankDetail['BankDetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bankDetail['BankDetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bankDetail['BankDetail']['id']), null, __('Are you sure you want to delete # %s?', $bankDetail['BankDetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Bank Detail'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
	</ul>
</div>
