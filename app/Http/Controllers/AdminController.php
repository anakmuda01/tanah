<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Tanah;
use App\Models\Kredit;
use App\Models\Pembeli;
use App\Models\CartItem;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $cari_k = urldecode($request->input('cari'));
      $trim_cari= trim($cari_k);
      if(!empty($trim_cari)){
        $kredits = Kredit::where('id_kredit', 'like', '%'.$trim_cari.'%')
                            ->orderBy('created_at','desc')
                            ->paginate(10);

        return view('paneladmin/dashboard',compact('kredits'));
      } else {
        $kredits = Kredit::where('status',2)
                          ->orderBy('created_at','desc')
                          ->paginate(10);

        return view('paneladmin/dashboard',compact('kredits'));
      }
    }

    // tanah controls
    public function indexOrder()
    {
      return view('paneladmin/indexOrder');
    }
    public function addKredit()
    {
      return view('paneladmin/addKredit');
    }
    // end tanah control

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kredit = Kredit::find($id);

        foreach ($kredit->cart->cartItems as $items) {
          $no_kavling = $items->tanah->no_kavling;
          $tanah = Tanah::where('no_kavling', $no_kavling)->first();
          $tanah->tags()->sync(1);
        }
        $kredit->delete();

        return redirect('/admin')->with('msg','Berhasil dihapus');
    }
}
