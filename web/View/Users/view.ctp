<div class="users view">
<h2><?php  echo __('User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($user['User']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cognome'); ?></dt>
		<dd>
			<?php echo h($user['User']['cognome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Emails'), array('controller' => 'emails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Project Roles'), array('controller' => 'project_roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project Role'), array('controller' => 'project_roles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Telephones'), array('controller' => 'telephones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Addresses');?></h3>
	<?php if (!empty($user['Address'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Zipcode'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Province'); ?></th>
		<th><?php echo __('Nation'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['id'];?></td>
			<td><?php echo $address['foreign_id'];?></td>
			<td><?php echo $address['foreign_model'];?></td>
			<td><?php echo $address['type'];?></td>
			<td><?php echo $address['address'];?></td>
			<td><?php echo $address['zipcode'];?></td>
			<td><?php echo $address['city'];?></td>
			<td><?php echo $address['province'];?></td>
			<td><?php echo $address['nation'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'addresses', 'action' => 'view', $address['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'addresses', 'action' => 'edit', $address['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'addresses', 'action' => 'delete', $address['id']), null, __('Are you sure you want to delete # %s?', $address['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Emails');?></h3>
	<?php if (!empty($user['Email'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Email Address'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Email'] as $email): ?>
		<tr>
			<td><?php echo $email['id'];?></td>
			<td><?php echo $email['foreign_id'];?></td>
			<td><?php echo $email['foreign_model'];?></td>
			<td><?php echo $email['type'];?></td>
			<td><?php echo $email['email_address'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'emails', 'action' => 'view', $email['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'emails', 'action' => 'edit', $email['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'emails', 'action' => 'delete', $email['id']), null, __('Are you sure you want to delete # %s?', $email['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Roles');?></h3>
	<?php if (!empty($user['ProjectRole'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['ProjectRole'] as $projectRole): ?>
		<tr>
			<td><?php echo $projectRole['id'];?></td>
			<td><?php echo $projectRole['role'];?></td>
			<td><?php echo $projectRole['project_id'];?></td>
			<td><?php echo $projectRole['foreign_id'];?></td>
			<td><?php echo $projectRole['foreign_model'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'project_roles', 'action' => 'view', $projectRole['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_roles', 'action' => 'edit', $projectRole['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_roles', 'action' => 'delete', $projectRole['id']), null, __('Are you sure you want to delete # %s?', $projectRole['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project Role'), array('controller' => 'project_roles', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Telephones');?></h3>
	<?php if (!empty($user['Telephone'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Foreign Id'); ?></th>
		<th><?php echo __('Foreign Model'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Telephone'] as $telephone): ?>
		<tr>
			<td><?php echo $telephone['id'];?></td>
			<td><?php echo $telephone['foreign_id'];?></td>
			<td><?php echo $telephone['foreign_model'];?></td>
			<td><?php echo $telephone['type'];?></td>
			<td><?php echo $telephone['telephone'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'telephones', 'action' => 'view', $telephone['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'telephones', 'action' => 'edit', $telephone['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'telephones', 'action' => 'delete', $telephone['id']), null, __('Are you sure you want to delete # %s?', $telephone['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
