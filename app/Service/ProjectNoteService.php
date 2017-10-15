<?php
namespace  CodeProject\Service;


use CodeProject\Repository\ProjectNoteRepository;
use CodeProject\Validator\ProjectNoteValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 16:51
 */

class ProjectNoteService 
{
    /**
     * @var ProjectNoteRepository
     */
    private  $repository;
    /**
     * @var ProjectNoteValidator
     */
    private $validator;

    /**
     * ProjectNoteService constructor.
     * @param ProjectNoteRepository $repository
     * @param ProjectNoteValidator $validator
     */
    
    public function __construct( ProjectNoteRepository $repository , ProjectNoteValidator $validator)
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
                'message' =>$e->getMessage()
            ];
        }


    }

    /**
     * @param $id
     * @return array
     */
    public function delete( $id )
    {
        
        if(  $this->repository->delete( $id ) ){
            return[
                'Error'=>false,
                'mensagem'=>'Projeto excluido com successo !'
            ];
        }


        return [
            'Error'=>true,
            'mensagem'=>'Falha na deleção do Projeto !'
        ];



    }



    

}