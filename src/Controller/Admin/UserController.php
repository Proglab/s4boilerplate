<?php

/*
 * Ceci sera ajouté dans tous vos fichiers PHP en entête.
 *
 * (c) Zozor <zozor@openclassrooms.com>
 *
 * A adapter et ré-utiliser selon vos besoins!
 */

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends EasyAdminController
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param $entity User
     */
    protected function persistEntity($entity)
    {
        $entity->setEmail($entity->getUsername());
        /*
                $url = $this->generateUrl('security_login', [],  UrlGeneratorInterface::ABSOLUTE_URL);
        
                $mail = $this->sendMail(
                    $entity->getEmail(),
                    'Nouveau compte AgendaSoft',
                    'mails/new_account.html.twig',
                    [
                        'user' => $entity,
                        'url' => $url
                    ]
                );
        
                if ($mail) {
                    $this->addFlash('success', 'Un mail a été transmi à l\'utilisateur');
                } else {
                    $this->addFlash('danger', 'Une erreur a été rencontrée lors de l\'envois du mail');
                }
        
        */
        $password = $this->encoder->encodePassword($entity, $entity->getPassword());
        $entity->setPassword($password);

        parent::persistEntity($entity);
        //parent::persistEntity($entity);
    }
}
