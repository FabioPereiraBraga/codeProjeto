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
    public function store(Request $request , $id)
    {

        $file = $request->file('file');
        $extension = (! empty($file)) ? $file->getClientOriginalExtension() : '';



        $data = [
            'file' => $file,
            'extension' => $extension,
            'name' => $request->name,
            'project_id' => $id,
            'description' => $request->description
        ];

     

        return  $this->service->create( $data );

    }
    
    
    public function show( $id , $fileId)
    {

        return $this->repository->find( $fileId );
    }

    public function showFile( $id , $fileId)
    {

        $filePath = $this->service->getFilePath($fileId);
        $fileContent = file_get_contents( $filePath );
        $file64 = base64_encode( $fileContent );
        
        return[
        'file'=> $file64,
        'size'=>filesize( $filePath ),
         'name'=>$this->service->getFileName($fileId)
        ];

    }

    public function update( Request $request , $id , $fileId )
    {

        $data =  $request->all();
        $data['project_id'] = $id;
        return $this->service->update($data, $fileId );
    }


    /**
     * @param $id
     * @return array
     */

    public function destroy($id , $fileId)
    {

          $this->repository->delete( $fileId  );
    }




    



}
