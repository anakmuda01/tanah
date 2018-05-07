<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelis = Pembeli::paginate(5);

        return view('paneladmin/indexPembeli',compact('pembelis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paneladmin/addPembeli');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'id_pembeli' => 'required|unique:pembelis|min:1|max:25',
        'nama_pembeli' => 'required|min:1|max:50',
        'alamat_pembeli' => 'required|min:10',
        'no_telpon' => 'required|max:15',
      ]);

      $pembeli = Pembeli::create([
        'id_pembeli' => $request->id_pembeli,
        'nama_pembeli' => $request->nama_pembeli,
        'alamat_pembeli' => $request->alamat_pembeli,
        'no_telpon' => $request->no_telpon,
        'foto' => $request->foto,
      ]);

      // $pembeli->cart()->save(new Cart);

      return redirect('/pembeli')->with('msg','Produk Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $pembeli = Pembeli::find($id);
      if($pembeli){
        return view('paneladmin/editPembeli',compact('pembeli'));
      }else{
        dd('data tidak ada');
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'nama_pembeli' => 'required',
        'alamat_pembeli' => 'required',
        'no_telpon' => 'required',
      ]);

      $pembeli = Pembeli::findOrFail($id);
      if($pembeli)
        $pembeli->update([
          'nama_pembeli' => $request->nama_pembeli,
          'alamat_pembeli' => $request->alamat_pembeli,
          'no_telpon' => $request->no_telpon
        ]);

        return redirect('/pembeli')->with('msg','Data dari '.$pembeli->id_pembeli.' Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembeli = Pembeli::find($id);

        $pembeli->delete();

        return redirect('/pembeli')->with('msg','ID Pembeli : '.$pembeli->id_pembeli.' berhasil dihapus !');
    }
}
