<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Restapi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DBApi_model', 'dbApi');
    }

    public function index_get()
    {
        $id = $this->get('id');
        $kwh_cost = $this->get('kwh_cost');
        if ($id == null && $kwh_cost == null) {
            $infoPLN = $this->dbApi->getKwhPLN();
        } elseif ($kwh_cost == "kwh_cost") {
            $infoPLN = $this->dbApi->getKwhCost();
        } else {
            $infoPLN = $this->dbApi->getKwhPLN($id, $kwh_cost);
        }

        if ($infoPLN) {
            $this->response([
                'status' => TRUE,
                'data' => $infoPLN
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->mhs->deleteKwhPLN($id) > 0) {
                $this->response([
                    'status' => TRUE,
                    'id' => $id,
                    'message' => 'Deleted the resource'
                ], REST_Controller::HTTP_CONTINUE);
            } else {
                $this->response([
                    'status' => FALSE,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'amper' => $this->post('amper'),
            'power' => $this->post('power'),
            'kwh' => $this->post('kwh'),
            'kwh_cost' => $this->post('kwh_cost'),
            'tarif' => $this->post('tarif'),
            'time_on' => $this->post('time_on')
        ];

        if ($this->mhs->createKwhPLN($data) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'new infoPLN has band created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'filed to created data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'amper' => $this->put('amper'),
            'power' => $this->put('power'),
            'kwh' => $this->put('kwh'),
            'kwh_cost' => $this->put('kwh_cost'),
            'tarif' => $this->put('tarif'),
            'time_on' => $this->put('time_on')
        ];

        if ($this->mhs->updateKwhPLN($data, $id) > 0) {
            $this->response([
                'status' => TRUE,
                'message' => 'update data'
            ], REST_Controller::HTTP_UPGRADE_REQUIRED);
        } else {
            $this->response([
                'status' => FALSE,
                'message' => 'filed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
