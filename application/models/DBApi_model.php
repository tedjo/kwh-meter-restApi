<?php

class DBApi_model extends CI_Model
{
    public function getKwhPLN($id = null)
    {
        if ($id === null) {
            return $this->db->get('info_kwh')->result_array();
        } else {
            return $this->db->get_where('info_kwh', ['id' => $id])->result_array();
        }
    }

    public function deleteKwhPLN($id)
    {
        $this->db->delete('info_kwh', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createKwhPLN($data)
    {
        $this->db->insert('info_kwh', $data);
        return $this->db->affected_rows();
    }

    public function updateKwhPLN($data, $id)
    {
        $this->db->update('info_kwh', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function getKwhCost()
    {
        $this->db->select('kwh_cost');
        $this->db->from('info_kwh');
        $this->db->where('id = 1');
        return $this->db->get()->row_array();
    }

    public function getKwhMeter()
    {
        $this->db->select('amper, power, kwh, tarif, time_on');
        $this->db->from('info_kwh');
        $this->db->where('id = 1');
        return $this->db->get()->row_array();
    }

    public function getRekapDate()
    {
        $this->db->order_by('date ASC');
        return $this->db->get('rekap')->result_array();
    }

    public function updateStatus()
    {
        $this->db->update('info_kwh', ['status' => 1], ['id' => 1]);
        return $this->db->affected_rows();
    }
}
