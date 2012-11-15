<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
		<legend><?php echo __('Edit Project'); ?></legend>
	<?php
		if (isset($this->request->data['Project']['id']))
			echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('client_id');
		echo $this->Form->input('data', array('type' => 'date'));?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add'), array('target' => 'blank'));?></li>
			</ul>
		</div>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index'));?></li>
	</ul>
</div>
