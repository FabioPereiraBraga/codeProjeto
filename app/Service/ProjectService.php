<?php
namespace  CodeProject\Service;

use CodeProject\Repository\ProjectRepository;
use CodeProject\Validator\ProjectValidator;
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
     * ProjectService constructor.
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    
    public function __construct( ProjectRepository $repository , ProjectValidator $validator)
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



    

}