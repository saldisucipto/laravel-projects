<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;
use PDF;

class TodoController extends Controller
{
    // index controller for home page
    public function index(){
        $data = Todo::orderBy('created_at', 'desc')->get();
        //dd($data);
        //var_dump($data);
        // return \response(\json_decode($data));  // oke untuk mebampilkan dat sebagai json
        return view('todo.index', [
            'data' => $data,
        ]);
    }

    // show function 
    public function show($id){
        $data = Todo::find($id);
        // return response()->json(json_decode(json_encode($data)));
        return view('todo.show');
        //dd($data);
    }

    // create todo 
    public function create(Request $create){
        $data = $create->all();

        $buatTodo = new Todo;
        $buatTodo->text = $data['text'];
        $buatTodo->body = $data['body'];
        $buatTodo->due = $data['due'];
        $buatTodo->save();
        return \redirect()->back()->with('sukses', 'Berhasil Buat Todo Baru');
    }

    // PRINT PDF
    public function print(){
        $todo = Todo::get();

        // $pdf = \PDF::loadView('todo.print', array('todo' => $todo));
        // return $pdf->stream('print');
    //    return $pdf->stream('print.pdf',array(
    //     'Attachment' => 0
    //   ));
//     $pdf = PDF::loadView('todo.print', $todo);
// return $pdf->download('todo.pdf');
return PDF::loadHTML('Hello World!')->stream('download.pdf');
    }
    

    public function delete($id){
        $data = Todo::find($id);
        $data->delete();
        return \redirect()->back()->with('sukses', 'Berhasil Menghapus!');

    }
}
