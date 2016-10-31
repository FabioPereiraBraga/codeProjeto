<?php
namespace  CodeProject\Service;

use CodeProject\Repository\ProjectMembersRepository;
use CodeProject\Validator\ProjectMembersValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Validator\Exceptions\ValidatorException;


/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 16:51
 */

class ProjectMemberService
{
    /**
     * @var ProjectTaskRepository
     */
    
    private  $repository;
    /**
     * @var ProjectTaskValidator
     */
    private $validator;

    /**
     * ProjectService constructor.
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskValidator $validator
     */
    
    public function __construct( ProjectMembersRepository $repository , ProjectMembersValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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
                'mensagem'=>'Members não encontrado.'
            ];

        } catch (\Exception $e) {
            return [
                'error'=>true,
                'mensagem'=>'Ocorreu algum erro no update do Members '
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
          
            $this->repository->delete($id) ;

            return [
                'Error' => false,
                'mensagem' => 'Projeto Members excluido com successo !'
            ];

        } catch (ModelNotFoundException $e) {

            return [
                'error'=>true,
                'mensagem'=>'Members não encontrado.'
            ];

        } catch (\Exception $e) {
            return [
                'error'=>true,
                'mensagem'=>'Ocorreu algum erro ao Members o Task.'
            ];
        }




    }


    public function show( $id )
    {
        try{

            return $this->repository->find($id);

        } catch (ModelNotFoundException $e) {

            return [
                'error'=>true,
                'mensagem'=>'Members não encontrado.'
            ];

        } catch (\Exception $e) {
            return [
                'error'=>true,
                'mensagem'=>'Ocorreu algum erro na busca do Members'
            ];
        }


    }



    

}