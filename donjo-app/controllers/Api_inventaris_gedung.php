<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
* User: didikkurniawan
* Date: 10/1/16
* Time: 06:59
*/

class Api_inventaris_gedung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		session_start();
		$this->load->model('user_model');
		$grup	= $this->user_model->sesi_grup($_SESSION['sesi']);
		if($grup!=1 AND $grup!=2) {
			$_SESSION['request_uri'] = $_SERVER['REQUEST_URI'];
			redirect('siteman');
		}
		$this->load->model('inventaris_gedung_model');
		$this->modul_ini = 16;
		$this->tab_ini = 3;
		$this->controller = 'inventaris_gedung';
    }

    public function add()
    {

            $data = $this->inventaris_gedung_model->add(array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kode_barang' => $this->input->post('kode_barang'),
                'register' => $this->input->post('register'),
                'kondisi_bangunan' => $this->input->post('kondisi'),
                'kontruksi_bertingkat' => $this->input->post('tingkat'),
                'kontruksi_beton' => $this->input->post('kontruksi'),
                'luas_bangunan' => $this->input->post('luas_bangunan'),
                'letak' => $this->input->post('alamat'),
                'no_dokument' => $this->input->post('no_bangunan'),
                'tanggal_dokument' => $this->input->post('tanggal_bangunan'),
                'status_tanah' => $this->input->post('status_tanah'),
                'luas' => $this->input->post('luas_tanah'),
                'kode_tanah' => $this->input->post('kode_tanah'),
                'asal' => $this->input->post('asal'),
                'harga' => $this->input->post('harga'),
                'keterangan' => $this->input->post('keterangan'),
                'visible' => 1
                ));
            if ($data) $_SESSION['success']=1;
            redirect("inventaris_gedung");
    }

    public function add_mutasi()
    {
            $_SESSION['success']=1;
            $data = $this->inventaris_gedung_model->add_mutasi(array(
                'id_inventaris_gedung' => $this->input->post('id_inventaris_gedung'),
                'jenis_mutasi' => $this->input->post('mutasi'),
                'tahun_mutasi' => $this->input->post('tahun_mutasi'),
                'harga_jual' => $this->input->post('harga_jual'),
                'sumbangkan' => $this->input->post('sumbangkan'),
                'keterangan' => $this->input->post('keterangan'),
                'visible' => 1
                ));
            redirect("inventaris_gedung/mutasi");
    }

    public function update($id)
    {
            $_SESSION['success']=1;
            $data = $this->inventaris_gedung_model->update($id,array(
                'nama_barang' => $this->input->post('nama_barang'),
                'kode_barang' => $this->input->post('kode_barang'),
                'register' => $this->input->post('register'),
                'kondisi_bangunan' => $this->input->post('kondisi'),
                'kontruksi_bertingkat' => $this->input->post('tingkat'),
                'kontruksi_beton' => $this->input->post('kontruksi'),
                'luas_bangunan' => $this->input->post('luas_bangunan'),
                'letak' => $this->input->post('alamat'),
                'no_dokument' => $this->input->post('no_bangunan'),
                'tanggal_dokument' => $this->input->post('tanggal_bangunan'),
                'status_tanah' => $this->input->post('status_tanah'),
                'luas' => $this->input->post('luas_tanah'),
                'kode_tanah' => $this->input->post('kode_tanah'),
                'asal' => $this->input->post('asal'),
                'harga' => $this->input->post('harga'),
                'keterangan' => $this->input->post('keterangan'),
                'updated_at' => date("m/d/Y")
                ));
            if (!$data) $_SESSION['success']=-1;
            redirect("inventaris_gedung");
    }

    public function update_mutasi($id)
    {
            $_SESSION['success']=1;
            $data = $this->inventaris_gedung_model->update_mutasi($id,array(
                'jenis_mutasi' => $this->input->post('mutasi'),
                'tahun_mutasi' => $this->input->post('tahun_mutasi'),
                'harga_jual' => $this->input->post('harga_jual'),
                'sumbangkan' => $this->input->post('sumbangkan'),
                'keterangan' => $this->input->post('keterangan'),
                'updated_at' => date("m/d/Y")
                ));
            if (!$data) $_SESSION['success']=-1;
            redirect("inventaris_gedung/mutasi");
    }

    public function delete($id)
    {
        json_encode($this->inventaris_gedung_model->delete($id));

        redirect('inventaris_gedung');
    }

    public function delete_mutasi($id)
    {
        json_encode($this->inventaris_gedung_model->delete_mutasi($id));

        redirect('inventaris_gedung/mutasi');
    }
}