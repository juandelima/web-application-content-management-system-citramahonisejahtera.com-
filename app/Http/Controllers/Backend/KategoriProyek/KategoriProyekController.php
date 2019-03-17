<?php

namespace App\Http\Controllers\Backend\KategoriProyek;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriProyek;

class KategoriProyekController extends Controller
{
    public function index() {
		$kprojects = KategoriProyek::orderBy('id_kategori','DESC')->get();
		return view('Back-end.kproject.index', get_defined_vars());
	}

	public function create() {
		return view('Back-end.kproject.create');
	}

	public function save(Request $request) {
		$data = $request->all();
		$this->validate($request, [
			'nama_kategori'
		]);
		$proyek = new KategoriProyek();
		$proyek->simpan($data['nama_kategori']);
		return redirect()->route('kategori_proyek')->with(['success' => 'Kategori Berhasil Dibuat']);
	}

	public function edit($id) {
		$proyek = KategoriProyek::find($id);
		return view('Back-end.kproject.edit', get_defined_vars());
	}

	public function update(Request $request, $id) {
		$proyek = new KategoriProyek();
		$this->validate($request, array(
			'nama_kategori'
		));
		$proyek->ubah_data($request['nama_kategori'], $id);
		return redirect()->route('kategori_proyek')->with(['success' => 'Kategori Berhasil Diubah']);
	}

	public function delete($id) {
		$proyek = new KategoriProyek();
		if (KategoriProyek::find($id)->filter_project->count() > 0) {
			return redirect()->route('kategori_proyek')->with(['error' => 'Kategori '.KategoriProyek::find($id)->nama_kategori.' tidak bisa dihapus karena berhubungan dengan data lain!']);	
		} else {
			$proyek->delete_data($id);
			return redirect()->route('kategori_proyek')->with(['success' => 'Kategori Berhasil Dihapus']);
		}
	}
}
