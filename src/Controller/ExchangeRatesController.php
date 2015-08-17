<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;

/**
 * ExchangeRates Controller
 *
 * @property \App\Model\Table\ExchangeRatesTable $ExchangeRates
 */
class ExchangeRatesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Currencies']
        ];
        $this->set('exchangeRates', $this->paginate($this->ExchangeRates));
        $this->set('_serialize', ['exchangeRates']);
    }

    /**
     * View method
     *
     * @param string|null $id Exchange Rate id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null) {
        $exchangeRate = $this->ExchangeRates->get($id, [
            'contain' => ['Currencies']
        ]);
        $this->set('exchangeRate', $exchangeRate);
        $this->set('_serialize', ['exchangeRate']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function apiadd() {
        $http = new Client();
        // Get jsonrates data
        $response = $http->get('http://apilayer.net/api/live?access_key=0dacde5ce63add3843057033027dff9c&currencies=USD,GBP,EUR,KES,&format=1&source=ZAR');
        $dataArray = json_decode($response->body());
        if (!empty($dataArray)) {
        $ExchangeRates = $this->ExchangeRates->find()
                ->where(['date_time' => '2015-08-17 12:46:08'])->toArray();
            if (empty($ExchangeRates)) {
                $results = $this->prepareExchangeRateData($dataArray);
                $entities = $this->ExchangeRates->newEntities($results);
                foreach ($entities as $entity) {
                    if ($this->ExchangeRates->save($entity)) {
                        $this->Flash->success(__('The exchange rate has been saved.'));
                    } else {
                        $this->Flash->error(__('The exchange rate could not be saved. Please, try again.'));
                    }
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Exchange rate already up to date.'));
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    private function prepareExchangeRateData($response = array()) {
        $results = array();
        $date = gmdate("Y-m-d H:i:s", $response->timestamp);
        $currencies = $this->ExchangeRates->Currencies->find('list')->toArray();
        foreach ($currencies as $key => $value) {
            $name = 'ZAR' . $value;
            $exchangeRate['currency_id'] = $key;
            $exchangeRate['date_time'] = array('year' => date('Y', strtotime($date)), 'month' => date('m', strtotime($date)), 'day' => date('d', strtotime($date)), 'hour' => date('H', strtotime($date)), 'minute' => date('m', strtotime($date)), 'second' => date('s', strtotime($date)));
            $exchangeRate['rate'] = $response->quotes->$name;
            $results[] = $exchangeRate;
        }
        return $results;
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $exchangeRate = $this->ExchangeRates->newEntity();
        if ($this->request->is('post')) {
            $exchangeRate = $this->ExchangeRates->patchEntity($exchangeRate, $this->request->data);
            if ($this->ExchangeRates->save($exchangeRate)) {
                $this->Flash->success(__('The exchange rate has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exchange rate could not be saved. Please, try again.'));
            }
        }
        $currencies = $this->ExchangeRates->Currencies->find('list', ['limit' => 200]);
        $this->set(compact('exchangeRate', 'currencies'));
        $this->set('_serialize', ['exchangeRate']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exchange Rate id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $exchangeRate = $this->ExchangeRates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exchangeRate = $this->ExchangeRates->patchEntity($exchangeRate, $this->request->data);
            if ($this->ExchangeRates->save($exchangeRate)) {
                $this->Flash->success(__('The exchange rate has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The exchange rate could not be saved. Please, try again.'));
            }
        }
        $currencies = $this->ExchangeRates->Currencies->find('list', ['limit' => 200]);
        $this->set(compact('exchangeRate', 'currencies'));
        $this->set('_serialize', ['exchangeRate']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Exchange Rate id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $exchangeRate = $this->ExchangeRates->get($id);
        if ($this->ExchangeRates->delete($exchangeRate)) {
            $this->Flash->success(__('The exchange rate has been deleted.'));
        } else {
            $this->Flash->error(__('The exchange rate could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}
