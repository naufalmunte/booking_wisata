@extends('layouts.main')

@section('container')

<section style="
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  overflow: hidden;
  padding: 0;
  margin: 0;
">
  <!-- Background Image -->
  <img src="{{ asset('image/bg1.jpg') }}" 
       style="
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         object-fit: cover;
         z-index: 0;
         filter: brightness(0.8);
         margin: 0;
       " />

  <!-- Overlay -->
  <div style="
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0.4) 100%);
    z-index: 1;
    margin: 0;
  "></div>

  <!-- Konten -->
  <div style="
    position: relative;
    text-align: center;
    color: #2d5a3d;
    z-index: 2;
    background-color: rgba(255,255,255,0.8);
    padding: 2rem;
    border-radius: 16px;
    backdrop-filter: blur(4px);
    max-width: 800px;
    margin: 1rem;
  ">
    <!-- Logo -->
    <div style="margin-bottom: 1.5rem;">
      <img src="{{ asset('image/lasax3.png') }}" 
           style="max-width: 200px;" 
           alt="Logo Lasax" />
    </div>

    <!-- Judul -->
    <h1 style="
      font-weight: bold;
      font-size: 1.8rem;
      margin-bottom: 1rem;
      text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    ">
      Jelajahi Keindahan Sumatera Barat Bersama Kami!
    </h1>

    <!-- Deskripsi -->
    <p style="margin-bottom: 1rem; line-height: 1.6;">
      Lasax Adventure adalah penyedia jasa open trip terpercaya...
    </p>

    <!-- Tombol (untuk guest) -->
    @guest
    <div style="display: flex; justify-content: center; gap: 0.5rem; margin-top: 1rem;">
      <a href="{{ route('pengguna.daftar') }}"
         style="
           background-color: #5A827E;
           color: black;
           padding: 0.5rem 1.5rem;
           font-weight: 600;
           border-radius: 50px;
           text-decoration: none;
           font-size: 0.95rem;
           transition: all 0.3s;
         "
         onmouseover="this.style.color='white'; this.style.transform='scale(1.05)'"
         onmouseout="this.style.color='black'; this.style.transform='scale(1)'">
         Daftar Akun
      </a>
    </div>
    @endguest
  </div>
</section>



<section id="daftarPaket" style="
  padding: 2rem 0;
  background-color: #f8f9fa;
">
  <div style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
    <!-- Card Container -->
    <div style="
      background: white;
      border-radius: 16px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      padding: 1.5rem;
    ">
      <h2 style="
        text-align: center;
        font-weight: bold;
        margin-bottom: 1.5rem;
        color: #2d5a3d;
      ">
        Daftar Paket Wisata
      </h2>

      <!-- Search Bar -->
      <div style="display: flex; justify-content: flex-end; margin-bottom: 1rem;">
        <form action="{{ route('wisata.index') }}#daftarPaket" 
              method="GET" 
              style="display: flex; max-width: 400px; width: 100%;">
          <input type="text" 
                 name="cari" 
                 placeholder="Cari paket wisata..." 
                 value="{{ request('cari') }}"
                 style="
                   flex: 1;
                   padding: 0.5rem 1rem;
                   border: 1px solid #5A827E;
                   border-radius: 50px 0 0 50px;
                   outline: none;
                 " />
          <button type="submit"
                  style="
                    background-color: #5A827E;
                    color: white;
                    border: none;
                    padding: 0 1rem;
                    border-radius: 0 50px 50px 0;
                    cursor: pointer;
                  ">
            <i class="bi bi-search"></i>
          </button>
        </form>
      </div>

      <!-- Card Item (Contoh 1) -->
      <div style="
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
      ">
        @foreach ($paketwisata as $paket)
        <div style="
          background: white;
          border: 1px solid #e0e0e0;
          border-radius: 12px;
          overflow: hidden;
          box-shadow: 0 4px 8px rgba(0,0,0,0.05);
          transition: all 0.3s;
        " 
        onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 20px rgba(0,0,0,0.1)'"
        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 8px rgba(0,0,0,0.05)'">
          <!-- Gambar -->
          <img src="{{ $paket->gambar ? asset('storage/' . $paket->gambar) : 'https://via.placeholder.com/400x200?text=No+Image' }}" 
               style="
                 width: 100%;
                 height: 200px;
                 object-fit: cover;
                 transition: transform 0.5s;
               "
               onmouseover="this.style.transform='scale(1.03)'"
               onmouseout="this.style.transform='scale(1)'" />

          <!-- Body Card -->
          <div style="padding: 1.25rem; display: flex; flex-direction: column; height: calc(100% - 200px);">
            <h3 style="font-weight: bold; margin-bottom: 0.5rem; color: #2d5a3d;">
              {{ $paket->nama_paket }}
            </h3>
            <p style="color: #666; margin-bottom: 0.5rem; font-size: 0.9rem;">
              {{ $paket->lokasi }}
            </p>
            <p style="color: #666; margin-bottom: 0.5rem; font-size: 0.9rem;">
              Durasi: {{ $paket->durasi_hari }} Hari
            </p>
            <p style="font-weight: bold; color: #3a7d44; margin-bottom: 1rem;">
              Rp {{ number_format($paket->harga_per_orang, 0, ',', '.') }} / orang
            </p>

            <!-- Tombol -->
            <div style="display: flex; gap: 0.5rem; margin-top: auto;">
              <a href="{{ route('wisata.detail', $paket->id) }}" 
                 style="
                   background-color: #5A827E;
                   color: white;
                   padding: 0.5rem 1rem;
                   text-decoration: none;
                   border-radius: 8px;
                   text-align: center;
                   flex: 1;
                 ">
                 Lihat Detail
              </a>
              <a href="{{ route('booking.create', ['paket_id' => $paket->id]) }}" 
                 style="
                   background-color: #3a7d44;
                   color: white;
                   padding: 0.5rem 1rem;
                   text-decoration: none;
                   border-radius: 8px;
                   text-align: center;
                   flex: 1;
                 ">
                 Booking
              </a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- Pagination -->
      <div style="display: flex; justify-content: flex-end; margin-top: 2rem;">
        {{ $paketwisata->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
</section>

@endsection
