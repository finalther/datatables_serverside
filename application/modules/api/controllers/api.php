<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_global');
        $this->load->library('datatables');

    }

	public function index()
	{
		$data['kategori'] = $this->m_global->fetch('tb_kategori');
        // print_r($data['kategori']);
		// $this->template->set_layout('pattern')
		// 				->title('simple serverside')
		// 				->build('index', $data);
        $this->load->view('index', $data);
	}

	public function insert_dummy(){
        // jumlah data yang akan di insert
        $jumlah_data = 500;
        for ($i=1;$i<=$jumlah_data;$i++){
            $data   =   array(
                "harga"  =>  4000+$i,
                "stok"         =>  90+$i,
                "nama"         =>  "minuman ke-".$i,
                "kategori"          =>  "2");
            $this->db->insert('tb_product',$data); 
        }
        echo $i.' Data Berhasil Di Insert';
    }
    
    function json(){
        $this->datatables->select('a.id,a.nama,a.harga,a.stok,b.kategori as kategori_barang, b.id as idkategori');
        $this->datatables->from('tb_product a');
        $this->datatables->join('tb_kategori b', 'a.kategori=b.id');
        $this->datatables->add_column('view', '<a href="javascript:void(0)" data-kode="$1" data-nama="$2" data-harga="$3" data-stok="$4" data-kategori="$5" data-idkategori="$6"  class="edit btn btn-info btn-sm"> <i class="glyphicon glyphicon-pencil"></i> edit</a>','
            id,nama,harga,stok,kategori_barang,idkategori');
        echo $this->datatables->generate();
    }

    function add(){
        $nama = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $kategori = $this->input->post('kategori');

        $data = array(
            'nama'=>$nama,
            'harga'=>$harga,
            'stok'=>$stok,
            'kategori'=>$kategori
            );

        $this->db->insert('tb_product', $data);
        redirect(base_url('index.php/welcome/index'));
    }

    function update(){
        $kode = $this->input->post('kode_barang');
        $nama = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $kategori = $this->input->post('kategori');

        $data = array(
            'nama'=>$nama,
            'harga'=>$harga,
            'stok'=>$stok,
            'kategori'=>$kategori
            );
        $this->db->update('tb_product', $data, array('id'=>$kode));
        redirect(base_url('index.php/welcome/index'));
    }


}

/* End of file Home.php */
/* Location: ./application/modules/welcome/controllers/Home.php */