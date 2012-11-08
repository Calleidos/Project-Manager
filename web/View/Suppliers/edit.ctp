<div class="suppliers form">
<?php echo $this->Form->create('Supplier');?>
	<fieldset>
		<legend><?php echo __('Edit Supplier'); ?></legend>
	<?php
		if (isset($this->request->data['Supplier']['id']))	
			echo $this->Form->input('id');
		echo $this->Form->input('ragione_sociale');
		echo $this->Form->input('codice_fiscale');
		echo $this->Form->input('partita_iva');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul><?php 
		if (isset($this->request->data['Supplier']['id'])) { ?>	
		<li><?php echo $this->Html->link(__('Back to Supplier'), array('action' => 'view', $this->request->data['Supplier']['id']));?></li><?php } ?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Supplier.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Supplier.id'))); ?></li>
	</ul>
</div>
