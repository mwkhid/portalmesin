<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dosen = Dosen::where('nip',Auth::user()->nim)->first();
        // $data = Mahasiswa::where('nim',Auth::user()->nim)->first();
        // if($dosen){
        //     return view('signature.index',compact('dosen'));
        // }else{
        //     // dd($data);
        //     return view('signature.index',compact('data'));
        // }
        // return view('signature.index');
    }

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
        switch ($request->input('action')) {
            case 'mhs':
                $this->validate($request, [
                    'image' => 'required|image|mimes:png|max:2048',
                ]);
                
                $image = $request->file('image');
                $input['imagename'] = $request->nim.'.'.$image->extension();
                $img = Image::make($image)
                    ->greyscale() // greyscale the signature image
                    ->contrast(100) // increase the contrast to reach pure black and white
                    ->contrast(50) // more contrast to ensure!
                    ->trim('top-left', null, 40) // it's better to set a tolerance for trim()
                    ->invert(); // invert it to use as a mask
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $destinationPath = 'file_ttd';
                $new_image = Image::canvas($img->width(), $img->height(), '#1E90FF')
                            ->mask($img)->save($destinationPath.'/'.$input['imagename']);

                $mhs = Mahasiswa::find($id);
                $mhs->signature_mhs = $input['imagename'];
                $mhs->save();
           
                return back()->with('message','Image Upload successful');
                break;
    
            case 'dosen':
                $this->validate($request, [
                    'image' => 'required|image|mimes:png|max:2048',
                ]);
                
                $image = $request->file('image');
                $input['imagename'] = $request->nip.'.'.$image->extension();
                $img = Image::make($image)
                    ->greyscale() // greyscale the signature image
                    ->contrast(100) // increase the contrast to reach pure black and white
                    ->contrast(50) // more contrast to ensure!
                    ->trim('top-left', null, 40) // it's better to set a tolerance for trim()
                    ->invert(); // invert it to use as a mask
                $img->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $destinationPath = 'file_ttd';
                $new_image = Image::canvas($img->width(), $img->height(), '#1E90FF')
                            ->mask($img)->save($destinationPath.'/'.$input['imagename']);

                $dosen = Dosen::find($id);
                $dosen->signature_dosen = $input['imagename'];
                $dosen->save();
           
                return back()->with('message','Image Upload successful');
                break;
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
