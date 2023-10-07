@extends('main.index')

@section('content')
    <section class="hero w-full">
        <div class="h-[100vh] w-full flex bg-cover py-72 bg-center"
            style="background-image: url('{{ asset('images/web/hero-bg.jpg') }}');">
            <div class="container mx-auto space-y-5">
                <p class="font-bold text-2xl text-white">CINEMA<span class="primary-text-color">TIX</span></p>
                <p class="text-5xl font-bold w-[600px]">Unlimited <span class="primary-text-color">Movie</span>, TVs Shows, &
                    More.</p>
                <p>Pesan Tiket Anda Secara Online Sekarang</p>
                <a href=""
                    class="w-[200px] text-xl font-bold justify-center py-2 hover-bg duration-300 rounded-full flex border-2 hover:text-slate-800 border-[#e4d804]">Daftar
                    Movie</a>
            </div>
        </div>
    </section>

    <section class="content w-full py-20 primary-bg-color">
        <div class="container">
            <div class="header w-full flex justify-between items-end">
                <div class="flex flex-col">
                    <label for="location" class="primary-text-color font-light ml-3">PILIH LOKASI</label>
                    <select id="location" class="text-white text-4xl bg-transparent">
                        <option value="" class="text-xl w-full py-1 px-2 secondary-bg-color">Jakarta</option>
                    </select>
                </div>
                <div class="theater-type">
                    <ul class="flex space-x-6">
                        <li><button
                                class="px-5 py-2 hover-bg secondary-bg-color duration-300 rounded-full flex border-2 hover:text-slate-800 border-[#e4d804]">Semua
                                bioskop</button>
                        </li>
                        <li><button
                                class="px-5 py-2 hover-bg secondary-bg-color duration-300 rounded-full flex border-2 hover:text-slate-800 border-slate-800">CGV</button>
                        </li>
                        <li><button
                                class="px-5 py-2 hover-bg secondary-bg-color duration-300 rounded-full flex border-2 hover:text-slate-800 border-slate-800">XXI</button>
                        </li>
                        <li><button
                                class="px-5 py-2 hover-bg secondary-bg-color duration-300 rounded-full flex border-2 hover:text-slate-800 border-slate-800">Cinepolis</button>
                        </li>
                        <li><button
                                class="px-5 py-2 hover-bg secondary-bg-color duration-300 rounded-full flex border-2 hover:text-slate-800 border-slate-800">IMAX</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full flex space-x-4 overflow-x-auto py-12">
                <div class="card w-72 space-y-5 flex-shrink-0 group relative">
                    <div class="w-full overflow-hidden h-[23rem] rounded relative group">
                        <div
                            class="absolute w-full h-full bg-black bg-opacity-25 top-0 rounded items-center justify-center flex-col hidden group-hover:flex duration-300 space-y-3 opacity-0 hover:opacity-100">
                            <a href=""
                                class="w-[140px] hover-bg justify-center py-2 hover:bg secondary-bg-color duration-300 rounded-full flex border-2 hover:text-slate-800 border-[#e4d804]">BUY
                                TICKET</a>
                            <a href="" id="exampleModal"
                                class="w-[140px] hover-bg justify-center py-2 hover:bg secondary-bg-color duration-300 rounded-full flex border-2 hover:text-slate-800 border-[#e4d804]">TRAILER</a>
                        </div>
                        <img src="" class="w-full h-full bg-cover bg-center" alt="judul">
                    </div>
                    <div class="flex justify-between">
                        <p class="text-white font-bold">Judul</p>
                        <p class="primary-text-color">2022</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2 text-[10px] primary-text-color max-w-[140px] overflow-x-auto">
                            <p class="px-2 py-1 border border-slate-800">XXI</p>
                        </div>
                        <div class="flex space-x-2 text-[10px]">
                            <p>120 min</p>
                            <p>4.5 like</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="exampleModal" class="modal">
        <div class="modal__inner">
            Test Modal

            <button class="modal__button">
                close
            </button>
        </div>
    </div>
@endsection
