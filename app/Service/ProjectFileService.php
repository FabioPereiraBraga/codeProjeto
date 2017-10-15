<?php
namespace  CodeProject\Service;


use CodeProject\Repository\ProjectFileRepository;
use CodeProject\Repository\ProjectRepository;
use CodeProject\Validator\ProjectFileValidator;
use CodeProject\Validator\ProjectValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem   ;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 16:51
 */

class ProjectFileService 
{
    /**
     * @var ProjectRepository
     */
    
    private  $repository;
    /**
     * @var ProjectRepository
     */
    private  $projectRepository;
    /**
     * @var ProjectValidator
     */
    private $validator;


    private  $filesystem;

    private $storage;

    /**
     * ProjectService constructor.
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    
    public function __construct( ProjectFileRepository $repository ,
                                 ProjectRepository     $projectRepository,
                                 ProjectFileValidator $validator,
                                 Filesystem $filesystem,
                                 Storage $storage
                                )
    {

        $this->repository = $repository;
        $this->filesystem        = $filesystem;
        $this->storage           = $storage;
        $this->validator = $validator;
        $this->projectRepository   = $projectRepository;


    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public  function  create( array $data )
    {
        try {


           
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
          
            $project = $this->projectRepository->skipPresenter()->find($data['project_id']);
            
            $projectArquivo = $project->files()->create( $data );
            $this->storage->put($projectArquivo->id . "." . $data['extension'], $this->filesystem->get($data['file']));

        }catch (ValidatorException $e) {

            return[
                'error'   =>true,
                'message' =>$e->getMessageBag()
            ];
        }


    }

    /**
     * @param array $data
     * @param $id
     * @return array
     */
    public function update(array $data , $id)
    {
        try {


            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $this->repository->update( $data, $id);
            return   $this->repository->find($id);

        } catch (ValidatorException $e) {

            return[
                'error'   =>true,
                'message' =>$e->getMessageBag()
            ];
        } catch (ModelNotFoundException $e) {

            return [
                'error'=>true,
                'mensagem'=>'Projeto não encontrado.'
            ];

        } catch (\Exception $e) {
            return [
                'error'=>true,
                'mensagem'=>'Ocorreu algum erro no update do projeto '
            ];
        }


    }



    public function getFilePath( $id )
    {
      $projectFile = $this->repository->skipPresenter()->find( $id );

      return $this->getBaseURL($projectFile);
    }

    private function getBaseURL( $projectFile )
    {

        switch ($this->storage->getDefaultDriver())
        {
            case 'local':
                return $this->storage->getDriver()->getAdapter()->getPathPrefix()
                    .'/'.$projectFile->id.'.'.$projectFile->extension;
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function delete( $id )
    {
        $projectFile = $this->repository->skipPresenter()->find($id);
        if( $this->storage->exists($projectFile->id.'.'.$projectFile->extension)){
            $this->storage->delete($projectFile->id.'.'.$projectFile->extension);
            return $projectFile->delete();
        }

    }

   

    public function getFileName($id)
    {
        $projectFile = $this->repository->skipPresenter()->find($id);
        return $projectFile->getFileName();
    }




    

}