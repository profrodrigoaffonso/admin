<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules form large-9 medium-8 columns content">
    <?= $this->Form->create($schedule) ?>
    <fieldset>
        <legend><?= __('Add Schedule') ?></legend>
        <?php
            echo $this->Form->control('command_id', ['options' => $commands, 'empty' => true]);
            echo $this->Form->control('command_send');
            echo $this->Form->control('type');
            echo $this->Form->control('date_time', ['empty' => true]);
            echo $this->Form->control('specific_date');
            echo $this->Form->control('days_week');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
