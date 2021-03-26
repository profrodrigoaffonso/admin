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

                if (move_uploaded_file($imagem['tmp_name'], WWW_ROOT . 'uploads' . DS . $imagem['name'])) {
                    //echo "Arquivo válido e enviado com sucesso.\n";



                    // O arquivo. Dependendo da configuração do PHP pode ser uma URL.
                    $filename = WWW_ROOT . 'uploads' . DS . $imagem['name'];
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

                    unlink(WWW_ROOT . 'uploads' . DS . $imagem['name']);

                    $nome_p = str_replace('.jpg', '_tr.jpg', $imagem['name']);

                    // Ou, se preferir, Salvando a imagem em arquivo:
                    imagejpeg($image_p, WWW_ROOT . 'uploads' . DS . $nome_p, 100);
                    
                    //imagejpeg($src, 'uploads/final' . $nome_p, 100);

                    /* marca d'agua ********************************************************/

                    // Carregar imagem já existente no servidor
                    $imagem = imagecreatefromjpeg( WWW_ROOT . 'uploads' . DS . $nome_p );
                    /* @Parametros
                    * "foto.jpg" - Caminho relativo ou absoluto da imagem a ser carregada.
                    */
                    
                    // importa um GIF
                    $imagemLogo = imagecreatefromgif( WWW_ROOT . 'uploads' . DS . 'marcaretrato.gif' );
                    /*
                    * Você poderá usar aqui qualquer funcção que retorne de imagem:
                    * imagecreatefromjpeg, imagecreate, imagecreatetruecolor
                    * imagecreatefromPNG não funciona direito com transparencia
                    */
                    
                    // Obtem a largura_nova da imagem
                    $larguraLogo = imagesx( $imagemLogo );
                    
                    // Obtém a altura da imagem
                    $alturaLogo = imagesy( $imagemLogo );
                    
                    // Calcula X 5px da latreral direira
                    $x_logo = imagesx( $imagem ) - $larguraLogo - 5;
                    
                    // Calcula X 5px do rodapé
                    $y_logo = imagesy( $imagem ) - $alturaLogo - 5;
                    
                    // Copia a logo para a imagem
                    imagecopymerge( $imagem, $imagemLogo, $x_logo, $y_logo, 0, 0, $larguraLogo, $alturaLogo, 100 );
                    /* @Parametros
                    * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
                    * $imagemLogo - Imagem previamente criada Usei imagecreatefromgif
                    * $x_logo - Posição X que a logo será posicionada
                    * $y_logo - Posição y que a logo será posicionada
                    * 0 - Posição X da imagem de fundo. Não alterei.
                    * 0 - Posição Y da imagem de fundo. Não alterei.
                    * $larguraLogo - Largura da logo
                    * $alturaLogo - Altura da logo
                    * 100 - transparencia da logo
                    */
                    
                    // Header informando que é uma imagem JPEG
                    // header( 'Content-type: image/jpeg' );
                    
                    // eEnvia a imagem para o borwser ou arquivo
                    imagejpeg( $imagem, WWW_ROOT . 'uploads' . DS . $nome_p, 80 );
                    /* @Parametros
                    * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
                    * NULL - O caminho para salvar o arquivo.
                            Se não definido ou NULL, o stream da imagem será mostrado diretamente.
                    * 80 - Qualidade da compresão da imagem.
                    */

                    //die;




                } else {
                    //echo "Possível ataque de upload de arquivo!\n";
                }

            }

            return $this->redirect(['action' => 'tratar']);


           // debug($data);
        }

        $path = "uploads/";
        $diretorio = dir($path);

        $this->set(compact('diretorio', 'path'));

        return $this->render('tratar', 'fotos');

        

    }

    public function fileDownload($name)
    {
        $file_path = WWW_ROOT.'uploads'.DS.$name;
        $response = $this->response->withFile($file_path, array(
            'download' => true,
            'name' => $name,
        ));
        return $response;
    }
}