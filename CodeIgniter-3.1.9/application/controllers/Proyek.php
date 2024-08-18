<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB $db
 * @property CI_Loader $load
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Session $session
 */

class Proyek extends CI_Controller {

    public function index() {
        // Menampilkan semua proyek dan lokasi
        $apiUrl = "http://localhost:8080/proyek";
        $response = file_get_contents($apiUrl);
        $data['proyek'] = json_decode($response, true);
        $apiUrlLokasi = "http://localhost:8080/lokasi";
        $responseLokasi = file_get_contents($apiUrlLokasi);
        $data['lokasi'] = json_decode($responseLokasi, true);
        $this->load->helper('url');
        $this->load->view('proyek_list', $data);
    }

    public function tambahLokasi() {
        // Menampilkan form input lokasi baru
        $this->load->helper('url');
        $this->load->view('input_lokasi');
    }

    public function simpanLokasi() {
        // Proses input lokasi baru ke API
        $data = array(
            'namaLokasi' => $this->input->post('nama')
        );
        $jsonData = json_encode($data);

        $ch = curl_init("http://localhost:8080/lokasi");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        $this->index();
    }

    public function editLokasi($id) {
        // Menampilkan form edit lokasi
        $apiUrl = "http://localhost:8080/lokasi";
        $response = file_get_contents($apiUrl);
        $data['lokasi'] = json_decode($response, true);

        foreach ($data['lokasi'] as $key => $value) {
            if ($value['id']==$id) {
                $data['lokasi']=$value;
                break;
            }
        }

        $this->load->helper('url');
        $this->load->view('edit_lokasi', $data);
    }

    public function updateLokasi($id) {
        // Proses update lokasi ke API
        $data = array(
            'namaLokasi' => $this->input->post('nama')
        );
        $jsonData = json_encode($data);

        $ch = curl_init("http://localhost:8080/lokasi/".$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        $this->index();
    }

    public function hapusLokasi($id) {
        // Proses hapus lokasi ke API
        $ch = curl_init("http://localhost:8080/lokasi/".$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $response = curl_exec($ch);
        curl_close($ch);
        
        $this->index();
    }

    public function tambahProyek() {
        // Menampilkan form input proyek baru
        $this->load->helper('url');
        $this->load->view('input_proyek');
    }

    public function simpanProyek() {
        // Proses input proyek baru ke API
        $data = array(
            'namaProyek' => $this->input->post('nama'),
            'lokasi' => array(
                'id' => $this->input->post('lokasi_id')
            )
        );
        $jsonData = json_encode($data);

        $ch = curl_init("http://localhost:8080/proyek");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        $this->index();
    }

    public function editProyek($id) {
        // Menampilkan form edit proyek
        $apiUrl = "http://localhost:8080/proyek";
        $response = file_get_contents($apiUrl);
        $data['proyek'] = json_decode($response, true);

        foreach ($data['proyek'] as $key => $value) {
            if ($value['id']==$id) {
                $data['proyek']=$value;
                break;
            }
        }

        $this->load->helper('url');
        $this->load->view('edit_proyek', $data);
    }

    public function updateProyek($id) {
        // Proses update proyek ke API
        $data = array(
            'namaProyek' => $this->input->post('nama'),
            'lokasi' => array(
                'id' => $this->input->post('lokasi_id')
            )
        );
        $jsonData = json_encode($data);

        $ch = curl_init("http://localhost:8080/proyek/".$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $response = curl_exec($ch);
        curl_close($ch);

        $this->index();
    }

    public function hapusProyek($id) {
        // Proses hapus proyek ke API
        $ch = curl_init("http://localhost:8080/proyek/".$id);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $response = curl_exec($ch);
        curl_close($ch);

        $this->index();
    }
}
