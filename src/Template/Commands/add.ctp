<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Command $command
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Commands'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commands form large-9 medium-8 columns content">
    <?= $this->Form->create($command) ?>
    <fieldset>
        <legend><?= __('Add Command') ?></legend>
        <?php
            echo $this->Form->control('command');
            echo $this->Form->control('executed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
