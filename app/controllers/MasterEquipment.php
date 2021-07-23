<?php

class MasterEquipment extends Controller
{
	private $db;
	protected $master_model;

	public function __construct()
	{
		$this->session();
		$this->db = new Database;
		$this->master_model = $this->model('Master_model');
		$this->timestamp = date('Y-m-d H:i:s');
	}

	public function index()
	{
		// Empty function

	}

	public function getListMaster()
	{
		$this->jsonResult($this->master_model->getAllMasterEquipment());
	}

	public function getListCheck()
	{
		$data = $this->master_model->getListData();

		echo  "<label> Peralatan <span class='text-danger'> * </span> </label>";
		foreach($data as $row) {
			echo "<div class='form-check'>
					<input class='form-check-input' type='checkbox' value=".$row['type_id']." name='type_id[]' id='type_id".$row['type_id']."'>
	  				<label class='form-check-label' for='type_id".$row['type_id']."'>".$row['type_name']."</label>
  				</div>";
		}
	}

	public function getListSelect()
	{
		$data = $this->master_model->getListData();
		echo "<option value=''> - Kategori Peralatan - </option>";
		foreach ($data as $row) {
				echo "<option value='".$row['type_id']."'> ".$row['type_name']." </option>";
		}
		// echo $this->department_model->getListData();
	}

	public function create()
	{
		$resCode = $this->master_model->insert($_POST);
		$data = array(
	      "type" => 'create',
	      "resCode" => $resCode,
		);
		$this->jsonResult($data);
	}

	public function update()
	{
		$resCode = $this->master_model->update($_POST);
		$data = array(
	      "type" => 'update',
	      "resCode" => $resCode,
		);

		$this->jsonResult($data);
	}

	public function getupdate()
	{
		$this->jsonResult($this->master_model->getMasterEquipByID($_POST['id']));
	}

	public function delete()
	{
		$result = $this->master_model->delete($_POST['id']);
		$this->jsonResult($result);
	}

	public function countEquipment()
	{
		$type = $this->db->escape($_POST['typeData']);
		$this->jsonResult($this->master_model->getDashboardCountEquipment($type));
	}

}
