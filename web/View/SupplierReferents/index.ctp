<div class="supplierReferents index">
	<h2><?php echo __('Supplier Referents');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('supplier_id');?></th>
			<th><?php echo $this->Paginator->sort('ruolo');?></th>
			<th><?php echo $this->Paginator->sort('nome');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($supplierReferents as $supplierReferent): ?>
	<tr>
		<td><?php echo h($supplierReferent['SupplierReferent']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($supplierReferent['Supplier']['ragione_sociale'], array('controller' => 'suppliers', 'action' => 'view', $supplierReferent['Supplier']['id'])); ?>
		</td>
		<td><?php echo h($supplierReferent['SupplierReferent']['ruolo']); ?>&nbsp;</td>
		<td><?php echo h($supplierReferent['SupplierReferent']['nome']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $supplierReferent['SupplierReferent']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $supplierReferent['SupplierReferent']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $supplierReferent['SupplierReferent']['id']), null, __('Are you sure you want to delete # %s?', $supplierReferent['SupplierReferent']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Supplier Referent'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails'), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Role'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Telephones'), array('controller' => 'telephones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add')); ?> </li>
	</ul>
</div>
