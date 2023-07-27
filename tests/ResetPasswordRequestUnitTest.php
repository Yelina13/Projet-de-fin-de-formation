<?php

namespace App\Tests;
use App\Entity\ResetPasswordRequest;
use PHPUnit\Framework\TestCase;

class ResetPasswordRequestUnitTest extends TestCase

{
  public function testConstructorAndGetters()
  {
      // Créez un utilisateur fictif (un mock) pour le test
      $user = $this->createMock(\stdClass::class);

      // Créez une instance de l'entité avec les arguments nécessaires pour le constructeur
      $expiresAt = new \DateTimeImmutable('+1 day');
      $selector = 'selector';
      $hashedToken = 'hashed_token';
      $entity = new ResetPasswordRequest($user, $expiresAt, $selector, $hashedToken);

      // Vérifiez si les valeurs passées dans le constructeur sont correctement assignées aux propriétés
      $this->assertSame($user, $entity->getUser());
      
      // Notez que le type de retour de getUser() est object, donc nous utilisons assertIsObject pour vérifier le type.
      $this->assertIsObject($entity->getUser());
      
      $this->assertEmpty($entity->getId());
  }

 
}