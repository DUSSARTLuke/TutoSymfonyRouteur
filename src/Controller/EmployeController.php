<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Dompdf\Dompdf;

/**
 * @Route("/employe/", name="employe_")
 */
class EmployeController extends AbstractController
{

  
   
  
  
  /**
   * @Route("employe2/{nom}",
   * name="employe_redirect",
   * requirements = {"nom":"[A-Za-z]+"})
   * 
   */
  public function redirectionV2(string $nom)
  {
    $nom = "Bond";
    return $this->redirectToRoute("employe_voirnomB", ['nom' => $nom]);
  }
  
  
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
   * @Template("employe/voirEmploye.html.twig")
   */
  public function voirEmployeV2(int $id)
  {
    return array('id' => $id);
  }

  /**
   * @Route("employe/{nom}", name="voirnomB", requirements= {"nom":"^[B][a-zØ-öø-ÿ]+"},
   * options = { "utf8": true})
   * 
   */
  public function voirNom(string $nom)
  {
    return $this->render('employe/voirNom.html.twig', [
        'nom' => $nom
    ]);
  }

  
  /**
   * @Route("monCV/{_locale}",
   * name="voirCV",
   * requirements={"_locale": "fr|en"},
   * defaults={"_locale":"fr"})
   */
  public function voirCV(){
    
    $html = $this->render("employe/voirCV.html.twig");
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->render();
    return new Response($dompdf->stream());
    
    
  }
 /**
   * @Route("employe/{nom}",
   * name="employe_redirection",
   * requirements = {"nom":"[A-Za-z]+"})
   * 
   */
  public function redirection(string $nom)
  {
    $nom = "Bond";
    $url = $this->generateUrl("employe_voirnomB", array('nom' => $nom));
    return $this->redirect($url);
  }
  
  
}
