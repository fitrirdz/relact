<?php

require_once APPPATH . 'controllers/Teacher/Base.php';

class Soal extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Guru/SoalModel', 'Soal');
        $this->load->model('KelasModel');
    }

    /**
     * getSoal by Kode Materi
     * 
     * @param kode_materi
     */
    public function getSoal($kode_materi)
    {
        $data['soal'] = $this->Soal->getSoalByKodeMateri($kode_materi);
        $uri_kelas = $this->uri->uri_to_assoc(2);
        $kelas = $this->KelasModel->getKelasByKode($uri_kelas['kelas']);
        $materi = $this->KelasModel->getMateriByKode($uri_kelas['materi']);
        $this->breadcrumb->push('Guru', '/guru');
        $this->breadcrumb->push('Kelas', '/guru/kelas');
        $this->breadcrumb->push($kelas['mapel'], '/guru/kelas/' . $uri_kelas['kelas']);
        $this->breadcrumb->push($materi['judul'], '/guru/kelas/' . $uri_kelas['kelas'] . '/materi/' . $uri_kelas['materi']);
        $this->breadcrumb->push("Daftar Soal", "#");
        $this->load->view('guru/soal', $data);
    }

    /**
     * add new Soal
     * 
     * @param kode_materi $kode_materi
     * @return boolean
     */
    public function addSoal($kode_materi)
    {
        $data_post = array(
            'materi_kode' => $this->input->post('kodeMateri'),
            'tipe' => $this->input->post('tipeSoal'),
            'pertanyaan' => $this->input->post('pertanyaan'),
            'bobot' => $this->input->post('bobotSoal'),
            'sub_id' => $this->input->post('subMateri')
        );

        $this->Soal->addSoal($data_post);
        redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * save pilihan jawaban
     * 
     * @param soal_id
     * @return boolean
     */
    public function savePilihanJawaban($soal_id)
    {
        $data = $this->input->post();
        $this->Soal->savePilihanJawabanBySoalId($soal_id, $data);
        $this->editSoal($soal_id, $data['pertanyaan']);
        redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * edit soal
     * 
     * @param soal_id
     * @param pertanyaan
     */
    public function editSoal($soal_id, $pertanyaan = null)
    {
        if (!$pertanyaan) {
            $pertanyaan = $this->input->post('pertanyaan');
        }

        if ($this->Soal->updateSoal($soal_id, $pertanyaan)) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * hapus Soal
     * 
     * @param soal_id
     * @return boolean
     */
    public function deleteSoal($soal_id)
    {
        if ($this->Soal->deleteSoal($soal_id)) {
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * get Saol by Id as JSON
     * 
     * @param saal_id
     * @return json
     */
    public function getSoalJson($soal_id)
    {
        $data = $this->Soal->getSoalById($soal_id);
        echo json_encode($data);
    }

    /**
     * get Pilihan jawaban by soal Id as JSON
     * 
     * @param soal_id
     * @return json
     */
    public function getPilihanJawabanBySoalId($soal_id)
    {
        echo json_encode($this->Soal->getPilihanJawabanBySoalId($soal_id));
    }

    /**
     * delete pilihan soal by pilihan id
     * 
     * @param pilihan_id
     * @return
     */
    public function deletePilihan($pilihan_id)
    {
        if ($this->Soal->deletePilihanSoal($pilihan_id)) {
            echo json_encode(['status' => 'OK']);
        } else {
            echo json_encode(['status' => 'KO']);
        }
    }
}
