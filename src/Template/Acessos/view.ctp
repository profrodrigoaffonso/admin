<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Acesso $acesso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Acesso'), ['action' => 'edit', $acesso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Acesso'), ['action' => 'delete', $acesso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acesso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Acessos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acesso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="acessos view large-9 medium-8 columns content">
    <h3><?= h($acesso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Site') ?></th>
            <td><?= $acesso->has('site') ? $this->Html->link($acesso->site->name, ['controller' => 'Sites', 'action' => 'view', $acesso->site->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($acesso->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($acesso->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Hora') ?></th>
            <td><?= h($acesso->data_hora) ?></td>
        </tr>
    </table>
</div>
