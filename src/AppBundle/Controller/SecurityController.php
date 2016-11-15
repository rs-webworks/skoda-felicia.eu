<?php
/**
 * Created by PhpStorm.
 * User: raito
 * Date: 15.11.16
 * Time: 13:19
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    /**
     * @Route("/managerLogin", name="managerLogin")
     */
    public function managerLoginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
    }
}