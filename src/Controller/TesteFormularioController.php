<?php
namespace App\Controller;

use App\Controller\AppController;

class TesteFormularioController extends AppController
{

    public function index()
    {

        if($_POST){
            echo '<table cellspacing="0" cellpadding="0" border="1" width="40%">
                    <thead>
                        <tr>
                            <th>Campo</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>';
            foreach($_POST as $key => $value){

                echo "<tr>
                        <td>{$key}</td>
                        <td>{$value}</td>
                    </tr>";               
                
            }
            echo '</tbody>
            </table>';

        }

        die;

    }
}