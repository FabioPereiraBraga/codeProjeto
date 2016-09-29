<?php

namespace CodeProject\Http\Controllers;


use CodeProject\Repository\ProjectFileRepository;
use CodeProject\Repository\ProjectRepository;
use CodeProject\Service\ProjectFileService;
use Illuminate\Http\Request;



class ProjectFileController extends Controller
{

    /**
     * @var ProjectRepository
     */
    private $repository ;

    /**
     * @var ProjectsService
     */
    private $service;

    /**
     * ProjectController constructor.
     * @param ProjectRepository $repository
     * @param ProjectsService $servico
     */

    public function __construct( ProjectFileRepository $repository , ProjectFileService $service)
    {
        $this->repository = $repository;
        $this->service   = $service;
    }


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
    public function store(Request $request)
    {

        $file = $request->file('file');
        $extension = (! empty($file)) ? $file->getClientOriginalExtension() : '';



        $data = [
            'file' => $file,
            'extension' => $extension,
            'name' => $request->name,
            'project_id' => $request->project_id,
            'description' => $request->description
        ];

     

        return  $this->service->create( $data );

    }
    
    
    public function show( $id )
    {
        if( $this->service->checkProjectPermission( $id ) === false){
            return ['error'=>'Acesso Forbidden'];
        }
        return $this->repository->find( $id );
    }

    public function showFile( $id )
    {
        if( $this->service->checkProjectPermission( $id ) === false){
            return ['error'=>'Access Forbidden'];
        }
        
        $filePath = $this->service->getFilePath($id);
        $fileContent = file_get_contents( $filePath );
        $file64 = base64_encode( $fileContent );
        
        return[
        'file'=> $file64,
        'size'=>filesize( $filePath ),
         'name'=>$this->service->getFileName($id)
        ];

    }

    public function update( Request $request , $id )
    {
        if( $this->service->checkProjectPermission( $id ) === false){
            return ['error'=>'Acesso Forbidden'];
        }
dd($request->all());
        return $this->service->update($request->all() , $id );
    }


    /**
     * @param $id
     * @return array
     */

    public function destroy($id)
    {
        if( $this->service->checkProjectPermission( $id ) === false){
            return ['error'=>'Access Forbidden' ];
        }

          $this->servico->delete( $id  );
    }




    



}
