<?php namespace App\Controllers;
use App\Models\M_Kantor;

class Home extends BaseController
{
	function __construct()
	{
		$this->m_kantor = new M_kantor();
	}

	public function index()
	{
		$data=[
			'title' => "Halaman Home",
			'kantor' => $this->m_kantor->getdata(),
			'isi' => 'v_home.php'
		];
		echo view('layout/v_wrapper', $data);
	}



	//--------------------------------------------------------------------

}
