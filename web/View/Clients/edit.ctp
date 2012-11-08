<div class="clients form">
<?php echo $this->Form->create('Client');?>
	<fieldset>
		<legend><?php echo __('Edit Client'); ?></legend>
	<?php
		if (isset($this->request->data['Client']['id']))
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
		if (isset($this->request->data['Client']['id'])) { ?>	
		<li><?php echo $this->Html->link(__('Back to Client'), array('action' => 'view', $this->request->data['Client']['id']));?></li><?php } ?>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Client.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Client.id'))); ?></li>
	</ul>
</div>
