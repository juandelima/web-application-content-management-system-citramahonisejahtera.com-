<?php

namespace App\Http\Controllers\Backend\Event;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use File;

class EventController extends Controller
{
    public function index() {
        $events = Event::orderBy('id_event','DESC')->get();
        return view('Back-end.event.index', get_defined_vars());
    }

    public function create() {
    	return view('Back-end.event.create');
    }

    public function save(Request $request) {
    	$dat = $request->all();
    	$this->validate($request, [
    		'title' => 'required',
    		'body' => 'required',
    	]);
    	$title = $request->title;
    	$content = $request->body;
    	$slug = str_slug($title, "-");
    	$dom = new \DomDocument();
    	$dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    	$images = $dom->getElementsByTagName('img');
    	foreach ($images as $k => $img) {
    		$data = $img->getattribute('src');
            //dd($data);
    		list($type, $data) = explode(';', $data);
    		list(, $data) = explode(',', $data);
    		$data = base64_decode($data);
    		$image_name= time().$k.'.png';
			$path = public_path('/'. $image_name);
			file_put_contents($path, $data);
			$img->removeattribute('src');
			$img->setattribute('src','http://citramahonisejahtera.com/'.$image_name);
    	}
        
    	if($request->hasFile('img')) {
            $cek_ekstensi = $dat['img']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->withInput()->with("error_upload", "Format file harus gambar!");
            } else {
                $img = random_int(0, 9999).'-'.$dat['img']->getClientOriginalName();
                $destination = public_path().'/pengguna';
                $request->file('img')->move($destination, $img);
            }
        } else {
            $img ='';
        }

    	$content = $dom->savehtml();
    	$event = new Event();
    	$event->img = $img;
    	$event->title = $title;
    	$event->konten = $content;
    	$event->slug = $slug;
    	$event->user_id = Auth::user()->id;
    	$event->save();
    	return redirect()->route('events')->with(['success' => 'Event Berhasil Dibuat.']);;
    }

    public function edit($id) {
        $event = Event::find($id);
        return view('Back-end.event.edit', get_defined_vars());
    }

    public function update(Request $request, $id) {
        $dat = $request->all();
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        $title = $request->title;
        $content = $request->body;
        $slug = str_slug($title, "-");
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $k => $img) {
            $data = $img->getattribute('src');
            $subs = substr(public_path().$data, 30);
            //dd($data,$subs);
            if ($data == $subs) {
                $path = public_path('/'. $data);
            } else {
                File::delete('/'.$subs);
                list($type, $data) = explode(';', $data);
                list(, $data) = explode(',', $data);
                $data = base64_decode($data);
                $image_name = time().$k.'.png';
                $path = public_path('/'. $image_name);
                file_put_contents($path, $data);
                $img->removeattribute('src');
                $img->setattribute('src','http://citramahonisejahtera.com/'.$image_name);
            }
        }

        if($request->hasFile('img')) {
            $cek_ekstensi = $dat['img']->getClientMimeType();
            if (substr($cek_ekstensi, 0, 5) != "image") {
                return redirect()->back()->with("error_upload", "Format file harus gambar!");
            } else {
                File::delete('pengguna/'.$dat['gambar_lama']);
                $img = random_int(0, 9999).'-'.$dat['img']->getClientOriginalName();
                $destination = public_path().'/pengguna';
                $request->file('img')->move($destination, $img);
            }
        } else {
            $img = Event::find($id)->img;
        }
        $content = $dom->savehtml();
        $event = Event::find($id);
        $event->img = $img;
        $event->title = $title;
        $event->konten = $content;
        $event->slug = $slug;
        $event->user_id = Auth::user()->id;
        $event->save();
        return redirect()->route('events')->with(['success' => 'Event Berhasil Diubah.']);
    }

    public function delete($id) {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('events')->with(['success' => 'Event Berhasil Dihapus.']);
    }
}
