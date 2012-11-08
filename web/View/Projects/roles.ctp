<div class="projects view">
<?php 
	foreach ($project['ProjectRole'] as $type=>$pr) {
		$model=$type;
		if ($model=='UserReferent')
			$model='User';
		?>
		<h2><?php echo __("Related ".str_ireplace("Referent","",$type)." Roles");?></h2>
		<?php if (!empty($pr)):?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Nome'); ?></th>
			<th><?php echo __('Role'); ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
			foreach ($pr as $projectRole): ?>
			<tr>
				<?php /*?><td><?php echo $projectRole['ProjectRole']['id'];?></td>*/?>
				<td><?php echo $projectRole[$model]['cognome']." ".$projectRole[$model]['nome'];?></td>
				<td><?php echo $projectRole['ProjectRole']['role'];?></td>
				<td class="actions">
					<?php echo $this->Html->link(__('View'), array('controller' => 'project_roles', 'action' => 'view', $projectRole['ProjectRole']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'project_roles', 'action' => 'edit', $projectRole['ProjectRole']['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'project_roles', 'action' => 'delete', $projectRole['ProjectRole']['id'], $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $projectRole['ProjectRole']['id'])); ?>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php endif;		
	}
?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Back to project'), array('controller' => 'projects', 'action' => 'view', $project['Project']['id']));?> </li>
		<li><?php echo $this->Html->link(__('New Client Role'), array('controller' => 'project_roles', 'action' => 'add', $project['Project']['id'], $project['Project']['client_id'], 'Client'));?> </li>
		<li><?php echo $this->Html->link(__('New User Role'), array('controller' => 'project_roles', 'action' => 'add', $project['Project']['id'], $project['Project']['client_id'], 'User'));?> </li>
	</ul>
</div>

