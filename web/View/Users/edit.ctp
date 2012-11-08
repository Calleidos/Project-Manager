<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		if (isset($this->data['User']['id']))
			echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('nome');
		echo $this->Form->input('cognome');
		echo $this->Form->input('group_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails'), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Roles'), array('controller' => 'project_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Role'), array('controller' => 'project_roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Telephones'), array('controller' => 'telephones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add')); ?> </li>
	</ul>
</div>
