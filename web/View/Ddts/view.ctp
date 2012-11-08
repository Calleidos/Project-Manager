<div class="ddts view">
<h2><?php  echo __('Ddt');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('name'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Creator'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ddt['Creator']['username'], array('controller' => 'users', 'action' => 'view', $ddt['Creator']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modifier'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ddt['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $ddt['Modifier']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Referent'); ?></dt>
		<dd>
			<?php echo h($ddt['ClientReferent']['nome']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Indirizzo'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['address']); ?>
			&nbsp;
		</dd>
		
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mezzo'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['mezzo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vettore'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['vettore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aspetto esteriore'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['aspetto_esteriore']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Peso'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['peso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero colli'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['numero_colli']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmed'); ?></dt>
		<dd>
			<?php echo h($ddt['Ddt']['confirmed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Trasporto'); ?></dt>
		<dd>
			<?php echo h(date("d-m-Y", strtotime($ddt['Ddt']['data_trasporto']))); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ddt'), array('action' => 'edit', $ddt['Ddt']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ddt'), array('action' => 'delete', $ddt['Ddt']['id'], $project_id), null, __('Are you sure you want to delete # %s?', $ddt['Ddt']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Back to Project'), array('controller' => 'projects', 'action' => 'view', $project_id)); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Document Lines');?></h3>
	<?php if (!empty($ddt['DocumentLine'])):?>
	<?php pr($ddt['DocumentLine']); ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Article'); ?></th>
		<th><?php echo __('Quantita'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ddt['DocumentLine'] as $documentLine): ?>
		<tr>
			<td><?php echo $articles[$documentLine['article_id']];?></td>
			<td><?php echo $documentLine['quantita'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
