<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;



class UsersController extends AbstractController
{
    /**
     * @Route("/users", name="users")
     */
    public function index()
    {
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }
	
	
	/**
     * @Route("/users/create", name="usersCreate")
     */
    public function create()
    {	
	
		$entityManager = $this->getDoctrine()->getManager();
		
		$users = new Users();
		
		$users->setName('Ram');	
		$users->setAge(32);	
		$users->setAddress('San Jose, Costa Rica');	
		$users->setDateAdded(new \DateTime('now'));	
		
		// tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($users);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new user with id '.$users->getId());
    }
	
	/**
* @Route("/users/{id}", name="usersCreate")
     */
	public function show($id){
		
		$user = $this->getDoctrine()->getRepository(Users::class)->find($id);
		
		if(!$user){
			 throw $this->createNotFoundException(
				'No product found for id '.$id
			);
		}
		
		return new Response('Check out this great product: '.$user->getName());
		
		
	}
	
}
