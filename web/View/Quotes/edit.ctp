<div class="quotes form">
<?php echo $this->Form->create('Quote');?>
	<fieldset>
		<legend><?php echo __('Edit Quote'); ?></legend>
	<?php
		if (isset($this->request->data['Quote']['id']))
			echo $this->Form->input('id');
		if (isset($this->request->data['Quote']['project_id']))
			echo $this->Form->input('project_id', array('type'=>'hidden', 'value' => $this->request->data['Quote']['project_id']));
		else 
			echo $this->Form->input('project_id', array('type'=>'hidden', 'value' => $project_id));	
		echo $this->Form->input('created_by_id', array('type'=>'hidden', 'value' => '1'));
		echo $this->Form->input('modified_by_id', array('type'=>'hidden', 'value' => '1'));
		echo $this->Form->input('name');
		echo $this->Form->input('data');
		echo $this->Form->input('address', array('options'=>$addresses));
		echo $this->Form->input('client_referent_id', array('options'=>$referenti));
		echo $this->Form->input('iva', array('options'=>Configure::read('iva')));
		$tipiDiPagamento=$this->requestAction(array('controller' => 'paymenttypes', 'action' => 'listTypes'));
		array_unshift($tipiDiPagamento, "");
		if (isset($this->request->data['Quote']['pagamento']))
			$default=$this->request->data['Quote']['pagamento'];
		else
			$default=$paymentDefault;
		echo $this->Form->input('pagamento', array('options'=>$tipiDiPagamento, 'selected' => $default));
		echo $this->Form->input('consegna');
		echo $this->Form->input('email', array("type" => "select", "options" => $email));
		if (isset($articles) && !empty($articles)) {?>
		<table>
			<tr>
				<th><?php echo __("Includi") ?></th>
				<th><?php echo __("Descrizione") ?></th>
				<th><?php echo __("Prezzo") ?></th>
				<th><?php echo __("Quantita") ?></th>
			</tr><?php
			$i=0;
			foreach ($articles as $article) {?>
				<tr>
					<td><?php echo $this->Form->input("DocumentLine.$i.includi", array('type'=>'checkbox', 'label' => false, 'disabled' => !$article['Article']['status'], 'value' => ($this->request->data['Document']))); ?></td>
					<td <?php if (!$article['Article']['status']) echo "style='color:grey;' "?>><?php echo $article['Article']['description'] ?><?php echo $this->Form->input("DocumentLine.$i.article_id", array('type'=>'hidden', 'value' => $article['Article']['id']))?> <?php if (!$article['Article']['status']) echo "<i>(Articolo disabilitato)</i>"?></td>
					<td><?php echo $this->Form->input("DocumentLine.$i.prezzo", array('label' => false, 'disabled' => !$article['Article']['status'])); ?></td>
					<td><?php echo $this->Form->input("DocumentLine.$i.quantita", array('label' => false, 'disabled' => !$article['Article']['status'])); ?></td>
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
		<li><?php echo $this->Html->link(__('Back to Project'), array('controller' => 'projects', 'action' => 'view', $project_id)); ?> </li>
	</ul>
</div>
