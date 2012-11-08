<div class="bankDetails view">
<h2><?php  echo __('Bank Detail');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($bankDetail['Client']['ragione_sociale'], array('controller' => 'clients', 'action' => 'view', $bankDetail['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Model'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['foreign_model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iban'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['iban']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Banca'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['banca']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agenzia Di'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['agenzia_di']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Abi'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['abi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cab'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['cab']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conto'); ?></dt>
		<dd>
			<?php echo h($bankDetail['BankDetail']['conto']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Bank Detail'), array('action' => 'edit', $bankDetail['BankDetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Bank Detail'), array('action' => 'delete', $bankDetail['BankDetail']['id']), null, __('Are you sure you want to delete # %s?', $bankDetail['BankDetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Bank Details'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Detail'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
	</ul>
</div>
