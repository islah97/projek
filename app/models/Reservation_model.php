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

    public function getReserveApproveByID($params = NULL)
    {
        $this->db->join("user s", "f.user_id=s.user_id", "LEFT");
        $data = $this->db->where($this->primaryKey, $params)->fetchRow("".$this->table." f", null);
        return $data;
    }

    public function getListbyStatus($params = NULL)
    {
        if ($params != 0) {
            $this->db->where('reservation_status', $params);
        }
        $this->db->join("user s", "f.user_id=s.user_id", "LEFT");
        $data = $this->db->get("".$this->table." f", null, "*");
        $result = array();

        foreach ($data as $reserve_detail) {

            $reservation_id = $reserve_detail['reservation_id'];
            $reserve_name = $reserve_detail['user_name'];
            $reserve_staffno = $reserve_detail['user_staff_id'];
            $reserve_date = date("d.m.Y", strtotime($reserve_detail['reservation_date_pickup']));
            $reserve_desc = $reserve_detail['reservation_description'];
            $reserve_status = $reserve_detail['reservation_status'];
            $reserve_date_return = date("d.m.Y", strtotime($reserve_detail['reservation_date_return']));
            $reserve_time_return = date("h:i A", strtotime($reserve_detail['reservation_time_return']));
            $reserve_time = date("h:i A", strtotime($reserve_detail['reservation_time_pickup']));

            $this->db->join("master_equipment_type e", "f.master_equipment_id=e.type_id", "LEFT");
            $this->db->where('reservation_id', $reservation_id);
            $itemList = $this->db->get("reservation_item f", null, "*");

            $itemArray = array(); // reset item

            foreach ($itemList as $item) {
                if ($reserve_status == 2) {
                    if($item['equipment_id'] != NULL) {
                        $itemArray[] = $item['type_name']." <i class='fa fa-check' style='color: green;'></i>";
                    }else{
                        $itemArray[] = $item['type_name']." <i class='fa fa-times' style='color: red;'></i>";
                    }
                }else if($reserve_status == 3) {
                    $itemArray[] = $item['type_name']." <i class='fa fa-times' style='color: red;'></i>";
                }else{
                    $itemArray[] = $item['type_name'];
                }
            }

            $listItem = $this->addcomma($itemArray);

            $result[] = array(
                'id' => $reservation_id,
                'name' => $reserve_name,
                'staffNo' => $reserve_staffno,
                'date' => $reserve_date,
                'date_return' => $reserve_date_return,
                'time_return' => $reserve_time_return,
                'item' => $listItem,
                'status' => $reserve_status,
                'time' => $reserve_time,

            );

        }
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

    public function getReserveByID($params = NULL)
    {
        $this->db->join("user s", "f.user_id=s.user_id", "LEFT");
        $data = $this->db->where($this->primaryKey, $params)->fetchRow("".$this->table." f", null);
        return $data;
    }

    public function countAllReserve()
    {
        $count = $this->db->getValue($this->table, "count(*)");
        return $count;
    }

    public function getDashboardCountReserve($params = NULL)
    {
        if ($params != 0) {
            $this->db->where('reservation_status', $params);
        }
        $data =  $this->db->getValue($this->table, "count(*)");
        return $data;
    }

    public function insert($data)
    {
        $data = [
            'reservation_date_pickup' => $this->db->escape($data['reservation_date_pickup']),
            'reservation_time_pickup' => $this->db->escape($data['reservation_time_pickup']),
            // 'reservation_date_return' => $this->db->escape($data['reservation_date_return']),
            // 'reservation_time_return' => $this->db->escape($data['reservation_time_return']),
            'reservation_description' => $this->db->escape($data['reservation_description']),
            'reservation_status' => $this->db->escape($data['reservation_status']),
            'user_id' => $this->db->escape($data['user_id']),
            'created_at' => $this->timestamp
        ];

        $result = $this->db->insert($this->table, $data);
        return $reserve_id = ($result) ? $result : 400;
    }

    public function update($data)
    {
        $reservation_id = $this->db->escape($data['reservation_id']);
        $resultEquip = $this->db->escape($data['equipment_id']);
        $equipment_id = explode(",",$resultEquip);
        
        $data = [
           // 'reservation_date_pickup' => $this->db->escape($data['reservation_date_pickup']),
           //  'reservation_time_pickup' => $this->db->escape($data['reservation_time_pickup']),
            'reservation_date_return' => $this->db->escape($data['reservation_date_return']),
            'reservation_time_return' => $this->db->escape($data['reservation_time_return']),
            // 'reservation_description' => $this->db->escape($data['reservation_description']),
            'reservation_status' => 4,
            // 'user_id' => $this->db->escape($data['user_id']),
            'updated_at' => $this->timestamp
        ];

        $result = ($this->db->where($this->primaryKey, $reservation_id)->update($this->table, $data)) ? 200 : 400;

        if($result != 400) {
            foreach($equipment_id as $id) {

                $equipmentList = [
                    'equipment_status' => 1, // baik
                    'updated_at' => $this->timestamp
                ];

                $this->db->where('equipment_id', $id)->update('equipment', $equipmentList);
            }
            $result = 200;
        }else {
            $result = 400;
        }

        return $result;
    }

    public function approve($data)
    {
        $reserve_id = $this->db->escape($data['reservation_id']);

        $keys = current($data['item_id']);

        if(empty($keys)) {
            $reservation_status = 3; // not approve
        }else{
            $reservation_status = 2; // approve
        }

        $dataReservation = [
           'reservation_date_pickup' => $this->db->escape($data['reservation_date_pickup']),
            // 'reservation_time_pickup' => $this->db->escape($data['reservation_time_pickup']),
            // 'reservation_date_return' => $this->db->escape($data['reservation_date_return']),
            // 'reservation_time_return' => $this->db->escape($data['reservation_time_return']),
            'reservation_description' => $this->db->escape($data['reservation_description']),
            'reservation_status' => $reservation_status,
            'updated_at' => $this->timestamp
        ];

        $result = ($this->db->where($this->primaryKey, $reserve_id)->update($this->table, $dataReservation)) ? 200 : 400;

        if($result != 400) {
            foreach($data['item_id'] as $itemKey => $equipmentID) {
                $equipItem = [
                    'equipment_id' => $equipmentID,
                    'update_at' => $this->timestamp
                ];

                $equipmentList = [
                    'equipment_status' => 4, // dipinjam
                    'updated_at' => $this->timestamp
                ];

                $this->db->where('item_id', $itemKey)->update('reservation_item', $equipItem);
                $this->db->where('equipment_id', $equipmentID)->update('equipment', $equipmentList);
            }
            $result = 200;
        }else {
            $result = 400;
        }

        return $result;
    }

    public function delete($id)
    {
        $result = ($this->db->where($this->primaryKey, $id)->delete($this->table)) ? 200 : 400;
        return $result;
    }
}
