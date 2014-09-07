<div class="row">
<div class="large-12 columns chats index">
	<h2><?php echo __('Chats'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('keywords'); ?></th>
			<th><?php echo $this->Paginator->sort('reason'); ?></th>
			<th><?php echo $this->Paginator->sort('agent_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($chats as $chat): ?>
	<tr>
		<td><?php echo h($chat['Chat']['id']); ?>&nbsp;</td>
		<td><?php echo h($chat['Chat']['name']); ?>&nbsp;</td>
		<td><?php echo h($chat['Chat']['email']); ?>&nbsp;</td>
		<td><?php echo h($chat['Chat']['keywords']); ?>&nbsp;</td>
		<td><?php echo h($chat['Chat']['reason']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chat['Agent']['name'], array('controller' => 'agents', 'action' => 'view', $chat['Agent']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chat['Chat']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chat['Chat']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chat['Chat']['id']), array(), __('Are you sure you want to delete # %s?', $chat['Chat']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
<!--<div class="large-3 columns actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Chat'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Agents'), array('controller' => 'agents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent'), array('controller' => 'agents', 'action' => 'add')); ?> </li>
	</ul>
</div>-->
</div>
