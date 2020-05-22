<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comando $comando
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comando'), ['action' => 'edit', $comando->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comando'), ['action' => 'delete', $comando->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comando->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Comandos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comando'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comandos view large-9 medium-8 columns content">
    <h3><?= h($comando->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Comando') ?></th>
            <td><?= h($comando->comando) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($comando->id) ?></td>
        </tr>
    </table>
</div>
