<?php
	//pr($project);
	$this->element("fancybox_links");
	$this->Html->css('datetimepicker', null, array('inline' => false));
	$this->Html->script("/js/functions.js", array('inline' => false));
	$this->append('script');?>
		<script type="text/javascript">		
			jQuery(document).ready(function($){
				$(function() {
					$( ".tabs" ).tabs();
				});

				$(".fancy-modal").fancybox({
					type : 'iframe' 
				});

				$( ".add-button" ).button({
		            icons: {
		                primary: "ui-icon-circle-plus"
		            }
		        });
		        
				orderIcons();
				createIcons();
				fancyImages();

				$(".page-title").change(function(){
					slug="#"+$(this).attr('id').replace("Name", "Slug");
					if ($(slug).val().trim()=="") {
						$(slug).val($(this).val());
					}
				});
					
			});

			
		</script><?php
	$this->end();?>		

<div class="projects view">
<h2><?php  echo __('Project');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($project['Project']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($project['Project']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quote Status'); ?></dt>
		<?php 
			$quoteStatus=Configure::read('quoteStatus');
			$quoteColor=Configure::read('quoteColor');
		?>
		<dd style="background:<?php echo h($quoteColor[$project['Project']['quote_status']]); ?>;<?php if ($quoteColor[$project['Project']['quote_status']]<>'yellow') echo "color:white"; ?>"><?php
			
				echo h($quoteStatus[$project['Project']['quote_status']]); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Balance'); ?></dt>
		<dd>
			<?php echo h($project['Project']['balance']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Project'), array('action' => 'edit', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Project'), array('action' => 'delete', $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $project['Project']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quote'), array('controller'=>'quotes', 'action' => 'add', $project['Project']['id'])); ?></li>
		<li><?php echo $this->Html->link(__('Project Roles'), array('controller'=>'projects', 'action' => 'roles', $project['Project']['id'])); ?></li>
	</ul>
</div>
<div style="clear:both"></div>
<div class="tabs">
	<ul>
		<li><a href="#tabs-articles"><?php echo __('Related Articles');?></a></li>
		<li><a href="#tabs-quotes"><?php echo __('Related Quotes');?></a></li>
		<li><a href="#tabs-ddts"><?php echo __('Related DDTs');?></a></li>
		<li><a href="#tabs-documents"><?php echo __('Documents');?></a></li>
	</ul>
	<div id="tabs-articles">
		<div class="related">
			<h3><?php echo __('Related Articles');?></h3>
			<?php if (!empty($project['Article'])):?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Description'); ?></th>
				<th><?php echo __('Status'); ?></th>
				<th><?php echo __('Quote status'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($project['Article'] as $article): ?>
				<tr>
					<td><?php echo $article['description'];?></td>
					<td style="color:white; background:<?php if ($article['status']) echo "green"; else echo "red";  ?>"><?php if ($article['status']) echo _("Activated"); else echo _("Disactivated");  ?></td>
					<td style="background:<?php echo $quoteColor[$article['quote_status']]; ?>;<?php if ($quoteColor[$article['quote_status']]<>'yellow') echo "color:white"; ?>"><?php echo $quoteStatus[$article['quote_status']]; ?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
						<?php if ($article['status']) $text=_("Disactivate"); else $text=_("Activate");  ?>
						<?php echo $this->Html->link($text, array('controller' => 'articles', 'action' => 'activate', $article['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		<?php endif; ?>
		
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add', $project['Project']['id']));?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div id="tabs-quotes">
		<div class="related">
			<h3><?php echo __('Related Quotes');?></h3>
			<?php $deleted=array();
			foreach ($project['Quote'] as $key=>$quote) {
				if ($quote['deleted']) {
					$deleted[]=$quote;
					unset($project['Quote'][$key]);
				}
			}
			if (!empty($project['Quote'])): ?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Document Number'); ?></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Data'); ?></th>
				<th><?php echo __('Confirmed'); ?></th>
				<th><?php echo __('Confirmation'); ?></th>
				<th><?php echo __('Pagamento'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($project['Quote'] as $quote): ?>
				<tr>
					<td><?php echo $quote['id'];?></td>
					<td><?php echo $quote['name'];?></td>
					<td><?php echo $quote['data'];?></td>
					<td style="color:white; background:<?php if ($quote['confirmed']) echo "green"; else echo "red";  ?>"><?php if ($quote['confirmed']) echo __("Yes"); else echo __("No");?></td>
					<td class="actions"><?php if ($quote['confirmed']) echo $this->Html->link(__("View"),$documents[$quote['document_confirm_id']], true); else echo "&nbsp;"; ?></td>
					<td><?php echo $quote['pagamento'];?></td>
					<td class="actions">
						<?php if (!$quote['confirmed']) $text="Confirm"; else $text="Unconfirm";?>
						<?php echo $this->Html->link(__("View"), array('controller' => 'quotes', 'action' => 'view', $quote['id'], $project['Project']['id'])); ?>
						<?php echo $this->Html->link($text, array('controller' => 'quotes', 'action' => 'confirm', $quote['id'], $project['Project']['id'])); ?>
						<?php echo $this->Html->link(__("PDF"), array('controller' => 'quotes', 'action' => 'pdf', $quote['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'quotes', 'action' => 'delete', $quote['id'], $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $quote['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		
		<?php endif; ?>
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('New Quote'), array('controller'=>'quotes', 'action' => 'add', $project['Project']['id'])); ?> </li>
				</ul>
			</div>
		</div>
		<?php if (!empty($deleted)):?>
		<div class="related">
			<h3><?php echo __('Deleted Quotes');?></h3>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Document Number'); ?></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Data'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($deleted as $quote): ?>
				<tr>
					<td><?php echo $quote['id'];?></td>
					<td><?php echo $quote['name'];?></td>
					<td><?php echo $quote['data'];?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('controller' => 'quotes', 'action' => 'view', $quote['id'], $project['Project']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
		<?php endif; ?>
	</div>
		<div id="tabs-ddts">
		<div class="related">
			<h3><?php echo __('Related DDTs');?></h3>
			<?php $deleted=array();
			foreach ($project['Ddt'] as $key=>$ddt) {
				if ($ddt['deleted']) {
					$deleted[]=$ddt;
					unset($project['Ddt'][$key]);
				}
			}
			if (!empty($project['Ddt'])): ?>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Document Number'); ?></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Data'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($project['Ddt'] as $ddt): ?>
				<tr>
					<td><?php echo $ddt['id'];?></td>
					<td><?php echo $ddt['name'];?></td>
					<td><?php echo $ddt['data'];?></td>
					<td class="actions">
						<?php if (!$ddt['confirmed']) $text="Confirm"; else $text="Unconfirm";?>
						<?php echo $this->Html->link(__("View"), array('controller' => 'ddts', 'action' => 'view', $ddt['id'], $project['Project']['id'])); ?>
						<?php echo $this->Html->link($text, array('controller' => 'ddts', 'action' => 'confirm', $ddt['id'], $project['Project']['id'])); ?>
						<?php echo $this->Html->link(__("PDF"), array('controller' => 'ddts', 'action' => 'pdf', $ddt['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ddts', 'action' => 'delete', $ddt['id'], $project['Project']['id']), null, __('Are you sure you want to delete # %s?', $ddt['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		
		<?php endif; ?>
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('New DDT'), array('controller'=>'ddts', 'action' => 'add', $project['Project']['id'])); ?> </li>
				</ul>
			</div>
		</div>
		
		<?php if (!empty($deleted)):?>
		<div class="related">
			<h3><?php echo __('Deleted DDTs');?></h3>
			<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Document Number'); ?></th>
				<th><?php echo __('Name'); ?></th>
				<th><?php echo __('Data'); ?></th>
				<th class="actions"><?php echo __('Actions');?></th>
			</tr>
			<?php
				$i = 0;
				foreach ($deleted as $quote): ?>
				<tr>
					<td><?php echo $quote['id'];?></td>
					<td><?php echo $quote['name'];?></td>
					<td><?php echo $quote['data'];?></td>
					<td class="actions">
						<?php echo $this->Html->link(__('View'), array('controller' => 'quotes', 'action' => 'view', $quote['id'], $project['Project']['id'])); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
		<?php endif; ?>
	</div>
	<div id="tabs-documents">
		<?php 
			$details=array('type' => 'document', 'model' => 'Project', 'id' => $project['Project']['id']);
			$this->set('details',$details);
			$this->set("project", $project);
			echo $this->element('/file_list');?>
	</div>
</div>

