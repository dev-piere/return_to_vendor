<?php
defined('BASEPATH') OR exit('No direct script access allowed');

new GuzzleHttp\Client();

class Welcome extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		isOnline();

		$this->load->view('main_menu');
	}

	public function requestForm()
	{
		isOnline();

		$this->load->view('request_form');
	}

	public function transferForm()
	{
		isOnline();

		$this->load->view('transfer_form');
	}

	public function requestDetail()
	{
		isOnline();

		$filterDocNo = $this->input->get("DocNo");

		$params = [
			'filterDocNo' => $filterDocNo
		];
		
		$data = getToApi_local("getRequestDetail", $params)["data"][0];
		
		$this->load->view('request_detail_form', $data);
	}

	function getClientRequests()
	{
		$searchBy = $this->input->get("searchBy");

		$params = [
			"searchBy" => $searchBy
		];
		
		$data = getToApi_local("getRequest", $params)["data"];

		foreach ($data as $d) {
			$docNo = $d["DocNo"];
			$array = [
				'isNavigatable' => true,
				'link' => "http://192.168.20.251/return_to_vendor/welcome/requestDetail?DocNo=$docNo",
				'type' => $d["TrnTypID"],
				'headerText' => $d["DocNo"],
				'smallText' => $d["DocDate"]
			];
			$this->load->view("component/listCard", $array);
		}
	}

	function getClientStock() {
		$itemID = $this->input->get("itemID");

		$params = [
			"itemID" => $itemID
		];
		
		echo json_encode(getToApi_local("getStock", $params));
	}

	function getClientItemMaster() {
		$q = $this->input->get("q");
		$params = $this->input->get("params");

		$params = [
			"q" => $q,
			"params" => $params
		];
		
		echo json_encode(getToApi_local("getItemMaster", $params));
	}

	function clientCreateRequest(){
		$docNumber = $this->input->get("docNumber");
		$docDate = $this->input->get("docDate");
		$stockQty = $this->input->get("stockQty");
		$oriLoc = $this->input->get("oriLoc");
		$trnLoc = $this->input->get("trnLoc");
		$qtyPerPack = $this->input->get("qtyPerPack");
		$itemID = $this->input->get("itemID");
		$qty = $this->input->get("qty");
		$remarks = $this->input->get("remarks");
		$fileName = $this->input->get("fileName");
		$reqUser = $this->input->get("reqUser");

		$params = [
			'docNumber' => $docNumber,
			'docDate' => $docDate,
			'stockQty' => $stockQty,
			'oriLoc' => $oriLoc,
			'trnLoc' => $trnLoc,
			'qtyPerPack' => $qtyPerPack,
			'itemID' => $itemID,
			'qty' => $qty,
			'remarks' => $remarks,
			'fileName' => $fileName,
			'reqUser' => $reqUser
		];
		
		echo json_encode(postToApi_local("createRequest", $params));
	}

}
