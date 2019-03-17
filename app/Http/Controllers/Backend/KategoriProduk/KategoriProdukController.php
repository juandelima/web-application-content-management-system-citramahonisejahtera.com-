<?php

namespace App\Http\Controllers\Backend\KategoriProduk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;

class KategoriProdukController extends Controller {

	public function index() {
		$kproduks = KategoriProduk::orderBy('id_kategori','DESC')->get();
		return view('Back-end.kproduk.index', get_defined_vars());
	}

	public function create() {
		return view('Back-end.kproduk.create');
	}

	public function save(Request $request) {
		$data = $request->all();
		$this->validate($request, [
			'nama_kategori'
		]);
		$produk = new KategoriProduk();
		$produk->simpan($data['nama_kategori']);
		return redirect()->route('kategori_produk')->with(['success' => 'Kategori Berhasil Dibuat']);
	}

	public function edit($id) {
		$produk = KategoriProduk::find($id);
		return view('Back-end.kproduk.edit', get_defined_vars());
	}

	public function update(Request $request, $id) {
		$produk = new KategoriProduk();
		$this->validate($request, array(
			'nama_kategori'
		));
		$produk->ubah_data($request['nama_kategori'], $id);
		return redirect()->route('kategori_produk')->with(['success' => 'Kategori Berhasil Diubah']);
	}

	public function delete($id) {
		$produk = new KategoriProduk();
		if (KategoriProduk::find($id)->filter->count() > 0) {
			return redirect()->route('kategori_produk')->with(['error' => 'Kategori '.KategoriProduk::find($id)->nama_kategori.' tidak bisa dihapus karena berhubungan dengan data lain!']);	
		} else {
			$produk->delete_data($id);
			return redirect()->route('kategori_produk')->with(['success' => 'Kategori Berhasil Dihapus']);
		}
	}
}
