<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Tanah;
use Illuminate\Http\Request;

class TanahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tanahs = Tanah::with('tags')
                ->orderBy('created_at','desc')
                ->paginate(5);

      return view('paneladmin/indexTanah',['tanahs'=>$tanahs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tags = Tag::all();
      return view('paneladmin/addTanah', compact('tags'));
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
        'no_kavling' => 'required|unique:tanahs|min:1|max:25',
        'panjang' => 'required|min:1|max:25',
        'lebar' => 'required|min:1|max:25',
        'harga_tanah' => 'required|min:2|max:1000',
      ]);

      $request->status = array_diff($request->status, [0]);
      if(empty($request->status)){
        return redirect('/tanah/create')->withInput($request->input())->with('tag_error','Silahkan pilih Status');
      }

      $a= $request->harga_tanah;
      $b= str_replace(',00','',$a);
      $c= preg_replace("/[^0-9]+/", "", $b);

      $tanah = Tanah::create([
        'no_kavling' => $request->no_kavling,
        'slug_kavling' => str_slug($request->no_kavling),
        'panjang' => $request->panjang,
        'lebar' => $request->lebar,
        'harga_kavling' => $c,
        'keterangan' => $request->keterangan,
      ]);

      $tanah->tags()->attach($request->status);

      return redirect('/tanah')->with('msg','Tanah Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tanah = Tanah::findOrFail($id);
        if($tanah){
          return view('paneladmin/lihatTanah', compact('tanah'));
        }else{
          dd('data tidak ada');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tanah = Tanah::find($id);
        $tags = Tag::all();
        if($tanah){
          return view('paneladmin/editTanah',compact(['tanah','tags']));
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
        'panjang' => 'required',
        'lebar' => 'required',
        'keterangan' => 'required',
        'harga_tanah' => 'required'
      ]);

      $request->status = array_diff($request->status, [0]);
      if(empty($request->status)){
        return redirect()->back()->withInput($request->input())->with('tag_error','Silahkan pilih status');
      }

      $a= $request->harga_tanah;
      $b= str_replace(',00','',$a);
      $c= preg_replace("/[^0-9]+/", "", $b);

      $tanah = Tanah::findOrFail($id);
      if($tanah)
        $tanah->update([
          'panjang' => $request->panjang,
          'lebar' => $request->lebar,
          'harga_kavling' => $c,
          'keterangan' => $request->keterangan
        ]);

        $tanah->tags()->sync($request->status);

        return redirect('/tanah')->with('msg','Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tanah = Tanah::find($id);
      if($tanah){
        $tanah->delete();

        return redirect('/tanah')->with('msg','Berhasil dihapus');
      }
    }
}
