<?php
/**
 * Created by PhpStorm.
 * User: Fabrice
 * Date: 09-09-19
 * Time: 16:57
 */

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/admin/dashboard", name="admin_dashboard")
    */
    public function dashboard()
    {
        return $this->render('admin/dashboard.html.twig', []);
    }
}
