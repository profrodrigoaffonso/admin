<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saint[]|\Cake\Collection\CollectionInterface $saints
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Saint'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="saints index large-9 medium-8 columns content">
    <h3><?= __('Saints') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($saints as $saint): ?>
            <tr>
                <td><?= $this->Number->format($saint->id) ?></td>
                <td><?= h($saint->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $saint->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $saint->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $saint->id], ['confirm' => __('Are you sure you want to delete # {0}?', $saint->id)]) ?>
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
