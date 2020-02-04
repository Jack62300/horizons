<?php

namespace App\Controller;

use App\Entity\Task;
use App\Entity\User;
use App\Form\TaskType;
use App\Form\TaskEditType;
use App\Repository\TaskRepository;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController extends AbstractController
{





    /**
     * @Route("/home", name="index")
     */
    public function index(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request, UserRepository $repoUser)
    {
        $username = $this->getUser()->getUsername();
        $taskss = new Task();
        $taskss = $repoTask->findBy(array(), array('taskCategorie' => 'ASC'));
        
        $user = new User();
        $user = $repoUser->findBy(array('username' => $username));
        $user = $user[0];

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );


        return $this->render('index/index.html.twig', [
            'tasks' => $task,
            'username' => $username,
            'user' => $user,
        ]);
    }

        /**
     * @Route("/overwatch", name="overwatch_task")
     */
    public function overwatch(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request,UserRepository $repoUser)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 1), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        $username = $this->getUser()->getUsername();
        $user = new User();
        $user = $repoUser->findBy(array('username' => $username));
        $user = $user[0];

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
            'username' => $username,
            'user' => $user,
        ]);
    }

        /**
     * @Route("/apex", name="apex_task")
     */
    public function apex(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Apex'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        ); 

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

     /**
     * @Route("/leagueOfLegend", name="lol_task")
     */
    public function lol(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Lol'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

    /**
     * @Route("/dofus", name="dofus_task")
     */
    public function dofus(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Dofus'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

     /**
     * @Route("/worldOfWarcraft", name="wow_task")
     */
    public function wow(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Wow'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

     /**
     * @Route("/Rainbow6", name="r6_task")
     */
    public function rainbow(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Rainbow Six'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

     /**
     * @Route("/technique", name="tech_task")
     */
    public function technique(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Technique'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

      /**
     * @Route("/communautaire", name="communautaire_task")
     */
    public function communautaire(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Communautaire'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );


        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }
      /**
     * @Route("/administration", name="admin_task")
     */
    public function admin(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Administration'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

      /**
     * @Route("/developpement", name="dev_task")
     */
    public function dev(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Développement web'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

        /**
     * @Route("/communication", name="communication_task")
     */
    public function communication(TaskRepository $repoTask,PaginatorInterface $paginator, Request $request)
    {
        
        $taskss = new Task();
        $taskss = $repoTask->findBy(array('section' => 'Communication'), array('taskCategorie' => 'ASC'));

        $task = $paginator->paginate(
            $taskss, // Requête contenant les données à paginer (ici nos articles)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            10 // Nombre de résultats par page
        );

        return $this->render('index/index.html.twig', [
            'tasks' => $task,
        ]);
    }

    /**
     * @Route("/task/{id}", name="taskView")
     */
    public function view(TaskRepository $repoTask, $id)
    {
        $task = new Task();
        $task = $repoTask->find($id);

        return $this->render('index/view.html.twig', [
            'task' => $task,
        ]);
    }

    /**
     * @Route("/taskedit/{id}", name="taskEdit")
     */
    public function editTask(Request $request, ManagerRegistry $manager, TaskRepository $repoTask, $id)
    {   
        $task = new Task();
        $task = $repoTask->find($id);
        $form = $this->createForm(TaskEditType::class, $task);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // Hash du mot de passe et roles par default
           
            $em = $manager->getManager();
            $em->persist($task);
            $em->flush();
            $this->addFlash('success', 'Tache mise à jour avec succées !!!');
            return $this->redirectToRoute('index');
        }
        return $this->render('index/addTask.html.twig', [
            'form' => $form->createView()
        ]);
    }

         /**
     * @Route("/Taskdel/{id}", name="taskDelete")
     */
    public function taskDel(ManagerRegistry $manager,TaskRepository $repoTask,$id)
    {
        $casier = new Task();
        $userchannel = $repoTask->findOneBy(array('id' => $id));
        $em = $manager->getManager();
        $em->remove($userchannel);
        $em->flush();
        $this->addFlash('success', 'Tache supprimer avec succées!!!');
        return $this->redirectToRoute('index');
    }

    /**
     * @Route("/taskAdd", name="add_task")
     */
    public function addTask(Request $request, ManagerRegistry $manager)
    {   
        $username = $this->getUser()->getUsername();
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // Hash du mot de passe et roles par default
           
            $em = $manager->getManager();
            $em->persist($task);
            $em->flush();
            $this->addFlash('success', 'Tache Ajouter avec succées !!!');
            return $this->redirectToRoute('index');
        }
        return $this->render('index/addTask.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
