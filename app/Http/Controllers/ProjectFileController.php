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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->servico->createFile( $request );
    }


    /**
     * @param $id
     * @return array
     */

    public function destroy($id,$idProject)
    {
        if( $this->checkProjectPermission( $id ) === false){
            return ['error'=>'Access Forbidden' ];
        }

        return $this->servico->deleteFile( $id ,$idProject );
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
