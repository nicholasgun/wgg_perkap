<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HistoryModel;
use App\Models\PanitiaModel;
use CodeIgniter\HTTP\Response;

class DataPanitia extends BaseController
{
    private PanitiaModel $panitiaModel;

    public function __construct()
    {
        $this->panitiaModel = new PanitiaModel();
    }

    public function index()
    {
        $data['panitia'] = $this->panitiaModel
            ->select("ROW_NUMBER() OVER(ORDER BY id) as row_num, nama, nrp, divisi")
            ->findAll();
        return view('data_panitia', $data);
    }

    public function syncBPHK()
    {
        $url = getenv('openrec.apiURL') . '/bphk-get/' . getenv('openrec.apiKey');
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url, [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        $body = ['isSuccess' => false, 'message' => ''];
        if ($res->getStatusCode() != Response::HTTP_OK) {
            $body['message'] = 'Gagal merequest data panitia';
            return redirect()->back()
                ->with('response', $body);
        }

        $committees = json_decode($res->getBody(), true);

        $this->panitiaModel->db->transStart();
        foreach ($committees as $committee) {
            $email = $committee['email'];
            $nrpLength = 9;
            $nrp = substr($email, 0, $nrpLength);
            $storedCommittee = $this->panitiaModel->where('nrp', $nrp)->first();

            if ($storedCommittee) {
                $this->panitiaModel->update($storedCommittee['id'], [
                    'nama' => $committee['name'],
                    'divisi' => $committee['division']['name']
                ]);
            } else {
                $this->panitiaModel->insert([
                    'nama' => $committee['name'],
                    'nrp' => $nrp,
                    'divisi' => $committee['division']['name']
                ]);
            }
        }
        $this->panitiaModel->db->transComplete();

        if ($this->panitiaModel->db->transStatus() === false) {
            $body['message'] = 'Gagal mengupdate data panitia';
            return redirect()->back()
                ->with('response', $body);
        }
        $body['isSuccess'] = true;
        $body['message'] = 'Berhasil mengupdate data panitia';
        return redirect()->back()
            ->with('response', $body);
    }

    public function syncAnggota()
    {
        $url = getenv('openrec.apiURL') . '/panitia-get/' . getenv('openrec.apiKey');
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url, [
            'headers' => [
                'Accept' => 'application/json',
            ]
        ]);

        $body = ['isSuccess' => false, 'message' => ''];
        if ($res->getStatusCode() != Response::HTTP_OK) {
            $body['message'] = 'Gagal merequest data panitia';
            return redirect()->back()
                ->with('response', $body);
        }

        $committees = json_decode($res->getBody(), true);

        $this->panitiaModel->db->transStart();
        foreach ($committees as $committee) {
            $email = $committee['email'];
            $nrpLength = 9;
            $nrp = substr($email, 0, $nrpLength);
            $storedCommittee = $this->panitiaModel->where('nrp', $nrp)->first();

            if ($storedCommittee) {
                $this->panitiaModel->update($storedCommittee['id'], [
                    'nama' => $committee['name'],
                    'divisi' => $committee['division_accepted']['name']
                ]);
            } else {
                $this->panitiaModel->insert([
                    'nama' => $committee['name'],
                    'nrp' => $nrp,
                    'divisi' => $committee['division_accepted']['name']
                ]);
            }
        }
        $this->panitiaModel->db->transComplete();

        if ($this->panitiaModel->db->transStatus() === false) {
            $body['message'] = 'Gagal mengupdate data panitia';
            return redirect()->back()
                ->with('response', $body);
        }
        $body['isSuccess'] = true;
        $body['message'] = 'Berhasil mengupdate data panitia';
        return redirect()->back()
            ->with('response', $body);
    }

    public function syncCommittees()
    {
        $url = getenv('admin.apiURL') . '/committees';
        $client = new \GuzzleHttp\Client();
        $res = $client->get($url, [
            'headers' => [
                'X-Perkap-Secret' => getenv('admin.perkapSecret'),
            ]
        ]);

        $body = ['isSuccess' => false, 'message' => ''];
        if ($res->getStatusCode() != Response::HTTP_OK) {
            $body['message'] = 'Gagal merequest data panitia';
            return redirect()->back()
                ->with('response', $body);
        }

        $resBody = json_decode($res->getBody(), true);
        $committees = $resBody['data'];

        $this->panitiaModel->db->transStart();
        $this->panitiaModel
            ->where('id >', 0)
            ->delete();
        foreach ($committees as $committee) {
            $email = $committee['email'];
            $nrpLength = 9;
            $nrp = strtoupper(substr($email, 0, $nrpLength));
            $storedCommittee = $this->panitiaModel
                ->withDeleted()
                ->where('nrp', $nrp)
                ->first();

            if ($storedCommittee) {
                $this->panitiaModel
                    ->withDeleted()
                    ->update($storedCommittee['id'], [
                        'nama' => $committee['name'],
                        'divisi' => $committee['division']['name'],
                        'deleted_at' => null,
                    ]);
            } else {
                $this->panitiaModel->insert([
                    'nama' => $committee['name'],
                    'nrp' => $nrp,
                    'divisi' => $committee['division']['name']
                ]);
            }
        }
        $this->panitiaModel->db->transComplete();
        $body['isSuccess'] = true;
        $body['message'] = 'Berhasil mengupdate data panitia';
        return redirect()->back()
            ->with('response', $body);
    }
}
