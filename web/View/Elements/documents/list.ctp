<tr class="file-row" id="document-<?php echo $element["id"] ?>">
	<td>
		<?php 
			echo $this->Form->input("Document.{$element['id']}.id", array("value" => $element['id'], "type"=>"hidden"));
			if (isset($element['project_id'])) 
				echo $this->Form->input("Document.{$element['id']}.project_id", array("value" => $element['project_id'], "type"=>"hidden"));
			echo $this->Form->input("Document.{$element['id']}.name", array("value" => $element['name'], "type"=>"hidden"));
			echo $this->Form->input("Document.{$element['id']}.tipologia", array("value" => $element['tipologia'], "type"=>"hidden"));
		?>
		<button onclick="if(confirm('<?php echo __("Are you sure you want to delete this file?")?>')) {checkStatusAndDelete(<?php echo $element['id'] ?>, 'document');} return false;" class="cancel-file"><?php echo __("Delete file"); ?></button>
	</td>
	<td>
		<?php echo $element['name'] ?>
	</td>
	<td>
		<?php echo $element['tipologia'] ?>
	</td>
	<td>
		<?php echo $element['description'] ?>
	</td>
	<td>
		<button onClick="window.open('<?php echo $element['uploadPath'] ?>'); return false;" class="open-file"><?php echo __("View Document"); ?></button>
	</td>
</tr>