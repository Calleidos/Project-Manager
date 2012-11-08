<div class="articles form">
<?php echo $this->Form->create('Article');?>
	<fieldset>
		<legend><?php echo __('Edit Article'); ?></legend>
	<?php
		if (isset($this->request->data['Article']['id']))
			echo $this->Form->input('id');
		echo $this->Form->input('project_id', array('type'=>'hidden'));
		echo $this->Form->input('description');
		echo $this->Form->input('businessline_id', array('options'=>$businessLines));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Document Lines'), array('controller' => 'document_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Line'), array('controller' => 'document_lines', 'action' => 'add')); ?> </li>
	</ul>
</div>
