<?php

include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; // Objek presenter yang dapat berinteraksi langsung dengan view
	private $tpl; // Objek template untuk tampilan

	function __construct()
	{
		// Konstruktor
		$this->prosespasien = new ProsesPasien(); // Inisialisasi objek presenter
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien(); // Memproses data pasien

		$data = null;
		// Semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			// Membuat baris data untuk ditampilkan dalam tabel
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getPhone($i) . "</td>
			<td> 			
			<a href='index.php?update=" . $this->prosespasien->getId($i) . "' class='btn-sm btn-info'>Ubah</a>
			<a href='index.php?hapus=" . $this->prosespasien->getId($i) . "' class='btn-sm btn-danger'>Hapus</a> </td>";
		}

		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		$this->tpl->replace("DATA_TABEL", $data); // Mengganti kode DATA_TABEL dengan data yang sudah diproses

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function AddForm()
	{
		// ubah nama button
		$button = "add";

		// Membaca template form_pasien.html
		$this->tpl = new Template("templates/form_pasien.html");

		// Mengganti kode DATA_BUTTON dengan nilai button
		$this->tpl->replace("DATA_BUTTON", $button);
		$this->tpl->replace("DATA_TITLE", "TAMBAH");

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function updateForm($id)
	{
		$button = "update";

		// Membaca template form_pasien.html
		$this->tpl = new Template("templates/form_pasien.html");

		$size = $this->prosespasien->getSize();
		$cek = false;
		$i = 0;

		// Mencari Id
		while ($i < $size && !$cek) {
			if ($this->prosespasien->getId($i) == $id) {
				$cek = true;
			} else {
				$i++;
			}
		}

		if ($cek) {
			// Mengganti nilai DATA_NIK, DATA_NAMA, dll. dengan nilai yang sesuai
			$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik($i));
			$this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama($i));
			$this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat($i));
			$this->tpl->replace("DATA_TL", $this->prosespasien->getTl($i));
			$this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail($i));
			$this->tpl->replace("DATA_PHONE", $this->prosespasien->getPhone($i));
			$lk = $this->prosespasien->getGender($i) === "Laki-laki" ? "checked" : "";
			$pr = $this->prosespasien->getGender($i) === "Perempuan" ? "checked" : "";
			$this->tpl->replace("DATA_LK", $lk);
			$this->tpl->replace("DATA_PR", $pr);
		}

		$this->tpl->replace("DATA_BUTTON", $button);
		$this->tpl->replace("DATA_TITLE", "UBAH");

		$this->tpl->write();
	}

	function Form_Add($data)
	{
		$this->prosespasien->FormAdd($data); // Memanggil metode FormAdd pada presenter untuk menambahkan data pasien
		header('location:index.php'); // Mengarahkan ke halaman utama setelah data ditambahkan
	}

	function Form_Delete($id)
	{
		$this->prosespasien->FormDelete($id); // Memanggil metode FormDelete pada presenter untuk menghapus data pasien
		header('location:index.php'); // Mengarahkan ke halaman utama setelah data dihapus
	}

	function Form_Update($id)
	{
		$this->prosespasien->FormUpdate($id); // Memanggil metode FormUpdate pada presenter untuk memperbarui data pasien
		header('location:index.php'); // Mengarahkan ke halaman utama setelah data diperbarui
	}
}
