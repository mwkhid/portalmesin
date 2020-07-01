<?php

namespace App\Http\Controllers\Admin\Pendadaran;

use App\Models\Pendadaran;
use App\Models\Ruang;
use App\Models\Dosen;
use App\Models\Ta;
use App\Models\Penguji;
use App\Models\Pembimbing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\GoogleCalendar\Event;
use Carbon;

class PendadaranController extends Controller
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
        $data = Pendadaran::listpendadaran();
        // dd($data);
        return view('admin.pendadaran.list_pendadaran',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pendadaran::find($id)->join('ta','ta.id','=','ta_pendadaran.ta_id')
        ->join('ref_mahasiswa','ref_mahasiswa.id','=','ta.mahasiswa_id')
        ->join('ta_seminar','ta_seminar.ta_id','=','ta.id')
        ->select('*','ta_pendadaran.id','ta_seminar.tanggal')
        ->where('ta_pendadaran.id',$id)
        ->firstOrFail();
        $pembimbing = Pembimbing::pembimbing($data->ta_id);
        $penguji = Penguji::pengujisemhas($data->ta_id);
        $ruang = Ruang::all();
        $dosen = Dosen::all();
        // dd($penguji);
        return view('admin.pendadaran.edit_pendadaran',compact('data','pembimbing','ruang','dosen','penguji'));
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
            case 'setuju':
                $validatedData = $request->validate([
                    'tanggal' => 'required|after:tanggal_semhas',
                    'tempat' => 'required',
                    'jam_mulai' => 'required',
                    'jam_selesai' => 'required|after:jam_mulai',
                    'penguji_id1' => 'required',
                    'penguji_id2' => 'required',
                    'penguji1' => 'required|different:penguji2,pem_id1,pem_id2',
                    'penguji2' => 'required|different:penguji1,pem_id1,pem_id2',
                ]);
                // dd($validatedData);
                if($validatedData){

                    $combinedDT1 = date('Y-m-d H:i:s', strtotime("$request->tanggal $request->jam_mulai"));
                    $combinedDT2 = date('Y-m-d H:i:s', strtotime("$request->tanggal $request->jam_selesai"));
                    $event = new Event;
    
                    $event->name = 'Pendadaran '.$request->nama;
                    $event->startDateTime = Carbon\Carbon::createFromDate($combinedDT1);
                    $event->endDateTime = Carbon\Carbon::createFromDate($combinedDT2);
                    // dd($event);
                    $event->save();

                    Pendadaran::where('id',$id)->update([
                        'tanggal' => $request->tanggal,
                        'tempat' => $request->tempat,
                        'jam_mulai' => $request->jam_mulai,
                        'jam_selesai' => $request->jam_selesai,
                        'status_pendadaran' => 'SETUJU',
                    ]);

                    for ($i = 1; $i <= 2; $i++) {
                        $penguji_id = 'penguji_id' . $i;
                        $penguji = 'penguji' . $i;
                        Penguji::where('id',$request->$penguji_id)->update([
                            'penguji_pendadaran' => $request->$penguji,
                        ]);
                    }
                    for ($i = 1; $i <= 2; $i++) {
                        $pem = 'idpem' . $i;
                        Pembimbing::where('id',$request->$pem)->update([
                            'status_pendadaranpem' => 'SETUJU',
                        ]);
                    }
                    // alihkan halaman ke halaman index
                    return redirect(route('admin.pendadaran.index'))->with('message','Pendadaran Berhasil di Update!');
                    break;
                }
    
            case 'tolak':
                Pendadaran::where('id',$id)->update([
                    'status_pendadaran' => 'TOLAK',
                ]);
                return redirect(route('admin.pendadaran.index'))->with('message','Pendadaran Berhasil di Update!');
                break;
        }
        
        // return redirect(route('admin.pendadaran.index'))->with('message','Pendadaran Berhasil di Update!');
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
