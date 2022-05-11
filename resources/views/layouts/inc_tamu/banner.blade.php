<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>Selamat Datang</h6>
                <h2>The Mulia Bali</h2>
                <p>Kami menyediakan kamar kamar berkualitas dan terjaga<br> Harga murah tetapi kualitas rendah?Itu bukan disini!</p>
                <a href="{{ route('guest.reservasi.create')}}" class="btn theme_btn button_hover">Get Started</a>
            </div>
        </div>
    </div>
    <div class="hotel_booking_area position">
        <div class="container">
            <div class="hotel_booking_table">
                <div class="col-md-3">
                    <h2>Booking<br> Sekarang</h2>
                </div>
                <div class="col-md-9">
                    <div class="boking_table">
                        <form method="get" action="{{ route('guest.reservasi.create')}}" class="row bg-white py-4 px-2 form-pesan border shadow rounded">
                            <div class="col-md">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0">Check In</span>
                                    </div>
                                    <input type="date"  name="checkin" class="form-control rounded" placeholder="Check In">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0">Check Out</span>
                                    </div>
                                    <input type="date" name="checkout" class="form-control rounded" placeholder="Check Out">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-white border-0">Jumlah Kamar</span>
                                    </div>
                                    <input type="text" name="jumlah" class="form-control rounded" maxlength="3">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-sgit">Pesan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>