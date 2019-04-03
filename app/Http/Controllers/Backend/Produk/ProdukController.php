<?php

namespace App\Http\Controllers\Backend\Produk;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\SubprodukImg;
use File;
use Input;

class ProdukController extends Controller {
    
	public function index() {
		$produk = Produk::orderBy('id_produk','DESC')->get();
		return view('Back-end.produk.index', get_defined_vars());
	}

	public function create() {
		$kproduks = KategoriProduk::orderBy('id_kategori','DESC')->get();
		return view('Back-end.produk.create', get_defined_vars());
	}

	public function edit($id) {
		$produk = Produk::find($id);
		$kproduks = KategoriProduk::orderBy('id_kategori','DESC')->get();
		return view('Back-end.produk.edit', get_defined_vars());
	}

	public function save(Request $request) {
		$this->validate($request, array(
			'kategori_id' => 'required',
			'featured_image' => 'required',
			'nama_produk' => 'required',
			'deskripsi' => 'required',
			'sub_img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
		));

		$data = $request->all();
		$produk = new Produk();
		//dd(count($data['gambar_lama']));
		if($request->hasFile('featured_image')) {
            $cek_ekstensi = $data['featured_image']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
            } else {
                $img = random_int(0, 9999).'-'.$data['featured_image']->getClientOriginalName();
                $destination = public_path().'/produk';
                $request->file('featured_image')->move($destination, $img);
            }
        } else {
            $img ='';
        }
        $slug_produk = str_slug($data['nama_produk'], '-');

		$produk->simpan($data['kategori_id'], $img, $data['nama_produk'], $data['deskripsi'], $slug_produk);

		if ($request->hasFile('sub_img')) {
			foreach ($request->file('sub_img') as $img) {
				$name = $img->getClientOriginalName();
				$tujuan = public_path().'/produk';
				$img->move($tujuan, $name);
				$produk->loop_gambar($name);
			}
		}


		return redirect()->route('index_produk')->with(['success' => 'Produk Berhasil di Buat']);
	}

	public function update(Request $request, $id) {
		$this->validate($request, array(
			'kategori_id' => 'required',
			'nama_produk' => 'required',
			'deskripsi' => 'required',
		));

		$data = $request->all();
		$id_sub_img = null;
		
		$produk = new Produk();
		if($request->hasFile('featured_image')) {
            $cek_ekstensi = $data['featured_image']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
            } else {
            	File::delete('produk/'.$data['gambar_lama']);
                $img = random_int(0, 9999).'-'.$data['featured_image']->getClientOriginalName();
                $destination = public_path().'/produk';
                $request->file('featured_image')->move($destination, $img);
            }
        } else {
            $img = Produk::find($id)->featured_image;
        }

        $slug_produk = str_slug($data['nama_produk'], '-');
		$produk->ubah_data($data['kategori_id'], $img, $data['nama_produk'], $data['deskripsi'], $slug_produk, $id);

		$temp = NULL;
		$index = 0;

		if (Produk::find($id)->gambar->count() > 0) {
			$id_sub_img = $data['sub_img2'];
			if ($data['sub_img'] != null) {
				for ($i=0; $i < count($data['sub_img']); $i++) { 
					$temp[] = $data['sub_img'][$i];
				}
			}

			if ((count($temp) == Produk::find($id)->gambar->count()) or (count($temp) > Produk::find($id)->gambar->count())) {
				for ($j = 0; $j < count($temp); $j++) {
					if ($index < Produk::find($id)->gambar->count()) {
						$get_id_subImg = SubprodukImg::find($id_sub_img[$j])->id_sub_img;
						if ($id_sub_img[$j] == $get_id_subImg) {
							if (is_file($temp[$j])) {
								$name = $temp[$j]->getClientOriginalName();
								$tujuan = public_path().'/produk';
								$temp[$j]->move($tujuan, $name);
								$produk->update_gambar($name, $get_id_subImg, $id);
							} else {
								$produk->update_gambar($temp[$j], $get_id_subImg, $id);
							}
						}
					} else {
						if (is_file($temp[$j])) {
							$nama = $temp[$j]->getClientOriginalName();
							$tujuan = public_path().'/produk';
							$temp[$j]->move($tujuan, $nama);
							$produk->create_gambar_baru($nama, $id);
						}
					}
					$index += 1;
				}
			} else {
				SubprodukImg::where('produk_id', $id)->delete();
				for ($j = 0; $j < count($temp); $j++) {
					if (is_file($temp[$j])) {
						$nama = $temp[$j]->getClientOriginalName();
						$tujuan = public_path().'/produk';
						$temp[$j]->move($tujuan, $nama);
						$produk->create_gambar_baru($nama, $id);
					} else {
						$produk->create_gambar_baru($temp[$j], $id);
					}
				}
			}
		} else {
			if (!isset($data['sub_img'])) {
				return redirect()->route('index_produk')->with(['success' => 'Produk Berhasil di Ubah']);
			} else {
				if ($data['sub_img'] != null) {
					for ($i=0; $i < count($data['sub_img']); $i++) { 
						$temp[] = $data['sub_img'][$i];
					}
				}
				for ($j = 0; $j < count($temp); $j++) {
					if (is_file($temp[$j])) {
						$nama = $temp[$j]->getClientOriginalName();
						$tujuan = public_path().'/produk';
						$temp[$j]->move($tujuan, $nama);
						$produk->create_gambar_baru($nama, $id);
					}
				}
			}
		}

        return redirect()->route('index_produk')->with(['success' => 'Produk Berhasil di Ubah']);
	}

	public function delete($id) {
		$produk = new Produk();
		$produk->hapus_data($id);
		return redirect()->route('index_produk')->with(['success' => 'Produk Berhasil di Hapus']);
	}
}
