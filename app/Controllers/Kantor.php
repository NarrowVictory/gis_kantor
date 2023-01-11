<?php namespace App\Controllers;
use App\Models\M_Kantor;

class Kantor extends BaseController
{
	function __construct()
	{
		$this->m_kantor = new M_kantor();
	}

	public function index()
	{
		$data=[
			'title' => "Halaman Kantor",
			'kantor' => $this->m_kantor->getdata(),
			'isi' => 'v_kantor.php'
		];
		echo view('layout/v_wrapper', $data);
	}

	public function add()
	{
	    $data=[
			'title' => "Add Kantor",
			'isi' => 'v_addkantor.php'
		];
		echo view('layout/v_wrapper', $data);
	}

	public function save()
	{
	    $valid = $this->validate([
	    	'nama_kantor' => [
	    		'label' => 'Nama Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'no_telp' => [
	    		'label' => 'No Telpon Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'alamat' => [
	    		'label' => 'Alamat Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'lat' => [
	    		'label' => 'Lokasi Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'long' => [
	    		'label' => 'Lokasi Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'foto' => [
	    		'label' => 'Foto',
	    		'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]',
	    		'errors' => [
	    			'uploaded' => '{field} Wajib Diupload',
	    			'mime_in' => '{field} Harus berupa format gambar'
	    		]
	    	],
	    ]);

	    if (!$valid) {
	    	session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
	    	return redirect()->to(base_url('kantor/add'));
	    }else{
	    	$image = $this->request->getFile('foto');
	    	$name = $image->getRandomName();
	    	$data = [
	    		'nama_kantor' => $this->request->getVar('nama_kantor'),
	    		'no_telp' => $this->request->getVar('no_telp'),
	    		'alamat' => $this->request->getVar('alamat'),
	    		'lat' => $this->request->getVar('lat'),
	    		'long' => $this->request->getVar('long'),
	    		'deskripsi' => $this->request->getVar('deskripsi'),
	    		'foto' => $name
	    	];
	    	$image->move('foto', $name);
	    	$this->m_kantor->simpan($data);
	    	session()->setFlashdata('sukses','Data Berhasil Ditambah');
	    	return redirect()->to(base_url('kantor'));
	    }
	}

	//--------------------------------------------------------------------
	public function edit($id_kantor)
	{
	    $data=[
			'title' => "Edit Kantor",
			'kantor'=> $this->m_kantor->detail_data($id_kantor),
			'isi' => 'v_editkantor.php'
		];
		echo view('layout/v_wrapper', $data);
	}

	public function update($id_kantor)
	{
	    $valid = $this->validate([
	    	'nama_kantor' => [
	    		'label' => 'Nama Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'no_telp' => [
	    		'label' => 'No Telpon Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'alamat' => [
	    		'label' => 'Alamat Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'lat' => [
	    		'label' => 'Lokasi Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'long' => [
	    		'label' => 'Lokasi Kantor',
	    		'rules' => 'required',
	    		'errors' => [
	    			'required' => '{field} Wajib Diisi'
	    		]
	    	],
	    	'foto' => [
	    		'label' => 'Foto',
	    		'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]',
	    		'errors' => [
	    			'uploaded' => '{field} Wajib Diupload',
	    			'mime_in' => '{field} Harus berupa format gambar'
	    		]
	    	],
	    ]);

	    $kantor = $this->m_kantor->detail_data($id_kantor);
	    if (!$valid) {
	    	session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
	    	return redirect()->to(base_url('kantor/edit/'.$kantor['id_kantor']));
	    }else{
	    	$image = $this->request->getFile('foto');
	    	$name = $image->getRandomName();
	    	$data = [
	    		'id_kantor' => $id_kantor,
	    		'nama_kantor' => $this->request->getVar('nama_kantor'),
	    		'no_telp' => $this->request->getVar('no_telp'),
	    		'alamat' => $this->request->getVar('alamat'),
	    		'lat' => $this->request->getVar('lat'),
	    		'long' => $this->request->getVar('long'),
	    		'deskripsi' => $this->request->getVar('deskripsi'),
	    		'foto' => $name
	    	];
	    	$image->move('foto', $name);
	    	$this->m_kantor->update_data($data);
	    	session()->setFlashdata('sukses','Data Berhasil Ditambah');
	    	return redirect()->to(base_url('kantor'));
	    }
	}

	public function delete($id_kantor)
	{
	    $this->m_kantor->delete_data($id_kantor);
	    session()->setFlashdata('sukses','Data Berhasil Dihapus');
	    return redirect()->to(base_url('kantor'));
	}

}
