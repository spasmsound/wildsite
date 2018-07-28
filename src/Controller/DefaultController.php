<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/kurwa")
     */
    public function register(UserPasswordEncoderInterface $encoder)
    {
        // whatever *your* User object is
        $user = new User();
        $plainPassword = '123';
        $encoded = $encoder->encodePassword($user, $plainPassword);

        $user->setPassword($encoded);
        return new Response('encoded');
    }

    /**
     * @Route("/admin")
     *
     */
    public function admin()
    {
        return new Response('<html><body>Admin page!</body></html>');
    }

}