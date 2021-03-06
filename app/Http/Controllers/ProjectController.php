<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repository\ProjectRepository;
use CodeProject\Service\ProjectService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


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
        $this->middleware('check.project.owner',['except'=>['store','show','index']]);
        $this->middleware('check.project.permission',['except'=>['index','store','update','destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index( Request $request)
    {
        return $this->repository->findOwner(\Authorizer::getResourceOwnerId(),$request->query->get('limit'));
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
       
        return $this->servico->show( $id );
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

    public function members($id){


       return $this->repository->with(['members'])->find($id);
        
    }

    private function checkeProjectOwner( $projectId  ){

        $userId = \Authorizer::getResourceOwnerId() ;
        return $this->repository->isOwner ($projectId , $userId );

    }

    private function checkeProjectMember( $projectId  ){

        $userId = \Authorizer::getResourceOwnerId() ;
        return $this->repository->hasMember ($projectId , $userId );

    }

    private function checkProjectPermission( $projectId )
    {

        if($this->checkeProjectOwner( $projectId ) or
          $this->checkeProjectMember( $projectId ) ){
            return true;
        }
        return false;
    }



}
