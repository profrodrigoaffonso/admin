<?php
namespace App\Controller;

use App\Controller\AppController;

class ComandoController extends AppController
{

    public function index()
    {

        $this->loadModel('Comandos');

        $comando = $this->Comandos->get(1);        

        echo $comando->comando;

        die;

    }

    
}