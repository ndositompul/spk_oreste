<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Perhitungan extends CI_Controller {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->library('pagination');
            $this->load->library('form_validation');
            $this->load->model('Perhitungan_model');
        }

        public function index()
        {
            if ($this->session->userdata('id_user_level') != "1") {
            ?>
				<script type="text/javascript">
                    alert('Anda tidak berhak mengakses halaman ini!');
                    window.location='<?php echo base_url("Login/home"); ?>'
                </script>
            <?php
			}
			if (isset($_POST['nilai'])) {
				$this->Perhitungan_model->hapus_r();
				$data = [
                    'nilai' => $this->input->post('nilai')
                ];
                
                $this->form_validation->set_rules('nilai', 'Nilai', 'required');               
    
                if ($this->form_validation->run() != false) {
                    $result = $this->Perhitungan_model->insert_r($data);
                    if ($result) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan!</div>');
						redirect('Perhitungan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data nilai kososng!</div>');
                    redirect('Perhitungan');
                    
                }
			}
			
			$kriteria = $this->Perhitungan_model->get_kriteria();
            $alternatif = $this->Perhitungan_model->get_alternatif();
			$this->Perhitungan_model->hapus_matriks_x();
			foreach ($alternatif as $keys){
				foreach ($kriteria as $key){
					$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
					$matriks_x = [
						'id_alternatif' => $keys->id_alternatif,
						'id_kriteria' => $key->id_kriteria,
						'nilai' => $data_pencocokan['nilai']
					];
					$this->Perhitungan_model->insert_matriks_x($matriks_x);
				}
			}
			$this->Perhitungan_model->hapus_matriks_x_rank();
			foreach ($kriteria as $key){
				$no=1;
				$data_x = $this->Perhitungan_model->data_x($key->id_kriteria);
				foreach ($data_x as $keys){
					$matriks_x_rank = [
						'id_alternatif' => $keys->id_alternatif,
						'id_kriteria' => $key->id_kriteria,
						'nilai' => $keys->nilai,
						'rank' => $no
					];
					$this->Perhitungan_model->insert_matriks_x_rank($matriks_x_rank);
				$no++;
				}
			}
			$this->Perhitungan_model->hapus_matriks_x_hasil();
			foreach ($kriteria as $key){
				$data_x = $this->Perhitungan_model->data_x($key->id_kriteria);
				foreach ($data_x as $keys){
					$a = $this->Perhitungan_model->get_a($key->id_kriteria);
					foreach ($a as $as){
						if($as->nilai==$keys->nilai) {
							$d = $this->Perhitungan_model->get_d($key->id_kriteria,$keys->nilai);
							$t_r = 0;
							foreach ($d as $ds){
								$t_r += $ds->rank;
							}
							$rank = $t_r/$as->jml;
						}
					}
					$matriks_x_hasil = [
						'id_alternatif' => $keys->id_alternatif,
						'id_kriteria' => $key->id_kriteria,
						'nilai' => $keys->nilai,
						'rank' => $rank
					];
					$this->Perhitungan_model->insert_matriks_x_hasil($matriks_x_hasil);
				}
			}
			
			$data = [
                'page' => "Perhitungan",
				'nilai_r'=> $this->Perhitungan_model->get_r(),
                'kriteria'=> $this->Perhitungan_model->get_kriteria(),
                'alternatif'=> $this->Perhitungan_model->get_alternatif(),
				'hasil'=> $this->Perhitungan_model->get_hasil(),
            ];
			
            $this->load->view('Perhitungan/perhitungan', $data);
        }
		
		public function hasil()
        {
            $data = [
                'page' => "Hasil",
				'hasil'=> $this->Perhitungan_model->get_hasil()
            ];
			
            $this->load->view('Perhitungan/hasil', $data);
        }
    
    }
    
    