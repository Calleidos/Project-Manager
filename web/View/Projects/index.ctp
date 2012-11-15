<?php $quoteColor=Configure::read("quoteColor"); ?>
<?php $quoteStatus=Configure::read("quoteStatus"); ?>
<?php $ddtColor=Configure::read("ddtColor"); ?>
<?php $ddtStatus=Configure::read("ddtStatus"); ?>
<?php $invoiceColor=Configure::read("invoiceColor"); ?>
<?php $invoiceStatus=Configure::read("invoiceStatus"); ?>
<div class="projects index">
	<h2><?php echo __('Projects');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('data');?></th>
			<th><?php echo $this->Paginator->sort('Client.ragione_sociale', 'Client');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('balance');?></th>
			<th><?php echo __("Quote Status");?></th>
			<th><?php echo __("DDT Status");?></th>
			<th><?php echo __("Invoice Status");?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($projects as $project): ?>
	<tr>
		<td><?php echo h($project['Project']['id']); ?>&nbsp;</td>
		<td><?php echo h(date("Y-m-d", strtotime($project['Project']['data']))); ?>&nbsp;</td>
		<td><?php echo h($project['Client']['ragione_sociale']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['name']); ?>&nbsp;</td>
		<td><?php echo h($project['Project']['balance']); ?>&nbsp;</td>
		<td style="background:<?php echo h($quoteColor[$project['Project']['quote_status']]); ?>;<?php if ($quoteColor[$project['Project']['quote_status']]<>'yellow') echo "color:white"; ?>"><?php echo h($quoteStatus[$project['Project']['quote_status']]); ?></td>
		<td style="background:<?php echo h($ddtColor[$project['Project']['ddt_status']]); ?>;<?php if ($ddtColor[$project['Project']['ddt_status']]<>'yellow') echo "color:white"; ?>"><?php echo h($ddtStatus[$project['Project']['ddt_status']]); ?></td>
		<td style="background:<?php echo h($invoiceColor[$project['Project']['invoice_status']]); ?>;<?php if ($invoiceColor[$project['Project']['invoice_status']]<>'yellow') echo "color:white"; ?>"><?php echo h($invoiceStatus[$project['Project']['invoice_status']]); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $project['Project']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $project['Project']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?></li>
	</ul>
</div>
