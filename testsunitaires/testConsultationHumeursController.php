<?php
namespace testsunitaires;

use controllers\ConsultationHumeursController;
use PHPUnit\Framework\TestCase;
use model\HumeurService;
use model\EmotionService;
use model\VerificationService;

class testConsultationHumeursController extends TestCase
{
    private $controller;
    

    protected function setUp(): void
    {
        $humeurService = $this->createMock(HumeurService::class);
        $emotionService = $this->createMock(EmotionService::class);
        $verifService = $this->createMock(VerificationService::class);

        $this->controller = new ConsultationHumeursController($humeurService, $emotionService, $verifService);
    }

    public function testIndex()
    {
        $pdo = null;
        $view = $this->controller->index($pdo);

        $this->assertIsObject($view);
        $this->assertInstanceOf('yasmf\view', $view);
    }

    public function testConsulter()
    {
        $pdo = null;
        $view = $this->controller->consulter($pdo);

        $this->assertIsObject($view);
        $this->assertInstanceOf('yasmf\view', $view);
    }

    public function testSupprimer()
    {
        $pdo = null;
        $view = $this->controller->supprimer($pdo);

        $this->assertIsObject($view);
        $this->assertInstanceOf('yasmf\view', $view);
    }
}
