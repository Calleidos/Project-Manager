<div class="articles view">
	<h2><?php  echo __('Not possible to change quote status');?></h2>
	<p><?php echo __("It's not possible to confirm this quote because there is no Confirm Quote document") ?>:</p>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Html->link(__('Back to the Project'), array('controller' => 'projects', 'action' => 'view', $project_id)); ?> </li>
	</ul>
</div>