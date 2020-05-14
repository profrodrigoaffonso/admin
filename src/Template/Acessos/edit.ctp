<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Acesso $acesso
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $acesso->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $acesso->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Acessos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['controller' => 'Sites', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Site'), ['controller' => 'Sites', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="acessos form large-9 medium-8 columns content">
    <?= $this->Form->create($acesso) ?>
    <fieldset>
        <legend><?= __('Edit Acesso') ?></legend>
        <?php
            echo $this->Form->control('site_id', ['options' => $sites, 'empty' => true]);
            echo $this->Form->control('ip');
            echo $this->Form->control('data_hora', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
