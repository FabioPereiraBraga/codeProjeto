<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Clients;
use Illuminate\Http\Request;

use CodeProject\Http\Requests;
use CodeProject\Http\Controllers\Controller;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Clients::all();
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        return Clients::create( $request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     return  Clients::find($id);   
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

       if( Clients::where(['id'=>$id])
           ->update( $request->all() )) {
           return[
               'Error'=>false,
               'mensagem'=>'Cliente alterado com succeso !'
           ];
       }


            return [
                'Error'=>true,
                'mensagem'=>'Falha na alteração  do  cliente !'
            ];


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(  Clients::destroy( $id ) ){
            return[
                'Error'=>false,
                'mensagem'=>'Cliente excluido com successo !'
            ];
        }


              return [
                  'Error'=>true,
                  'mensagem'=>'Falha na deleção do Cliente !'
              ];




    }
}
