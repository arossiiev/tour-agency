<?php

namespace App\EventListener;

use App\Entity\Order;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class OrderCreatedListener
{

    private $logger;
    private $mailer;


    public function __construct( LoggerInterface $logger, MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function postPersist(Order $order, LifecycleEventArgs $lifecycleEventArgs){
        $this->logger->info("Order created!");
        $orderId = $order->getId();
        $tourName = $order->getTour()->getName();
        $email = new Email();
        $email->addFrom("tour-agency@gmail.com")
            ->addTo($order->getMail())
            ->subject('Your order created!')
            ->text("Your order id: $orderId and tour: $tourName");


        try {
            $this->mailer->send($email);
        } catch (TransportExceptionInterface $e) {
            $errorMessage = $e->getMessage();
            $this->logger->error("Error occurred while sending email: $errorMessage");
        }
        $this->logger->info("Email is sent!");

    }


}