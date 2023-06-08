<?php

/******************************************
Asisten Pemrogaman 11 
 ******************************************/

class Pasien
{
	var $id = ''; // Variabel untuk menyimpan ID Pasien
	var $nik = ''; // Variabel untuk menyimpan NIK Pasien
	var $nama = ''; // Variabel untuk menyimpan Nama Pasien
	var $tempat = ''; // Variabel untuk menyimpan Tempat Lahir Pasien
	var $tl = ''; // Variabel untuk menyimpan Tanggal Lahir Pasien
	var $gender = ''; // Variabel untuk menyimpan Jenis Kelamin Pasien
	var $email = ''; // Variabel untuk menyimpan Email Pasien
	var $phone = ''; // Variabel untuk menyimpan Nomor Telepon Pasien

	function __construct($id = '', $nik = '', $nama = '', $tempat = '', $tl = '', $gender = '', $email = '', $phone = '')
	{
		$this->id = $id;
		$this->nik = $nik;
		$this->nama = $nama;
		$this->tempat = $tempat;
		$this->tl = $tl;
		$this->gender = $gender;
		$this->email = $email;
		$this->phone = $phone;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setNik($nik)
	{
		$this->nik = $nik;
	}

	function setNama($nama)
	{
		$this->nama = $nama;
	}

	function setTempat($tempat)
	{
		$this->tempat = $tempat;
	}

	function setTl($tl)
	{
		$this->tl = $tl;
	}

	function setGender($gender)
	{
		$this->gender = $gender;
	}

	function setEmail($email)
	{
		$this->email = $email;
	}

	function setPhone($phone)
	{
		$this->phone = $phone;
	}

	function getId()
	{
		return $this->id;
	}

	function getNik()
	{
		return $this->nik;
	}

	function getNama()
	{
		return $this->nama;
	}

	function getTempat()
	{
		return $this->tempat;
	}

	function getTl()
	{
		return $this->tl;
	}

	function getGender()
	{
		return $this->gender;
	}

	function getEmail()
	{
		return $this->email;
	}

	function getPhone()
	{
		return $this->phone;
	}
}
