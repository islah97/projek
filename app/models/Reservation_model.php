<?php

require_once '../vendor/autoload.php';
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class Reservation_model extends Model
{
    private $db;
    protected $table      = 'reservation';
    protected $primaryKey = 'reservation_id';
    protected $cols = ['equipment_name', 'reservation_id'];

    public function __construct()
    {
        // $this->session();
        $this->db = new Database;
        $this->timestamp = date('Y-m-d H:i:s');
        $this->connection = $this->db->getConnection();
        $this->serversideDt = new Datatables( new MySQL($this->connection) );
        $this->getInstanceDB = $this->db->getInstance();
    }

    public function getListData($params = NULL)
    {
        $data = $this->db->get($this->table);
        return $data;
    }

    // use server side datatable
    // public function getListData()
    // {
    //     $data = $this->db->get("" . $this->table . "", NULL, $this->cols);

    //     $this->serversideDt->query($this->getInstanceDB->getLastQuery());

    //     $this->serversideDt->edit('reservation_id', function($data){
    //         $del = '<button onclick="deleteConfirm('.$data[$this->primaryKey].', 2)" data-toggle="confirm" data-id="'.$data[$this->primaryKey].'" class="btn btn-sm btn-danger" title="Remove"> <i class="fa fa-trash"></i> Hapus </button>';

    //         $edit = '<button class="btn btn-sm btn-info" onclick="updateRecord('.$data[$this->primaryKey].', 2)" title="Edit"><i class="fa fa-edit"></i> Kemaskini </button>';

    //         return '<center>'.$del.' | '.$edit.'</center>';
    //     });

    //     echo $this->serversideDt->generate();
    // }

    public function getReserveByID($params = NULL)
    {
        $data = $this->db->where($this->primaryKey, $params)->fetchRow($this->table);
        return $data;
    }

    public function countAllReserve()
    {
        $count = $this->db->getValue($this->table, "count(*)");
        return $count;
    }

    public function insert($data)
    {
        $data = [
            'reservation_date_pickup' => $this->db->escape($data['reservation_date_pickup']),
            'reservation_time_pickup' => $this->db->escape($data['reservation_time_pickup']),
            'reservation_date_return' => $this->db->escape($data['reservation_date_return']),
            'reservation_time_return' => $this->db->escape($data['reservation_time_return']),
            'reservation_description' => $this->db->escape($data['reservation_description']),
            'reservation_status' => $this->db->escape($data['reservation_status']),
            'user_id' => $this->db->escape($data['user_id']),
            'created_at' => $this->timestamp
        ];

        $result = ($this->db->insert($this->table, $data)) ? 200 : 400;
        return $result;
    }

    public function update($data)
    {
        $equip_id = $this->db->escape($data['reservation_id']);
        $data = [
           'reservation_date_pickup' => $this->db->escape($data['reservation_date_pickup']),
            'reservation_time_pickup' => $this->db->escape($data['reservation_time_pickup']),
            'reservation_date_return' => $this->db->escape($data['reservation_date_return']),
            'reservation_time_return' => $this->db->escape($data['reservation_time_return']),
            'reservation_description' => $this->db->escape($data['reservation_description']),
            'reservation_status' => $this->db->escape($data['reservation_status']),
            'user_id' => $this->db->escape($data['user_id']),
            'updated_at' => $this->timestamp
        ];

        $result = ($this->db->where($this->primaryKey, $reserve_id)->update($this->table, $data)) ? 200 : 400;
        return $result;
    }

    public function delete($id)
    {
        $result = ($this->db->where($this->primaryKey, $id)->delete($this->table)) ? 200 : 400;
        return $result;
    }
}
