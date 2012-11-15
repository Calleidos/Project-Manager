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
		echo $this->Form->input("paymenttype_id", array('options' => $paymenttype));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul><?php 
		if (isset($this->request->data['Client']['id'])) { ?>	
		<li><?php echo $this->Html->link(__('Back to Client'), array('action' => 'view', $this->request->data['Client']['id']));?></li><?php } ?>
	</ul>
</div>
