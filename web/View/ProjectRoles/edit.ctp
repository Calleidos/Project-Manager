<div class="projectRoles form">
<?php echo $this->Form->create('ProjectRole');?>
	<fieldset>
		<legend><?php echo __('Edit Project Role'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('project_id', array('type'=>'hidden'));
		echo $this->Form->input('foreign_model', array('type'=>'hidden'));
		echo $this->Form->input('role', array('options'=>Configure::read(strtolower($this->request->data['ProjectRole']['foreign_model']).'Roles')));
		echo $this->Form->input('foreign_id');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProjectRole.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProjectRole.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Project Roles'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Referents'), array('controller' => 'client_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Referent'), array('controller' => 'client_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Referents'), array('controller' => 'supplier_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Referent'), array('controller' => 'supplier_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
