<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Commands Controller
 *
 * @property \App\Model\Table\CommandsTable $Commands
 *
 * @method \App\Model\Entity\Command[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommandsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $commands = $this->paginate($this->Commands);

        $this->set(compact('commands'));
    }

    /**
     * View method
     *
     * @param string|null $id Command id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $command = $this->Commands->get($id, [
            'contain' => ['Schedules'],
        ]);

        $this->set('command', $command);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $command = $this->Commands->newEntity();
        if ($this->request->is('post')) {
            $command = $this->Commands->patchEntity($command, $this->request->getData());
            if ($this->Commands->save($command)) {
                $this->Flash->success(__('The command has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The command could not be saved. Please, try again.'));
        }
        $this->set(compact('command'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Command id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $command = $this->Commands->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $command = $this->Commands->patchEntity($command, $this->request->getData());
            if ($this->Commands->save($command)) {
                $this->Flash->success(__('The command has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The command could not be saved. Please, try again.'));
        }
        $this->set(compact('command'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Command id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $command = $this->Commands->get($id);
        if ($this->Commands->delete($command)) {
            $this->Flash->success(__('The command has been deleted.'));
        } else {
            $this->Flash->error(__('The command could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function send($id){

        $command_send = '';

        $command = $this->Commands->find()
            ->where([
                'id' => $id,
                'executed' => 'n'
            ])
            ->first();
        if($command){
            $command_send = $command->command;
            $command->executed = 'y';

            $this->Commands->save($command);

        }
        

        echo ($command_send);

        die;

    }

    public function alter(){


        if ($this->request->is('post')) {

            $data = $this->request->getData();

            // debug($data);die;

            $command = $this->Commands->get(1);
            $command->command = $data['command'];
            $command->executed = 'n';
            $this->Commands->save($command);
            
            // $this->Commands->updateAll([
            //     'command' => $data['command']
            // ],[
            //     'id' => 1
            // ]);
        
        };

        $command = $this->Commands->newEntity();


        $this->set(compact('command'));


    }
}
