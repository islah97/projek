<?php

class Reservation extends Controller
{
	private $db;
	protected $reservation_model;

	public function __construct()
	{
		$this->session();
		$this->db = new Database;
		$this->reservation_model = $this->model('Reservation_model');
		$this->item_model = $this->model('Item_model');
		$this->user_model = $this->model('User_model');
		$this->timestamp = date('Y-m-d H:i:s');
	}

	public function index()
	{
		// Empty function
		$data = [
			'title' => 'Senarai Tempahan',
			'currentSidebar' => 'reservation',
			'currentSubSidebar' => 'listAll'
		];

		$this->render('reservation/newList', $data);
	}

	public function complete()
	{
		// Empty function
		$data = [
			'title' => 'Senarai Tempahan',
			'currentSidebar' => 'reservation',
			'currentSubSidebar' => 'listAll'
		];

		$this->render('reservation/completeList', $data);
	}

	public function reject()
	{
		// Empty function
		$data = [
			'title' => 'Senarai Tempahan',
			'currentSidebar' => 'reservation',
			'currentSubSidebar' => 'listAll'
		];

		$this->render('reservation/rejectList', $data);
	}

	public function terima()
	{
		// Empty function
		$data = [
			'title' => 'Senarai Tempahan',
			'currentSidebar' => 'reservation',
			'currentSubSidebar' => 'listAll'
		];

		$this->render('reservation/approveList', $data);
	}

	public function countList()
	{
		$type = $this->db->escape($_POST['typeData']);
		$this->jsonResult($this->reservation_model->getDashboardCountReserve($type));
	}

	public function getUpdateData()
	{
	  $id = $this->db->escape($_POST['id']);
	  $result = $this->reservation_model->getReserveByID($id);
	  $resultItem = $this->item_model->getItemByReserveID($result['reservation_id']);

	  $data = array(
	     "reservation" => $result,
	      "item" => $resultItem,
	  );

	  $this->jsonResult($data);
	}

	public function getApproveData()
	{
	  $id = $this->db->escape($_POST['id']);
	  $result = $this->reservation_model->getReserveApproveByID($id);
	  $resultItem = $this->item_model->getItemByReserveID($result['reservation_id']);

	  $data = array(
	  	  "reservation" => $result,
	      "item" => $resultItem,
	  	);

	  $this->jsonResult($data);
	}

	public function getList()
	{
		$this->jsonResult($this->reservation_model->getListData());
		// echo $this->reservation_model->getListData();
	}

	public function getListReservation()
	{
		$type = $this->db->escape($_POST['typeData']);
		$this->jsonResult($this->reservation_model->getListbyStatus($type));
	}

	public function create()
	{
		$resID = $this->reservation_model->insert($_POST);
		$_POST['reservation_id'] = $resID;

		$resCode = $this->item_model->insert($_POST);
		$data = array(
	      "type" => 'create',
	      "resCode" => $resCode,
		);
		$this->jsonResult($data);
	}

	public function update()
	{
		$resCode = $this->reservation_model->update($_POST);
		$data = array(
	      "type" => 'update',
	      "resCode" => $resCode,
		);

		$this->jsonResult($data);
	}

	public function approve()
	{

		$resCode = $this->reservation_model->approve($_POST);
		$data = array(
	      "type" => 'approve',
	      "resCode" => $resCode,
		);

		$this->jsonResult($data);
	}

	public function delete()
	{
		$result = $this->reservation_model->delete($_POST['id']);
		$this->jsonResult($result);
	}

}
