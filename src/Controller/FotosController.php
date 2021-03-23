<?php
namespace App\Controller;

use App\Controller\AppController;

class FotosController extends AppController
{

    public function tratar()
    {

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            // debug($data);

            

            foreach($data['imagens'] as $imagem){
                // debug($imagem);
            
                // die;

                if (move_uploaded_file($imagem['tmp_name'], 'uploads/' . $imagem['name'])) {
                    //echo "Arquivo válido e enviado com sucesso.\n";



                    // O arquivo. Dependendo da configuração do PHP pode ser uma URL.
                    $filename = 'uploads/' . $imagem['name'];
                    //$filename = 'http://exemplo.com/original.jpg';

                    // Largura e altura máximos (máximo, pois como é proporcional, o resultado varia)
                    // No caso da pergunta, basta usar $_GET['width'] e $_GET['height'], ou só
                    // $_GET['width'] e adaptar a fórmula de proporção abaixo.
                    $width = 900;
                    $height = 1200;

                    // Obtendo o tamanho original
                    list($width_orig, $height_orig) = getimagesize($filename);

                    if($width_orig > $height_orig){
                        $width = 1200;
                        $height = 900;
                    } else {
                        $width = 900;
                        $height = 1200;
                    }

                    // Calculando a proporção
                    $ratio_orig = $width_orig/$height_orig;

                    if ($width/$height > $ratio_orig) {
                        $width = $height*$ratio_orig;
                    } else {
                        $height = $width/$ratio_orig;
                    }

                    // O resize propriamente dito. Na verdade, estamos gerando uma nova imagem.
                    $image_p = imagecreatetruecolor($width, $height);
                    $image = imagecreatefromjpeg($filename);
                    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

                    // Gerando a imagem de saída para ver no browser, qualidade 75%:
                // header('Content-Type: image/jpeg');
                // imagejpeg($image_p, null, 100);

                unlink('uploads/' . $imagem['name']);

                    $nome_p = str_replace('.jpg', '_tr.jpg', $imagem['name']);

                    // Ou, se preferir, Salvando a imagem em arquivo:
                    imagejpeg($image_p, 'uploads/' . $nome_p, 100);
                    
                    //imagejpeg($src, 'uploads/final' . $nome_p, 100);




                } else {
                    //echo "Possível ataque de upload de arquivo!\n";
                }

            }

            return $this->redirect(['action' => 'tratar']);


           // debug($data);
        }

    }
}