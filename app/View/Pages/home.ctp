<div class="row">
    <div class="large-12 columns large-centered">
        <div data-alert class="alert-box info radius">
            Test
            <a href="#" class="close">×</a>
        </div>

        <h1 class="centered-text">Welcome to Video Chat Project</h1>
        <hr>
        <div class="row">
            <div class="large-4 columns">
                <h3 class="centered-text">Admin</h3>
            </div>
            <div class="large-4 columns">
                <h3 class="centered-text">Agent</h3>

                <ul><li>
                        <?php
                        $userId = AuthComponent::user('id');
                        if (!empty($userId)) {
                            echo $this->Html->link('Logout', array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'logout'));
                        } else {
                            echo $this->Html->link('Login', array('plugin' => 'cauth', 'controller' => 'users', 'action' => 'login'));
                        }
                        ?>
                    </li>
                    <li><?php echo $this->Html->link('Chat Dashboard', array('plugin' => '', 'controller' => 'Chats', 'action' => 'index')) ?></li>
                </ul>
            </div>
            <div class="large-4 columns">
                <h3 class="centered-text">Guest</h3>
                <ul>
                    <li><?php echo $this->Html->link('Start Chat :)', array('plugin' => '', 'controller' => 'Chats', 'action' => 'add')) ?></li>
                </ul>
            </div>
        </div>

    </div>
</div>

<?php
// echo $this->element('chat'); ?>