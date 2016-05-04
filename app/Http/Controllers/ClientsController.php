<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repository\ClienteRepository;
use CodeProject\Service\ClientService;
use Illuminate\Http\Request;



class ClientsController extends Controller
{
    /**
     * @var ClientRepositoryEloquent|ClienteRepository
     */
    private $repository ;
    private $servico;
    /**
     * ClientsController constructor.
     * @param ClienteRepository $repository
     */

    public function __construct( ClienteRepository $repository , ClientService $servico)
    {
        $this->repository = $repository;
        $this->servico   = $servico;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
       return $this->repository->all();
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->servico->create( $request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     return  $this->servico->show($id);
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
        return   $this->servico->update($request->all() , $id);
    }

    /**
     * @param $id
     * @return array
     */

    public function destroy($id)
    {
        return $this->servico->delete( $id );
    }
}
