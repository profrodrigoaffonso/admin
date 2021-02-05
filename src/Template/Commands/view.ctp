<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Command $command
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Command'), ['action' => 'edit', $command->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Command'), ['action' => 'delete', $command->id], ['confirm' => __('Are you sure you want to delete # {0}?', $command->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Commands'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Command'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commands view large-9 medium-8 columns content">
    <h3><?= h($command->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Command') ?></th>
            <td><?= h($command->command) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Executed') ?></th>
            <td><?= h($command->executed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($command->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Schedules') ?></h4>
        <?php if (!empty($command->schedules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Command Id') ?></th>
                <th scope="col"><?= __('Command Send') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Date Time') ?></th>
                <th scope="col"><?= __('Specific Date') ?></th>
                <th scope="col"><?= __('Days Week') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($command->schedules as $schedules): ?>
            <tr>
                <td><?= h($schedules->id) ?></td>
                <td><?= h($schedules->command_id) ?></td>
                <td><?= h($schedules->command_send) ?></td>
                <td><?= h($schedules->type) ?></td>
                <td><?= h($schedules->date_time) ?></td>
                <td><?= h($schedules->specific_date) ?></td>
                <td><?= h($schedules->days_week) ?></td>
                <td><?= h($schedules->created) ?></td>
                <td><?= h($schedules->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Schedules', 'action' => 'view', $schedules->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Schedules', 'action' => 'edit', $schedules->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Schedules', 'action' => 'delete', $schedules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedules->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
