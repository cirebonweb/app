<?php

namespace App\Controllers;

use CodeIgniter\Shield\Authorization\Groups;

class Home extends BaseController
{
    public function index()
    {
        $user = auth()->user();

        if ($user->inGroup('klien')) {
            return redirect()->to('klien');
        }

        return redirect()->to('admin');

        // -- options for multiple groups --
        // if ($user->inGroup('admin') || $user->inGroup('superadmin')) {
        //     return redirect()->to('admin');
        // }

        // if ($user->inGroup('klien')) {
        //     return redirect()->to('klien');
        // }

        // return redirect()->to('beta');
    }

    public function grup(string $groupName)
    {
        $groups = new Groups();
        $group  = $groups->info($groupName);
        if ($group === null) {
            return redirect()->back()->with('error', 'Config list grup tidak ditemukan');
        }

        $permissions = setting('AuthGroups.permissions');
        if (is_array($permissions)) {
            ksort($permissions);
        }

        return $this->render($this->viewPrefix . 'permissions', [
            'group'       => $group,
            'permissions' => $permissions,
        ]);
    }

    public function whm()
    {
        // 1. Konfigurasi WHM
        // $whm_host   = 's2963.sgp1.stableserver.net'; // Ganti dengan IP atau domain server WHM Anda
        $whm_host   = 'whm.cirebonweb.com';
        $whm_port   = 2087;                 // Port aman
        $whm_user   = 'cirebonw';               // Atau pengguna WHM yang relevan
        $api_token  = 'RGWVZP3SWPMVZ1H5W1ETPMCNKOG5IBS4'; // Ganti dengan Token API yang sudah Anda buat

        // 2. Fungsi WHM API yang akan diuji (Contoh: Menampilkan daftar akun)
        $function = 'listaccts';

        // 3. Bangun URL API (Menggunakan API Token)
        $url = "https://{$whm_host}:{$whm_port}/json-api/{$function}?api.version=1";

        // 4. Inisiasi HTTP Client dari CI4
        $client = \Config\Services::curlrequest([
            'headers' => [
                // Otentikasi menggunakan API Token
                'Authorization' => "whm {$whm_user}:{$api_token}",
            ],
            // Nonaktifkan verifikasi SSL jika Anda menggunakan sertifikat self-signed di server WHM 
            // Namun, sangat disarankan untuk menggunakan sertifikat yang valid.
            'verify' => false,
            'timeout' => 30
        ]);

        try {
            // Lakukan permintaan GET
            $response = $client->get($url);

            // Tampilkan hasil
            echo "<h2>WHM API Response:</h2>";
            echo "<pre>" . esc($response->getBody()) . "</pre>";
        } catch (\Exception $e) {
            // Tangani error koneksi atau lainnya
            echo "<h2>Koneksi Gagal:</h2>";
            echo "Error: " . esc($e->getMessage());
        }
    }
}
