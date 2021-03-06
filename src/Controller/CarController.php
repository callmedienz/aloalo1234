<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends Controller
{
    /**
     * @Route("/car",name="car_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cars = $em->getRepository(Car::class)->findAll();

        return $this->render('car/index.html.twig', array(
            'cars' => $cars,
        ));
    }

  /**
   * Finds and displays a car entity.
   *
   * @Route("/car/{id}", name="car_show")
   */
  public function showAction(Car $car)
  {
    return $this->render('car/show.html.twig', array(
      'car' => $car,
    ));
  }

  /**
   * @Route ("/car/{make}", name="car_from_make")
   */
  public function carFromMake ($make, CarRepository $carRepository) {
     $cars = $carRepository->carFromMake($make);

     return $this->render(
       '/car/index.html.twig',
       [
         'cars' => $cars
       ]
      );
  }
}
