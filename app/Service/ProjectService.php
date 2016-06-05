<?php
namespace  CodeProject\Service;


use CodeProject\Repository\ProjectMembersRepository;
use CodeProject\Repository\ProjectRepository;
use CodeProject\Validator\ProjectValidator;
use CodeProject\Validator\ProjectMembersValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;


/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 16:51
 */

class ProjectService 
{
    /**
     * @var ProjectRepository
     */
    
    private  $repository;
    /**
     * @var ProjectValidator
     */
    private $validator;


    /**
     * @var ProjectMembersRepository
     */
    private  $repositoryMember;
    /**
     * @var ProjectMembersValidator
     */
    private  $validatorMembers;
    /**
     * ProjectService constructor.
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    
    public function __construct( ProjectRepository $repository , ProjectValidator $validator , 
                                 ProjectMembersRepository $members ,
                                 ProjectMembersValidator   $validatorMembers
                               )
    {

        $this->repository = $repository;
        $this->validator = $validator;
        $this->repositoryMember  = $members;
        $this->validatorMembers  = $validatorMembers;


    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public  function  create( array $data )
    {
        try {

            $this->validator->with( $data )->passesOrFail();
            return $this->repository->create( $data );

        } catch (ValidatorException $e) {

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

            $this->validator->with( $data)->passesOrFail();
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

    /**
     * @param $id
     * @return array
     */
    public function delete( $id )
    {
        try {
            $this->repository->delete($id);

            return [
                'Error' => false,
                'mensagem' => 'Projeto excluido com successo !'
            ];

        } catch (ModelNotFoundException $e) {

            return [
                'error'=>true,
                'mensagem'=>'Projeto não encontrado.'
            ];

        } catch (\Exception $e) {
            return [
                'error'=>true,
                'mensagem'=>'Ocorreu algum erro ao excluir o projeto.'
            ];
        }




    }


    public function show( $id )
    {
        try{

            return $this->repository->with(['user' , 'client'])->find($id);

        } catch (ModelNotFoundException $e) {

            return [
                'error'=>true,
                'mensagem'=>'Projeto não encontrado.'
            ];

        } catch (\Exception $e) {
            return [
                'error'=>true,
                'mensagem'=>'Ocorreu algum erro na busca do projeto'
            ];
        }


    }

    public function addMember(array  $data ){

        try {

            $this->validatorMembers->with( $data )->passesOrFail();
            return $$this->repositoryMember->create( $data );

        } catch (ValidatorException $e) {

            return[
                'error'   =>true,
                'message' =>$e->getMessageBag()
            ];
        }



    }

    public function isMember( $idUser , $id ){

        try{

       if( count( $this->repositoryMember->findWhere(['project_id'=>$id,'user_id'=>$idUser]) ) ) {
           return 1;
       }
           return 0;

        }catch (\Exception $e ){

            return [
                'error'=>true,
                'menssagem'=>$e->getMessage()
            ];

        }


    }

    public function removeMember( $idUser ){

        try{

           return $this->repositoryMember->delete( $idUser );

        }catch (\Exception $e ){

            return [
                'error'=>true,
                'menssagem'=>$e->getMessage()
            ];

        }


    }


    

}