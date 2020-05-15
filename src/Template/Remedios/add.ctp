<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Remedio $remedio
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Remedios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="remedios form large-9 medium-8 columns content">
    <?= $this->Form->create($remedio) ?>
    <fieldset>
        <legend><?= __('Add Remedio') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
