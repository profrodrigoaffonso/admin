<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Horarios Controller
 *
 * @property \App\Model\Table\HorariosTable $Horarios
 *
 * @method \App\Model\Entity\Horario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HorariosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $horarios = $this->paginate($this->Horarios);

        $this->set(compact('horarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $horario = $this->Horarios->get($id, [
            'contain' => [],
        ]);

        $this->set('horario', $horario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $horario = $this->Horarios->newEntity();
        if ($this->request->is('post')) {
            $horario = $this->Horarios->patchEntity($horario, $this->request->getData());
            if ($this->Horarios->save($horario)) {
                $this->Flash->success(__('The horario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The horario could not be saved. Please, try again.'));
        }
        $this->set(compact('horario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $horario = $this->Horarios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dados = $this->request->getData();
            $dados['execucao'] = "{$dados['execucao_data']} {$dados['execucao_hora']}";
            // debug($dados['comando']);die;
            $horario = $this->Horarios->patchEntity($horario, $dados);
            if ($this->Horarios->save($horario)) {
                $this->Flash->success(__('The horario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The horario could not be saved. Please, try again.'));
        }
        $this->set(compact('horario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Horario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $horario = $this->Horarios->get($id);
        if ($this->Horarios->delete($horario)) {
            $this->Flash->success(__('The horario has been deleted.'));
        } else {
            $this->Flash->error(__('The horario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
