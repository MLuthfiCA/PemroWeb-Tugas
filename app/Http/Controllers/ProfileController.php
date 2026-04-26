<?php

namespace App\Http\Controllers;


class ProfileController extends Controller
{
    public function profile()
{
    $books = [
        (object)[
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'peminjam' => 'Aditya', // Tambahkan ini
            'jatuh_tempo' => '20 April 2026'
        ],
        (object)[
            'judul' => 'Bumi Manusia',
            'penulis' => 'Pramoedya A.T.',
            'peminjam' => 'Rahas', // Tambahkan ini
            'jatuh_tempo' => '22 April 2026'
        ],
    ];

    return view('admin.profile', compact('books'));
}}