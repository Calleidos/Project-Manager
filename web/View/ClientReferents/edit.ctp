<div class="clientReferents form">
<?php echo $this->Form->create('ClientReferent');?>
	<fieldset>
		<legend><?php echo __('Edit Client Referent'); ?></legend>
	<?php
		if (isset($this->request->data['ClientReferent']['id']))
			echo $this->Form->input('id');
		echo $this->Form->input('client_id', array('type'=>'hidden'));
		echo $this->Form->input('ruolo');
		echo $this->Form->input('nome');
		echo $this->Form->input('cognome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to Supplier'), array('controller'=>'clients', 'action' => 'view', $this->request->data['ClientReferent']['client_id']));?></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ClientReferent.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ClientReferent.id'))); ?></li>
	</ul>
</div>
