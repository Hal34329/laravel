<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store()
    {
        //return 'Procesar el formulario';
        //return $request;
        //return $request->get('name');
        //return Request('name');
        $message = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'content' => 'required|min:3'
        ]/*,[
            'name.required' => __('I need your name.'),
        ]*/);

        // Enviar el email
        //Mail::to('admin@gmail.com')->send(new MessageReceived($message));
        Mail::to('admin@gmail.com', 'Admin')->queue(new MessageReceived($message)); // Permite que se ejecute en segundo plano el envío de correo
        //return new MessageReceived($message);

        //return 'Mensaje enviado';
        return back()->with('status', 'Recibimos tu mensaje, te responderemos en menos de 24 horas');
    }
}







/*
public function report(Request $request){
    $data=$request->validate(['des'=>'required']);
    $id=$request->id;
    $report=Question::findOrFail($id);
    $uid=\Auth::id();
    Report::create([
        'question_id'=>$id,
        'user_id'=>$uid,
        'des'=>$data['des']
        ]);
    return redirect()->back();
}

<button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal">
    Report this
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Report this</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('report')}}" method="post">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$row->id}}">
              <input type="text" name="des" placeholder="I report this quiz because" class="form-control">
              <button type="submit" id="tes" class="btn btn-primary btn-round btn-md">Submit</button>     
            </form>
          </div>
        </div>
      </div>
    </div>
*/