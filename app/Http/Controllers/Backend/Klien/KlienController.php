<?php

namespace App\Http\Controllers\Backend\Klien;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Klien;
use File;
class KlienController extends Controller
{	
	public function index() {
		$clients = Klien::orderBy('id_client','DESC')->get();
    	return view('Back-end.client.index', get_defined_vars());
	}

	public function create() {
		return view('Back-end.client.create');
	}

	public function save(Request $req) {
		$this->validate($req, array(
			'img_klien' => 'required',
			'img_klien.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
		));

		$data = $req->all();

		$client = new Klien();

		if ($req->hasFile('img_klien')) {
			foreach ($req->file('img_klien') as $img) {
				$name = $img->getClientOriginalName();
				$tujuan = public_path().'/img_client';
				$img->move($tujuan, $name);
				$client->simpan_gambar($name);
			}
		}

		return redirect()->route('index_client')->with(['success' => 'Logo klien berhasil disimpan!']);
	}

	public function edit($id) {
		$klien = Klien::find($id);
		return view('Back-end.client.edit', get_defined_vars());
	}

	public function update(Request $request, $id) {
		$data = $request->all();
		$klien = new Klien();
		if($request->hasFile('img_klien')) {
            $cek_ekstensi = $data['img_klien']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
            } else {
            	File::delete(public_path().'/img_client/'.$data['gambar_lama']);
                $img = random_int(0, 9999).'-'.$data['img_klien']->getClientOriginalName();
                $destination = public_path().'/img_client';
                $request->file('img_klien')->move($destination, $img);
            }
        } else {
            $img = Klien::find($id)->client_img;
        }

        $klien->update_gambar($img, $id);
        return redirect()->route('index_client')->with(['success' => 'Logo klien berhasil diubah!']);
	}

	public function delete($id) {
		$klien = new Klien();
		$klien->delete_gambar($id);
		return redirect()->route('index_client')->with(['success' => 'Logo klien berhasil dihapus!']);
	}
}
