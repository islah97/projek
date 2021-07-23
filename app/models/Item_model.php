<?php

require_once '../vendor/autoload.php';
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class Item_model extends Model
{
    private $db;
    protected $table      = 'reservation_item';
    protected $primaryKey = 'item_id';
    protected $cols = ['equipment_name', 'item_id'];

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

    public function getItemByReserveID($params = NULL)
    {
        $this->db->join("equipment e", "f.equipment_id=e.equipment_id", "LEFT");
        $data = $this->db->where('reservation_id', $params)->get($this->table." f", null, "*");

        $equipmentArray = array();

        foreach ($data as $equipmentList) {
            $equipmentArray[] = $equipmentList['equipment_name']." - ". $equipmentList['equipment_type']."(".$equipmentList['equipment_model'].") ";
        }


        $listEquipment = $this->addcomma($equipmentArray);

        $result[] = array(
            'item_id' => $equipmentList['item_id'],
            'master_equipment_id' => $equipmentList['master_equipment_id'],
            'equipment_id' => $equipmentList['equipment_id'],
            'equipment_list' => $listEquipment,
        );

        return $result;
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

    public function getItemByID($params = NULL)
    {
        $data = $this->db->where($this->primaryKey, $params)->fetchRow($this->table);
        return $data;
    }

    public function countAllItem()
    {
        $count = $this->db->getValue($this->table, "count(*)");
        return $count;
    }

    public function insert($data)
    {
        foreach($data['type_id'] as $equipmentItem) {
            $itemList[] = Array(
                'reservation_date' => $this->db->escape($data['reservation_date_pickup']),
                'reservation_id' => $this->db->escape($data['reservation_id']),
                'master_equipment_id' => $equipmentItem,
                'created_at' => $this->timestamp
            );
        }
        return $result = ($this->db->insertMulti($this->table, $itemList)) ? 200 : 400;

    }

    public function update($data)
    {
        $equip_id = $this->db->escape($data['item_id']);
        $data = [
           'reservation_date' => $this->db->escape($data['reservation_date']),
            'reservation_id' => $this->db->escape($data['reservation_id']),
            'equipment_id' => $this->db->escape($data['equipment_id']),
            'updated_at' => $this->timestamp
        ];

        $result = ($this->db->where($this->primaryKey, $item_id)->update($this->table, $data)) ? 200 : 400;
        return $result;
    }

    public function delete($id)
    {
        $result = ($this->db->where($this->primaryKey, $id)->delete($this->table)) ? 200 : 400;
        return $result;
    }
}
