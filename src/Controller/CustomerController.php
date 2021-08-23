<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends Controller
{
    public function listCustomer(){
        $customers = $this->getDoctrine()->getRepository(Customer::class)->findAll();

        return $this->render(
            'customer/index.html.twig',
            [
                'customers' => $customers
            ]
            );
    }

    public function sortCustAsc(CustomerRepository $repository){
        $customers = $repository->sortCustAsc();

        return $this->render(
            'customer/sort.html.twig',
            [
                'customers' => $customers
            ]
            );
    }
}
