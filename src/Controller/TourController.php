<?php

namespace App\Controller;

use App\Repository\TourRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;



class TourController extends AbstractController
{


    public function getTours(
        Request $request,
        TourRepository $tourRepository,
        NormalizerInterface $normalizer

    ): JsonResponse
    {
        if($request->query->has("search")){
            $tours = $tourRepository->findByText($request->query->get("search"));

        }
        else{
            $tours = $tourRepository->findAll();
        }


        $normalizedTours = [];
        foreach ($tours as $tour){
            $normalizedTour = $normalizer->normalize($tour, "json", [AbstractNormalizer::IGNORED_ATTRIBUTES => ["route"]]);
            $normalizedTour["imageUrl"]  = "http://".$request->getHost().':'.$request->getPort().$normalizedTour["imageUrl"];
            $normalizedTours[] = $normalizedTour;
         }


        return new JsonResponse($normalizedTours);
    }

    public function getTour(
        Request $request,
        int $id,
        TourRepository $tourRepository,
        NormalizerInterface $normalizer
    ): JsonResponse
    {
        $tour = $tourRepository->find($id);
        $normalizedTour = $normalizer->normalize($tour, "json", [AbstractNormalizer::IGNORED_ATTRIBUTES => ["route"]]);
        $normalizedTour["imageUrl"]  = "http://".$request->getHost().':'.$request->getPort().$normalizedTour["imageUrl"];
        return new JsonResponse($normalizedTour);
    }
}
