<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repository\ProjectRepository;
use CodeProject\Service\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ProjectFileController extends Controller
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
        return $this->repository->with(['user' , 'client'])->findWhere(['owner_id'=>\Authorizer::getResourceOwnerId() ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        return $this->servico->createFile([
            'file'=> $file,
            'extension'=>$extension,
             'name'=>$request->name,
             'project_id'=>$request->project_id,
            'description'=>$request->description
        ]);


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if( $this->checkProjectPermission( $id ) === false){
           return ['error'=>'Access Forbidden' ];
       }
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
        if( $this->checkProjectPermission( $id ) === false){
            return ['error'=>'Access Forbidden' ];
        }
        return   $this->servico->update($request->all() , $id);
    }

    /**
     * @param $id
     * @return array
     */

    public function destroy($id)
    {
        if( $this->checkProjectPermission( $id ) === false){
            return ['error'=>'Access Forbidden' ];
        }

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
