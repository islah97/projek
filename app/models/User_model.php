<?php

require_once '../vendor/autoload.php';
use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\MySQL;

class User_model extends Model
{
    private $db;
    protected $table      = 'user';
    protected $primaryKey = 'user_id';

    public function __construct()
    {
        // $this->session();
        $this->db = new Database;
        $this->timestamp = date('Y-m-d H:i:s');
        $this->connection = $this->db->getConnection();
        $this->serversideDt = new Datatables( new MySQL($this->connection) );
        $this->getInstanceDB = $this->db->getInstance();
    }

    public function getAllUser()
    {   
        $this->db->join("department", "user.department_id=department.department_id", "LEFT");
        // $this->db->where('user.role_id != 1');
        $data = $this->db->get("" . $this->table . "", null, "*");

        return $data;
    }

    public function getDashboardUser($typeUser = NULL)
    {

        //  server side datatables testing
        $cols = Array (
            "user.user_name",
            "user.user_staff_id",
            "user.user_role",
            "department.department_name",
            "user.user_status",
        );

        $this->db->join("department", "user.department_id=department.department_id", "LEFT");
        // $this->db->where('user.user_role != '.$typeUser);
        $result = $this->db->get("" . $this->table . " user", null, $cols);

        $this->serversideDt->query($this->getInstanceDB->getLastQuery());

        $this->serversideDt->edit('user_role', function($data){
            return $status = ($data['user_role'] == '1') ? 'Administrator' : 'Staff';
        });

        $this->serversideDt->edit('user_status', function($data){
            return $status = ($data['user_status'] == '1') ? '<span class="badge badge-pill badge-success"> active </span>' : '<span class="badge badge-pill badge-danger"> inactive </span>';
        });

        echo $this->serversideDt->generate();
    }

    // public function getDashboardUser($type = NULL)
    // {
    //     $this->db->join("master_role r", "u.role_id=r.role_id", "LEFT");
    //     $this->db->join("master_gender g", "u.usr_gender=g.usr_gender", "LEFT");
    //     if ($type == '2' OR $type == '3') {  
    //         $gender = ($type == '2') ? 'M' : 'F';
    //         $this->db->where('u.usr_gender', $gender);
    //         $this->db->where('u.usr_status', 'Aktif');
    //     }elseif ($type == '4') {  
    //         $this->db->where('u.usr_status', 'Tidak Aktif');
    //     }
    //     $data = $this->db->get("" . $this->table . " u", null, "*");

    //     return $data;
    // }

    public function getDashboardCountUser($params = NULL)
    {
        if ($params != 0) {
            $this->db->where('user_role', $params);
        }
        $data =  $this->db->getValue($this->table, "count(*)");
        return $data;
    }

    public function getUserLogin($params = NULL)
    {
        $this->db->where('user_staff_id', $params);
        $this->db->orWhere('user_phoneNo', $params);
        $data = $this->db->fetchRow($this->table);
        return $data;
    }

    public function getUserByID($params = NULL)
    {
        $data = $this->db->where($this->primaryKey, $params)->fetchRow($this->table);
        return $data;
    }

    public function getUserByUserNo($params = NULL)
    {
        $data = $this->db->where("usr_number", $params)->fetchRow($this->table);
        return $data;
    }

    public function countAllUser()
    {
        $count = $this->db->getValue($this->table, "count(*)");
        return $count;
    }

    public function countAllUserActive($status = '1')
    {
        $count = $this->db->where("user_status", $status)->getValue($this->table, "count(*)");
        return $count;
    }

    public function countAllUserInActive($status = '0')
    {
        $count = $this->db->where("user_status", $status)->getValue($this->table, "count(*)");
        return $count;
    }

    public function insert($data)
    {

        $data = [
            'user_name' => $this->db->escape($data['user_name']),
            'user_staff_id' => $this->db->escape($data['user_staff_id']),
            'user_password' =>  $this->encryptPassword($this->db->escape($data['user_password'])),
            'user_phoneNo' => $this->db->escape($data['user_phoneNo']),
            'user_role' => $this->db->escape($data['user_role']),
            'department_id' => $this->db->escape($data['department_id']),
            'user_status' => $this->db->escape($data['user_status']),
            // 'user_avatar' => 'default/image.png',
            'created_at' => $this->timestamp
        ];

        return $result = ($this->db->insert($this->table, $data)) ? 200 : 400;
    }

    public function update($data)
    {
        $user_id = $this->db->escape($data['user_id']);

        $data = [
            'user_name' => $this->db->escape($data['user_name']),
            'user_staff_id' => $this->db->escape($data['user_staff_id']),
            'user_password' =>  $this->checkPasswordChange($this->db->escape($data['user_password']), $user_id),
            'user_phoneNo' => $this->db->escape($data['user_phoneNo']),
            'user_role' => $this->db->escape($data['user_role']),
            'department_id' => $this->db->escape($data['department_id']),
            'user_status' => $this->db->escape($data['user_status']),
            // 'user_avatar' => 'default/image.png',
            'created_at' => $this->timestamp
        ];

        return $result = ($this->db->where($this->primaryKey, $user_id)->update($this->table, $data)) ? 200 : 400;
            // $result = $this->db->count;
        // else
        //     $result = $this->db->getLastError();
    }

    public function delete($id)
    {
        return $result = ($this->db->where($this->primaryKey, $id)->delete($this->table)) ? 200 : 400;
    }

    public function bulkDelete($data)
    {
        $countError = $countSuccess = 0;

        foreach ($data as $bulkData) {
            foreach ($bulkData as $id) {
                $delete = ($this->db->where($this->primaryKey, $id)->delete($this->table)) ? 200 : 400;
                ($delete == 200) ? $countSuccess++ : $countError++;
            }
        }

        $result = ($countError < 1) ? 200 : 400;
        return $result;
    }

    private function encryptPassword($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT); // hash password new password
    }

    private function checkPasswordChange($pass, $userid)
    {
        $data = $this->db->where($this->primaryKey, $userid)->fetchRow($this->table);
        $oldpass = $data['user_password'];
        return ($pass != $oldpass) ? password_hash($pass, PASSWORD_DEFAULT) : $oldpass;
    }
    
}
