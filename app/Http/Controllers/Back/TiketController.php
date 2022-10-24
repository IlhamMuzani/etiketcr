<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use App\Models\User;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::paginate(3);
        return view('back.tiket.index', compact('tikets'));
    }

    public function create()
    {
        $users = User::get();
        $produks = Produk::get();
        return view('back.tiket.create', compact('users', 'produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
            'deskripsi' => 'required'
        ], [
            'user_id.required' => 'Pilih nama client terlebih dahulu!',
            'produk_id.required' => 'Pilih produk terlebih dahulu!',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong!',
        ]);

        $now = Carbon::now()->format('d-m-Y');

        Tiket::create(array_merge($request->all(), [
            'kode' => $this->generateCode(),
            'status' => 'Menunggu',
            'start_date' => $now
        ]));

        return redirect('tiket')->with('status', 'Berhasil menambahkan tiket');
    }

    public function edit(Tiket $tiket)
    {
        $users = User::all();
        return view('back.tiket.edit', compact('tiket','users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'produk_id' => 'required',
            'deskripsi' => 'required'
        ], [
            'user_id.required' => 'user tidak boleh kosong!',
            'produk_id.required' => 'produk tidak boleh kosong!',
            'deskripsi.required' => 'deskripsi tidak boleh kosong!'
        ]);

        Tiket::where('id', $id)->update([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect('tiket')->with('status', 'Berhasil mengubah tiket');
    }

    public function show(Tiket $tiket)
    {
        return view('back.tiket.show', compact('tiket'));
    }

    public function destroy($id)
    {
        $tiket = Tiket::find($id);
        $tiket->delete();
        return redirect('tiket')->with('status', 'Berhasil menghapus tiket');
    }

    public function generateCode()
    {
        $now = Carbon::now();
        $tikets = Tiket::where('start_date', $now->format('d-m-Y'))->get();
        if (count($tikets) > 0) {
            $count = count($tikets) + 1;
            $num = sprintf("%04s", $count);
        } else {
            $num = "0001";
        }

        $result = $now->format('ymd') . $num;
        return $result;
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required'
        ], [
            'status.required' => 'Pilih status pengaduan!'
        ]);

        $kode = $request->kode;
        $status = $request->status;

        Tiket::where('kode', $kode)->update([
            'status' => $status
        ]);

        return redirect('tiket')->with('status', 'Berhasil memperbarui status pengaduan');
    }
}
