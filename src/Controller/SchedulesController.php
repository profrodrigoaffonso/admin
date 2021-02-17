<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Schedules Controller
 *
 * @property \App\Model\Table\SchedulesTable $Schedules
 *
 * @method \App\Model\Entity\Schedule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SchedulesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Commands'],
        ];
        $schedules = $this->paginate($this->Schedules);

        $this->set(compact('schedules'));
    }

    /**
     * View method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => ['Commands'],
        ]);

        $this->set('schedule', $schedule);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $schedule = $this->Schedules->newEntity();
        if ($this->request->is('post')) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $commands = $this->Schedules->Commands->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'commands'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $schedule = $this->Schedules->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $schedule = $this->Schedules->patchEntity($schedule, $this->request->getData());
            if ($this->Schedules->save($schedule)) {
                $this->Flash->success(__('The schedule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The schedule could not be saved. Please, try again.'));
        }
        $commands = $this->Schedules->Commands->find('list', ['limit' => 200]);
        $this->set(compact('schedule', 'commands'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Schedule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $schedule = $this->Schedules->get($id);
        if ($this->Schedules->delete($schedule)) {
            $this->Flash->success(__('The schedule has been deleted.'));
        } else {
            $this->Flash->error(__('The schedule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function upCommand(){

        set_time_limit(0);

        for($i = 1; $i <= 15; $i++){            

            $this->loadmodel('Commands');

            $data_inicio = date('Y-m-d H:i:00');
            $data_fim = date('Y-m-d H:i:59');

            $hora_inicio = date('H:i:00');
            $hora_fim = date('H:i:59');

            $dia_semana = date('w');

            //die($dia_semana);

            // echo "$data_inicio $data_fim ";

            $schedules = $this->Schedules->find()
                ->where([
                    'date_time >= ' => $data_inicio,
                    'date_time <= ' => $data_fim,
                    
                ]);

            foreach($schedules as $schedule){
                $this->Commands->updateAll([
                    'command' => $schedule->command_send,
                    'executed' => 'n'
                ],
                [
                    'id' => $schedule->command_id
                ]);
                        // debug($schedule);die;

            }

            // $schedules = $this->Schedules->find()
            //     ->where([
            //         'date_time >= ' => $data_inicio,
            //         'date_time <= ' => $data_fim,
                    
            //     ]);

            // die;

            sleep(60);
            

            //debug($schedule);die;

        }

        die;

        

    }

    public function timer()
    {

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            //print_r($data);
            
            $date_time = date('Y-m-d H:i:00', strtotime("+{$data['tempo']} minutes", strtotime(date('Y-m-d H:i'))));
            
            $this->Schedules->updateAll([
                'date_time' => $date_time,
                'command_send' => $data['command']
            ],
            [
                'command_id' => 1,
                'type' => 't'
            ]);
            
        }

    }
}
