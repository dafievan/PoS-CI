<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('m_barang','m_transaksi'));
		check_session();
	}

	public function index()
	{
		if ($this->input->post('submit')) {
			//aksi dilakukan setelah post submit pada v_transaksi
			$nama_barang    =  $this->input->post('t_barang');
	        $qty            =  $this->input->post('qty');
	        $idbarang       = $this->db->get_where('barang',array('nama_barang'=>$nama_barang))->row_array();//merubah nama barang menjadi id_barang
	        $data           = array('id_barang'=>$idbarang['id_barang'],
	                                'qty'=>$qty,
	                                'harga'=>$idbarang['harga'],
	                                'status'=>'0');

			$this->m_transaksi->simpan_barang($data);
			redirect('transaksi');
		}
		else{
			$data['barang'] = $this->m_barang->tampil_data();//ambil data dari m_barang method tampl_data
			$data['detail'] = $this->m_transaksi->tampilkan_detail_transaksi();
			$this->template->load('template','transaksi/v_transaksi',$data);
		}
	}

	function hapusitem($id){ //$variable utk menampung valu dari deleteitem
		$this->m_transaksi->deleteitem($id);
		redirect('transaksi');
	}

	function selesai_belanja(){
		$tanggal = date('Y-m-d');
		$user =  $this->session->userdata('username');
		$id_op = $this->db->get_where('operator',array('username'=>$user))->row_array(); //change nama operator mjd id_operator
		$object = array('id_operator'=>$id_op['id_operator'],'tgl_transaksi'=>$tanggal);//conect dg DB, $object sbg penampung
		$this->m_transaksi->selesai_belanja($object);
		redirect('transaksi');
	}	

	function laporan()
    {
        if($this->input->post('submit'))
        {
            $tanggal1=  $this->input->post('tanggal1');
            $tanggal2=  $this->input->post('tanggal2');
            $data['transdetail']=  $this->m_transaksi->laporan_periode($tanggal1,$tanggal2);
            $this->template->load('template','transaksi/v_laporan_transaksi',$data);
        }
        else
        {
            $data['transdetail']=  $this->m_transaksi->laporan_transaksi();
            $this->template->load('template','transaksi/v_laporan_transaksi',$data);
        }
    }

    function lap_excel(){
    	header("Content-type=appalication/vnd.ms-excel");
        header("content-disposition:attachment;filename=Laporan Transaksi.xls");
        $data['transdetail']=  $this->m_transaksi->laporan_transaksi();
        $this->load->view('transaksi/v_lap_excel',$data);
    }

    function lap_pdf(){
    	$this->load->library('cfpdf');
    	$pdf=new FPDF('P','mm','A4');
    	//potrait, satuan ukuran, ukuran kertas
    	$pdf->AddPage(); //tambahkan halaman
        $pdf->SetFont('Arial','B','L'); //font, bold, align left
        $pdf->SetFontSize(14);//ukuran font
        $pdf->Text(10,10, 'LAPORAN TRANSAKSI');
        $pdf->SetFont('Arial','B','L');
        $pdf->SetFontSize(10);
        $pdf->Cell(10,10, '',1);
        $pdf->Cell(10, 7, 'No', 1,0);//tambah insert: widt, height, text, border.jika 1 maka ke bawah,0 ke samping
        $pdf->Cell(27, 7, 'Tanggal', 1,0);
        $pdf->Cell(30, 7, 'Operator', 1,0);
        $pdf->Cell(38, 7, 'Total Transaksi', 1,1);
        
        //tampilkan data dari DB
        $pdf->SetFont('Arial','','L');
        $data =  $this->m_transaksi->laporan_transaksi();
        $no=1;
        $total=0;
        foreach ($data->result() as $td)
        {
            $pdf->Cell(10, 7, $no, 1,0);
            $pdf->Cell(27, 7, $td->tgl_transaksi, 1,0);
            $pdf->Cell(30, 7, $td->nama_lengkap, 1,0);
            $pdf->Cell(38, 7, $td->total, 1,1);
            $no++;
            $total=$total+$td->total;
        }
        // end
        $pdf->Cell(67,7,'Total',1,0,'R');
        $pdf->Cell(38,7,$total,1,0);
        $pdf->Output();
    }

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */