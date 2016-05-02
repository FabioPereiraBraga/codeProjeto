<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repository\ProjectRepository;
use CodeProject\Service\ProjectService;

use Illuminate\Http\Request;



class ProjectController extends Controller
{

    /**
     * @var ProjectRepository
     */
    private $repository ;

    /**
     * @var ProjectsService
     */
    private $servico;

    /**
     * ProjectController constructor.
     * @param ProjectRepository $repository
     * @param ProjectsService $servico
     */

    public function __construct( ProjectRepository $repository , ProjectService $servico)
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
        return $this->repository->with(['user' , 'client'])->all();
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
        return $this->repository->with(['user' , 'client'])->find($id);
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

    /**
     * @param $id
     * @return mixed
     */
    public function showUser($id)
    {
        
        return $this->servico->findProjectUser( $id );
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showCliente($id)
    {
        return $this->servico->findProjectClient( $id );
    }
}
