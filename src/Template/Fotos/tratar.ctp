<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Command $command
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Commands'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['controller' => 'Schedules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Schedule'), ['controller' => 'Schedules', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commands form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['type' => 'file']) ?>
    <fieldset>
        <legend><?= __('Add Command') ?></legend>
        <?php
            echo $this->Form->control('image', ['name' => 'imagens[]', 'type' => 'file', 'multiple' => 'multiple']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    <?php

    echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
        while($arquivo = $diretorio -> read()){
            if($arquivo != '.' && $arquivo != '..' && $arquivo != 'marcaretrato.png')
                echo "<a href='/fotos/file_download/".$arquivo."'><img width='100' src='/uploads/{$arquivo}'></a><br />";
        }
        $diretorio -> close();
        ?>
</div>

