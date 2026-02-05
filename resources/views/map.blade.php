@extends('layouts.app')

@section('head')
<style>
    #map-container {
        height: calc(100vh - 180px);
        min-height: 400px;
        border-radius: 1rem;
        overflow: hidden;
        border: 1px solid #bfdbfe;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
</style>
@endsection

@section('content')
<div class="mb-4">
    <h1 class="text-4xl font-extrabold text-[#B03A4B] mb-1 tracking-tight">
        LOKASI PDAM KOTA TEGAL
    </h1>
    <div class="mb-4 text-base font-medium tracking-wide text-black">
        PERUSAHAAN DAERAH AIR MINUM KOTA TEGAL
    </div>
</div>

<div id="map-container" class="bg-white">
    <iframe
        src="https://www.google.com/maps?q=PDAM%20Kota%20Tegal&output=embed"
        width="100%"
        height="100%"
        style="border:0;"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
@endsection
