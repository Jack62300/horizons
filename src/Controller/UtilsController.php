<?php

namespace App\Controller;

use App\Entity\Section;
use App\Form\SectionType;
use App\Repository\SectionRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UtilsController extends AbstractController
{
    /**
     * @Route("/sectionAdd", name="section_add")
     */
    public function index(Request $request, ManagerRegistry $manager)
    {
        $section = new Section();
        $form = $this->createForm(SectionType::class, $section);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
           
           
            $em = $manager->getManager();
            $em->persist($section);
            $em->flush();
            $this->addFlash('success', 'Section Ajouter avec succées !!!');
            return $this->redirectToRoute('index');
        }
        return $this->render('utils/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
