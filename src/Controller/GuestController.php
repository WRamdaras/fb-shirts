<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Order;
use App\Entity\Shirts;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;




class GuestController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('guest/home.html.twig', [
            'controller_name' => 'GuestController',
        ]);
    }

    #[Route('/category', name: 'category')]
    public function category(EntityManagerInterface $em ): Response
    {
        $categories = $em->getRepository(Category::class)->findAll();

        return $this->render('guest/category.html.twig', [
            'categories' => $categories
        ]);
    }

    #[Route('/shirts/{id}', name: 'shirts')]
    public function shirts(EntityManagerInterface $em, int $id ): Response
    {
        $category = $em->getRepository(Category::class)->find($id);

        return $this->render('guest/shirts.html.twig', [
            'category' => $category
        ]);
    }

    #[Route('/order/{id}', name: 'order')]
    public function order(Request $request, EntityManagerInterface $em, int $id): Response
    {
        $form = $this->createForm(OrderType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $shirts = $em->getRepository(Shirts::class)->find($id);
            $order->setShirts($shirts);
            $em->persist($order);
            $em->flush();
            return $this->redirectToRoute('show');
        }
        return $this->render('guest/order.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/showOrder', name: 'show')]
    public function receipt(EntityManagerInterface $em): Response
    {
        $orders = $em->getRepository(Order::class)->findAll();
        return $this->render('guest/showOrder.html.twig', [
            'orders' => $orders,
        ]);
    }

    #[Route('/delete/{id}', name: 'delete')]
    public function deleteOrder(EntityManagerInterface $em, int $id): Response
    {
        $order = $em->getRepository(Order::class)->find($id);
        $em->remove($order);
        $em->flush();
        $this->addFlash('success','The order has been removed');
        return $this->redirectToRoute('show');
    }
}

