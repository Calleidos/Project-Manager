<div class="telephones view">
<h2><?php  echo __('Telephone');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($telephone['Telephone']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($telephone['Client']['ragione_sociale'], array('controller' => 'clients', 'action' => 'view', $telephone['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Model'); ?></dt>
		<dd>
			<?php echo h($telephone['Telephone']['foreign_model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($telephone['Telephone']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($telephone['Telephone']['telephone']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Telephone'), array('action' => 'edit', $telephone['Telephone']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Telephone'), array('action' => 'delete', $telephone['Telephone']['id']), null, __('Are you sure you want to delete # %s?', $telephone['Telephone']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Telephones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telephone'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Referents'), array('controller' => 'client_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Referent'), array('controller' => 'client_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Suppliers'), array('controller' => 'suppliers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier'), array('controller' => 'suppliers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Referents'), array('controller' => 'supplier_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Referent'), array('controller' => 'supplier_referents', 'action' => 'add')); ?> </li>
	</ul>
</div>
