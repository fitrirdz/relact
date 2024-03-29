<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'controllers/Student/Base.php';

class Soal extends Base
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa/SoalModel', 'Soal');
    }

    /**
     * show soal by kode materi and user_id
     * 
     * @param kode
     * @return view
     */
    public function showSoal($kode)
    {
        $encoded_kode = base64_decode(urldecode($kode));
        $exploded = explode('.', $encoded_kode);
        $kode_materi = $exploded[0];
        $user_id = $exploded[1];

        $soal['pg'] = json_encode($this->Soal->getSoalPGRandom($kode_materi));
        $soal['esai'] = json_encode($this->Soal->getSoalEsaiRandom($kode_materi));
        $data['soal'] = $soal;

        $this->load->view('siswa/soal', $data);
    }

    /**
     * get soal by kode_materi and user_id using ajax
     * 
     * @param kode_materi
     * @param user_id
     * @return json_encode
     */
    public function getSoalAPI($kode)
    {
        $encoded_kode = base64_decode(urldecode($kode));
        $exploded = explode('.', $encoded_kode);
        $kode_materi = $exploded[0];
        $user_id = $exploded[1];

        $soal['pg'] = $this->Soal->getSoalPGRandom($kode_materi);
        $soal['esai'] = $this->Soal->getSoalEsaiRandom($kode_materi);

        // $data = $this->session->userdata('soal_for_'. $user_id);
        header('Content-Type: application/json');
        echo json_encode($soal);
    }

    /**
     * save soal and jawaban to session
     * 
     * @param user_id
     */
    public function saveSoalAPI($user_id)
    {
        $data = $this->input->post('soal');
        $this->session->set_userdata('soal_for_' . $user_id, $data);

        // TODO: check if timestamp is more than 10 minutes, when pass then push to database
        // gonna try to save to database, need improvement
        // ! dumped
    }

    /**
     * check timestamp
     * 
     * @return timestmap
     */
    public function checkTimestamp()
    {
        header('Content-Type: application/json');
        echo json_encode(['timestamp' => $this->session->userdata('timestamp_jawaban')]);
    }

    /**
     * save jawaban if timestamp is different and set session of timestamp to new
     * 
     * @return boolean
     */
    public function saveJawaban()
    {
        header('Content-Type: application/json');
        $jawaban = json_decode($this->input->post('jawaban'));
        $jawaban_esai = json_decode($this->input->post('jawaban_esai'));
        $timestamp = $this->input->post('timestamp');
        $user_id = $this->session->userdata('user_id');
        $this->session->set_userdata('timestamp_jawaban', $timestamp);

        if ($jawaban) {
            foreach ($jawaban as $jawab) {
                $this->Soal->saveJawabanUser($user_id, $jawab->soal_id, $jawab->pilihan_soal_id);
            }
        }

        if ($jawaban_esai) {
            foreach ($jawaban_esai as $jawab) {
                $this->Soal->saveJawabanEsai($user_id, $jawab->soal_id, $jawab->jawaban);
            }
        }


        echo json_encode(['jawaban' => $jawaban, 'timestamp' => $timestamp]);
    }

    /**
     * save jawaban and generate nilai, executed using button selesai or timeout
     * 
     * @return redirect
     */
    public function selesai($kode)
    {
        $encoded_kode = base64_decode(urldecode($kode));
        $exploded = explode('.', $encoded_kode);
        $kode_materi = $exploded[0];

        $jawaban = json_decode($this->input->post('jawaban'));
        $jawaban_esai = json_decode($this->input->post('jawaban_esai'));
        $timestamp = $this->input->post('timestamp');
        $user_id = $this->session->userdata('user_id');

        if ($jawaban) {
            foreach ($jawaban as $jawab) {
                $this->Soal->saveJawabanUser($user_id, $jawab->soal_id, $jawab->pilihan_soal_id);
            }
        }

        if ($jawaban_esai) {
            foreach ($jawaban_esai as $jawab) {
                $this->Soal->saveJawabanEsai($user_id, $jawab->soal_id, $jawab->jawaban);
            }
        }

        $soal = $this->Soal->calculateNilaiByPG($user_id, $kode_materi);

        // $this->session->set_flashdata('alert', "Jawaban berhasil disimpan.");
        // redirect(site_url('siswa'));
        if ($soal) {
            // redirect(site_url('siswa'));
            echo json_encode(['status' => "OK", 'skor' => $soal]);
        } else {
            echo json_encode(['status' => "KO"]);
        }
    }
}
