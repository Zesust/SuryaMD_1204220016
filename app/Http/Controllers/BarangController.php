<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Satuan;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Barang List';
        // ELOQUENT
        $barangs = Barang::all();

        return view('barang.index', ['pageTitle' => $pageTitle,'barangs' => $barangs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create barang';
       
        $satuans = Satuan::all();
        return view('barang.create', compact('pageTitle', 'satuans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'kodeBarang' => 'required',
            'namaBarang' => 'required',
            'deskripsiBarang' => 'required',
            'hargaBarang' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



        // INSERT QUERY
        $barang = new Barang;
        $barang->kodeBarang = $request->kodeBarang;
        $barang->namaBarang = $request->namaBarang;
        $barang->deskripsiBarang = $request->deskripsiBarang;
        $barang->hargaBarang = $request->hargaBarang;
        $barang->satuan_id = $request->satuan;
        $barang->save();
        return redirect()->route('barangs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'barang Detail';
        // RAW SQL QUERY
        $barang = Barang::find($id);
        return view('barang.show', compact('pageTitle', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Edit barang';

        //eloduent
        $satuans = Satuan::all();
        $barang = Barang::find($id);

        return view('barang.edit', compact('pageTitle', 'barang', 'satuans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        $validator = Validator::make($request->all(), [
            'kodeBarang' => 'required',
            'namaBarang' => 'required',
            'deskripsiBarang' => 'required',
            'hargaBarang' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::table('barangs')->where('id', $id)->update([
            'kodeBarang' => $request->kodeBarang,
            'namaBarang' => $request->namaBarang,
            'deskripsiBarang' => $request->deskripsiBarang,
            'hargaBarang' => $request->hargaBarang,
            'satuan_id' => $request->satuan,
        ]);

        // ELOQUENT
        $barang = Barang::find($id);
        $barang->kodeBarang = $request->kodeBarang;
        $barang->namaBarang = $request->namaBarang;
        $barang->deskripsiBarang = $request->deskripsiBarang;
        $barang->hargaBarang = $request->hargaBarang;
        $barang->satuan_id = $request->satuan;
        $barang->save();


        return redirect()->route('barangs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // QUERY BUILDER
        Barang::find($id)->delete();
        return redirect()->route('barangs.index');
    }
}
