<?php

namespace App\Controllers;
use App\Models\ModelTa;
use App\Models\ModelProdi;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;
use App\Models\ModelKrs;
use App\Models\ModelAdmin;
use App\Models\ModelDsn;
use App\Models\ModelMahasiswa;
use App\Models\ModelStatus;
use App\Models\ModelTutorial;


class Tutorial extends BaseController
{

	public function __construct()
	{
		helper('form');
		$this->ModelTa = new ModelTa();
		$this->ModelProdi = new ModelProdi();
		$this->ModelAdmin = new ModelAdmin();
		$this->ModelDosen = new ModelDosen();
		$this->ModelRuangan = new ModelRuangan();
		$this->ModelKrs = new ModelKrs();
		$this->ModelDsn = new ModelDsn();
		$this->ModelMahasiswa = new ModelMahasiswa();
		$this->ModelStatus = new ModelStatus();
	}

	public function test_get()
	{
		$model= new ModelTutorial;
		$all_data= $model->get();
		foreach ($all_data->getResult() as $key=>$row)
		{
			echo ($key+1).'.';
			echo $row->nama_mhs;
			echo '<br>';
		}
	}

	public function test_get_compiled_select()
	{
        $model= new ModelTutorial;
		$all_data= $model->get_compiled_select;
		echo $all_data;

	}

	public function test_get_where()
	{
        $model= new ModelTutorial;
		$data= $model->get_where();
		foreach ($data->getResult() as $key=>$row)
		{
			echo ($key+1).'.';
			echo $row->nama_mhs;
			echo ' -';
			echo $row->tgl_masuk;
			echo '<br>';
		}
	}

	public function test_select()
	{
        $model= new ModelTutorial;
		$data= $model->select();
		print_r($data->getResult());
	}

	public function test_max()
	{
        $model= new ModelTutorial;
		$data= $model->select_max();
		print_r($data->getResult());
	}

	public function test_min()
	{
        $model= new ModelTutorial;
		$data = $model->select_min();
		print_r($data->getResult());
	}

	public function test_sum()
	{
        $model= new ModelTutorial;
		$data = $model->select_sum();
		foreach($data->getResult() as $row){
			print_r($row->nama_mhs);echo " | ";
			print_r($row->nim);echo " | ";
			print_r($row->jumlah);echo " | ";
			print_r($row->sks);echo " | ";
			print_r($row->jumlah_data);echo " | ";
			echo '<hr><br>';
		}
	}

	public function test_count()
	{
        $model= new ModelTutorial;
		$data = $model->select_count();
		print_r($data->getResult());
	}

	public function test_from()
	{
        $model= new ModelTutorial;
		$data = $model->from();
		print_r($data);
	}

	public function test_join()
	{
        $model= new ModelTutorial;
		$data = $model->join();
		print_r($data->getResult());
	}

