<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\Pemesanan;
use App\Helper\ImageUrl;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helper\Lamanya;
use App\Models\FasilitasKamar;

use DB;

class GuestReservasiController extends Controller
{
    public function index(Kamar $kamar)
    {        
        $kamar->nama_kamar=ucwords($kamar->nama_kamar);
        $kamar->foto_kamar=ImageUrl::get('images/kamar/',$kamar->foto_kamar);
        // $kamar->harga_kamar=number_format($kamar->harga_kamar,0,',','.');

        $fasilitas=FasilitasKamar::where('kamar_id',$kamar->id)->get();
        $kamar->nama_fasilitas_kamar=FasilitasKamar::get('nama_fasilitas_kamar',$kamar->nama_fasilitas_kamar);

        return view('order',['kamar'=>$kamar,'fasilitas'=>$fasilitas]);
        
    }
    
    public function booking(Request $request, Kamar $kamar)
    {
        $kamar =  DB::table('kamars')->where('id',$kamar->id)->first();
        $kamar_kosong = $kamar->kamar_kosong;

        $request->validate([
            'checkin'=>'required|date|after:today',
            'checkout'=>'required|date|after:checkin',
            'jumlah_kamar'=>"required|numeric|integer|min:1|max:{$kamar_kosong}",
            'nama_pemesan'=>'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'email'=>'required|email',
            'nomor_handphone'=>'required|numeric|min:1,max:13',
            'nama_tamu'=>'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/'
        ]
    );


        DB::table('kamars')
        ->where('id',$kamar->id)
        ->update(['kamar_kosong' => $kamar_kosong - $request->jumlah_kamar]);


        $pemesanan=Pemesanan::create([
            'kamar_id'=>$kamar->id,
            'tgl_checkin'=>$request->checkin,
            'tgl_checkout'=>$request->checkout,
            'jum_kamar_dipesan'=>$request->jumlah_kamar,
            'nama_pemesan'=>$request->nama_pemesan,
            'email_pemesan'=>$request->email,
            'no_hp'=>$request->nomor_handphone,
            'nama_tamu'=>$request->nama_tamu,
            'status'=>'pesan'
        ]);

        return redirect()->route('guest.reservasi.show',['pemesanan'=>$pemesanan->id]);
    }
    public function create(Kamar $kamar)
    {
        $kamar = Kamar::select('id as value','nama_kamar as option','harga_kamar')->get();
        $kamar->map(function($item){
            $item['option'] = ucwords($item['option']);
            return $item;
        });
        
        $kamar->toArray();
        return view('reservasi',['kamar'=>$kamar]);
    }
    public function store(Request $request,Kamar $kamar)
    {
        $kamar = Kamar::select('id','jum_kamar')->get();
        $request->validate([
            'checkin'=>'required|date|after:today',
            'checkout'=>'required|date|after:checkin',
            'kamar'=>'required|numeric|integer',
            'jumlah_kamar'=>'required|numeric|integer|gt:0',
            'nama_pemesan'=>'required|regex:/^[a-zA-Z]/u',
            'email'=>'required|email',
            'nomor_handphone'=>'required',
            'nama_tamu'=>'required|regex:/^[a-zA-Z]/u',
        ]);


        // JUmlah Kamar
        $kamar =  DB::table('kamars')->where('id',$request->kamar)->first();
        $kamar_kosong = $kamar->kamar_kosong - $request->jumlah_kamar;

        if ($kamar_kosong < 0){
           return back()->with('status','null');
        }
        

        DB::table('kamars')
        ->where('id',$request->kamar)
        ->update(['kamar_kosong' => $kamar_kosong]);

        $pemesanan = Pemesanan::create([
            'kamar_id'=>$request->kamar,
            'tgl_checkin'=>$request->checkin,
            'tgl_checkout'=>$request->checkout,
            'jum_kamar_dipesan'=>$request->jumlah_kamar,
            'nama_pemesan'=>$request->nama_pemesan,
            'email_pemesan'=>$request->email,
            'no_hp'=>$request->nomor_handphone,
            'nama_tamu'=>$request->nama_tamu,
            'status'=> 'pesan',
        ]);

        return redirect()->route('guest.reservasi.show',['pemesanan'=>$pemesanan->id]);
    }

    public function show(Pemesanan $pemesanan)
    {
        return view('reservasi-show',['item'=>$pemesanan]);
    }

    public function invoice(Pemesanan $pemesanan)
    {
        $pemesanan->nama_pemesan = ucwords($pemesanan->nama_pemesan);
        $pemesanan->nama_tamu = ucwords($pemesanan->nama_tamu);
        $pemesanan->tgl_checkin = date('l, d M Y', strtotime($pemesanan->tgl_checkin));
        $pemesanan->tgl_checkout = date('l, d M Y', strtotime($pemesanan->tgl_checkout));
        $pemesanan->lamanya=Lamanya::get($pemesanan->tgl_checkin,$pemesanan->tgl_checkout);

        $kamar = Kamar::find($pemesanan->kamar_id);

        $total = $kamar->harga_kamar * $pemesanan->jum_kamar_dipesan * $pemesanan->lamanya;
        $pemesanan->total = number_format($total, 0, '.',',');
        
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $kamar->harga_kamar = number_format($kamar->harga_kamar, 0, '.',',');

        
        $pdf = PDF::loadView('reservasi-invoice',['item'=>$pemesanan,'kamar'=>$kamar]);
        return $pdf->stream();
    }
    public function smail(Request $request, Kamar $kamar,$id)
    {
        $pemesanan = Pemesanan::with(['kamar'])->findorfail($id);
        $kamar = Kamar::find($pemesanan->kamar_id);

        Mail::to($pemesanan->email_pemesan)->send(
            new smail($pemesanan)
        );

        return view('smail',['pemesanan'=>$pemesanan]);
    }
}
