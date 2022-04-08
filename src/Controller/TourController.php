<?php

namespace App\Controller;

use App\Repository\TourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;



class TourController extends AbstractController
{


    public function getTours(
        TourRepository $tourRepository,
        NormalizerInterface $normalizer

    ): JsonResponse
    {
        $tours = $tourRepository->findAll();
        $normalizedTours = [];
        foreach ($tours as $tour){
            $normalizedTour = $normalizer->normalize($tour);
            $normalizedTours[] = $normalizedTour;
         }


        return new JsonResponse($normalizedTours);
    }

    public function getTour(
        int $id,
        TourRepository $tourRepository,
        NormalizerInterface $normalizer
    ): JsonResponse
    {
        $tour = $tourRepository->find($id);
        $normalizedTour = $normalizer->normalize($tour);
        return new JsonResponse($normalizedTour);
    }
}
