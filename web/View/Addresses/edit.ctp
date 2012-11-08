<?php pr($this->request->data);
$addressType=Configure::read("addressType");

?>
<div class="addresses form">
<?php echo $this->Form->create('Address');?>
	<fieldset>
		<legend><?php echo __('Edit Address'); ?></legend>
	<?php
		if (isset($this->request->data['Address']['id']))
			echo $this->Form->input('id');
		echo $this->Form->input('foreign_id', array('type'=>'hidden'));
		echo $this->Form->input('foreign_model', array('type'=>'hidden'));
		echo $this->Form->input('type', array('type' => 'select', 'options' => $addressType));
		echo $this->Form->input('address');
		echo $this->Form->input('zipcode');
		echo $this->Form->input('city');
		echo $this->Form->input('province');
		echo $this->Form->input('nation');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Address.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Address.id'))); ?></li>
		
	</ul>
</div>
