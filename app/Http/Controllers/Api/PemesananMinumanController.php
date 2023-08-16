<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Models\pesanminuman;
use App\Models\pesanminumandetail;
use Illuminate\Support\Facades\DB;

class PemesananMinumanController extends Controller
{
   
    public function store(Request $request) {
        $validasi = Validator::make($request->all(), [
            'id_user' => 'required',
            'total_item' => 'required',
            'nama_penerima' => 'required',
            'nomor_hp' => 'required',
            'total_pembayaran' => 'required',
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_transaksi = "INV/PYM/" . now()->format('Y-m-d') . "/" . rand(100, 999);
        $status = "VERIFIKASI";



        $dataTransaksi = array_merge($request->all(), [
            'kode_transaksi' => $kode_transaksi,
            'status' => $status,
            'tanggal_pemesanan_minuman' => now()
        ]);

        \DB::beginTransaction();
        $transaksi = pesanminuman::create($dataTransaksi);
        foreach ($request->minuman as $minuman) {
            $detail = [
                'id_pemesanan' => $transaksi->id_pesanminuman,
                'id_minuman' => $minuman['id_minuman'],
                'kuantitas' => $minuman['kuantitas'],
                'total_harga' => $minuman['total_harga']
            ];
            $transaksiDetail = pesanminumandetail::create($detail);
        }

        if (!empty($transaksi) && !empty($transaksiDetail)) {
            \DB::commit();
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi Berhasil',
                'transaksi' => collect($transaksi)
            ]);
        } else {
            \DB::rollback();
            return $this->error('Transaksi gagal');
        }
    }

    public function history($id_user) {
        $transaksis = pesanminuman::with(['user'])->whereHas('user', function ($query) use ($id_user) {
            $query->where('id_user','=',$id_user);
        })->orderBy("id_pesanminuman", "desc")->get();

        foreach ($transaksis as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail) {
                $detail->minuman;
            }
        }

        if (!empty($transaksis)) {
            return response()->json([
                'success' => 1,
                'message' => 'Transaksi Berhasil',
                'transaksis' => collect($transaksis)
            ]);
        } else {
            $this->error('Transaksi gagal');
        }
    }
}