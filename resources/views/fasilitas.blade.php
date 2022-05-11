@extends('layouts.tamu',['title'=>'Fasilitas'])

@section('content')
<section class="blog_area">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Fasilitas</h2>
        </div>
        <div class="row">
            @foreach ($fasilitas as $item)
            <div class="col-md-3">
                <div class="blog_left_sidebar">
                    <article class="row blog_item justify-content-center">
                       
                        <div class="col-md-12">
                            <div class="blog_post ">
                                
                                
                                    <img src="{{ $item->foto_fasilitas_hotel}}" alt="" class="mt-3">
                                    <div class="blog_details">
                                        <a href="{{ route('guest.fasilitas.show',['fasilitas'=>$item->id])}}"><h2>{{ $item->nama_fasilitas_hotel }}</h2></a>
                                        <p>{{ $item->deskripsi_fasilitas_hotel}}</p>
                                    </div>
                                    
                                   
                                        
                                    
                            </div>
                        </div>
                </article>
            </div>
        </div>
        @endforeach
    </div>
    </div>
</section>

@endsection




{{--  @section('content')
    <h1 class="text-center my-4">Fasilitas</h1>

    @foreach ($fasilitas as $item)
    <hr>
    <div class="row kamar mb-3">
        <div class="col-md-4">
            <img src="{{ $item->foto_fasilitas_hotel}}" class="img-fluid rounded img-thumbnail" />
        </div>
        <div class="col-md">
            <h2>
                <a href="{{ route('guest.fasilitas.show',['fasilitas'=>$item->id])}}">
             {{ $item->nama_fasilitas_hotel }} 
                </a>
            </h2>
            <p>{{ $item->deskripsi_fasilitas_hotel}}</p>
        </div>
    </div>
    @endforeach
    
@endsection  --}}