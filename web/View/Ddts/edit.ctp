<div class="ddts form">
<?php echo $this->Form->create('Ddt');?>
	<fieldset>
		<legend><?php echo __('Edit Ddt'); ?></legend>
	<?php
		if (isset($this->request->data['Ddt']['id']))
			echo $this->Form->input('id');
		if (isset($this->request->data['Ddt']['project_id']))
			echo $this->Form->input('project_id', array('type'=>'hidden', 'value' => $this->request->data['Ddt']['project_id']));
		else 
			echo $this->Form->input('project_id', array('type'=>'hidden', 'value' => $project_id));	
		echo $this->Form->input('created_by_id', array('type'=>'hidden', 'value' => '1'));
		echo $this->Form->input('modified_by_id', array('type'=>'hidden', 'value' => '1'));
		echo $this->Form->input('name');
		echo $this->Form->input('data');
		echo $this->Form->input('address', array('options'=>$addresses));
		echo $this->Form->input('address_spedizione', array('options'=>$addresses));
		echo $this->Form->input('client_referent_id', array('options'=>$referenti));
		echo $this->Form->input('data_trasporto');
		echo $this->Form->input('mezzo', array('options' => Configure::read('trasportiDDT')));
		echo $this->Form->input('vettore', array('options' => Configure::read('vettori')));
		echo $this->Form->input('email', array("type" => "select", "options" => $email));
		echo $this->Form->input('aspetto_esteriore');
		echo $this->Form->input('peso');
		echo $this->Form->input('numero_colli');
		if (isset($documentlines) && !empty($documentlines)) {
		pr($quantita);
			?>
		<table>
			<tr>
				<th><?php echo __("Includi") ?></th>
				<th><?php echo __("Descrizione") ?></th>
				<th><?php echo __("Quantita") ?></th>
			</tr><?php
			$i=0;
			foreach ($articles as $article) {?>
				<tr>
					<td><?php echo $this->Form->input("DocumentLine.$i.includi", array('type'=>'checkbox', 'label' => false)); ?> <?php echo $this->Form->input("DocumentLine.$i.documentline_id", array('type'=>'hidden', 'value' => $documentline['DocumentLine']['id']))?><?php echo $this->Form->input("DocumentLine.$i.article_id", array('type'=>'hidden', 'value' => $documentline['DocumentLine']['article_id']))?></td>
					<td><?php echo $articles[$documentline['DocumentLine']['article_id']]; ?><?php echo $this->Form->input("DocumentLine.$i.documentline_id", array('type'=>'hidden', 'value' => $documentline['DocumentLine']['id']))?></td>
					<td><?php echo $this->Form->input("DocumentLine.$i.quantita", array('label' => false)); ?> su <?php echo ($documentline['DocumentLine']['quantita']-$quantita[$documentline['DocumentLine']['article_id']]) ?> rimanenti da trasportare <br />(<?php echo $documentline['DocumentLine']['quantita'] ?> iniziali)</td>
				</tr><?php
				$i++;
			}?>
		</table><?php
		}?>
		
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ddt.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ddt.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ddts'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Creator'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Document Lines'), array('controller' => 'document_lines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Document Line'), array('controller' => 'document_lines', 'action' => 'add')); ?> </li>
	</ul>
</div>
