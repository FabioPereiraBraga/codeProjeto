<?php
namespace  CodeProject\Service;
use CodeProject\Repository\ClienteRepository;
use CodeProject\Validator\ClientValidator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
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

            $this->validator->with( $data )->passesOrFail();
            $this->repository->update( $data, $id);

            return $this->repository->find( $id );


        } catch (ValidatorException $e) {

            return[
                'error'   =>true,
                'message' =>$e->getMessageBag()
            ];
        } catch (ModelNotFoundException $e) {

             return ['error'=>true,
                     'mensage'=>'Cliente  não encontrado.'];

        } catch (\Exception $e) {

          return ['error'=>true,
                  'mensage'=>'Ocorreu algum erro na atualização do cliente '];

         }


    }

    /**
     * @param $id
     * @return array
     */
    public function delete( $id )
    {
        try{
        $this->repository->delete( $id );
            return [
                'Error' => false,
                'mensagem' => 'Cliente excluido com successo !'
            ];
        } catch (ModelNotFoundException $e) {

            return [
                'error'=>true,
                'mensagem'=>'Cliente  não encontrado.'
            ];

        }catch (QueryException $e) {

            return [
                'error'=>true,
                'mensage'=>'Projeto não pode ser apagado pois existe um ou mais clientes vinculados a ele.'
            ];

        } catch (\Exception $e) {

            return [
                'error'=>true,
                'mensagem'=>'Ocorreu algum erro na deleção do cliente'];

        }



    }

    public  function show($id)
    {

        try{

        return $this->repository->find($id);

        }  catch (\Exception $e) {

            return [
                'error'=>true,
                'mensagem'=>'Ocorreu algum erro na consulta pelo cliente'];

        }catch (ModelNotFoundException $e) {

            return [
                'error'=>true,
                'mensagem'=>'Cliente  não encontrado.'
            ];

        }

    }
    

}