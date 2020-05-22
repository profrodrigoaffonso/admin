<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comando $comando
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $comando->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $comando->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Comandos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="comandos form large-9 medium-8 columns content">
    <?= $this->Form->create($comando) ?>
    <fieldset>
        <legend><?= __('Edit Comando') ?></legend>
        <?php
            echo $this->Form->control('comando');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
