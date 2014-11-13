<?php
namespace Usuarios\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Usuarios\Model\Usuarios;          
use Usuarios\Form\UsuariosForm;      

class UsuariosController extends AbstractActionController
{

    protected $usuariosTable;
    

    public function getUsuariosTable()
    {
        if (!$this->usuariosTable) {
            $sm = $this->getServiceLocator();
            $this->usuariosTable = $sm->get('Usuarios\Model\UsuariosTable');
        }
        return $this->usuariosTable;
    }
    
    public function indexAction()
    {		
        return new ViewModel(array(
            'usuario' => $this->getUsuariosTable()->fetchAll(),
        ));
    }

   public function addAction()
    {
        $form = new UsuariosForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $usuarios = new Usuarios();
            $form->setInputFilter($usuarios->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $usuarios->exchangeArray($form->getData());
                $this->getUsuariosTable()->saveUsuarios($usuarios);

                // Redirect to list of albums
                return $this->redirect()->toRoute('usuarios');
            }
        }
        return array('form' => $form);
    }



    public function viewAction(){

        return array('form' => $form);
    }


    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);

        if (!$id) {

            return $this->redirect()->toRoute('usuarios', array(
                'action' => 'add'
            ));
        }

        $usuarios = $this->getUsuariosTable()->getUsuarios($id);


        $form = new UsuariosForm();

        $form->bind($usuarios);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($usuarios->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getUsuariosTable()->saveUsuarios($form->getData());


                return $this->redirect()->toRoute('usuarios');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }


    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('usuarios');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Yes') {
                $id = (int) $request->getPost('id');
                $this->getUsuariosTable()->deleteUsuarios($id);
            }


            return $this->redirect()->toRoute('usuarios');
        }

        return array(

            'id'    => $id,
            'usuarios' => $this->getUsuariosTable()->getUsuarios($id)
        );
    }

}