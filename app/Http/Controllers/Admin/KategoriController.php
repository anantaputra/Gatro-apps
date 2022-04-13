<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriRequest;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['kategori'] = Kategori::orderBy('nama_kategori', 'ASC')->paginate(10);
        return view('admin.kategori.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriRequest $request)
    {
        $params = $request->except('_token');
        $nama = $params['nama_kategori'];

         //cek kategori sudah ada
         $kategori = Kategori::firstWhere('nama_kategori', $nama);
       
         if($kategori){
             return redirect('/admin/kategori/')->with('exist', 'Kategori sudah terdaftar');
         }
 
         // generate id
         $lastID = Kategori::select('id_kategori')
                     ->orderByDesc('id_kategori')
                     ->first();

        if($lastID){
            $id = substr($lastID, -3);
            $id = (int) $id;
            $id++;
            $id = str_pad($id, 3, '0', STR_PAD_LEFT);
    
            $idKategori = 'K'.$id;
        } else{
            //ketika data pertama menggunakan id
                $idKategori = 'K001';
        }
 
            //simpan data
         $store = Kategori::create([
             'id_kategori' => $idKategori,
             'nama_kategori' => $nama
         ]);

        //  cek simpan data berhasil
        if($store){
            return redirect('/admin/kategori/')->with('success', 'Kategori berhasil ditambahkan');
        } else {
            return redirect('/admin/kategori/')->with('failed', 'Cek koneksi anda');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);

        $this->data['kategori'] = $kategori;
        return view('admin.kategori.form', $this->data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriRequest $request)
    {
        $params = $request->except('_token');
        $nama = $params['nama_kategori'];
        $id = $params['id'];

        $update = Kategori::where('id_kategori', '=', $id)
        ->update([
            'nama_kategori' => $nama,
        ]);

        try{
            $update;
            return redirect('/admin/kategori')->with('success', 'Data berhasil diubah');
        }catch(\Exception $e){
            return $e->getMessage();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
