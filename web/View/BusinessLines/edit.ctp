<div class="businessLines form">
<?php echo $this->Form->create('BusinessLine');?>
	<fieldset>
		<legend><?php echo __('Edit Business Line'); ?></legend>
	<?php
		if (isset($this->request->data['BusinessLine']['id']))
			echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('BusinessLine.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('BusinessLine.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Business Lines'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
