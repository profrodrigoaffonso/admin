<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Acesso[]|\Cake\Collection\CollectionInterface $acessos
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Acesso'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="acessos index large-9 medium-8 columns content">
    <h3><?= __('Acessos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('site_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pagina') ?></th>
                <th scope="col"><?= $this->Paginator->sort('data_hora') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($acessos as $acesso): ?>
            <tr>
                <td><?= $this->Number->format($acesso->id) ?></td>
                <td><?= $acesso->has('site') ? $this->Html->link($acesso->site->name, ['controller' => 'Sites', 'action' => 'view', $acesso->site->id]) : '' ?></td>
                <td><?= h($acesso->ip) ?></td>
                <td><a target="_blank" href="<?= $acesso->site->url . $acesso->pagina ?>"><?= $acesso->site->url . $acesso->pagina ?></a></td>
                <td><?= date('d/m/Y H:i', strtotime($acesso->data_hora)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $acesso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $acesso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $acesso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acesso->id)]) ?>
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
