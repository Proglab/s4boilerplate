<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\User;

class SecurityController extends AbstractController
{
	/**
	 * @Route("/login", name="security_login")
	 */
	public function login(AuthenticationUtils $authenticationUtils): Response
	{
		// retrouver une erreur d'authentification s'il y en a une
		$error = $authenticationUtils->getLastAuthenticationError();
		// retrouver le dernier identifiant de connexion utilisé
		$lastUsername = $authenticationUtils->getLastUsername();

		return $this->render('security/login.html.twig', [
				'last_username' => $lastUsername,
				'error' => $error,
			]
		);
	}

	/**
	 * @Route("/logout", name="security_logout")
	 */
	public function logout(): void
	{
		throw new \Exception('This should never be reached!');
	}


	/**
	 * @Route("/admin/{_locale}/switch_user/{id}", name="switch_user", requirements={"_locale": "en|fr|nl"})
	 * @Security("is_granted('ROLE_ADMIN')")
	 * @param Request $request
	 * @param User $id
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function switch_user(Request $request, User $id)
	{
		return $this->redirectToRoute('admin_dashboard', [
			'_locale' => $request->getLocale(),
			'_switch_user' => $id->getUsername()
		]);
	}
}