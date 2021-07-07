<?php

class Department extends Controller
{
	private $db;
	protected $department_model;

	public function __construct()
	{
		$this->session();
		$this->db = new Database;
		$this->department_model = $this->model('Department_model');
		$this->timestamp = date('Y-m-d H:i:s');
	}

	public function index()
	{
		// Empty function
	}

	public function getUpdateData()
	{
	  $id = $this->db->escape($_POST['id']);
	  $result = $this->department_model->getDeptByID($id);

	  $data = array(
	      "department_id" => $result['department_id'],
	      "department_name" => $result['department_name'],
	  );

	  $this->jsonResult($data);
	}

	public function getList()
	{
		$this->jsonResult($this->department_model->getListData());
		// echo $this->department_model->getListData();
	}

	public function getListSelect()
	{
		$data = $this->department_model->getListData();

		echo "<option value=''> - Pilih Jabatan - </option>";
		foreach ($data as $row) {
				echo "<option value='".$row['department_id']."'> ".$row['department_name']." </option>";
		}
		// echo $this->department_model->getListData();
	}

	public function create()
	{
		$resCode = $this->department_model->insert($_POST);
		$data = array(
	      "type" => 'create',
	      "resCode" => $resCode,
		);
		$this->jsonResult($data);
	}

	public function update()
	{
		$resCode = $this->department_model->update($_POST);
		$data = array(
	      "type" => 'update',
	      "resCode" => $resCode,
		);

		$this->jsonResult($data);
	}

	public function delete()
	{
		$result = $this->department_model->delete($_POST['id']);
		$this->jsonResult($result);
	}

}
