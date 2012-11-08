<div class="documentLines view">
<h2><?php  echo __('Document Line');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($documentLine['DocumentLine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quote'); ?></dt>
		<dd>
			<?php echo $this->Html->link($documentLine['Quote']['id'], array('controller' => 'quotes', 'action' => 'view', $documentLine['Quote']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Model'); ?></dt>
		<dd>
			<?php echo h($documentLine['DocumentLine']['foreign_model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Article'); ?></dt>
		<dd>
			<?php echo $this->Html->link($documentLine['Article']['description'], array('controller' => 'articles', 'action' => 'view', $documentLine['Article']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prezzo'); ?></dt>
		<dd>
			<?php echo h($documentLine['DocumentLine']['prezzo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantita'); ?></dt>
		<dd>
			<?php echo h($documentLine['DocumentLine']['quantita']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consegna'); ?></dt>
		<dd>
			<?php echo h($documentLine['DocumentLine']['consegna']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consegna Tempo'); ?></dt>
		<dd>
			<?php echo h($documentLine['DocumentLine']['consegna_tempo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Document Line'), array('action' => 'edit', $documentLine['DocumentLine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Document Line'), array('action' => 'delete', $documentLine['DocumentLine']['id']), null, __('Are you sure you want to delete # %s?', $documentLine['DocumentLine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Document Lines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Line'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes'), array('controller' => 'quotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
