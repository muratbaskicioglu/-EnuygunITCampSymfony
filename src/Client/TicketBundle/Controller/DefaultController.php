<?php

namespace Client\TicketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    const fullname = "Murat Baskıcıoğlu";

    public function listAction()
    {
        return $this->render('ClientTicketBundle:Default:list.html.twig',
            array(
                "fullname" => self::fullname
            )
        );
    }

    public function addAction() {
        return $this->render('ClientTicketBundle:Default:add.html.twig',
            array(
                "fullname" => self::fullname
            )
        );
    }
}
