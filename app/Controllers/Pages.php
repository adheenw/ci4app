<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; //untuk mengimpor kelas PageNotFoundException
//CodeIgniter\Exceptions. tidak ada folder fisik yang secara langsung menampungnya di struktur proyek standar ini berasal dari default sistem ci

class Pages extends BaseController
{
    //http://localhost:8080/pages menampilkan index() welcome_message
    public function index()
    {
        // Menampilkan halaman utama (welcome_message.php)
        return view('welcome_message');
    }

    public function view($page = 'home')
    {
        // ...

        // Mengecek apakah halaman yang diminta ada
        if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            // Whoops, we don't have a page for that!
            // Jika tidak ada, lempar PageNotFoundException
            throw new PageNotFoundException($page);
        }

        // Mengatur judul halaman berdasarkan nama halaman
        $data['title'] = ucfirst($page); // Capitalize the first letter

         // Memuat template header, halaman statis (home, about), dan footer
        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
}