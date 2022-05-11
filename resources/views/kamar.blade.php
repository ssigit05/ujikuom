@extends('layouts.tamu',['title'=>'Kamar'])
@section('content')
<section class="blog_area">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Kamar</h2>
            <div class="row">
                <div class="col">
                    <x-search/>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($kamar as $item)
            <div class="col-md-3">
                <div class="blog_left_sidebar">
                    <article class="row blog_item justify-content-center">
                       
                        <div class="col-md-12">
                            <div class="blog_post ">

                                <img src="{{ $item->foto_kamar}}" alt="" class="mt-3">
                                     
                                        <h6 class="tersedia">
                                            Kamar Tersedia : {{$item->kamar_kosong}}
                                        </h6>
                                   
                                    <div class="blog_details">
                                        <a href="{{ route('guest.kamar.show',['kamar'=>$item->id])}}"><h2>{{ $item->nama_kamar }}</h2></a>
                                        
                                        <h4 class="card bg-dark p-2">Rp. {{ $item->harga_kamar}} <small>/ Malam</small></h4>
                                   
                                    
                                    <div class="bawah text-center">
                                        <p>{{ $item->deskripsi_kamar}}</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        
                </article>
                
                    
                
                
            </div>
        </div>
        @empty
        <div class="col">
            
                
                    <div class="text-center">
                        <br><br>
                        <h1>Kamar Tidak Ada</h1>
                    </div>
                
                
            
            
        </div>
        
           
        
    </div>
    @endforelse
    </div>
</section>
@endsection
