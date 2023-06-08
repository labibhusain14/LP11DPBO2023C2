<?php

interface KontrakPasienView
{
    // inisialisasi fungsi tampil
    public function tampil(); // Fungsi untuk menampilkan data

    public function AddForm(); // Fungsi untuk menampilkan form tambah data

    public function updateForm($id); // Fungsi untuk menampilkan form update data berdasarkan ID

    public function Form_Add($data); // Fungsi untuk menangani form tambah data

    public function Form_Delete($id); // Fungsi untuk menangani form hapus data berdasarkan ID

    public function Form_Update($id); // Fungsi untuk menangani form update data berdasarkan ID
}

interface KontrakPasienPresenter
{
    public function prosesDataPasien(); // Fungsi untuk memproses data pasien

    public function FormAdd($data); // Fungsi untuk menangani form tambah data

    public function FormUpdate($id); // Fungsi untuk menangani form update data berdasarkan ID

    public function FormDelete($id); // Fungsi untuk menangani form hapus data berdasarkan ID

    public function getId($i); // Fungsi untuk mendapatkan ID berdasarkan indeks

    public function getNik($i); // Fungsi untuk mendapatkan NIK berdasarkan indeks

    public function getNama($i); // Fungsi untuk mendapatkan Nama berdasarkan indeks

    public function getTempat($i); // Fungsi untuk mendapatkan Tempat Lahir berdasarkan indeks

    public function getTl($i); // Fungsi untuk mendapatkan Tanggal Lahir berdasarkan indeks

    public function getGender($i); // Fungsi untuk mendapatkan Gender berdasarkan indeks

    public function getEmail($i); // Fungsi untuk mendapatkan Email berdasarkan indeks

    public function getPhone($i); // Fungsi untuk mendapatkan Nomor Telepon berdasarkan indeks

    public function getSize(); // Fungsi untuk mendapatkan jumlah data pasien
}
