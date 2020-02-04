<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Form\UserUpdateType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/addMember", name="security_register")
     */
    public function registration(Request $request, ManagerRegistry $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // Hash du mot de passe et roles par default
            $roles = ['ROLE_USER'];
            $hash = $encoder->encodePassword($user, $user->getPassword());
            // Validation des donnée à insert en bdd
            $em = $manager->getManager();
            $user->setPassword($hash);
            $user->setRoles($roles);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('index');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView(),
        ]);
    }


     /**
     * @Route("/listMember", name="liste_member")
     */
    public function listeMember(UserRepository $userRepo)
    {
        $user = new User();
        $user = $userRepo->findAll();

      
        
        return $this->render('security/listMember.html.twig', [
            'users' => $user,
        ]);
    }


        /**
     * @Route("/updateUser/{id}", name="update_user")
     */
    public function update(Request $request, ManagerRegistry $manager, UserPasswordEncoderInterface $encoder,UserRepository $repoUser, $id)
    {
        $user = new User();
        $user = $repoUser->find($id);

        $form = $this->createForm(UserUpdateType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // Hash du mot de passe et roles par default
            $hash = $encoder->encodePassword($user, $user->getPassword());
           $user->setPassword($hash);
            // Validation des donnée à insert en bdd
            $em = $manager->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('index');
        }
        return $this->render('security/updateUser.html.twig', [
            'form' => $form->createView(),
        ]);
    }

       /**
     * @Route("/UserDelete/{id}", name="userDelete")
     */
    public function userDel(ManagerRegistry $manager,UserRepository $repoUser,$id)
    {
        $user = new User();
        $userchannel = $repoUser->findOneBy(array('id' => $id));
        $em = $manager->getManager();
        $em->remove($userchannel);
        $em->flush();
        $this->addFlash('success', 'User supprimer avec succées!!!');
        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/", name="security_login")
     */
    public function login(){
        if ($this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('index');
        }
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){
    }
}


