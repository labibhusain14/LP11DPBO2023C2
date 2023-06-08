<?php


include_once("kontrak/KontrakPasien.php");
include_once("presenter/ProsesPasien.php");

class TampilPasien implements KontrakPasienView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
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

		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function AddForm()
	{
		$button = "add";
		// Membaca template skin.html
		$this->tpl = new Template("templates/form_pasien.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_BUTTON", $button);
		$this->tpl->replace("DATA_TITLE", "TAMBAH");

		// Menampilkan ke layar
		$this->tpl->write();
	}
	function updateForm($id)
	{
		$button = "update"; // Variabel untuk menyimpan nilai tombol
		$this->tpl = new Template("templates/form_pasien.html"); // Membuat objek Template dan menginisialisasi dengan template HTML

		$this->prosespasien->prosesDataPasien(); // Memproses data pasien

		// Ukuran data
		$size = $this->prosespasien->getSize(); // Mengambil ukuran data pasien

		// Mencari Id
		$i = 0; // Variabel untuk iterasi
		$cek = false; // Variabel untuk memeriksa kecocokan Id
		while ($i < $size && !$cek) {
			if ($this->prosespasien->getId($i) == $id) { // Memeriksa apakah Id pasien cocok dengan Id yang diberikan
				$cek = true; // Mengubah variabel $cek menjadi true jika ditemukan kecocokan
			}
			$i++;
		}

		if ($cek) {
			// Mengganti placeholder dengan data yang ditemukan
			$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik($i - 1));
			$this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama($i - 1));
			$this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat($i - 1));
			$this->tpl->replace("DATA_TL", $this->prosespasien->getTl($i - 1));
			$this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail($i - 1));
			$this->tpl->replace("DATA_PHONE", $this->prosespasien->getPhone($i - 1));
			$lk = $this->prosespasien->getGender($i - 1) === "Laki-laki" ? "checked" : ""; // Memeriksa jenis kelamin pasien dan memberikan atribut "checked" jika jenis kelamin adalah "Laki-laki"
			$pr = $this->prosespasien->getGender($i - 1) === "Perempuan" ? "checked" : ""; // Memeriksa jenis kelamin pasien dan memberikan atribut "checked" jika jenis kelamin adalah "Perempuan"
			$this->tpl->replace("DATA_LK", $lk); // Mengganti placeholder dengan nilai jenis kelamin "Laki-laki" atau kosong
			$this->tpl->replace("DATA_PR", $pr); // Mengganti placeholder dengan nilai jenis kelamin "Perempuan" atau kosong
		}

		// Mengganti placeholder lainnya
		$this->tpl->replace("DATA_BUTTON", $button); // Mengganti placeholder tombol dengan nilai "update"
		$this->tpl->replace("DATA_TITLE", "UBAH"); // Mengganti placeholder judul dengan nilai "UBAH"

		// Menampilkan ke layar
		$this->tpl->write(); // Menulis konten template ke layar
	}


	function Form_Add($data)
	{
		$this->prosespasien->FormAdd($data);
		header('location:index.php');
	}
	function Form_Delete($id)
	{
		$this->prosespasien->FormDelete($id);
		header('location:index.php');
	}
	function Form_Update($id)
	{
		$this->prosespasien->FormUpdate($id);
		header('location:index.php');
	}
}
