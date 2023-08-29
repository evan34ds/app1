<?php

namespace App\Models;

use CodeIgniter\Model;
use Codeigniter\Database\BaseBuilder;

class ModelTutorial extends Model
{
    public function __construct()
    {
         $this->db = db_connect();
            
    }

    public function get()

    {
        $builder = $this->db->table('tbl_mhs');
        $query = $builder->get();    //     $query = $builder->get(2.0); maka datanya hanya 2 tyang muncul
        return $query;
    }
    public function get_compiled_select()
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->where('nama_mhs','SALDI PAERI');
        $query = $builder->getCompiledSelect();
        return $query;
    }

    public function select()

    {
        $builder = $this->db->table('tbl_mhs');
        $builder->select('nama_mhs, tgl_masuk');
        $query = $builder->get();   // $query = $builder->get(2.0); maka datanya hanya 2 tyang muncul
        return $query;
    }


    public function get_where()
    {
        $builder = $this->db->table('tbl_mhs');
        $query = $builder->getwhere(); //hanya memilih data saldi  contoh : $query = $builder->getwhere(['nama_mhs'=>'SALDI PAERI']);
        return $query;
    }

    public function select_max()

    {
        $builder = $this->db->table('tbl_mhs');
        $builder->selectMax('tgl_masuk'); // $builder->selectMax('tgl_masuk'); nilai tertinggi
        $query = $builder->get();   // $query = $builder->get(2.0); maka datanya hanya 2 tyang muncul
        return $query;
    }

    public function select_min()
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->selectMin('tgl_masuk');
        $query = $builder->get();
        return $query;
    }

    public function select_sum()
    {
        $builder = $this->db->table('tbl_krs');
        $builder->join('tbl_mhs', 'tbl_mhs.id_mhs =tbl_krs.id_mhs','left');
        $builder->join('tbl_jadwal', 'tbl_jadwal.id_jadwal =tbl_krs.id_jadwal','left');
        $builder->join('tbl_matkul', 'tbl_matkul.id_matkul =tbl_jadwal.id_matkul','left');
        $builder->join('tbl_ta', 'tbl_ta.id_ta =tbl_krs.id_ta','left');
        $builder->select('tbl_mhs.nim, nama_mhs, tbl_matkul.sks AS jumlah'); // 
        $builder->selectSum('sks');
        $builder->groupBy('nama_mhs');
        $query = $builder->get();
        return $query;
    }

    
    public function select_count()
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->selectCount('id_mhs');
        $query = $builder->get();
        return $query;
    }

    public function from()
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->select('nama');
        $builder->from('tbl_prodi');
        $query = $builder->getCompiledSelect();
        return $query;
    }
    public function join()
    {
        /**
         * SELECT video_games_sales.Name, video_games_genre.genre_name
         * FROM video_games_sales
         * LEFT JOIN video_games_genre ON video_games_sales.Genre = video_games_genre.id
         */
        $builder = $this->db->table('tbl_mhs');
        $builder->select('tbl_mhs.nama_mhs, tbl_prodi.prodi');
        $builder->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi','left');
        $query = $builder->get(10,0);
        return $query;
    }

    public function and_where()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Platform = 'PS3' AND Publisher = 'Ubisoft'
         */
        $builder = $this->db->table('tbl_mhs');
        $builder->where('nama_mhs', 'SALDI PAERI');
        $builder->where('tgl_masuk', '2017');
        $query = $builder->get();
        return $query;
    }
    public function custom_key()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Critic_score > 2019 (cara sqlx =>memncari angka lebih besar
         */
        $builder = $this->db->table('tbl_mhs');
        $builder->where('tgl_masuk >',2019);
        $query = $builder->get();
        return $query;
    }

    public function associative_array()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Platform = 'PS3' AND Publisher = 'Ubisoft' AND Critic_Score > 80
         */
        $builder = $this->db->table('tbl_mhs');
        $array = [
            'tgl_masuk' => '2017',               //Menampilkan tgl_masuk 2017
            'nama_mhs' => 'JEPRIANTO BAMBA',    //menampilkan nama JEPRIYANTO BAMBA
            'nim >' => 20171,                  //menampilan lebih dari 2017 
        ];
        $builder->where($array);
        $query = $builder->get();
        return $query;
    }

    public function custom_string()
    {
        $builder = $this->db->table('tbl_mhs');
        $where = "tgl_masuk='2017' AND nama_mhs='JEPRIANTO BAMBA' AND nim>2017";
        $builder->where($where);
        $query = $builder->get();
        return $query;
    }

    public function subqueries()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Critic_Score < (SELECT AVG(Critic_Score) FROM video_games_sales)
         * pengertian : menampilakn data kurang dari rata (hitung  rata2 bru kurnag dari rata2)
         */
        $builder = $this->db->table('tbl_mhs');
        $builder->where('tgl_masuk >', function(BaseBuilder $builder){
            return $builder->select('AVG(tgl_masuk)', false)->from('tbl_mhs');
        });
        $query = $builder->get();
        return $query;
    }

    public function or_where()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Genre = 1 OR Genre = 2
         */
        $builder = $this->db->table('tbl_mhs');
        $builder->where('tgl_masuk',2017);
        $builder->orWhere('tgl_masuk',2018);
        $query = $builder->get();
        return $query;
    }

    public function where_in()
    {
        /**
         * SELECT * FROM video_games_sales
         * WHERE Platform IN ('PS4','PS3')
         */
        $builder = $this->db->table('tbl_mhs');
        $tgl_masuk = ['2017','2018'];
        $builder->whereIn('tgl_masuk', $tgl_masuk);
        $query = $builder->get();
        return $query;
    }

    public function or_where_in()
        /**
         * menampilkan data id mhsnya 10,11,5,6
         */
    {
        $builder = $this->db->table('tbl_mhs');
        $id_mhs = [10,11,5,6];
        $builder->where('id_mhs',1);
        $builder->orWhereIn('id_mhs',$id_mhs);
        $query = $builder->get();
        return $query;
    }

    public function where_not_in()
       /**
         * menampilkan selain 2017, 2020 
         */
    {
        $builder = $this->db->table('tbl_mhs');
        $tgl_masuk = ['2017','2020'];
        $builder->whereNotIn('tgl_masuk', $tgl_masuk);
        $query = $builder->get();
        return $query;
    }

    public function or_where_not_in()
      /**
         * menampilkan selain 2017, 2020 
         */
    {
        $builder = $this->db->table('tbl_mhs');
        $tgl_masuk= ['2017','2018'];
        $builder->where('tgl_masuk', 'Activision');
        $builder->orWhereNotIn('tgl_masuk', $tgl_masuk);
        $query = $builder->get();
        return 
        $query;
    }

    public function like()
    {   
        /**
         * WHERE Name LIKE '%MARIO' AND Platform LIKE '%nes%'
         *  */          
        $builder = $this->db->table('tbl_mhs');
        $builder->like('Nama_mhs','JEPRIANTO BAMBA');
        $builder->like('tgl_masuk', '2017');
        $query = $builder->get();
        return $query;
    }

    public function associative_like()
    {
        $builder = $this->db->table('tbl_mhs');
        $array = [
            'nama_mhs' => 'JEPRIANTO BAMBA',
            'tgl_masuk' => '2017',
        ];
        $builder->like($array);
        $query = $builder->get();
        return $query;
    }

    public function or_like()
      /**
         * mencari data selain data di 2017 menampilkan namanya sma
         *  */  
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->like('nama_mhs', 'SALDI PAERI');
        $builder->orLike('tgl_masuk', '2017');
        $query = $builder->get();
        return $query;
    }

    public function not_like()
       /**
         * mencari data selain data di bawah
         *  */  
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->notLike('nama_mhs', 'SALDI PAERI');        
        $query = $builder->get();
        return $query;
    }

    public function or_not_like()
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->notLike('nama_mhs', 'SALDI PAERI');        
        $builder->orNotLike('tgl_masuk', '2017');
        $query = $builder->get();
        return $query;
    }

    public function group_by()

      /**
         * menghitung jumlah data misalnya agkatan 2017 jumlah datanya ada 2
         *  */ 
    {
        $builder = $this->db->table('tbl_mhs');
      //  $builder->select('tgl_masuk, COUNT("tgl_masuk") AS jumlah');    
        $builder->select('tgl_masuk, COUNT("tgl_masuk") AS jumlah');       
        $builder->groupBy('tgl_masuk');
        $query = $builder->get();
        return $query;
    }

    public function distinct()
    
      /**
         * menampilkan hanya 1 data wlaupun datanya ada 2 atau lebih 
         *  */ 
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->select('tgl_masuk');
        $builder->distinct();
        $query = $builder->get();
        return $query;
    }

    public function having()
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->select('tgl_masuk, AVG(nim)');
        $builder->where('nim >',20);
        $builder->groupBy('tgl_masuk');
        $builder->having(['AVG(tgl_masuk) >' => 20]);
        $query = $builder->get();
        return $query;
    }

    public function order_by()
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->orderBy('nama_mhs, tgl_masuk ASC');
        $query = $builder->get();
        return $query;
    }

    public function limit()
    {
        
        $builder = $this->db->table('tbl_mhs');
        $builder->orderBy('nama_mhs', 'ASC');
        $builder->limit();
        $query = $builder->get();
        return $query;
    }

    public function count_all_results()
    {
           /**
         * menghitng jumlah data sesuai id
         *  */ 

        $builder = $this->db->table('tbl_mhs');
        $builder->like('nama_mhs','SALDI PAERI');
        $builder->like('tgl_masuk', '2017');
        $query = $builder->countAllResults();
        return $query;
    }

    public function count_all()
         /**
         * menghitng jumlah data pada tabel
         *  */ 
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->like('nama_mhs','SALDI PAERI');
        $builder->like('tgl_masuk', '2017');
        $query = $builder->countAll();
        return $query;
    }

    public function getGamesYear()

    {
        $query= $this->db->query("SELECT * FROM tbl_mhs where tgl_masuk = '2017'");
        return $query;
    }

    public function group_by_sum()

    {
        $query= $this->db->query("SELECT (nim * tgl_masuk) revenue, nim, tgl_masuk from tbl_mhs");
        return $query;
    }

    public function group_by_sum_join()

    {
        $query= $this->db->query("SELECT prodi, sum(nim * tgl_masuk) total_revenue, prodi
        from tbl_prodi inner join tbl_mhs od using (id_prodi) 
        group by prodi");
        return $query;
    }
    public function group_by_sum_join1()

    {
        $query= $this->db->query("SELECT hari, sum(quota) total_revenue, hari
        from tbl_jadwal inner join tbl_matkul od using (id_matkul) 
        group by hari");                                   //menghitung jumlah sks berdasrakan hari
        return $query;
    }

    public function group_by_sum_join2()

    {
        $query= $this->db->query("SELECT id_mhs, sum(sks) total_revenue, id_mhs
        from tbl_krs inner join tbl_jadwal od using (id_jadwal) 
        group by id_mhs");                                   //menghitung jumlah sks berdasrakan hari
        return $query;
    }

    
    public function group_by_aktif1()

    {
        
        $query= $this->db->query("SELECT nama_mhs, sum(sks) sks
        from tbl_krs, inner join tbl_ta using (id_ta)
        inner join tbl_jadwal using (id_jadwal)
        inner join tbl_mhs od using (id_mhs)
        WHERE STATUS='1'
        group by id_mhs;");                                   //menghitung jumlah sks berdasrakan hari
        return $query;
    
    }

    public function group_by_aktif2()

    {
        $query= $this->db->query("SELECT
        i.id_mhs,
        i.nim,
        i.nama_mhs,
        a.prodi,
        SUM(sks) sks
    FROM
        tbl_krs AS u
    INNER JOIN tbl_ta USING(id_ta)
    INNER JOIN tbl_jadwal USING(id_jadwal)
    INNER JOIN tbl_mhs USING(id_mhs)
    INNER JOIN tbl_mhs AS i
    ON
        u.id_mhs = i.id_mhs
    INNER JOIN tbl_prodi AS a
    ON
        i.id_prodi = a.id_prodi
    WHERE
    STATUS
        = '1'
    GROUP BY
        id_mhs;");
        return $query;
    
    }

    public function menjumlahkan_sum()

    {
        $query= $this->db->query("SELECT
        h.nama_mhs,
        h.nim,
        i.jenjang,
        i.prodi,
        t.status,
        SUM(u.sks) Sks_semster,
        SUM(IF(STATUS LIKE 1%, u.sks, 0)) Total
    FROM
        tbl_krs AS k
    INNER JOIN tbl_mhs AS h
    ON
        k.id_mhs = h.id_mhs
    INNER JOIN tbl_prodi AS i
    ON
        i.id_prodi = h.id_prodi
    INNER JOIN tbl_jadwal AS j
    ON
        k.id_jadwal = j.id_jadwal
    INNER JOIN tbl_matkul AS u
    ON
        j.id_matkul = u.id_matkul
    INNER JOIN tbl_ta AS t
    ON
        k.id_ta = t.id_ta
        
    
    GROUP BY
        k.id_mhs;");
        return $query;
    
    }
    public function nilai()

    {
        $query= $this->db->query("SELECT hari, sum(quota) total_revenue, hari
        from tbl_jadwal inner join tbl_matkul od using (id_matkul) 
        group by hari");                                   //menghitung jumlah sks berdasrakan hari
        return $query;
    }

    public function admin_khs($id_mhs)
    {
        $builder = $this->db->table('tbl_krs');
        $builder->select('tbl_matkul.matkul, tbl_krs.nilai,  tbl_range_nilai.nilai_index');
        $builder->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs','left');
        $builder->join('tbl_jadwal', 'tbl_jadwal.id_jadwal = tbl_krs.id_jadwal','left');
        $builder->join('tbl_matkul', 'tbl_matkul.id_matkul = tbl_jadwal.id_matkul','left');
        $builder->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi','left');
        $builder->join('tbl_range_nilai', 'tbl_range_nilai.id_prodi =tbl_mhs.id_prodi','left');
        $builder->join('tbl_ta', 'tbl_ta.id_ta =tbl_krs.id_ta','inner');
        $builder->where('tbl_mhs.id_mhs', $id_mhs);
        $builder->WHERE ('tbl_krs.nilai BETWEEN tbl_range_nilai.bobot_minimum AND tbl_range_nilai.bobot_maksimum');
        $query = $builder->get();
        return $query;
    }
    public function chart_mhs_prodi($id_mhs)
    {
        $builder = $this->db->table('tbl_mhs');
        $builder->select('ttbl_mhs.nama_mhs');
        $builder->join('tbl_mhs', 'tbl_mhs.id_mhs = tbl_krs.id_mhs','left');
        $builder->join('tbl_prodi', 'tbl_prodi.id_prodi =tbl_mhs.id_prodi','left');
        $builder->where('tbl_mhs.id_mhs', $id_mhs);
        $builder->WHERE ('tbl_krs.nilai BETWEEN tbl_range_nilai.bobot_minimum AND tbl_range_nilai.bobot_maksimum');
        $query = $builder->get();
        return $query;
    }


    public function jumlah_prodi()
    {
        $builder = $this->db->table('tbl_mhs');
    //  $builder->select('tgl_masuk, COUNT("tgl_masuk") AS jumlah');    
        $builder->select('tbl_prodi.prodi, COUNT("id_prodi") AS jumlah');   
        $builder->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_mhs.id_prodi','left');
        $builder->groupBy('tbl_prodi.id_prodi');
        $query = $builder->get();
        return $query;
    }


    

}
