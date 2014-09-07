<div class="row">
    <div class="large-12 columns large-centered">
        <h1 class="centered-text">Welcome to Video Chat Project</h1>
        <hr>
        <div class="row">
            <div class="large-4 columns">
                <h3 class="centered-text">Admin</h3>
            </div>
            <div class="large-4 columns">
                <h3 class="centered-text">Agent</h3>
            </div>
            <div class="large-4 columns">
                <h3 class="centered-text">Guest</h3>
                <ul>
                    <li><?php echo $this->Html->link('Start Chat :)', array('plugin' => '', 'controller' => 'Chats', 'action' => 'start' ))?></li>
                </ul>
            </div>
        </div>

    </div>
</div>

<?php
// echo $this->element('chat'); ?>