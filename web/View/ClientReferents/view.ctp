<div class="clientReferents view">
<h2><?php  echo __('Client Referent');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientReferent['ClientReferent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client Id'); ?></dt>
		<dd>
			<?php echo h($clientReferent['ClientReferent']['client_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ruolo'); ?></dt>
		<dd>
			<?php echo h($clientReferent['ClientReferent']['ruolo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($clientReferent['ClientReferent']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client Referent'), array('action' => 'edit', $clientReferent['ClientReferent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client Referent'), array('action' => 'delete', $clientReferent['ClientReferent']['id']), null, __('Are you sure you want to delete # %s?', $clientReferent['ClientReferent']['id'])); ?> </li>
		
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Emails');?></h3>
	<?php if (!empty($clientReferent['Email'])):?>
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
		foreach ($clientReferent['Email'] as $email): ?>
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
			<li><?php echo $this->Html->link(__('New Email'), array('controller' => 'emails', 'action' => 'add', $clientReferent['ClientReferent']['id'], 'ClientReferent'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Telephones');?></h3>
	<?php if (!empty($clientReferent['Telephone'])):?>
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
		foreach ($clientReferent['Telephone'] as $telephone): ?>
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
			<li><?php echo $this->Html->link(__('New Telephone'), array('controller' => 'telephones', 'action' => 'add', $clientReferent['ClientReferent']['id'], 'ClientReferent'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Project Roles');?></h3>
	<?php if (!empty($clientReferent['ProjectRole'])):?>
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
		foreach ($clientReferent['ProjectRole'] as $projectRole): ?>
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
</div>
