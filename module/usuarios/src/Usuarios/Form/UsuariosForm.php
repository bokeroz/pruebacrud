<?php
namespace Usuarios\Form;

use Zend\Form\Form;

class UsuariosForm extends Form
{
    public function __construct($name = null)
    {
   
        parent::__construct('usuarios');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nombre',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Nombre',
            ),
        ));
        $this->add(array(
            'name' => 'puesto',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Puesto',
            ),
        ));

        $this->add(array(
            'name' => 'area',
            'attributes' => array(
                'type'  => 'text',
            ),
            'options' => array(
                'label' => 'Area',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }
}