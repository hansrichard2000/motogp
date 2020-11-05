@extends('layouts.author')

@section('judul')
    Welcome Mate
@endsection

@section('isi')
    <img src="{{asset('images/FotoKotak.jpg')}}" class="img-thumbnail profileImg rounded-circle">
    <div class="bg-dark text-light text-center mt-4 rounded p mx-auto pt-3 pb-3" style="width:30em">
        <p>Nama : Hans Richard Alim Natadjaja</p>
        <p>Asal Kota : Surabaya</p>
        <p>Tanggal Lahir : 7 November 2000</p>
        <p>Hobby : Catur</p>
    </div>
@endsection

@section('content')
    <section>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>About</h2>
            </div>
        </div>

        <div class="row">
            <div class="col text-justify">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A esse ea labore quia? Repellat, incidunt. Itaque dolore ab odio repellendus et quae consequatur veritatis, repellat provident nulla, veniam non praesentium? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores ex, quas, ullam molestiae consequuntur labore voluptate quidem voluptatem voluptatum culpa quibusdam velit facilis beatae reprehenderit sunt voluptas. Esse, asperiores debitis!</p>
            </div>
            <div class="col text-justify">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita est sint, in eius, dolorem velit nemo suscipit accusamus tenetur repellat amet. Eveniet eum accusantium quam nihil earum! Laborum, accusantium dolorem.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum asperiores ullam sapiente id eum doloremque rem minima, hic nostrum nesciunt eos expedita. Magnam dolores consequuntur provident earum vitae nemo eum.</p>
            </div>
        </div>
    </div>
    </section>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col text-center mt-n4">
                    <h2>Skillset</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="card">
                        <img src="{{asset('images/android.png')}}" class="card-img-top" style="height: 13rem;">
                        <div class="card-body">
                          <p class="card-text text-center">Android Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="{{asset('images/web.jpg')}}" class="card-img-top">
                        <div class="card-body">
                          <p class="card-text text-center">Web Development</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card">
                        <img src="{{asset('images/history.png')}}" class="card-img-top" style="height: 13rem;">
                        <div class="card-body">
                          <p class="card-text text-center">History</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact mb-5" id="contact">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2>Contact Me</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-body">
                          <h5 class="card-title text-center">Contact Me</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><h3>Location</h3></li>
                        <li class="list-group-item">My Office</li>
                        <li class="list-group-item">Queenstown Q1/22, Citraland</li>
                        <li class="list-group-item">Surabaya</li>
                        <li class="list-group-item">Jawa Timur, Indonesia</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <form>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="telp">No. Telp</label>
                            <input type="text" class="form-control" id="telp" name="telp">
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea type="text" class="form-control" id="pesan" name="pesan"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn-primary">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
