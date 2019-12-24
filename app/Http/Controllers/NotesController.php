<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class NotesController extends Controller
{

    public function index()
    {
        $data['notes'] = Note::paginate(10);
        return view('notes',$data);
    }

    public function pdf(){

     $data['title'] = 'Notes List';
     $data['notes'] =  Note::get();
     $pdf = PDF::loadView('download_notes', $data);
     return $pdf->download('notes.pdf');
    }


}
