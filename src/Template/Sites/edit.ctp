<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Site $site
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $site->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $site->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sites'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Acessos'), ['controller' => 'Acessos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Acesso'), ['controller' => 'Acessos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sites form large-9 medium-8 columns content">
    <?= $this->Form->create($site) ?>
    <fieldset>
        <legend><?= __('Edit Site') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('url');
            ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
