<?php

namespace App\Http\Controllers\Backend\Proyek;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KategoriProyek;
use App\Models\Proyek;
use App\Models\SubImgProyek;
use File;

class ProyekController extends Controller
{
    public function index() {
		$proyek = Proyek::orderBy('id_project','DESC')->get();
		return view('Back-end.proyek.index', get_defined_vars());
	}

	public function create() {
		$kproyeks = KategoriProyek::orderBy('id_kategori','DESC')->get();
		return view('Back-end.proyek.create', get_defined_vars());
	}

	public function edit($id) {
		$proyek = Proyek::find($id);
		$kproyeks = KategoriProyek::orderBy('id_kategori','DESC')->get();
		return view('Back-end.proyek.edit', get_defined_vars());
	}

	public function save(Request $request) {
		$this->validate($request, array(
			'kategori_id' => 'required',
			'featured_image' => 'required',
			'nama_project' => 'required',
			'deskripsi' => 'required',
			'sub_img.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
		));

		$data = $request->all();
		$Proyek = new Proyek();
		//dd(count($data['sub_img']), $data);
		if($request->hasFile('featured_image')) {
            $cek_ekstensi = $data['featured_image']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
            } else {
                $img = random_int(0, 9999).'-'.$data['featured_image']->getClientOriginalName();
                $destination = public_path().'/proyek_img';
                $request->file('featured_image')->move($destination, $img);
            }
        } else {
            $img ='';
        }

        $slug_Proyek = str_slug($data['nama_project'], '-');
		$Proyek->simpan($data['kategori_id'], $img, $data['nama_project'], $data['deskripsi'], $slug_Proyek);

		if ($request->hasFile('sub_img')) {
			foreach ($request->file('sub_img') as $img) {
				$name = $img->getClientOriginalName();
				$tujuan = public_path().'/proyek_img';
				$img->move($tujuan, $name);
				$Proyek->loop_gambar($name);
			}
		}
		return redirect()->route('index_proyek')->with(['success' => 'Proyek Berhasil di Buat']);
	}

	public function update(Request $request, $id) {
		$this->validate($request, array(
			'kategori_id' => 'required',
			'nama_project' => 'required',
			'deskripsi' => 'required',
		));

	
		$data = $request->all();
		$id_sub_img = null;

		$Proyek = new Proyek();
		if($request->hasFile('featured_image')) {
            $cek_ekstensi = $data['featured_image']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
            } else {
            	File::delete(public_path().'proyek_img/'.$data['gambar_lama']);
                $img = random_int(0, 9999).'-'.$data['featured_image']->getClientOriginalName();
                $destination = public_path().'/proyek_img';
                $request->file('featured_image')->move($destination, $img);
            }
        } else {
            $img = Proyek::find($id)->featured_image;
        }

        $slug_Proyek = str_slug($data['nama_project'], '-');
		$Proyek->ubah_data($data['kategori_id'], $img, $data['nama_project'], $data['deskripsi'], $slug_Proyek, $id);

		$temp = NULL;
		$index = 0;

		if (Proyek::find($id)->gambar->count() > 0) {
			$id_sub_img = $data['sub_img2'];
			if ($data['sub_img'] != null) {
				for ($i=0; $i < count($data['sub_img']); $i++) { 
					$temp[] = $data['sub_img'][$i];
				}
			}

			if ((count($temp) == Proyek::find($id)->gambar->count()) or (count($temp) > Proyek::find($id)->gambar->count())) {
				for ($j = 0; $j < count($temp); $j++) {
					if ($index < Proyek::find($id)->gambar->count()) {
						$get_id_subImg = SubImgProyek::find($id_sub_img[$j])->id_sub_img;
						if ($id_sub_img[$j] == $get_id_subImg) {
							if (is_file($temp[$j])) {
								$name = $temp[$j]->getClientOriginalName();
								$tujuan = public_path().'/proyek_img';
								$temp[$j]->move($tujuan, $name);
								$Proyek->update_gambar($name, $get_id_subImg, $id);
							} else {
								$Proyek->update_gambar($temp[$j], $get_id_subImg, $id);
							}
						}
					} else {
						if (is_file($temp[$j])) {
							$nama = $temp[$j]->getClientOriginalName();
							$tujuan = public_path().'/proyek_img';
							$temp[$j]->move($tujuan, $nama);
							$Proyek->create_gambar_baru($nama, $id);
						}
					}
					$index += 1;
				}
			} else {
				SubImgProyek::where('proyek_id', $id)->delete();
				for ($j = 0; $j < count($temp); $j++) {
					if (is_file($temp[$j])) {
						$nama = $temp[$j]->getClientOriginalName();
						$tujuan = public_path().'/proyek_img';
						$temp[$j]->move($tujuan, $nama);
						$Proyek->create_gambar_baru($nama, $id);
					} else {
						$Proyek->create_gambar_baru($temp[$j], $id);
					}
				}
			}
		} else {
			if (!isset($data['sub_img'])) {
				return redirect()->route('index_proyek')->with(['success' => 'Proyek Berhasil di Ubah']);
			} else {
				if ($data['sub_img'] != null) {
					for ($i=0; $i < count($data['sub_img']); $i++) { 
						$temp[] = $data['sub_img'][$i];
					}
				}

				for ($j = 0; $j < count($temp); $j++) {
					if (is_file($temp[$j])) {
						$nama = $temp[$j]->getClientOriginalName();
						$tujuan = public_path().'/proyek_img';
						$temp[$j]->move($tujuan, $nama);
						$Proyek->create_gambar_baru($nama, $id);
					}
				}
			}
		}

        return redirect()->route('index_proyek')->with(['success' => 'Proyek Berhasil di Ubah']);
	}

	public function delete($id) {
		$Proyek = new Proyek();
		$Proyek->hapus_data($id);
		return redirect()->route('index_proyek')->with(['success' => 'Proyek Berhasil di Hapus']);
	}
}
