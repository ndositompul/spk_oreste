<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan_model extends CI_Model {
       
        public function get_kriteria()
        {
            $query = $this->db->get('kriteria');
            return $query->result();
        }
        public function get_alternatif()
        {
            $query = $this->db->get('alternatif');
            return $query->result();
        }
		
		public function data_nilai($id_alternatif,$id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM penilaian JOIN sub_kriteria WHERE penilaian.nilai=sub_kriteria.id_sub_kriteria AND penilaian.id_alternatif='$id_alternatif' AND penilaian.id_kriteria='$id_kriteria';");
			return $query->row_array();
		}
		
		public function data_rank($id_alternatif,$id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM matriks_x_hasil WHERE id_alternatif='$id_alternatif' AND id_kriteria='$id_kriteria';");
			return $query->row_array();
		}
		
		public function data_x($id_kriteria)
		{
			$query = $this->db->query("SELECT * FROM alternatif JOIN matriks_x ON alternatif.id_alternatif=matriks_x.id_alternatif WHERE matriks_x.id_kriteria='$id_kriteria' ORDER BY matriks_x.nilai DESC;");
			return $query->result();
		}
		
		public function get_hasil()
        {
			$query = $this->db->query("SELECT * FROM hasil ORDER BY nilai ASC;");
            return $query->result();
        }
		
		public function get_hasil_alternatif($id_alternatif)
		{
			$query = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif='$id_alternatif';");
			return $query->row_array();		
		}
		
		public function get_a($id_kriteria)
		{
			$query = $this->db->query("SELECT nilai, COUNT(nilai) as jml FROM matriks_x WHERE id_kriteria='$id_kriteria' GROUP BY nilai");
			return $query->result();		
		}
		
		public function get_d($id_kriteria,$nilai)
		{
			$query = $this->db->query("SELECT * FROM matriks_x_rank WHERE id_kriteria='$id_kriteria' AND nilai='$nilai'");
			return $query->result();		
		}
		
		public function insert_hasil($hasil_akhir = [])
        {
            $result = $this->db->insert('hasil', $hasil_akhir);
            return $result;
        }
		
		public function hapus_hasil()
        {
            $query = $this->db->query("TRUNCATE TABLE hasil;");
			return $query;
        }
		
		public function insert_matriks_x($matriks_x = [])
        {
            $result = $this->db->insert('matriks_x', $matriks_x);
            return $result;
        }
		
		public function hapus_matriks_x()
        {
            $query = $this->db->query("TRUNCATE TABLE matriks_x;");
			return $query;
        }
		
		public function insert_matriks_x_rank($matriks_x_rank = [])
        {
            $result = $this->db->insert('matriks_x_rank', $matriks_x_rank);
            return $result;
        }
		
		public function hapus_matriks_x_rank()
        {
            $query = $this->db->query("TRUNCATE TABLE matriks_x_rank;");
			return $query;
        }
		
		public function insert_matriks_x_hasil($matriks_x_hasil = [])
        {
            $result = $this->db->insert('matriks_x_hasil', $matriks_x_hasil);
            return $result;
        }
		
		public function hapus_matriks_x_hasil()
        {
            $query = $this->db->query("TRUNCATE TABLE matriks_x_hasil;");
			return $query;
        }
		
		public function get_r()
		{
			$query = $this->db->query("SELECT * FROM nilai_r WHERE id_nilai_r='1';");
			return $query->row();
		}
		
		public function insert_r($data = [])
        {
            $result = $this->db->insert('nilai_r', $data);
            return $result;
        }
		
		public function hapus_r()
        {
            $query = $this->db->query("TRUNCATE TABLE nilai_r;");
			return $query;
        }
    }
    