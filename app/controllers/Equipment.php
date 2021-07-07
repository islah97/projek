<?php

class Equipment extends Controller
{
	private $db;
	protected $equipment_model;

	public function __construct()
	{
		$this->session();
		$this->db = new Database;
		$this->equipment_model = $this->model('Equipment_model');
		$this->timestamp = date('Y-m-d H:i:s');
	}

	public function index()
	{
		// Empty function

		$data = [
			'title' => 'Senarai Peralatan',
			'currentSidebar' => 'equipment',
			'currentSubSidebar' => 'listAll'
		];

		$this->render('equipment/list', $data);
	}

	public function getUpdateData()
	{
	  $id = $this->db->escape($_POST['id']);
	  $result = $this->equipment_model->getEquipByID($id);

	  $data = array(
	      "equipment_id" => $result['equipment_id'],
	      "equipment_serial_no" => $result['equipment_serial_no'],
	      "equipment_name" => $result['equipment_name'],
	      "equipment_model" => $result['equipment_model'],
	      "equipment_type" => $result['equipment_type'],
	      "equipment_status" => $result['equipment_status'],
	  );

	  $this->jsonResult($data);
	}

	public function getListEquipment()
	{
		$this->jsonResult($this->equipment_model->getAllEquipment());
	}

	public function getList()
	{
		// $this->jsonResult($this->equipment_model->getListData());
		$type = $this->db->escape($_POST['type']);
		// echo $this->equipment_model->getListData();
		echo $this->equipment_model->getDashboardEquipment($type);
	}

	public function create()
	{
		$resCode = $this->equipment_model->insert($_POST);
		$data = array(
	      "type" => 'create',
	      "resCode" => $resCode,
		);
		$this->jsonResult($data);
	}

	public function update()
	{
		$resCode = $this->equipment_model->update($_POST);
		$data = array(
	      "type" => 'update',
	      "resCode" => $resCode,
		);

		$this->jsonResult($data);
	}

	public function delete()
	{
		$result = $this->equipment_model->delete($_POST['id']);
		$this->jsonResult($result);
	}

	public function countEquipment()
	{
		$type = $this->db->escape($_POST['typeData']);
		$this->jsonResult($this->equipment_model->getDashboardCountEquipment($type));
	}

}
