<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CctvController extends Controller
{
    /**
     * Menampilkan halaman manage CCTV
     */
    public function index()
    {
        $cctvs = Cctv::all();
        return view('cctv.index', compact('cctvs'));
    }

    /**
     * Menyimpan data CCTV baru
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'stream_url' => 'required|url'
        ]);

        try {
            $cctv = Cctv::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'CCTV berhasil ditambahkan',
                'data' => $cctv
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Mengupdate data CCTV
     */
    public function update(Request $request, Cctv $cctv): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'lat' => 'required|numeric|between:-90,90',
            'lng' => 'required|numeric|between:-180,180',
            'stream_url' => 'required|url'
        ]);

        // Hapus _method dari data yang akan diupdate
        $data = $request->except(['_method']);
        $cctv->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'CCTV berhasil diperbarui',
            'data' => $cctv
        ]);
    }

    /**
     * Menghapus data CCTV
     */
    public function destroy(Cctv $cctv): JsonResponse
    {
        $cctv->delete();

        return response()->json([
            'success' => true,
            'message' => 'CCTV berhasil dihapus'
        ]);
    }
}