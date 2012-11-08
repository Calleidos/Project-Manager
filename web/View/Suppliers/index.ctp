<div class="suppliers index">
	<h2><?php echo __('Suppliers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('ragione_sociale');?></th>
			<th><?php echo $this->Paginator->sort('codice_fiscale');?></th>
			<th><?php echo $this->Paginator->sort('partita_iva');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($suppliers as $supplier): ?>
	<tr>
		<td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
		<td><?php echo h($supplier['Supplier']['ragione_sociale']); ?>&nbsp;</td>
		<td><?php echo h($supplier['Supplier']['codice_fiscale']); ?>&nbsp;</td>
		<td><?php echo h($supplier['Supplier']['partita_iva']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $supplier['Supplier']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $supplier['Supplier']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $supplier['Supplier']['id']), null, __('Are you sure you want to delete # %s?', $supplier['Supplier']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Supplier'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bank Details'), array('controller' => 'bank_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Detail'), array('controller' => 'bank_details', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails'), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Referents'), array('controller' => 'supplier_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Referent'), array('controller' => 'supplier_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Telephones'), array('controller' => 'telephones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add')); ?> </li>
	</ul>
</div>
