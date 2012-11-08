<div class="articles index">
	<h2><?php echo __('Articles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($articles as $article): ?>
	<tr>
		<td><?php echo h($article['Article']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($article['Project']['name'], array('controller' => 'projects', 'action' => 'view', $article['Project']['id'])); ?>
		</td>
		<td><?php echo h($article['Article']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $article['Article']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $article['Article']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['Article']['id']), null, __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Document Lines'), array('controller' => 'document_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Line'), array('controller' => 'document_lines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Lines'), array('controller' => 'business_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Line'), array('controller' => 'business_lines', 'action' => 'add')); ?> </li>
	</ul>
</div>
