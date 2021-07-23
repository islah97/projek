<?php

require_once '../vendor/autoload.php';
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class Master_model extends Model
{
    private $db;
    protected $table      = 'master_equipment_type';
    protected $primaryKey = 'type_id';
    // protected $cols = ['equipment_name', 'equipment_id'];

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

    //     $this->serversideDt->edit('equipment_id', function($data){
    //         $del = '<button onclick="deleteConfirm('.$data[$this->primaryKey].', 2)" data-toggle="confirm" data-id="'.$data[$this->primaryKey].'" class="btn btn-sm btn-danger" title="Remove"> <i class="fa fa-trash"></i> Hapus </button>';

    //         $edit = '<button class="btn btn-sm btn-info" onclick="updateRecord('.$data[$this->primaryKey].', 2)" title="Edit"><i class="fa fa-edit"></i> Kemaskini </button>';

    //         return '<center>'.$del.' | '.$edit.'</center>';
    //     });

    //     echo $this->serversideDt->generate();
    // }

    public function getMasterEquipByID($params = NULL)
    {
        $data = $this->db->where($this->primaryKey, $params)->fetchRow($this->table);
        return $data;
    }

    public function getAllMasterEquipment()
    {   
        // $this->db->join("department", "user.department_id=department.department_id", "LEFT");
        // $this->db->where('user.role_id != 1');

        return $data = $this->db->get($this->table);
        
        // $data = $this->db->get("" . $this->table . "", null, "*");

        // return $data;
    }

    public function countAllMasterEquip()
    {
        $count = $this->db->getValue($this->table, "count(*)");
        return $count;
    }

    public function insert($data)
    {
        $data = [
            'type_name' => $this->db->escape($data['type_name']),
            'created_at' => $this->timestamp
        ];

        $result = ($this->db->insert($this->table, $data)) ? 200 : 400;
        return $result;
    }

    public function update($data)
    {
        $type_id = $this->db->escape($data['type_id']);
dd($type_id);
        $data = [
            'type_name' => $this->db->escape($data['type_name']),
            'update_at' => $this->timestamp
        ];
        $result = ($this->db->where($this->primaryKey, $type_id)->update($this->table, $data)) ? 200 : 400;
        return $result;

        return $result = ($this->db->where($this->primaryKey, $type_id)->update($this->table, $data)) ? 200 : 400;
    }

    public function delete($id)
    {
        $result = ($this->db->where($this->primaryKey, $id)->delete($this->table)) ? 200 : 400;
        return $result;
    }

}
