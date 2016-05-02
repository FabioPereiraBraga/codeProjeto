<?php
namespace  CodeProject\Service;
use CodeProject\Repository\ClienteRepository;
use CodeProject\Validator\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Created by PhpStorm.
 * User: root
 * Date: 01/05/16
 * Time: 16:51
 */

class ClientService 
{
    /**
     * @var ClienteRepository
     */
    private  $repository;
    /**
     * @var ClientValidator
     */
    private $validator;

    /**
     * ClientService constructor.
     * @param ClienteRepository $repository
     * @param ClientValidator $validator
     */
    
    public function __construct( ClienteRepository $repository , ClientValidator $validator)
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
                'mensagem'=>'Cliente excluido com successo !'
            ];
        }


        return [
            'Error'=>true,
            'mensagem'=>'Falha na deleção do Cliente !'
        ];



    }
    

}