<?php
use model\VerificationService;
use PHPUnit\Framework\TestCase;

class testVerificationService extends TestCase {

    private VerificationService $verificationService;

    protected function setUp() : void
    {
        $this->verificationService = new VerificationService();
    }

    public function testVerificationNomAvecSucces()
    {
        // GIVEN un nom valide
        $nom = "Doe";
        $this->verificationService = $this->getMockBuilder(VerificationService::class)
            ->setMethods(['verificationNom'])
            ->getMock();
        $this->verificationService->expects($this->once())
            ->method('verificationNom')
            ->willReturn(true);

        // WHEN on appelle la méthode verificationNom
        $resultat = $this->verificationService->verificationNom($nom);

        // THEN le nom est validé
        $this->assertTrue($resultat);
    }

    public function testVerificationNomAvecEchec()
    {
        // GIVEN un nom invalide 
        $nom = str_repeat("a", 81);
        $this->verificationService = $this->getMockBuilder(VerificationService::class)
            ->setMethods(['verificationNom'])
            ->getMock();
        $this->verificationService->expects($this->once())
            ->method('verificationNom')
            ->willReturn(false);

        // WHEN on appelle la méthode verificationNom
        $resultat = $this->verificationService->verificationNom($nom);

        // THEN le nom n'est pas accepté
        $this->assertFalse($resultat);
    }

    public function testVerificationPrenomAvecSucces()
    {
        // GIVEN Un prenom valide
        $prenom = "John";
        $this->verificationService = $this->getMockBuilder(VerificationService::class)
            ->setMethods(['verificationPrenom'])
            ->getMock();
        $this->verificationService->expects($this->once())
            ->method('verificationPrenom')
            ->willReturn(true);

        // WHEN on appelle la méthode verificationPrenom
        $resultat = $this->verificationService->verificationPrenom($prenom);

        // THEN le prenom est valide
        $this->assertTrue($resultat);
    }

    public function testVerificationPrenomAvecEchec()
    {
        // GIVEN un prenom incorrect
        $prenom = str_repeat("a", 81);
        $this->verificationService = $this->getMockBuilder(VerificationService::class)
            ->setMethods(['verificationPrenom'])
            ->getMock();
        $this->verificationService->expects($this->once())
            ->method('verificationPrenom')
            ->willReturn(false);

        // WHEN on appelle la méthode verficiationPrenom
        $resultat = $this->verificationService->verificationPrenom($prenom);

        // THEN le prenom n'est pas validé 
        $this->assertFalse($resultat);
    }

    public function testVerificationMailAvecSucces()
    {
        // GIVEN un mail correct
        $mail = "john.doe@example.com";
        $this->verificationService = $this->getMockBuilder(VerificationService::class)
            ->setMethods(['verificationMail'])
            ->getMock();
        $this->verificationService->expects($this->once())
            ->method('verificationMail')
            ->willReturn(true);

        // WHEN on appelle la méthode verficiationMail
        $resultat = $this->verificationService->verificationMail($mail);

        // THEN  le mail est validé
        $this->assertTrue($resultat);
    }

    public function testVerificationMailAvecEchec()
    {
        // GIVEN un mail incorrect
        $mail = "john.doe@.example.com";
        $this->verificationService = $this->getMockBuilder(VerificationService::class)
            ->setMethods(['verificationMail'])
            ->getMock();
        $this->verificationService->expects($this->once())
            ->method('verificationMail')
            ->willReturn(false);

        // WHEN on appelle la méthode verficiationMail
        $resultat = $this->verificationService->verificationMail($mail);

         // THEN le mail est invalide
         $this->assertFalse($resultat);
    }

}
?>