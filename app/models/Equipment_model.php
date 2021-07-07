<?php

require_once '../vendor/autoload.php';
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class Equipment_model extends Model
{
    private $db;
    protected $table      = 'equipment';
    protected $primaryKey = 'equipment_id';
    protected $cols = ['equipment_name', 'equipment_id'];

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

    public function getEquipByID($params = NULL)
    {
        $data = $this->db->where($this->primaryKey, $params)->fetchRow($this->table);
        return $data;
    }

    public function getAllEquipment()
    {   
        // $this->db->join("department", "user.department_id=department.department_id", "LEFT");
        // $this->db->where('user.role_id != 1');

        return $data = $this->db->get($this->table);
        
        // $data = $this->db->get("" . $this->table . "", null, "*");

        // return $data;
    }

    public function countAllEquip()
    {
        $count = $this->db->getValue($this->table, "count(*)");
        return $count;
    }

    public function insert($data)
    {
        $data = [
            'equipment_name' => $this->db->escape($data['equipment_name']),
            'equipment_serial_no' => $this->db->escape($data['equipment_serial_no']),
            'equipment_status' => $this->db->escape($data['equipment_status']),
            'equipment_type' => $this->db->escape($data['equipment_type']),
            'equipment_model' => $this->db->escape($data['equipment_model']),
            'created_at' => $this->timestamp
        ];

        $result = ($this->db->insert($this->table, $data)) ? 200 : 400;
        return $result;
    }

    public function update($data)
    {
        $equip_id = $this->db->escape($data['equipment_id']);
        $data = [
            'equipment_name' => $this->db->escape($data['equipment_name']),
            'equipment_serial_no' => $this->db->escape($data['equipment_serial_no']),
            'equipment_status' => $this->db->escape($data['equipment_status']),
            'equipment_type' => $this->db->escape($data['equipment_type']),
            'equipment_model' => $this->db->escape($data['equipment_model']),
            'updated_at' => $this->timestamp
        ];

        $result = ($this->db->where($this->primaryKey, $equip_id)->update($this->table, $data)) ? 200 : 400;
        return $result;
    }

    public function delete($id)
    {
        $result = ($this->db->where($this->primaryKey, $id)->delete($this->table)) ? 200 : 400;
        return $result;
    }

    public function getDashboardEquipment($typeEquipment = NULL)
    {

        //  server side datatables testing
        $cols = Array (
            "equipment.equipment_name",
            "equipment.equipment_serial_no",
            "equipment.equipment_status",
            "equipment.equipment_model",
            // "department.department_name",
            "equipment.equipment_type",
        );

        // $this->db->join("department", "equipment.department_id=department.department_id", "LEFT");
        // // $this->db->where('equipment.equipment_status != '.$typeequipment);
        // $result = $this->db->get("" . $this->table . " equipment", null, $cols);

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->edit('equipment_status', function($data){
            return $status = ($data['equipment_status'] == '1') ? 'Baik' : 'Lupus';
        });

        $this->serversideDt->edit('equipment_type', function($data){
            return $status = ($data['equipment_type'] == '1') ? '<span class="badge badge-pill badge-success"> active </span>' : '<span class="badge badge-pill badge-danger"> inactive </span>';
        });

        echo $this->serversideDt->generate();
    }

     public function getDashboardCountEquipment($params = NULL)
    {
        if ($params != 0) {
            $this->db->where('equipment_status', $params);
        }
        $data =  $this->db->getValue($this->table, "count(*)");
        return $data;
    }
}
