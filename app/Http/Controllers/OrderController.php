<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Tanah;
use App\Models\Kredit;
use App\Models\Pembeli;
use App\Models\CartItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $kredits = Kredit::where('status',1)->paginate(12);

      return view('paneladmin/indexOrder',['kredits'=>$kredits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paneladmin/addKredit');
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
          'id_pembeli' => 'required',
          'id_kredit' => 'required|unique:kredits|min:1|max:10'
        ]);

        $pembeli = Pembeli::where('id_pembeli', $request->id_pembeli)->first();

        if(!$pembeli){
          return ('id pembeli gak ditemukan');
        }

        $kredit = Kredit::create([
          'id_kredit' => $request->id_kredit,
          'pembeli_id' => $pembeli->id
        ]);

        $kredit->cart()->save(new Cart);

        return redirect('/order')->with('msg','Kredit dari '.$request->id_kredit.' berhasil dibuat!');
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
      $kredit = Kredit::find($id);

      if(!$kredit){
        dd(' id kredit not found');
      }

      return view('paneladmin/editOrder',compact('kredit'));
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

        return redirect('/order')->with('msg','Berhasil dihapus');
    }

    public function checkOut($id)
    {
      $kredit = Kredit::find($id);
      $cart_id = $kredit->cart->id;
      $order = Cart::find($cart_id);
      $jumlah = 0;
      $items = "";
      foreach ($order->cartItems as $i) {
        $jumlah += $i->harga_item;
        $items .= 'No.'.$i->tanah->no_kavling.' ';
      }

      return view('paneladmin/checkOut',compact(['kredit','jumlah','items']));
    }

    public function hapusKav($kredit_id, $no_kavling, $id){

        $tanah = Tanah::where('no_kavling', $no_kavling)->first();
        $tanah->tags()->sync(1);

        CartItem::destroy($id);
        return redirect('/order/'.$kredit_id.'/edit')->with('msg','Berhasil dihapus');
    }

    public function simpanCheckOut(Request $request){
        $this->validate($request, [
          'uang_muka' => 'required',
          'lama_angsuran' => 'required',
          'kavling_dibeli' => 'required'
        ]);

        $a= $request->uang_muka;
        $b= str_replace(',00','',$a);
        $c= preg_replace("/[^0-9]+/", "", $b);

        $kredit = Kredit::where('id_kredit', $request->id_kredit)->first();

        if($kredit){
          $kredit->update([
            'total_harga' => $request->total_harga,
            'uang_muka' => $c,
            'sisa_angsuran' => $request->sisa_angsuran,
            'lama_angsuran' => $request->lama_angsuran,
            'jumlah_angsur' => $request->lama_angsuran,
            'angsuran_perbulan' => $request->angsuran_perbulan,
            'status' => 2
          ]);

          return redirect('/admin')->with('msg','Data Kredit dari '.$request->id_kredit.' sukses disimpan!');

        } else {
          dd('data tidak ditemukan');
        }
    }

    public function addItems(Request $request)
    {
        $kredit = Kredit::where('id_kredit', $request->id_kredit)->first();

        if(!$kredit){
          return ('id tidak ditemukan');
        }

        $request->kavling = array_diff($request->kavling, [0]);
        if(empty($request->kavling)){
          return redirect('/kredit/'.$kredit->id)->withInput($request->input())->with('tag_error','Silahkan pilih tanah kavling yang akan dibeli');
        }

        $id = $kredit->id;

        $cart = Cart::where('kredit_id', $id)->first();

        $tanah = Tanah::where('no_kavling', $request->kavling)->first();
        $item_id = $tanah->id;

        $cartItem  = new Cartitem();
        $cartItem->tanah_id= $item_id;
        $cartItem->cart_id= $cart->id;
        $cartItem->harga_item= $tanah->harga_kavling;

        $cartItem->save();

        $tanah->tags()->sync(2);

        return redirect('/order');
    }

    public function beliTanah($id){
      $kredit = Kredit::find($id);

      $tag = 1;
      $tanahs = Tanah::with('tags')->whereHas('tags', function($query) use ($tag) {
                                      $query->where('tag_id', 1);
                                    })->get();

      return view('paneladmin/beliTanah',compact(['tanahs','kredit']));
    }
}