	public function test_and_where()
	{
        $model= new ModelTutorial;
		$data = $model->and_where();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function custom_key()
	{
        $model= new ModelTutorial;
		$data = $model->custom_key();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function test_associative_array()
	{
        $model= new ModelTutorial;
		$data = $model->associative_array();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}
	public function test_custom_string()
	{
        $model= new ModelTutorial;
		$data = $model->custom_string();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function test_subqueries()
	{
		$model= new ModelTutorial;
		$data = $model->subqueries();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function test_or_where()
	{		
        $model= new ModelTutorial;
		$data = $model->or_where();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function where_in()
	{
        $model= new ModelTutorial;
		$data = $model->where_in();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function or_where_in()
	{
        $model= new ModelTutorial;
		$data = $model->or_where_in();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function where_not_in()
	{
		$model= new ModelTutorial;
		$data = $model->where_not_in();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function or_where_not_in()
	{
		$model = new ModelTutorial;
		$data = $model->or_where_not_in();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}
	//--------------------------------------------------------------------

    public function like()
	{
		$model = new ModelTutorial;
		$data = $model->like();
		foreach($data->getResult() as $row){
			print_r($row->nama_mhs);echo " | ";
			print_r($row->tgl_masuk);
			echo '<hr><br>';
		}
	}

	public function associative_like()
	{
		$model = new ModelTutorial;
		$data = $model->associative_like();
		foreach($data->getResult() as $row){
			print_r($row->nama_mhs);echo " | ";
			print_r($row->tgl_masuk);
			echo '<hr><br>';
		}
	}

	public function or_like()
	{
		$model = new ModelTutorial;
		$data = $model->or_like();
		foreach($data->getResult() as $row){
			print_r($row->nama_mhs);echo " | ";
			print_r($row->tgl_masuk);
			echo '<hr><br>';
		}
	}

	public function not_like()
	{
		$model = new ModelTutorial;
		$data = $model->not_like();
		foreach($data->getResult() as $row){
			print_r($row->nama_mhs);echo " | ";
			print_r($row->tgl_masuk);
			echo '<hr><br>';
		}
	}

	public function or_not_like()
	{
		$model = new ModelTutorial;
		$data = $model->or_not_like();
		foreach($data->getResult() as $row){
			print_r($row->nama_mhs);echo " | ";
			print_r($row->tgl_masuk);
			echo '<hr><br>';
		}
	}
	
	public function group_by()
	{
		$model = new ModelTutorial;
		$data = $model->group_by();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function distinct()
	{
		$model = new ModelTutorial;
		$data = $model->distinct();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function having()
	{
		$model = new ModelTutorial;
		$data = $model->having();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

	public function order_by()
	{
		$model = new ModelTutorial;
		$data = $model->order_by();
		foreach($data->getResult() as $row){
			print_r($row->nama_mhs);echo " | ";
			print_r($row->tgl_masuk);
			echo '<hr><br>';
		}
	}

	public function limit()
	{
		$model = new ModelTutorial;
		$data = $model->limit();
		foreach($data->getResult() as $row){
			print_r($row->nama_mhs);echo " | ";
			print_r($row->tgl_masuk);
			echo '<hr><br>';
		}
	}

	public function count_all_results()
	{
		$model = new ModelTutorial;
		$data = $model->count_all_results();
		print_r($data);
	}

	public function count_all()
	{
		$model = new ModelTutorial;
		$data = $model->count_all();
		print_r($data);
	}

	public function getGamesYear()
	{
		$model = new ModelTutorial;
		$all_data = $model->getGamesYear();
		foreach ($all_data->getResult() as $game){
			echo $game->tgl_masuk;
			echo '<br>';
		}
	}
	
	public function group_by_sum()
	{
		$model = new ModelTutorial;
		$all_data = $model->group_by_sum();
		foreach ($all_data->getResult() as $game){
			echo " Perkalian baris ";
			echo $game->nim; echo " | ";
			echo " * ";  echo " | ";
			echo $game->tgl_masuk; echo " | ";
			echo " = ";  echo " | ";
			echo $game->revenue;
			echo '<br>';
		}
	}

	public function group_by_sum_join()
	{
		$model = new ModelTutorial;
		$all_data = $model->group_by_sum_join();
		foreach ($all_data->getResult() as $game){
			echo $game->prodi;echo " | ";
			echo $game->total_revenue;
	
			echo '<br>';
		}
	}
	public function group_by_sum_join1()
	{
		$model = new ModelTutorial;
		$all_data = $model->group_by_sum_join1();
		foreach ($all_data->getResult() as $game){
			echo $game->total_revenue; //menghitung jumlah sks berdasrakan hari
			;echo " SKS => untuk hari => ";
			echo $game->hari;
	
			echo '<br>';
		}
	}

	public function group_by_sum_join2()
	{
		
		$model = new ModelTutorial;
		$all_data = $model->group_by_sum_join2();
		foreach ($all_data->getResult() as $game){
			echo $game->total_revenue; //menghitung jumlah sks berdasrakan hari
						;echo " SKS => untuk mahsiswa => ";
			echo $game->id_mhs;
			echo '<br>';
		}
	}
	public function group_by_aktif()
	{
		
		$model = new ModelTutorial;
		$all_data = $model->group_by_aktif();
		foreach ($all_data->getResult() as $game){
			echo $game->sks; //menghitung jumlah sks berdasrakan hari
						;echo " SKS => untuk mahsiswa => ";
			echo $game->nama_mhs;
			echo '<br>';
		}
	}

	public function daftar_mhs_khs()
	{
		$data = array(
			'title' => 'Kartu Hasil Studi Mahasiswa',
			'mhs'   => $this->ModelMahasiswa->allData(),
			'isi'   => 'admin/mahasiswa/v_admin_khs_mhs'
		);
		return view('layout/v_wrapper', $data);
	}

	public function admin_khs_mhs($id_mhs)
	{
		$model = new ModelTutorial;
		$all_data = $model->admin_khs($id_mhs);
		foreach ($all_data->getResult() as $game){
			echo $game->matkul; //menghitung jumlah sks berdasrakan hari
			;echo " || ";
			echo $game->nilai;
			;echo " || ";
			echo $game->nilai_index;
	
			echo '<br>';
		}
	}

	public function chart_mhs_prodi($id_mhs)
	{
		$model = new ModelTutorial;
		$all_data = $model->admin_khs($id_mhs);
		foreach ($all_data->getResult() as $game){
			echo $game->matkul; //menghitung jumlah sks berdasrakan hari
			;echo " || ";
			echo $game->nilai;
			;echo " || ";
			echo $game->nilai_index;
	
			echo '<br>';
		}
	}

	public function jumlah_prodi()
	{
		$model = new ModelTutorial;
		$data = $model->jumlah_prodi();
		foreach($data->getResult() as $row){
			print_r($row);
			echo '<hr><br>';
		}
	}

}
