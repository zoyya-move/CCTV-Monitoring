@extends('layouts.app')

@section('head')
    <style>
        .modal-bg {
            background: rgba(30,30,30,0.6);
        }
    </style>
@endsection

@section('content')
<div class="flex gap-6">
    <!-- Sidebar -->
    <aside class="w-72 min-h-[500px] bg-white border border-gray-200 rounded-2xl shadow flex flex-col p-5 mr-2">
        <div class="flex items-center justify-between mb-4">
            <span class="font-bold text-[#B03A4B] text-lg tracking-wide">CCTV List</span>
            <a href="{{ route('cctv.index') }}" class="text-xs font-semibold text-white bg-[#B03A4B] hover:bg-[#a02f3e] px-3 py-1 rounded transition">
                Manage CCTV
            </a>
        </div>
        <ul class="flex-1 space-y-2">
            @foreach($cctvs as $cctv)
                <li>
                    <button 
                        onclick="openCctvModal('{{ addslashes($cctv->name) }}', '{{ addslashes($cctv->stream_url) }}')" 
                        class="w-full text-left px-3 py-2 rounded-lg hover:bg-[#B03A4B]/10 text-sm font-medium text-gray-800 transition"
                    >
                        {{ $cctv->name }}
                    </button>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- CCTV Grid -->
    <div class="flex-1">
        <h1 class="text-4xl font-extrabold text-[#B03A4B] mb-1 tracking-tight">DASHBOARD MONITORING CCTV</h1>
        <div class="mb-6 text-base font-medium tracking-wide text-black">PLATFROM CCTV PERUSAHAAN DAERAH AIR MINUM KOTA TEGAL</div>
        @if($cctvs->isEmpty())
            <div class="p-6 text-center text-gray-600 bg-yellow-100 shadow rounded-xl">
                Belum ada data CCTV tersedia.
            </div>
        @else
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($cctvs as $cctv)
            <div 
                class="group cursor-pointer flex flex-col overflow-hidden bg-white border border-gray-200 rounded-2xl shadow transition hover:shadow-xl hover:border-[#B03A4B]"
                onclick="openCctvModal('{{ addslashes($cctv->name) }}', '{{ addslashes($cctv->stream_url) }}')"
            >
                <!-- Preview Stream -->
                <div class="relative bg-black aspect-video">
                    <iframe 
                        src="{{ $cctv->stream_url }}" 
                        class="w-full h-full border-0 rounded-t-2xl group-hover:scale-[1.03] transition-transform duration-300 ease-out" 
                        frameborder="0"
                        allowfullscreen
                    ></iframe>
                    <span class="absolute top-2 right-2 bg-[#B03A4B] text-white text-[10px] font-bold px-2 py-0.5 rounded shadow uppercase tracking-wide">Live</span>
                </div>
                <!-- Card Content -->
                <div class="flex flex-col justify-between flex-1 px-4 py-3">
                    <h2 class="text-base font-semibold text-gray-900 leading-snug truncate group-hover:text-[#B03A4B] transition-colors">
                        {{ $cctv->name }}
                    </h2>
                </div>
            </div>
        @endforeach
            </div>
        @endif
    </div>
</div>

<!-- CCTV Modal -->
<div id="cctvModal" class="fixed inset-0 z-50 flex items-center justify-center hidden modal-bg">
    <div class="relative w-full max-w-2xl mx-4 bg-white shadow-2xl rounded-2xl">
        <button onclick="closeCctvModal()" class="absolute top-3 right-3 text-gray-400 hover:text-[#B03A4B]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <div class="p-6">
            <div class="mb-3 text-xl font-bold text-[#B03A4B]" id="modalCctvName"></div>
            <div class="overflow-hidden border border-gray-200 aspect-video rounded-xl">
                <iframe id="modalCctvStream" src="" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function openCctvModal(name, streamUrl) {
    document.getElementById('modalCctvName').textContent = name;
    document.getElementById('modalCctvStream').src = streamUrl;
    document.getElementById('cctvModal').classList.remove('hidden');
}
function closeCctvModal() {
    document.getElementById('cctvModal').classList.add('hidden');
    document.getElementById('modalCctvStream').src = '';
}
document.getElementById('cctvModal').addEventListener('click', function(e) {
    if (e.target === this) closeCctvModal();
});
</script>
@endsection
