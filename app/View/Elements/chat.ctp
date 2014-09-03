<div class="row">
    <div class="column large-12">
        <h1>Start Chat</h1>
        <p>Please give us some information so we can best serve you!</p>

        <?php echo $this->Form->create('Chat', array('action' => 'add')); ?>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('keywords');
        echo $this->Form->input('reason');
        ?>
        <?php echo $this->Form->end(__('Submit')); ?>
    </div>
</div>