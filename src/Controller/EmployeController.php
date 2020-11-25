<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/employe/", name="employe_")
 */
class EmployeController extends AbstractController
{

  /**
   * @Route("employe/{id}", name="voir")
   */
  public function voir(int $id): Response
  {
    return $this->render('employe/voir.html.twig', [
        'id' => $id
    ]);
  }
}
