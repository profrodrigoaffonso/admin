<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Command $command
 */
?>
    <h1 class="text-center">Tratar Fotos</h1>


    <?= $this->Form->create(null, ['type' => 'file']) ?>
    <div class="form-group">
    <?php
            echo $this->Form->control('image', ['class' => 'form-control', 'label' => false, 'name' => 'imagens[]', 'type' => 'file', 'multiple' => 'multiple']);
        ?>
    </div>
    <?= $this->Form->button(__('Submit'), ['class' => "btn btn-primary"]) ?>
    <?= $this->Form->end() ?>
    
    <?php

    // echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
    //     while($arquivo = $diretorio -> read()){
    //         if($arquivo != '.' && $arquivo != '..' && $arquivo != 'marcaretrato.png' && $arquivo != 'marcaretrato.gif')
    //             echo "<a href='/fotos/file_download/".$arquivo."'><img width='100' src='/uploads/{$arquivo}'></a><br />";
    //     }
    //     $diretorio -> close();
        ?>
<div class="row">
<?php
    while($arquivo = $diretorio -> read()){
        if($arquivo != '.' && $arquivo != '..' && $arquivo != 'marcaretrato.png' && $arquivo != 'marcaretrato.gif')
            echo "<a href='/fotos/file_download/".$arquivo."'><img width='200' class='img-thumbnail' src='/uploads/{$arquivo}'></a><br />";
    }
    $diretorio -> close();

?>
</div>


