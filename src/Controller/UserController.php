<?php

namespace App\Controller;

use App\Entity\Account;
use App\Form\AccountType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AccountRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Service\AccountService;

final class UserController extends AbstractController
{
    public function __construct(
        private readonly AccountRepository $accountRepository,
        private readonly AccountService $accountService
    ) {}

    #[Route('/register', name: 'app_user_register')]
    public function register(): Response
    {
        return $this->render('user/register.html.twig');
    }

    #[Route('/login', name: 'app_user_login')]
    public function login(): Response
    {
        return $this->render('user/login.html.twig');
    }

    #[Route('/accounts', name: 'app_user_accounts')]
    public function showAllAccounts(): Response
    {
        return $this->render('user/accounts.html.twig', [
            "accounts" => $this->accountRepository->getAll()
        ]);
    }
    #[Route('/account/add', name: 'app_account_add')]
    public function addAccount(Request $request): Response
    {
        $user = new Account();
        $form = $this->createForm(AccountType::class, $user);
        $form->handleRequest($request);
        $msg = "";
        $status = "";
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->accountService->save($user);
                $status = "success";
                $msg = "Le compte a été ajouté avec succès";
            } catch (\Exception $e) {
                $msg = $e->getMessage();
                $status = "danger";
            }
            $this->addFlash($status, $msg);
        }
        return $this->render(
            'user/addAccount.html.twig',
            [
                'form' => $form
            ]
        );
    }
}
