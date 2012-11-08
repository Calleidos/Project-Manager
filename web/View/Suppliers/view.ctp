<div class="suppliers view">
<h2><?php  echo __('Supplier');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ragione Sociale'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['ragione_sociale']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codice Fiscale'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['codice_fiscale']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partita Iva'); ?></dt>
		<dd>
			<?php echo h($supplier['Supplier']['partita_iva']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Supplier'), array('action' => 'edit', $supplier['Supplier']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Supplier'), array('action' => 'delete', $supplier['Supplier']['id']), null, __('Are you sure you want to delete # %s?', $supplier['Supplier']['id'])); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Addresses');?></h3>
	<?php if (!empty($supplier['Address'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($supplier['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['type'];?></td>
			<td><?php echo $address['address']." ".$address['zipcode']." ".$address['city']." ".$address['province']." (".$address['nation'].")" ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'addresses', 'action' => 'view', $address['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'addresses', 'action' => 'edit', $address['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'addresses', 'action' => 'delete', $address['id'], $supplier['Supplier']['id'], Inflector::classify( $this->params['controller'])), null, __('Are you sure you want to delete # %s?', $address['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add', $supplier['Supplier']['id'], Inflector::classify( $this->params['controller'])));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Bank Details');?></h3>
	<?php if (!empty($supplier['BankDetail'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Iban'); ?></th>
		<th><?php echo __('Banca'); ?></th>
		<th><?php echo __('Agenzia Di'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($supplier['BankDetail'] as $bankDetail): ?>
		<tr>
			<td><?php echo $bankDetail['type'];?></td>
			<td><?php echo $bankDetail['iban'];?></td>
			<td><?php echo $bankDetail['banca'];?></td>
			<td><?php echo $bankDetail['agenzia_di'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bank_details', 'action' => 'view', $bankDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bank_details', 'action' => 'edit', $bankDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bank_details', 'action' => 'delete', $bankDetail['id'], $supplier['Supplier']['id'], Inflector::classify( $this->params['controller'])), null, __('Are you sure you want to delete # %s?', $bankDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bank Detail'), array('controller' => 'bank_details', 'action' => 'add', $supplier['Supplier']['id'], Inflector::classify( $this->params['controller'])));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Supplier Referents');?></h3>
	<?php if (!empty($supplier['SupplierReferent'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Ruolo'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($supplier['SupplierReferent'] as $supplierReferent): ?>
		<tr>
			<td><?php echo $supplierReferent['ruolo'];?></td>
			<td><?php echo $supplierReferent['cognome']." ".$supplierReferent['nome'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'supplier_referents', 'action' => 'view', $supplierReferent['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'supplier_referents', 'action' => 'edit', $supplierReferent['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'supplier_referents', 'action' => 'delete', $supplierReferent['id'], $supplier['Supplier']['id']), null, __('Are you sure you want to delete # %s?', $supplierReferent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Supplier Referent'), array('controller' => 'supplier_referents', 'action' => 'add', $supplier['Supplier']['id']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Emails');?></h3>
	<?php if (!empty($supplier['Email'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Email Address'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($supplier['Email'] as $email): ?>
		<tr>
			<td><?php echo $email['type'];?></td>
			<td><?php echo $email['email_address'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'emails', 'action' => 'view', $email['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'emails', 'action' => 'edit', $email['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'emails', 'action' => 'delete', $email['id'], $supplier['Supplier']['id'], Inflector::classify( $this->params['controller'])), null, __('Are you sure you want to delete # %s?', $email['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add', $supplier['Supplier']['id'], Inflector::classify( $this->params['controller'])));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Telephones');?></h3>
	<?php if (!empty($supplier['Telephone'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($supplier['Telephone'] as $telephone): ?>
		<tr>
			<td><?php echo $telephone['type'];?></td>
			<td><?php echo $telephone['telephone'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'telephones', 'action' => 'view', $telephone['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'telephones', 'action' => 'edit', $telephone['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'telephones', 'action' => 'delete', $telephone['id'], $supplier['Supplier']['id'], Inflector::classify( $this->params['controller'])), null, __('Are you sure you want to delete # %s?', $telephone['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add', $supplier['Supplier']['id'], Inflector::classify( $this->params['controller'])));?> </li>
		</ul>
	</div>
</div>
