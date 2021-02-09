<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Command $command
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Home'), ['controller' => 'pages', 'action' => 'painel'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="commands form content">
            <?= $this->Form->create($command, ['id' => 'frm']) ?>
            <fieldset>
                <legend><?= __('Enviar comando') ?></legend>
                <?php
                    echo $this->Form->control('command', ['type' => 'hidden']);
                ?>
                <?= $this->Form->button(__('On'), ['type' => 'button', 'onclick' => 'sendCommand(\'on\')']) ?>
                <?= $this->Form->button(__('Off'), ['type' => 'button', 'onclick' => 'sendCommand(\'off\')']) ?>

            </fieldset>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    function sendCommand(command){
        document.getElementById('command').value = command
        document.getElementById('frm').submit()        
    }
</script>