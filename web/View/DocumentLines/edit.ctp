<div class="documentLines form">
<?php echo $this->Form->create('DocumentLine');?>
	<fieldset>
		<legend><?php echo __('Edit Document Line'); ?></legend>
	<?php
		if (isset($this->request->data['DocumentLine']['id']))
			echo $this->Form->input('id');
		echo $this->Form->input('foreign_id', array('type'=>'hidden'));
		echo $this->Form->input('foreign_model', array('type'=>'hidden'));
		echo $this->Form->input('article_id');
		echo $this->Form->input('prezzo');
		echo $this->Form->input('quantita');
		echo $this->Form->input('consegna');
		echo $this->Form->input('consegna_tempo', array('options'=>array('ore', 'giorni', 'settimane', 'mesi')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DocumentLine.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('DocumentLine.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Document Lines'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes'), array('controller' => 'quotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
