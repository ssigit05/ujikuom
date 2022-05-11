<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Helper\Lamanya;
use App\Models\Kamar;
use DB;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $tanggal = $request->tanggal;
        $data = Pemesanan::leftJoin('kamars','kamars.id','pemesanans.kamar_id')
        ->select(
        'pemesanans.id as id','nama_tamu','tgl_checkin',
        'tgl_checkout','nama_kamar',
        'jum_kamar_dipesan as jum',
        'status'
        )
        ->when($search, function($query, $search){
            return $query->where('nama_tamu','like',"%{$search}%");
        })
        ->when($tanggal, function($query, $tanggal){
            return $query->whereDate('tgl_checkin','like',"%{$tanggal}%");
        })
        ->orderBy('id','desc')
        ->paginate(25);

        $data->map(function($item){
            $item->nama_tamu = ucwords($item->nama_tamu);
            $item->nama_kamar = ucwords($item->nama_kamar);
            $item->lamanya = Lamanya::get($item->tgl_checkin,$item->tgl_checkout);
            $item->tgl_checkin = date('d/m/Y', strtotime( $item->tgl_checkin));
            $item->tgl_checkout = date('d/m/Y', strtotime( $item->tgl_checkout));
            $item->status = $this->status($item->status);
        });
        return view('pemesanan.index',['data'=>$data]);
    }

    public function show(Pemesanan $pemesanan)
    {

        $kamar = Kamar::find($pemesanan->kamar_id);

        $pemesanan->nama_pemesan = ucwords($pemesanan->nama_pemesan);
        $pemesanan->nama_tamu = ucwords($pemesanan->nama_tamu);
        $pemesanan->lamanya = lamanya::get($pemesanan->tgl_checkin,$pemesanan->tgl_checkout);
        $pemesanan->tgl_checkin = date('d/m/Y', strtotime($pemesanan->tgl_checkin));
        $pemesanan->tgl_checkout = date('d/m/Y', strtotime($pemesanan->tgl_checkout));
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $bayar = $kamar->harga_kamar * $pemesanan->jum_kamar_dipesan * $pemesanan->lamanya;
        $pemesanan->bayar = number_format($bayar,0,',','.');
        $pemesanan->tgl_dibuat = date('d/m/Y H:i:s', strtotime( $pemesanan->created_at));
        $pemesanan->value_status = $pemesanan->status;
        $pemesanan->status = $this->status($pemesanan->status);

        $option = [
            ['value'=> 'pesan','option'=>'Permintaan'],
            ['value'=> 'checkin','option'=>'Check In'],
            ['value'=> 'checkout','option'=>'Check Out'],
            ['value'=> 'batal','option'=>'Cancel'],
        ];

        return view('pemesanan.show',['pemesanan'=>$pemesanan,'kamar'=>$kamar,'option'=>$option]);
    }

    public function update(Request $request, Pemesanan $pemesanan, Kamar $kamar)
    {
        $request->validate([
            'status'=>'required|in:pesan,checkin,checkout,batal',
        ]);

        // $pemesanan->update([
        //     'status'=>$request->status,
        // ]);


         // Status Tidak Berubah
         $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
         if ($pemesanan->status === $request->status) {
             $pemesanan->update([
                 'status' => $request->status,
             ]);
 
           
             return back()->with('status','nochange');
         }
 

         // pesan Status
         if($pemesanan->status === "pesan" && $request->status === "checkin") {
             $pemesanan->update([
                 'status' => $request->status,
             ]);
                return back()->with('status','update');

         }
 
         elseif($pemesanan->status === "pesan" && $request->status === "checkout") {
             $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
             $kamar_kosong = $kamar->kamar_kosong + $pemesanan->jum_kamar_dipesan;
 
             DB::table('kamars')
             ->where('id',$pemesanan->kamar_id)
             ->update(['kamar_kosong'=>$kamar_kosong]);
 
             $pemesanan->update([
                 'status' => $request->status,
             ]);

             return back()->with('status','update');
         }
         
         elseif($pemesanan->status === "pesan" && $request->status === "batal"){
             $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
             $kamar_kosong = $kamar->kamar_kosong + $pemesanan->jum_kamar_dipesan;

             DB::table('kamars')
             ->where('id',$pemesanan->kamar_id)
             ->update(['kamar_kosong'=>$kamar_kosong]);

             $pemesanan->update([
                 'status' => $request->status

             ]);

             return back()->with('status','update');
         }


         // Checkin Status
         if ($pemesanan->status === "checkin" && $request->status === "pesan"){
             $pemesanan->update([
                 'status' => $request->status
             ]);

             return back()->with('status','update');
         }

         elseif($pemesanan->status === "checkin" && $request->status === "checkout"){
             $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
             $kamar_kosong = $kamar->kamar_kosong + $pemesanan->jum_kamar_dipesan;

             DB::table('kamars')
             ->where('id',$pemesanan->kamar_id)
             ->update(['kamar_kosong'=>$kamar_kosong]);

             $pemesanan->update([
                 'status' => $request->status
             ]);

             return back()->with('status','update');
         }

         elseif($pemesanan->status === "checkin" && $request->status === "batal"){
            $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
            $kamar_kosong = $kamar->kamar_kosong + $pemesanan->jum_kamar_dipesan;

            DB::table('kamars')
            ->where('id',$pemesanan->kamar_id)
            ->update(['kamar_kosong'=>$kamar_kosong]);

            $pemesanan->update([
                'status' => $request->status
            ]);

            return back()->with('status','update');
        }

        // Checkout Status
        if ($pemesanan->status === "checkout" && $request->status === "batal"){
            $pemesanan->update([
                'status' => $request->status
            ]);

            return back()->with('status','update');
        }

        elseif($pemesanan->status === "checkout" && $request->status === "checkin"){
            $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
            $kamar_kosong = $kamar->kamar_kosong - $pemesanan->jum_kamar_dipesan;

            DB::table('kamars')
            ->where('id',$pemesanan->kamar_id)
            ->update(['kamar_kosong'=>$kamar_kosong]);

            $pemesanan->update([
                'status' => $request->status
            ]);

            return back()->with('status','update');
        }

        elseif($pemesanan->status === "checkout" && $request->status === "pesan"){
           $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
           $kamar_kosong = $kamar->kamar_kosong - $pemesanan->jum_kamar_dipesan;

           DB::table('kamars')
           ->where('id',$pemesanan->kamar_id)
           ->update(['kamar_kosong'=>$kamar_kosong]);

           $pemesanan->update([
               'status' => $request->status
           ]);

           return back()->with('status','update');
       }


        // Batal Status
        if ($pemesanan->status === "batal" && $request->status === "checkout"){
            $pemesanan->update([
                'status' => $request->status
            ]);

            return back()->with('status','update');
        }

        elseif($pemesanan->status === "batal" && $request->status === "checkin"){
            $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
            $kamar_kosong = $kamar->kamar_kosong - $pemesanan->jum_kamar_dipesan;

            DB::table('kamars')
            ->where('id',$pemesanan->kamar_id)
            ->update(['kamar_kosong'=>$kamar_kosong]);

            $pemesanan->update([
                'status' => $request->status
            ]);

            return back()->with('status','update');
        }

        elseif($pemesanan->status === "batal" && $request->status === "pesan"){
           $kamar = DB::table('kamars')->where('id',$pemesanan->kamar_id)->first();
           $kamar_kosong = $kamar->kamar_kosong - $pemesanan->jum_kamar_dipesan;

           DB::table('kamars')
           ->where('id',$pemesanan->kamar_id)
           ->update(['kamar_kosong'=>$kamar_kosong]);

           $pemesanan->update([
               'status' => $request->status
           ]);

           return back()->with('status','update');
       }

    }
    public function status($status)
    {
        $arr_status = [
            'pesan'=> 'Permintaan',
            'checkin'=> 'Check In',
            'checkout'=> 'Check Out',
            'batal'=> 'Cancel'
        ];

        return $arr_status[$status];
    }
}
