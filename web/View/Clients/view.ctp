<div class="clients view">
<h2><?php  echo __('Client');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($client['Client']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ragione Sociale'); ?></dt>
		<dd>
			<?php echo h($client['Client']['ragione_sociale']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codice Fiscale'); ?></dt>
		<dd>
			<?php echo h($client['Client']['codice_fiscale']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Partita Iva'); ?></dt>
		<dd>
			<?php echo h($client['Client']['partita_iva']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Addresses');?></h3>
	<?php if (!empty($client['Address'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Zipcode'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Province'); ?></th>
		<th><?php echo __('Nation'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['id'];?></td>
			<td><?php echo $address['foreign_id'];?></td>
			<td><?php echo $address['foreign_model'];?></td>
			<td><?php echo $address['type'];?></td>
			<td><?php echo $address['address'];?></td>
			<td><?php echo $address['zipcode'];?></td>
			<td><?php echo $address['city'];?></td>
			<td><?php echo $address['province'];?></td>
			<td><?php echo $address['nation'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'addresses', 'action' => 'view', $address['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'addresses', 'action' => 'edit', $address['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'addresses', 'action' => 'delete', $address['id'], $client['Client']['id'], Inflector::classify( $this->params['controller'])), null, __('Are you sure you want to delete # %s?', $address['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add', $client['Client']['id'], Inflector::classify( $this->params['controller'])));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Bank Details');?></h3>
	<?php if (!empty($client['BankDetail'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Iban'); ?></th>
		<th><?php echo __('Banca'); ?></th>
		<th><?php echo __('Agenzia Di'); ?></th>
		<th><?php echo __('Abi'); ?></th>
		<th><?php echo __('Cab'); ?></th>
		<th><?php echo __('Conto'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['BankDetail'] as $bankDetail): ?>
		<tr>
			<td><?php echo $bankDetail['id'];?></td>
			<td><?php echo $bankDetail['foreign_id'];?></td>
			<td><?php echo $bankDetail['foreign_model'];?></td>
			<td><?php echo $bankDetail['type'];?></td>
			<td><?php echo $bankDetail['iban'];?></td>
			<td><?php echo $bankDetail['banca'];?></td>
			<td><?php echo $bankDetail['agenzia_di'];?></td>
			<td><?php echo $bankDetail['abi'];?></td>
			<td><?php echo $bankDetail['cab'];?></td>
			<td><?php echo $bankDetail['conto'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'bank_details', 'action' => 'view', $bankDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'bank_details', 'action' => 'edit', $bankDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'bank_details', 'action' => 'delete', $bankDetail['id'], $client['Client']['id'], Inflector::classify( $this->params['controller'])), null, __('Are you sure you want to delete # %s?', $bankDetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Bank Detail'), array('controller' => 'bank_details', 'action' => 'add', $client['Client']['id'], Inflector::classify( $this->params['controller'])));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Client Referents');?></h3>
	<?php if (!empty($client['ClientReferent'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Ruolo'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['ClientReferent'] as $clientReferent): ?>
		<tr>
			<td><?php echo $clientReferent['id'];?></td>
			<td><?php echo $clientReferent['client_id'];?></td>
			<td><?php echo $clientReferent['ruolo'];?></td>
			<td><?php echo $clientReferent['nome'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'client_referents', 'action' => 'view', $clientReferent['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'client_referents', 'action' => 'edit', $clientReferent['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'client_referents', 'action' => 'delete', $clientReferent['id'], $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $clientReferent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client Referent'), array('controller' => 'client_referents', 'action' => 'add', $client['Client']['id']));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Emails');?></h3>
	<?php if (!empty($client['Email'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Email Address'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Email'] as $email): ?>
		<tr>
			<td><?php echo $email['id'];?></td>
			<td><?php echo $email['foreign_id'];?></td>
			<td><?php echo $email['foreign_model'];?></td>
			<td><?php echo $email['type'];?></td>
			<td><?php echo $email['email_address'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'emails', 'action' => 'view', $email['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'emails', 'action' => 'edit', $email['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'emails', 'action' => 'delete', $email['id'], $client['Client']['id'], Inflector::classify( $this->params['controller'])), null, __('Are you sure you want to delete # %s?', $email['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add', $client['Client']['id'], Inflector::classify( $this->params['controller'])));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Telephones');?></h3>
	<?php if (!empty($client['Telephone'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Telephone'] as $telephone): ?>
		<tr>
			<td><?php echo $telephone['id'];?></td>
			<td><?php echo $telephone['foreign_id'];?></td>
			<td><?php echo $telephone['foreign_model'];?></td>
			<td><?php echo $telephone['type'];?></td>
			<td><?php echo $telephone['telephone'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'telephones', 'action' => 'view', $telephone['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'telephones', 'action' => 'edit', $telephone['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'telephones', 'action' => 'delete', $telephone['id'], $client['Client']['id'], Inflector::classify( $this->params['controller'])), null, __('Are you sure you want to delete # %s?', $telephone['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<div class="related">
	<h3><?php echo __('Related Projects');?></h3>
	<?php if (!empty($client['Project'])):?>
	<?php $quoteColor=Configure::read("quoteColor"); ?>
	<?php $quoteStatus=Configure::read("quoteStatus"); ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name');?></th>
		<th><?php echo __('Balance');?></th>
		<th><?php echo __("Quote Status");?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Project'] as $project): ?>
		<tr>
			<td><?php echo $project['id'];?></td>
			<td><?php echo $project['name'];?></td>
			<td><?php echo h($project['balance']); ?>&nbsp;</td>
			<td style="background:<?php echo h($quoteColor[$project['quote_status']]); ?>;"><?php echo h($quoteStatus[$project['quote_status']]); ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' =>'projects', 'action' => 'view', $project['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' =>'projects', 'action' => 'edit', $project['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' =>'projects', 'action' => 'delete', $project['id']), null, __('Are you sure you want to delete # %s?', $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add', $client['Client']['id'], Inflector::classify( $this->params['controller'])));?> </li>
		</ul>
	</div>
</div>
