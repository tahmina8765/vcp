<div class="row">
<div class="large-9 columns agents view">
<h2><?php echo __('Agent'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['designation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['address']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="large-3 columns actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agent'), array('action' => 'edit', $agent['Agent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agent'), array('action' => 'delete', $agent['Agent']['id']), array(), __('Are you sure you want to delete # %s?', $agent['Agent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Agents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Agent Expertises'), array('controller' => 'agent_expertises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent Expertise'), array('controller' => 'agent_expertises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chats'), array('controller' => 'chats', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chat'), array('controller' => 'chats', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
<div class="related">
	<h3><?php echo __('Related Agent Expertises'); ?></h3>
	<?php if (!empty($agent['AgentExpertise'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Agent Id'); ?></th>
		<th><?php echo __('Expertise Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($agent['AgentExpertise'] as $agentExpertise): ?>
		<tr>
			<td><?php echo $agentExpertise['id']; ?></td>
			<td><?php echo $agentExpertise['agent_id']; ?></td>
			<td><?php echo $agentExpertise['expertise_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'agent_expertises', 'action' => 'view', $agentExpertise['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'agent_expertises', 'action' => 'edit', $agentExpertise['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'agent_expertises', 'action' => 'delete', $agentExpertise['id']), array(), __('Are you sure you want to delete # %s?', $agentExpertise['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Agent Expertise'), array('controller' => 'agent_expertises', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Chats'); ?></h3>
	<?php if (!empty($agent['Chat'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Keywords'); ?></th>
		<th><?php echo __('Reason'); ?></th>
		<th><?php echo __('Agent Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($agent['Chat'] as $chat): ?>
		<tr>
			<td><?php echo $chat['id']; ?></td>
			<td><?php echo $chat['name']; ?></td>
			<td><?php echo $chat['email']; ?></td>
			<td><?php echo $chat['keywords']; ?></td>
			<td><?php echo $chat['reason']; ?></td>
			<td><?php echo $chat['agent_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'chats', 'action' => 'view', $chat['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'chats', 'action' => 'edit', $chat['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'chats', 'action' => 'delete', $chat['id']), array(), __('Are you sure you want to delete # %s?', $chat['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Chat'), array('controller' => 'chats', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
