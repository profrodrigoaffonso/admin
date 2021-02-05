<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule $schedule
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="schedules view large-9 medium-8 columns content">
    <h3><?= h($schedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Command') ?></th>
            <td><?= $schedule->has('command') ? $this->Html->link($schedule->command->id, ['controller' => 'Commands', 'action' => 'view', $schedule->command->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Command Send') ?></th>
            <td><?= h($schedule->command_send) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($schedule->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Specific Date') ?></th>
            <td><?= h($schedule->specific_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Days Week') ?></th>
            <td><?= h($schedule->days_week) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Time') ?></th>
            <td><?= h($schedule->date_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($schedule->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($schedule->modified) ?></td>
        </tr>
    </table>
</div>
