@extends('layouts.app')

@section('head')
    <!-- Toastify CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endsection

@section('content')
<div class="max-w-6xl px-4 py-8 mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="text-[#B03A4B] hover:text-[#a02f3e] transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h1 class="text-3xl font-extrabold text-[#B03A4B] tracking-tight">MANAGE CCTV</h1>
        </div>
        <button onclick="openCreateModal()" class="flex items-center gap-2 px-5 py-2 text-sm font-semibold text-white bg-[#B03A4B] hover:bg-[#a02f3e] rounded-lg shadow transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah CCTV
        </button>
    </div>

    <div class="overflow-hidden bg-white border border-gray-200 shadow rounded-2xl">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200" id="cctvTable">
                <thead class="bg-[#B03A4B]/10">
                    <tr>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-[#B03A4B] uppercase">Nama</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-[#B03A4B] uppercase">Latitude</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-[#B03A4B] uppercase">Longitude</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-[#B03A4B] uppercase">Stream URL</th>
                        <th class="px-6 py-3 text-xs font-bold tracking-wider text-left text-[#B03A4B] uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100" id="cctvTableBody">
                    @forelse($cctvs as $cctv)
                    <tr id="cctv-row-{{ $cctv->id }}" class="hover:bg-[#B03A4B]/5 transition">
                        <td class="px-6 py-4 text-sm font-semibold text-gray-900 whitespace-nowrap">{{ $cctv->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $cctv->lat }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">{{ $cctv->lng }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">
                            <div class="max-w-xs truncate" title="{{ $cctv->stream_url }}">
                                {{ $cctv->stream_url }}
                            </div>
                        </td>
                        <td class="flex gap-2 px-6 py-4 text-sm font-medium whitespace-nowrap">
                            <button onclick="openEditModal({{ $cctv->id }}, '{{ addslashes($cctv->name) }}', {{ $cctv->lat }}, {{ $cctv->lng }}, '{{ addslashes($cctv->stream_url) }}')" 
                                    class="p-2 rounded hover:bg-[#B03A4B]/10 text-[#B03A4B] transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </button>
                            <button onclick="deleteCctv({{ $cctv->id }})" class="p-2 text-red-600 transition rounded hover:bg-red-100" title="Hapus">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr id="empty-row">
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data CCTV</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('cctv.modal')

<!-- Modal Konfirmasi Delete -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden bg-black/40">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-xs bg-white rounded-2xl shadow-2xl border border-[#B03A4B]/30 p-6 text-center">
            <div class="mb-4 text-xl font-bold text-[#B03A4B]">Konfirmasi Hapus</div>
            <div class="mb-6 text-gray-700">Apakah Anda yakin ingin menghapus CCTV ini?</div>
            <div class="flex justify-center gap-3">
                <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 text-[#B03A4B] font-semibold bg-gray-100 rounded-md hover:bg-gray-200 border border-[#B03A4B]/20 transition">Batal</button>
                <button type="button" id="confirmDeleteBtn" class="px-4 py-2 text-white font-semibold bg-[#B03A4B] rounded-md hover:bg-[#a02f3e] shadow transition">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
let isEditMode = false;
let deleteCctvId = null;

function showToast(message, type = 'success') {
    Toastify({
        text: message,
        duration: 1500,
        gravity: "top",
        position: "right",
        backgroundColor: type === 'success' ? "#22c55e" : "#ef4444",
        stopOnFocus: true,
        close: true
    }).showToast();
}

function openCreateModal() {
    isEditMode = false;
    document.getElementById('modalTitle').textContent = 'Tambah CCTV';
    document.getElementById('cctvForm').reset();
    document.getElementById('cctvId').value = '';
    document.getElementById('cctvModal').classList.remove('hidden');
}

function openEditModal(id, name, lat, lng, streamUrl) {
    isEditMode = true;
    document.getElementById('modalTitle').textContent = 'Edit CCTV';
    document.getElementById('cctvId').value = id;
    document.getElementById('name').value = name;
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
    document.getElementById('stream_url').value = streamUrl;
    document.getElementById('cctvModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('cctvModal').classList.add('hidden');
}

function renderRow(cctv) {
    return `
    <tr id="cctv-row-${cctv.id}" class="hover:bg-[#B03A4B]/5 transition">
        <td class="px-6 py-4 text-sm font-semibold text-gray-900 whitespace-nowrap">${cctv.name}</td>
        <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">${cctv.lat}</td>
        <td class="px-6 py-4 text-sm text-gray-700 whitespace-nowrap">${cctv.lng}</td>
        <td class="px-6 py-4 text-sm text-gray-700">
            <div class="max-w-xs truncate" title="${cctv.stream_url}">
                ${cctv.stream_url}
            </div>
        </td>
        <td class="flex gap-2 px-6 py-4 text-sm font-medium whitespace-nowrap">
            <button onclick="openEditModal(${cctv.id}, '${escapeHtml(cctv.name)}', ${cctv.lat}, ${cctv.lng}, '${escapeHtml(cctv.stream_url)}')" 
                    class="p-2 rounded hover:bg-[#B03A4B]/10 text-[#B03A4B] transition" title="Edit">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </button>
            <button onclick="deleteCctv(${cctv.id})" class="p-2 text-red-600 transition rounded hover:bg-red-100" title="Hapus">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        </td>
    </tr>
    `;
}

function escapeHtml(text) {
    return text.replace(/'/g, '&#39;').replace(/"/g, '&quot;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
}

document.getElementById('cctvForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const data = Object.fromEntries(formData);
    const url = isEditMode ? `/cctv/${data.id}` : '/cctv';
    const method = isEditMode ? 'POST' : 'POST';
    if (isEditMode) {
        data._method = 'PUT';
    }

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            closeModal();
            if (isEditMode) {
                // Update row
                const row = document.getElementById('cctv-row-' + result.data.id);
                if (row) row.outerHTML = renderRow(result.data);
                showToast('CCTV berhasil diupdate', 'success');
            } else {
                // Remove empty row if exists
                const emptyRow = document.getElementById('empty-row');
                if (emptyRow) emptyRow.remove();
                // Add new row
                document.getElementById('cctvTableBody').insertAdjacentHTML('beforeend', renderRow(result.data));
                showToast('CCTV berhasil ditambahkan', 'success');
            }
        } else {
            showToast('Terjadi kesalahan: ' + result.message, 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Terjadi kesalahan saat menyimpan data', 'error');
    });
});

function deleteCctv(id) {
    deleteCctvId = id;
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    deleteCctvId = null;
    document.getElementById('deleteModal').classList.add('hidden');
}

document.getElementById('confirmDeleteBtn').onclick = function() {
    if (!deleteCctvId) return;
    fetch(`/cctv/${deleteCctvId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(result => {
        closeDeleteModal();
        if (result.success) {
            // Remove row
            const row = document.getElementById('cctv-row-' + deleteCctvId);
            if (row) row.remove();
            // If table is empty, show empty row
            if (!document.querySelector('#cctvTableBody tr')) {
                document.getElementById('cctvTableBody').innerHTML = `<tr id="empty-row"><td colspan="5" class="px-6 py-4 text-center text-gray-500">Tidak ada data CCTV</td></tr>`;
            }
            showToast('CCTV berhasil dihapus', 'success');
        } else {
            showToast('Terjadi kesalahan: ' + result.message, 'error');
        }
        deleteCctvId = null;
    })
    .catch(error => {
        closeDeleteModal();
        console.error('Error:', error);
        showToast('Terjadi kesalahan saat menghapus data', 'error');
        deleteCctvId = null;
    });
};

// Optional: close modal if click outside
document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) closeDeleteModal();
});
</script>
@endsection