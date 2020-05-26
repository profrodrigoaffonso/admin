<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Comandos Controller
 *
 * @property \App\Model\Table\ComandosTable $Comandos
 *
 * @method \App\Model\Entity\Comando[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ComandosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $comandos = $this->paginate($this->Comandos);

        $this->set(compact('comandos'));
    }

    /**
     * View method
     *
     * @param string|null $id Comando id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $comando = $this->Comandos->get($id, [
            'contain' => [],
        ]);

        $this->set('comando', $comando);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $comando = $this->Comandos->newEntity();
        if ($this->request->is('post')) {
            $comando = $this->Comandos->patchEntity($comando, $this->request->getData());
            if ($this->Comandos->save($comando)) {
                $this->Flash->success(__('The comando has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comando could not be saved. Please, try again.'));
        }
        $this->set(compact('comando'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Comando id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $comando = $this->Comandos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $comando = $this->Comandos->patchEntity($comando, $this->request->getData());
            if ($this->Comandos->save($comando)) {
                $this->Flash->success(__('The comando has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The comando could not be saved. Please, try again.'));
        }
        $this->set(compact('comando'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Comando id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $comando = $this->Comandos->get($id);
        if ($this->Comandos->delete($comando)) {
            $this->Flash->success(__('The comando has been deleted.'));
        } else {
            $this->Flash->error(__('The comando could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function atualizar()
    {

        $this->loadModel('Horarios');

        $horario = $this->Horarios->find()
            ->where([
                'execucao' => date('Y-m-d H:i:00') 
            ])
            ->first();
        
        if($horario){

            $this->Comandos->updateAll(
                ['comando' => $horario->comando],
                ['id' => 1] 
            );

            //debug($horario->execucao);
        }
        
        die;

    }
}
