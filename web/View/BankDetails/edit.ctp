<div class="bankDetails form">
<?php echo $this->Form->create('BankDetail');?>
	<fieldset>
		<legend><?php echo __('Edit Bank Detail'); ?></legend>
	<?php
		if (isset($this->request->data['BankDetail']['id']))
			echo $this->Form->input('id');
		echo $this->Form->input('foreign_id', array('type'=>'hidden'));
		echo $this->Form->input('foreign_model', array('type'=>'hidden'));
		echo $this->Form->input('type', array('options'=>Configure::read('bankDetailTypes')));
		echo $this->Form->input('iban');
		echo $this->Form->input('banca');
		echo $this->Form->input('agenzia_di');
		echo $this->Form->input('abi');
		echo $this->Form->input('cab');
		echo $this->Form->input('conto');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BankDetail.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BankDetail.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Bank Details'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
	</ul>
</div>
