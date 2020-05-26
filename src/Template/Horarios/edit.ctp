<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Horario $horario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $horario->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $horario->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Horarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="horarios form large-9 medium-8 columns content">
    <?= $this->Form->create($horario) ?>
    <fieldset>
        <legend><?= __('Edit Horario') ?></legend>
        <?php
            echo $this->Form->control('comando');
            //echo $this->Form->control('execucao', ['type' => 'date', 'value' => '2020-10-10']);
        ?>
        <div class="input text">
            <label for="comando">Execução Data</label>
            <input type="date" name="execucao_data" maxlength="50" id="execucao_data" value="<?=date('Y-m-d', strtotime($horario->execucao))?>">
        </div>
        <div class="input text">
            <label for="comando">Execução Hora</label>
            <input type="time" name="execucao_hora" maxlength="50" id="execucao_hora" value="<?=date('H:i', strtotime($horario->execucao))?>">
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
