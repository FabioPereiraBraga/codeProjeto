<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repository\ProjectNoteRepository;
use CodeProject\Service\ProjectNoteService;

use Illuminate\Http\Request;



class ProjectNoteController extends Controller
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

    public function __construct( ProjectNoteRepository $repository , ProjectNoteService $servico)
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

        return $this->repository->skipPresenter()->findWhere(['project_id'=>$id]);
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
     * @param  int  $noteId
     * @return \Illuminate\Http\Response
     */
    public function show($id , $noteId )
    {
     return $this->repository->skipPresenter()->findWhere([ 'project_id'=>$id , 'id'=>$noteId ]);


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id , $noteId)
    {
        return   $this->servico->update($request->all() , $noteId);
    }

    /**
     * @param $id
     * @return array
     */

    public function destroy($id , $noteId)
    {
        return $this->servico->delete( $noteId );
    }

    
}
