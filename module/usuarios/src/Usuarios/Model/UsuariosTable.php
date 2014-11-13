<?php
namespace Usuarios\Model;


use Usuarios\Form\UsuariosValidator;
use Zend\Db\TableGateway\TableGateway;

class UsuariosTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getUsuarios($id)
    {
        $id  = (int) $id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function saveUsuarios(Usuarios $usuarios)
    {
        $data = array(
            
            'nombre' => $usuarios->nombre,
            'puesto'  => $usuarios->puesto,
            'area'  => $usuarios->area,
        );

        $id = (int)$usuarios->id;
        if ($id == 0) {
            $this->tableGateway->insert($data);
        } else {
            if ($this->getUsuarios($id)) {
                $this->tableGateway->update($data, array('id' => $id));
            } else {
                throw new \Exception('Form id does not exist');
            }
        }
    }

    public function deleteUsuarios($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }
}