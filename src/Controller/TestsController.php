<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP TestsController
 * @author celso
 */
class TestsController extends AppController {

    public function map() {

        $doctorsTable = TableRegistry::getTableLocator()->get('Doctors');

        $mapper = function ($article, $key, $mapReduce) {
            $status = 'published';
            if ($article->nome) {
                $status = 'unpublished';
            }
            $mapReduce->emitIntermediate($article, $status);
        };

        $reducer = function ($articles, $status, $mapReduce) {
            $mapReduce->emit($articles, $status);
        };

        $articlesByStatus = $doctorsTable->find()
                ->mapReduce($mapper, $reducer);

        foreach ($articlesByStatus as $status => $articles) {
            echo sprintf("There are %d %s articles", count($articles), $status);
        }
    }

    public function index2() {

        $table = TableRegistry::getTableLocator()->get('Doctors');

        $table->Patients->junction();

        $data = $table->find()
                ->contain('Patients')
                ->contain('Appointments.Examinations'); //Error !
        
        $data->execute();

        $this->set(compact('data'));
    }

    public function index() {

        $table = TableRegistry::getTableLocator()->get('Doctors');

        $table->Patients->junction();

        $data = $table->find()
                ->contain('Appointments')
                ->contain('Appointments.Patients')
                ->contain('Appointments.Examinations'); //Error !

        $this->set(compact('data'));
    }

    public function docs() {

        $doctorsTable = TableRegistry::getTableLocator()->get('Doctors');

        $query = $doctorsTable
                ->find()
                ->contain('Patients');

        debug($query->toArray());
    }

    public function junction() {

        $table = TableRegistry::getTableLocator()->get('Patients');

        $table->junction();

        $table->find()->contain('Appointments');
    }

}
