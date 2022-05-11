@extends('layouts.tamu')

@section('content')
    <div class="row ">
        <div class="col d-flex justify-content-center ">
            <div class="col-6">
                <h5 class="text-center">{{$kamar->nama_kamar}}</h5>
                <!-- <h5>Harga = Rp. {{$kamar->harga_kamar}}</h5> -->
                <p id="harga_kamar" class="text-center">{{$kamar->harga_kamar}}</p>
                <p id="total_harga" class="text-center"></p>
                <h5 class="text-center">{{ $kamar->deskripsi_kamar}}</h5>
                <img src="{{$kamar->foto_kamar}}" alt="" class="img-thumbnail">
            </div>
            <div class="col-6">
                <form  action="" class="card card-primary" method="post">
                    @csrf
                    <div class="card-header p-1"></div>
                    <div class="card-body">
                        <x-status/>
                        <x-input-reservasi label="Check In" 
                        name="checkin" type="date" :value="request()->checkin"
                        />
                        <x-input-reservasi label="Check Out" 
                        name="checkout" type="date" :value="request()->checkout"
                        
                        
                        />
                        <x-input-reservasi label="Jumlah Kamar" 
                        name="jumlah_kamar" type="number" :value="request()->jumlah"
                        />
                        <x-input-reservasi label="Nama Pemesan" 
                        name="nama_pemesan"
                        />
                        <x-input-reservasi label="Alamat Email" 
                        name="email" type="email"
                        />
                        <x-input-reservasi label="Nomor Handphone" 
                        name="nomor_handphone"
                        />
                        <x-input-reservasi label="Nama Tamu" 
                        name="nama_tamu"
                        />
                    </div>
    
                    <div class="card-footer">
                        <button class="btn btn-block btn-lg m-auto btn-primary w-75" type="submit">
                            Booking Sekarang
                        </button>
                    </div>
    
                </form>
            </div>
        </div>
        
    </div>
  

@endsection


@push('js')
    <script>
    $(document).ready(function(){
        var price = $("#harga_kamar").text();
        $("input[name='jumlah_kamar']").keyup(function(){
            var jumlah = $(this).val();
            $("#total_harga").text("Total : Rp "+price*jumlah);
        })
    });
    </script>
    @endpush