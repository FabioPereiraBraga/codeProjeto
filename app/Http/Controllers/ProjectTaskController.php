<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repository\ProjectTaskRepository;
use CodeProject\Service\ProjectTaskService;

use Illuminate\Http\Request;



class ProjectTaskController extends Controller
{

    /**
     * @var ProjectTaskRepository
     */
    private $repository ;

    /**
     * @var ProjectTaskService
     */
    private $servico;

    /**
     * ProjectController constructor.
     * @param ProjectRepository $repository
     * @param ProjectsService $servico
     */

    public function __construct( ProjectTaskRepository $repository , ProjectTaskService $servico)
    {
        $this->repository = $repository;
        $this->servico   = $servico;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index( $id )
    {
        return $this->repository->all();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $id)
    {
       
        $data =  $request->all();
        $data['project_id'] = $id;
        return $this->servico->create( $data );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $noteId
     * @return \Illuminate\Http\Response
     */
    public function show($id , $idTask )
    {
        return $this->servico->show($idTask);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , $idTask)
    {
        $data =  $request->all();
        $data['project_id'] = $id;
        
        return   $this->servico->update($data, $idTask );
    }

    /**
     * @param $id
     * @return array
     */

    public function destroy($id , $idTask)
    {
        return $this->servico->delete( $idTask );
    }

    
}
