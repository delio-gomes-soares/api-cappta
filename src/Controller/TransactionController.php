<?php

namespace App\Controller;

use App\Entity\Transaction;
use App\Form\TransactionSearchType;
use App\Repository\TransactionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as FOSRest;


class TransactionController extends FOSRestController
{


    /**
     * Undocumented function
     *
     * @param TransactionRepository $transactionRepository
     * @return Response
     * @FOSRest\Post("/transaction")
     */
    public function index(TransactionRepository $transactionRepository, Request $request): View
    {
        $form = $this->createForm(TransactionSearchType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($transaction);
            $em->flush();
            return View::create($form, Response::HTTP_BAD_REQUEST, []); 
        }

        $transactions = $transactionRepository->findAll();
        $result = array_map(function($transaction){
            return array(
                "merchantCnpj" => $transaction->getMerchant()->getCnpj(),
                "checkoutCode" => $transaction->getCheckoutCode(),
                "cipheredCardNumber" => $transaction->getCipheredCardNumber(),
                "amountInCents" => $transaction->getAmountInCent(),
                "installments" => $transaction->getInstallments(),
                "acquirerName" => $transaction->getAcquirer()->getName(),
                "paymentMethod" => $transaction->getPaymentMethod()->getName(),
                "cardBrandName" => $transaction->getCardBrand()->getName(),
                "status" => $transaction->getStatusInfo()->getStatus()->getName(),
                "statusInfo" => $transaction->getStatusInfo()->getDescription(),
                "CreatedAt" => $transaction->getCreatedAt(),
                "AcquirerAuthorizationDateTime" => $transaction->getAcquirerAuthorizationDataTime()

            );
        },$transactions);
        return View::create($form->createView(), Response::HTTP_OK, []); 
    }

}
