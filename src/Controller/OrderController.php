<?php

namespace App\Controller;



use App\Entity\Order;
use App\Repository\TourRepository;
use Doctrine\ORM\EntityManagerInterface;
use ErrorException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class OrderController extends AbstractController
{

    public function create(
        Request $request,
        EntityManagerInterface $entityManager,
        TourRepository $tourRepository,
        ValidatorInterface $validator
    ): JsonResponse
    {
        try {
            $data = $request->request->all();

        } catch (JsonException $exception) {
            return new JsonResponse(
                ['message' => $exception->getMessage()],
                JsonResponse::HTTP_BAD_REQUEST
            );
        }

        try {
            $firstName = $data['first_name'];
            $secondName = $data['second_name'];
            $mail = $data['mail'];
            $phoneNumber = $data['phone'];
            $tourId = $data['tour_id'];
        } catch (ErrorException $ex) {
            return new JsonResponse(
                ['message' => 'Request body not provide some of this parameters: 
                first_name, second_name, mail, phone'],
                JsonResponse::HTTP_BAD_REQUEST
            );
        }



        $tour = $tourRepository->find($tourId);
        $newOrder = new Order();
        $newOrder->setFirstName($firstName);
        $newOrder->setSecondName($secondName);
        $newOrder->setMail($mail);
        $newOrder->setPhoneNumber($phoneNumber);
        $newOrder->setTour($tour);

        $emailError = $validator->validateProperty($newOrder, "mail");

        if($emailError->count() > 0){
            return new JsonResponse(
                ['message' => $emailError[0]->getMessage()],
                JsonResponse::HTTP_BAD_REQUEST
            );

        }

        $entityManager->persist($newOrder);

        $entityManager->flush();


        return new JsonResponse([['id' => $newOrder->getId()],
            JsonResponse::HTTP_CREATED]);
    }
}
