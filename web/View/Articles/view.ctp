<div class="articles view">
<h2><?php  echo __('Article');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($article['Article']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($article['Project']['name'], array('controller' => 'projects', 'action' => 'view', $article['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($article['Article']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Business Line'); ?></dt>
		<dd>
			<?php echo h($article['BusinessLine']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Article'), array('action' => 'edit', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Article'), array('action' => 'delete', $article['Article']['id']), null, __('Are you sure you want to delete # %s?', $article['Article']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Document Lines'), array('controller' => 'document_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Line'), array('controller' => 'document_lines', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Lines'), array('controller' => 'business_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Line'), array('controller' => 'business_lines', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Document Lines');?></h3>
	<?php if (!empty($article['DocumentLine'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Article Id'); ?></th>
		<th><?php echo __('Prezzo'); ?></th>
		<th><?php echo __('Quantita'); ?></th>
		<th><?php echo __('Consegna'); ?></th>
		<th><?php echo __('Consegna Tempo'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($article['DocumentLine'] as $documentLine): ?>
		<tr>
			<td><?php echo $documentLine['id'];?></td>
			<td><?php echo $documentLine['foreign_id'];?></td>
			<td><?php echo $documentLine['foreign_model'];?></td>
			<td><?php echo $documentLine['article_id'];?></td>
			<td><?php echo $documentLine['prezzo'];?></td>
			<td><?php echo $documentLine['quantita'];?></td>
			<td><?php echo $documentLine['consegna'];?></td>
			<td><?php echo $documentLine['consegna_tempo'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'document_lines', 'action' => 'view', $documentLine['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'document_lines', 'action' => 'edit', $documentLine['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'document_lines', 'action' => 'delete', $documentLine['id']), null, __('Are you sure you want to delete # %s?', $documentLine['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Document Line'), array('controller' => 'document_lines', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
