<div class="articles view">
	<?php 
		echo $this->Form->create(null, array(
			'url' => $this->Html->url(array("controller" => 'quotes', 'action' => 'choose_doc' )),
		));?>
	<fieldset>
		<legend><?php  echo __('Choose doc');?></legend>
	<?php
		echo $this->Form->input('project_id', array('type' => 'hidden', 'value' => $project_id));
		echo $this->Form->input('quote_id', array('type' => 'hidden', 'value' => $quote_id));
		echo $this->Form->input('document_id', array('options' => $documents));?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('Back to the Project'), array('controller' => 'projects', 'action' => 'view', $project_id)); ?> </li>
	</ul>
</div>