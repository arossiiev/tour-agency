<?php

namespace App\Controller;

use App\Repository\RouteRepository;
use App\Repository\TourRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class RouteController extends AbstractController
{

    public function getRoute(
        int $tour_id,
        TourRepository $tourRepository,
        NormalizerInterface $normalizer

    ): JsonResponse
    {

        $route = $tourRepository->find($tour_id)->getRoute();
        $sights = $route->getSightInRoutes();
        $normalizedSights = [];
        foreach ($sights as $sight) {
            $normalizedSights[] = $normalizer->normalize($sight->getSight(), "json", [
                AbstractNormalizer::IGNORED_ATTRIBUTES => ['__initializer__', '__cloner__', '__isInitialized__'],
            ]);

        }

        $normalizedRoute = $normalizer->normalize($route, "json", [AbstractNormalizer::IGNORED_ATTRIBUTES => ["sightInRoutes", "tour"]]);;

        $normalizedRoute["sights"] = $normalizedSights;
        return new JsonResponse($normalizedRoute);
    }
}
