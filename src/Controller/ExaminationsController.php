<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Examinations Controller
 *
 * @property \App\Model\Table\ExaminationsTable $Examinations
 *
 * @method \App\Model\Entity\Examination[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExaminationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Appointments']
        ];
        $examinations = $this->paginate($this->Examinations);

        $this->set(compact('examinations'));
    }

    /**
     * View method
     *
     * @param string|null $id Examination id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $examination = $this->Examinations->get($id, [
            'contain' => ['Appointments']
        ]);

        $this->set('examination', $examination);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $examination = $this->Examinations->newEntity();
        if ($this->request->is('post')) {
            $examination = $this->Examinations->patchEntity($examination, $this->request->getData());
            if ($this->Examinations->save($examination)) {
                $this->Flash->success(__('The examination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examination could not be saved. Please, try again.'));
        }
        $appointments = $this->Examinations->Appointments->find('list', ['limit' => 200]);
        $this->set(compact('examination', 'appointments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Examination id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $examination = $this->Examinations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $examination = $this->Examinations->patchEntity($examination, $this->request->getData());
            if ($this->Examinations->save($examination)) {
                $this->Flash->success(__('The examination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The examination could not be saved. Please, try again.'));
        }
        $appointments = $this->Examinations->Appointments->find('list', ['limit' => 200]);
        $this->set(compact('examination', 'appointments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Examination id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $examination = $this->Examinations->get($id);
        if ($this->Examinations->delete($examination)) {
            $this->Flash->success(__('The examination has been deleted.'));
        } else {
            $this->Flash->error(__('The examination could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
