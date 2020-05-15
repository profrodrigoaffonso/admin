<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Remedio $remedio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Remedio'), ['action' => 'edit', $remedio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Remedio'), ['action' => 'delete', $remedio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $remedio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Remedios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Remedio'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="remedios view large-9 medium-8 columns content">
    <h3><?= h($remedio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($remedio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($remedio->created) ?></td>
        </tr>
    </table>
</div>
