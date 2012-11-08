<div class="businessLines view">
<h2><?php  echo __('Business Line');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($businessLine['BusinessLine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($businessLine['BusinessLine']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Business Line'), array('action' => 'edit', $businessLine['BusinessLine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Business Line'), array('action' => 'delete', $businessLine['BusinessLine']['id']), null, __('Are you sure you want to delete # %s?', $businessLine['BusinessLine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Lines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Line'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Articles');?></h3>
	<?php if (!empty($businessLine['Article'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($businessLine['Article'] as $article): ?>
		<tr>
			<td><?php echo $article['id'];?></td>
			<td><?php echo $article['project_id'];?></td>
			<td><?php echo $article['description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), null, __('Are you sure you want to delete # %s?', $article['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
