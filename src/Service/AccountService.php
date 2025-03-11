<?php

namespace App\Service;

use App\Entity\Account;
use App\Repository\AccountRepository;
use Doctrine\ORM\EntityManagerInterface;

class AccountService
{

    public function __construct(
        private readonly EntityManagerInterface $em,
        private readonly AccountRepository $accountRepository
    ) {}

    public function save(Account $account)
    {
        //Tester si les champs sont tous remplis
        if ($account->getFirstname() != "" && $account->getLastname() != "" && $account->getEmail() != "" && $account->getPassword() != "") {
            //Tester si le compte n'existe pas
            if (!$this->accountRepository->findOneBy(['email' => $account->getEmail()])) {
                //Setter les paramètres
                $account->setRoles('ROLE_USER');
                $this->em->persist($account);
                $this->em->flush();
            } else {
                throw new \Exception("Le compte existe déjà", 400);
            }
        }
        //Sinon les champs ne sont pas remplis
        else {
            throw new \Exception("Les champs ne sont pas tous remplis", 400);
        }
    }

    public function getAll()
    {
        $temp = $this->accountRepository->findAll();
        if ($temp) {
            return $temp;
        } else {
            throw new \Exception("Aucun compte trouvé", 404);
        }
    }
}
