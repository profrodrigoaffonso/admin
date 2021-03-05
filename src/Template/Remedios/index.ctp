<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Remedio[]|\Cake\Collection\CollectionInterface $remedios
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Remedio'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="remedios index large-9 medium-8 columns content">
    <h3><?= __('Remedios') ?></h3>
    <h4>Hoje: <?= date('d/m/Y') ?> </h4>
    <?= $this->Form->create() ?>
    <?= $this->Form->button(__('Salvar')) ?>
    <?= $this->Form->end() ?>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($remedios as $remedio): ?>
            <tr>
                <td><?= h(date('d/m/Y H:i', strtotime($remedio->created))) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $remedio->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $remedio->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $remedio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $remedio->id)]) ?>
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
