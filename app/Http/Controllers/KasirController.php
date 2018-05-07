<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Tanah;
use App\Models\Kasir;
use App\Models\Kredit;
use App\Models\Pembeli;
use App\Models\CartItem;
use Illuminate\Http\Request;

class KasirController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kasir/cariKredit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $cari_k = urldecode($request->input('cari'));
      $trim_cari= trim($cari_k);
      if(!empty($trim_cari))
      {
        $kredit = Kredit::where('id_kredit', $trim_cari)->first();
        if($kredit){
          return view('kasir/pembayaran',compact('kredit'));
        }else{
          return redirect('/kasir')->with('status','ID Kredit tidak ada !');
        }
      } else {
        return redirect('/kasir')->with('status','ID Kredit tidak ada !');
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $kredit = Kredit::where('id_kredit',$request->id_kredit)->first();

      $this->validate($request, [
        'tanggal' => 'required',
      ]);

      $t_sisa = $kredit->sisa_angsuran - $kredit->angsuran_perbulan;
      $t_ke = $kredit->jumlah_angsur - $kredit->lama_angsuran;
      $t_cicil = $kredit->lama_angsuran - 1;

      $kasir = Kasir::create([
        'pembeli_id' => $kredit->pembeli_id,
        'kredit_id' => $kredit->id,
        'tanggal_bayar' => $request->tanggal,
        'sisa_angsuran' => $t_sisa,
        'sisa_cicilan'  => $t_cicil,
        'angsuran_ke' => $t_ke+1
      ]);

      $kredit->update([
        'sisa_angsuran' => $t_sisa,
        'lama_angsuran' => $t_cicil
      ]);

      return redirect('/histori/'.$kredit->id)->with('msg','Transaksi Pembayaran Berhasil');
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
        //
    }

    public function histori($id){
      $histories = Kasir::where('kredit_id', $id)
                        ->orderBy('created_at','desc')
                        ->paginate(2);
      $kredit = Kredit::find($id);
      if($kredit){
        $id = $kredit->id_kredit;
      }
      if($histories){
        return view('kasir/history',compact(['histories','id']));
      }
    }
}
