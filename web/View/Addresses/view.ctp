<div class="addresses view">
<h2><?php  echo __('Address');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($address['Address']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['Client']['ragione_sociale'], array('controller' => 'clients', 'action' => 'view', $address['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Model'); ?></dt>
		<dd>
			<?php echo h($address['Address']['foreign_model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($address['Address']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($address['Address']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zipcode'); ?></dt>
		<dd>
			<?php echo h($address['Address']['zipcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($address['Address']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Province'); ?></dt>
		<dd>
			<?php echo h($address['Address']['province']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nation'); ?></dt>
		<dd>
			<?php echo h($address['Address']['nation']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Address'), array('action' => 'edit', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?> </li>
	</ul>
</div>
