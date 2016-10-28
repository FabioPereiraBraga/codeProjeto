<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repository\ProjectMembersRepository;
use CodeProject\Repository\ProjectMembersRepositoryEloquent;
use CodeProject\Service\ProjectMemberService;
use Illuminate\Http\Request;

use CodeProject\Http\Requests;


class ProjectMemberController extends Controller
{

    private $service;
    private $repository;

   public  function __construct( ProjectMemberService $service , ProjectMembersRepository $repository)
   {
     $this->service = $service;
     $this->repository = $repository;  
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $id )
    {
     return $this->repository->findWhere(['project_id'=>$id]);

    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id , Request $request)
    {
        $data =  $request->all();
        $data['project_id'] = $id;
        return $this->service->create( $data );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , $idMember )
    {
        return $this->service->show($idMember);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */                 
    public function update($id , $idMember, Request  $request )
    {
        $data =  $request->all();
        $data['project_id'] = $id;

        return   $this->service->update($data, $idMember );
    }


/**
* @param $id
* @return array
*/

    public function destroy($id , $idMember)
    {
        return $this->service->delete( $idMember );
    }
}
