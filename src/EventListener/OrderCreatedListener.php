<?php

namespace App\EventListener;

use App\Entity\Order;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Psr\Log\LoggerInterface;


class OrderCreatedListener
{

    private $logger;

    public function __construct( LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function postPersist(Order $order, LifecycleEventArgs $lifecycleEventArgs){
        $this->logger->info("Order created!");

    }


}