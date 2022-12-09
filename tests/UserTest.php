<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class UserTest extends TestCase
{
	protected $user;

    function __construct() {
    	parent:: __construct();
		$this->user = new User(1,'fulano','fulano@email.com');

    }

   public function testCreateValidUser(): void
    {
        $this->assertInstanceOf(
            User::class,
            new User(5,'mengano','mengano@email.com')
        );
    }

    public function testUserProperties(): void {
    	$id = 8;
    	$this->user->setId($id);
      $this->assertEquals($id, $this->user->getId());

    	$name = 'sutano';
    	$this->user->setName($name);
      $this->assertEquals($name, $this->user->getName());

    	$email = 'emaildeprueba@email.com';
    	$this->user->setEmail($email);
      $this->assertEquals($email, $this->user->getEmail());
    }

}
