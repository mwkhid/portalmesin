<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class UsermanualController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        // get current logged in user
        if (Gate::allows('manage-users')) {
            abort(403, 'Unauthorized action.');
        } else {
            $file_name = 'Manual_Book_PE.pdf';
            $file_path = public_path('file_manual_book/'.$file_name);
            return response()->download($file_path);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get current logged in user
        if (Gate::allows('manage-users')) {
            return view('admin.usermanual.index');
        } else {
            abort(403, 'Unauthorized action.');
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
        if (Gate::allows('manage-users')) {
            $this->validate($request, [
                'file_manual_book' => 'required|file|mimes:pdf|max:10240',
            ]);
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file_manual_book');
            $nama_file = "Manual_Book_PE".".".$file->getClientOriginalExtension();
     
              // isi dengan nama folder tempat kemana file diupload
            $file_upload = 'file_manual_book';
            $file->move($file_upload,$nama_file);
     
            return redirect(route('usermanual.create'))->with('message','File Manual Book Berhasil diupload!');
        } else {
            abort(401, 'Unauthorized action.');
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
}
