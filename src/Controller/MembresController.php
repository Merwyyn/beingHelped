<?php

namespace App\Controller;

use App\Entity\Membres;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class MembresController extends AbstractController
{
    /**
     * @Route("/{_locale}/membres/login", name="login_membre", methods={"GET"}, requirements={"_locale" = "en|fr"})
     */
    public function login(Request $request, UserPasswordEncoderInterface $passwordEncoder,TranslatorInterface $translator){
        $email=$request->query->get("email");
        $password=$request->query->get("password");
        $hashedPassword = $passwordEncoder->encodePassword(new Membres(), $password);

        /**
         * @var $membre Membres
         */
        $membre = $this->getDoctrine()->getRepository(Membres::class)->findOneBy(["email" => $email, "password" => $hashedPassword]);
        $response=['login' => false,
            'message' => ""];
        if (!$membre){
            $response["message"]=$translator->trans("It seems that the account doesn't exist.");
        } else if (!empty($membre->getRegisterKey())){
            $response["message"]=$translator->trans("You need to validate your account by using the link available on your adress mail.");
        } else if ($membre->isBlocked()){
            $response["message"]=$translator->trans("Your account seems to be blocked.");
        } else {
            $response["login"]=true;
            $response["message"]=$translator->trans("You're now logged.");
        }
        return $this->json([$response]);
    }

    /**
     * @Route("/{_locale}/membres", name="register_membre", methods={"POST"}, requirements={"_locale" = "en|fr"})
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder,TranslatorInterface $translator){
        $membre = new Membres();
        $form = $this->createForm(MembresType::class, $membre);
    }
}
