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
   * @Route("employe/{id}", name="voir", defaults={"id":99}, requirements= {"id":"\d+"})
   */
  public function voir(int $id): Response
  {
    return $this->render('employe/voir.html.twig', [
        'id' => $id
    ]);
  }
  
  
  /**
   * @Route("employeV2/{id}", name="voirV2")
   * 
   */
  public function voirEmployeV2(int $id): Response
  {
    return $this->render('employe/voirEmploye.html.twig', [
        'id' => $id
    ]);
  }
  
  /**
   * @Route("employe/{nom}", name="voirNom", requirements= {"nom":"^[B][a-zé-î]+"})
   * 
   */
  public function voirNom(string $nom): Response
  {
    return $this->render('employe/voirNom.html.twig', [
        'nom' => $nom
    ]);
  }
}
