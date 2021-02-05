<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Saints Controller
 *
 * @property \App\Model\Table\SaintsTable $Saints
 *
 * @method \App\Model\Entity\Saint[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SaintsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $saints = $this->paginate($this->Saints);

        $this->set(compact('saints'));
    }

    /**
     * View method
     *
     * @param string|null $id Saint id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $saint = $this->Saints->get($id, [
            'contain' => [],
        ]);

        $this->set('saint', $saint);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $saint = $this->Saints->newEntity();
        if ($this->request->is('post')) {
            $saint = $this->Saints->patchEntity($saint, $this->request->getData());
            if ($this->Saints->save($saint)) {
                $this->Flash->success(__('The saint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saint could not be saved. Please, try again.'));
        }
        $this->set(compact('saint'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Saint id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $saint = $this->Saints->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $saint = $this->Saints->patchEntity($saint, $this->request->getData());
            if ($this->Saints->save($saint)) {
                $this->Flash->success(__('The saint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The saint could not be saved. Please, try again.'));
        }
        $this->set(compact('saint'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Saint id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $saint = $this->Saints->get($id);
        if ($this->Saints->delete($saint)) {
            $this->Flash->success(__('The saint has been deleted.'));
        } else {
            $this->Flash->error(__('The saint could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
