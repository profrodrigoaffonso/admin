<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Saint $saint
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $saint->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $saint->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Saints'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="saints form large-9 medium-8 columns content">
    <?= $this->Form->create($saint) ?>
    <fieldset>
        <legend><?= __('Edit Saint') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('biography');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
