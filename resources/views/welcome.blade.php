@extends('layouts.tamu',['title'=>'Home'])
@section('content')
<div class="container">
    <div class="section_title text-center">
        <h2 class="title_color">The Mulia Bali</h2>
        <p>Kita semua hidup di zaman yang menjadi milik anak muda di hati. Hidup yang menjadi sangat cepat, </p>
    </div>
    <section>
        <a href="{{ route('guest.kamar.index')}}">
            <div class="next">
                <div class="text">
                    <h1>LIHAT KAMAR LAINNYA</h1>
                </div>
                
                <div class="icon">
                    <i class="fas fa-arrow-right"></i>
                </div>
                
            </div>
        </a>
        
    </section>
    <div class="row mb_30">
        
        <div class="col-lg-3 col-sm-6">
            <div class="accomodation_item text-center">
                
                <div class="hotel_img">
                    <h6 class="tersedia"> Kamar Tersedia : {{$kamar[0]->kamar_kosong}}</h6>
                    <img src="{{ $kamar[0]->foto_kamar}}" alt="">
                    <a href="{{ route('guest.kamar.show',['kamar'=>$kamar[0]->id])}}" class="btn theme_btn button_hover">Lihat</a>
                </div>
                <a href="#"><h4 class="sec_h4">{{ $kamar[0]->nama_kamar }}</h4></a>
                <h5>Rp. {{$kamar[0]->harga_kamar}} <small>/ Malam</small></h5>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="accomodation_item text-center">
                
                <div class="hotel_img">
                    <h6 class="tersedia"> Kamar Tersedia : {{$kamar[1]->kamar_kosong}}</h6>
                    <img src="{{ $kamar[1]->foto_kamar}}" alt="">
                    <a href="{{ route('guest.kamar.show',['kamar'=>$kamar[1]->id])}}" class="btn theme_btn button_hover">Lihat</a>
                </div>
                <a href="#"><h4 class="sec_h4">{{ $kamar[1]->nama_kamar }}</h4></a>
                <h5>Rp. {{$kamar[1]->harga_kamar}} <small>/ Malam</small></h5>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="accomodation_item text-center">
                
                <div class="hotel_img">
                    <h6 class="tersedia"> Kamar Tersedia : {{$kamar[2]->kamar_kosong}}</h6>
                    <img src="{{ $kamar[2]->foto_kamar}}" alt="">
                    <a href="{{ route('guest.kamar.show',['kamar'=>$kamar[2]->id])}}" class="btn theme_btn button_hover">Lihat</a>
                </div>
                <a href="#"><h4 class="sec_h4">{{ $kamar[2]->nama_kamar }}</h4></a>
                <h5>Rp. {{$kamar[2]->harga_kamar}} <small>/ Malam</small></h5>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="accomodation_item text-center">
                
                <div class="hotel_img">
                    <h6 class="tersedia"> Kamar Tersedia : {{$kamar[3]->kamar_kosong}}</h6>
                    <img src="{{ $kamar[3]->foto_kamar}}" alt="">
                    <a href="{{ route('guest.kamar.show',['kamar'=>$kamar[3]->id])}}" class="btn theme_btn button_hover">Lihat</a>
                </div>
                <a href="#"><h4 class="sec_h4">{{ $kamar[3]->nama_kamar }}</h4></a>
                <h5>Rp. {{$kamar[3]->harga_kamar}} <small>/ Malam</small></h5>
            </div>
        </div>
        
    </div>
</div>
@endsection


    

@section('content_fasilitas')
<section class="facilities_area section_gap">
<div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">  
</div>
<div class="container">
    <div class="section_title text-center">
        <h2 class="title_w">Fasilitas Hotel</h2>
        <p>Fasilitas yang dimiliki hotel ini.</p>
    </div>
    <div class="row mb_30">
        <div class="col-lg-4 col-md-6">
            <div class="facilities_item">
                <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>Restoran</h4>
                <p>Makan dan minum di restoran yang ada di hotel kami.</p>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6">
            <div class="facilities_item">
                <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>Kolam Renang</h4>
                <p>Kolam yang bersih dan luas yang ada di hotel kami.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="facilities_item">
                <h4 class="sec_h4"><i class="lnr lnr-car"></i>Parkiran</h4>
                <p>Parkir aman dan terjaga kebersihannya di jamin tenang.</p>
            </div>
        </div>
        
    </div>
</div>
</section>
@endsection