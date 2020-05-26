<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario[]|\Cake\Collection\CollectionInterface $horarios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Horario'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="horarios index large-9 medium-8 columns content">
    <h3><?= __('Horarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comando') ?></th>
                <th scope="col"><?= $this->Paginator->sort('execucao') ?></th>
                <!-- <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th> -->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($horarios as $horario): ?>
            <tr>
                <td><?= $this->Number->format($horario->id) ?></td>
                <td><?= h($horario->comando) ?></td>
                <td><?= h(date('d/m/Y H:i', strtotime($horario->execucao))) ?></td>
                <!-- <td><?= h($horario->created) ?></td>
                <td><?= h($horario->modified) ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $horario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $horario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $horario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id)]) ?>
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
