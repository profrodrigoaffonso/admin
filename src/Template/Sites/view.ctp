<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Site'), ['action' => 'edit', $site->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Site'), ['action' => 'delete', $site->id], ['confirm' => __('Are you sure you want to delete # {0}?', $site->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sites'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Site'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Acessos'), ['controller' => 'Acessos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Acesso'), ['controller' => 'Acessos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="sites view large-9 medium-8 columns content">
    <h3><?= h($site->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($site->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($site->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Acessos') ?></h4>
        <?php if (!empty($site->acessos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Site Id') ?></th>
                <th scope="col"><?= __('Ip') ?></th>
                <th scope="col"><?= __('Data Hora') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($site->acessos as $acessos): ?>
            <tr>
                <td><?= h($acessos->id) ?></td>
                <td><?= h($acessos->site_id) ?></td>
                <td><?= h($acessos->ip) ?></td>
                <td><?= h($acessos->data_hora) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Acessos', 'action' => 'view', $acessos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Acessos', 'action' => 'edit', $acessos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Acessos', 'action' => 'delete', $acessos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acessos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
