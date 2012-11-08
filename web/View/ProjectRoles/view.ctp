<div class="projectRoles view">
<h2><?php  echo __('Project Role');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($projectRole['ProjectRole']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($projectRole['ProjectRole']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectRole['Project']['name'], array('controller' => 'projects', 'action' => 'view', $projectRole['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Referent'); ?></dt>
		<dd>
			<?php echo $this->Html->link($projectRole['ClientReferent']['nome'], array('controller' => 'client_referents', 'action' => 'view', $projectRole['ClientReferent']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Model'); ?></dt>
		<dd>
			<?php echo h($projectRole['ProjectRole']['foreign_model']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project Role'), array('action' => 'edit', $projectRole['ProjectRole']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project Role'), array('action' => 'delete', $projectRole['ProjectRole']['id']), null, __('Are you sure you want to delete # %s?', $projectRole['ProjectRole']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Roles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Role'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Client Referents'), array('controller' => 'client_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client Referent'), array('controller' => 'client_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Supplier Referents'), array('controller' => 'supplier_referents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Supplier Referent'), array('controller' => 'supplier_referents', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
