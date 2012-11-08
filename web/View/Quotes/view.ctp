<div class="quotes view">
<h2><?php  echo __('Quote');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('name'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quote['Creator']['username'], array('controller' => 'users', 'action' => 'view', $quote['Creator']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quote['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $quote['Modifier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Referent'); ?></dt>
		<dd>
			<?php echo h($quote['ClientReferent']['nome']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Indirizzo'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IVA'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['iva']); ?>%
			&nbsp;
		</dd>
		
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmed'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['confirmed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagamento'); ?></dt>
		<dd>
			<?php echo h($quote['Quote']['pagamento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Consegna'); ?></dt>
		<dd>
			<?php echo h(date("d-m-Y", strtotime($quote['Quote']['consegna']))); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quote'), array('action' => 'edit', $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quote'), array('action' => 'delete', $quote['Quote']['id'], $project_id), null, __('Are you sure you want to delete # %s?', $quote['Quote']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Back to Project'), array('controller' => 'projects', 'action' => 'view', $project_id)); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Document Lines');?></h3>
	<?php if (!empty($quote['DocumentLine'])):?>
	<?php pr($quote['DocumentLine']); ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Article'); ?></th>
		<th><?php echo __('Prezzo'); ?></th>
		<th><?php echo __('Quantita'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($quote['DocumentLine'] as $documentLine): ?>
		<tr>
			<td><?php echo $articles[$documentLine['article_id']];?></td>
			<td><?php echo $documentLine['prezzo'];?></td>
			<td><?php echo $documentLine['quantita'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
