<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\KategoriProduk;
use App\Models\KategoriProyek;
use App\Models\Produk;
use App\Models\Event;
use App\Models\Klien;
use App\Models\Proyek;

class FrontEndController extends Controller {

    public function index() {
        $latest_news = Post::get()->last();
        $product = Produk::orderBy('id_produk','DESC')->get();
        $event = Event::orderBy('id_event', 'DESC')->get();
        $klien = Klien::orderBy('id_client', 'DESC')->get();
    	return view('Front-end.index', get_defined_vars());
    }

    public function products() {
        $k_products = KategoriProduk::orderBy('id_kategori','DESC')->get();
        $product = Produk::orderBy('id_produk','DESC')->paginate(12);
    	return view('Front-end.product', get_defined_vars());
    }

    public function filter_product($url) {
        $k_products = KategoriProduk::orderBy('id_kategori','DESC')->get();
        $filter_products = KategoriProduk::where('slug','=',$url)->first();
        $productt = Produk::orderBy('id_produk','DESC')->get();
        return view('Front-end.filter_product', get_defined_vars());
    }

    public function detail_product($url) {
        $product = Produk::where('slug', '=', $url)->first();
        return view('Front-end.product_details', get_defined_vars());
    }

    public function project() {
        $of = KategoriProyek::find(1);
        $oi = KategoriProyek::find(2);
        $hf = KategoriProyek::find(3);
        $di = KategoriProyek::find(4);
        $cf = KategoriProyek::find(5);
        $proyek = Proyek::all();
    	return view('Front-end.project', get_defined_vars());
    }

    public function filter_project($slug) {
        $k_projects = KategoriProyek::orderBy('id_kategori','DESC')->get();
        $filter_projects = KategoriProyek::where('slug','=',$slug)->first();
        return view('Front-end.filter_project', get_defined_vars());
    }

    public function project_details($slug) {
        $proyek = Proyek::where('slug','=', $slug)->first();
        return view('Front-end.project_details', get_defined_vars());
    }

    public function news() {
        $event = Event::orderBy('id_event', 'DESC')->get();
        $posts = Post::orderBy('id_post','DESC')->paginate(5);
        return view('Front-end.news', get_defined_vars());
    }

    public function news_detail($slug) {
        $klien = Klien::orderBy('id_client', 'DESC')->get();
        $post_fp = Post::orderBy('id_post','DESC')->paginate(4);
        $post = Post::where('slug', '=', $slug)->first();
        return view('Front-end.news_details', get_defined_vars());
    }

    public function event_detail($slug) {
        $klien = Klien::orderBy('id_client', 'DESC')->get();
        $event_fp = Event::orderBy('id_event','DESC')->paginate(4);
        $event = Event::where('slug','=',$slug)->first();
        return view('Front-end.event_details', get_defined_vars());
    }

    public function filter_news($bulan) {
        $event = Event::orderBy('id_event', 'DESC')->get();
        $posts = Post::orderBy('id_post','DESC')->whereMonth('created_at','=', date('m', strtotime($bulan)))->paginate(5);
        return view('Front-end.filter_post', get_defined_vars());
    }

    public function about() {
        $klien = Klien::orderBy('id_client', 'DESC')->get();
        return view('Front-end.about', get_defined_vars());
    }

}
