<!-- Modal Create/Edit -->
<div id="cctvModal" class="fixed inset-0 z-50 hidden bg-black/40">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl border border-[#B03A4B]/30">
            <div class="flex items-center justify-between p-6 border-b border-[#B03A4B]/20">
                <h3 id="modalTitle" class="text-lg font-bold text-[#B03A4B]">Tambah CCTV</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-[#B03A4B] transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form id="cctvForm" class="p-6">
                <input type="hidden" id="cctvId" name="id">
                
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-semibold text-[#B03A4B]">Nama CCTV</label>
                    <input type="text" id="name" name="name" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#B03A4B]/60">
                </div>
                
                <div class="mb-4">
                    <label for="lat" class="block mb-2 text-sm font-semibold text-[#B03A4B]">Latitude</label>
                    <input type="number" id="lat" name="lat" step="any" required min="-90" max="90"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#B03A4B]/60">
                </div>
                
                <div class="mb-4">
                    <label for="lng" class="block mb-2 text-sm font-semibold text-[#B03A4B]">Longitude</label>
                    <input type="number" id="lng" name="lng" step="any" required min="-180" max="180"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#B03A4B]/60">
                </div>
                
                <div class="mb-6">
                    <label for="stream_url" class="block mb-2 text-sm font-semibold text-[#B03A4B]">Stream URL</label>
                    <input type="url" id="stream_url" name="stream_url" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#B03A4B]/60">
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeModal()" 
                            class="px-4 py-2 text-[#B03A4B] font-semibold transition-colors bg-gray-100 rounded-md hover:bg-gray-200 border border-[#B03A4B]/20">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-white font-semibold transition-colors bg-[#B03A4B] rounded-md hover:bg-[#a02f3e] shadow">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>