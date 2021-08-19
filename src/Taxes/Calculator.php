<?php 

namespace App\Taxes;

use Psr\Log\LoggerInterface;

class Calculator {

    protected $logger;
    protected $tva;

    public function __construct(LoggerInterface $logger, float $tva){
        $this->logger = $logger;
        $this->tva = $tva;
    }
    public function calcul(float $prix) : float {
        // 100 => 20 : 120
        $this->logger->info("Un calcul a lieu : $prix");
        return $prix * (20 / 100);
    }
}