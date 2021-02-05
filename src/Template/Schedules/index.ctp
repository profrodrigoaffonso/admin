<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Schedule[]|\Cake\Collection\CollectionInterface $schedules
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commands'), ['controller' => 'Commands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Command'), ['controller' => 'Commands', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="schedules index large-9 medium-8 columns content">
    <h3><?= __('Schedules') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('command_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('command_send') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('specific_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('days_week') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schedules as $schedule): ?>
            <tr>
                <td><?= $this->Number->format($schedule->id) ?></td>
                <td><?= $schedule->has('command') ? $this->Html->link($schedule->command->id, ['controller' => 'Commands', 'action' => 'view', $schedule->command->id]) : '' ?></td>
                <td><?= h($schedule->command_send) ?></td>
                <td><?= h($schedule->type) ?></td>
                <td><?= h($schedule->date_time) ?></td>
                <td><?= h($schedule->specific_date) ?></td>
                <td><?= h($schedule->days_week) ?></td>
                <td><?= h($schedule->created) ?></td>
                <td><?= h($schedule->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $schedule->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $schedule->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
