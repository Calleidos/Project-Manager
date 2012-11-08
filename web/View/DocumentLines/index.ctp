<div class="documentLines index">
	<h2><?php echo __('Document Lines');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('foreign_id');?></th>
			<th><?php echo $this->Paginator->sort('foreign_model');?></th>
			<th><?php echo $this->Paginator->sort('article_id');?></th>
			<th><?php echo $this->Paginator->sort('prezzo');?></th>
			<th><?php echo $this->Paginator->sort('quantita');?></th>
			<th><?php echo $this->Paginator->sort('consegna');?></th>
			<th><?php echo $this->Paginator->sort('consegna_tempo');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($documentLines as $documentLine): ?>
	<tr>
		<td><?php echo h($documentLine['DocumentLine']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($documentLine['Quote']['id'], array('controller' => 'quotes', 'action' => 'view', $documentLine['Quote']['id'])); ?>
		</td>
		<td><?php echo h($documentLine['DocumentLine']['foreign_model']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($documentLine['Article']['description'], array('controller' => 'articles', 'action' => 'view', $documentLine['Article']['id'])); ?>
		</td>
		<td><?php echo h($documentLine['DocumentLine']['prezzo']); ?>&nbsp;</td>
		<td><?php echo h($documentLine['DocumentLine']['quantita']); ?>&nbsp;</td>
		<td><?php echo h($documentLine['DocumentLine']['consegna']); ?>&nbsp;</td>
		<td><?php echo h($documentLine['DocumentLine']['consegna_tempo']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $documentLine['DocumentLine']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $documentLine['DocumentLine']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $documentLine['DocumentLine']['id']), null, __('Are you sure you want to delete # %s?', $documentLine['DocumentLine']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Document Line'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Quotes'), array('controller' => 'quotes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote'), array('controller' => 'quotes', 'action' => 'add')); ?> </li>
	</ul>
</div>
