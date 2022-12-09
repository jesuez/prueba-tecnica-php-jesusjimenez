<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class UserRepositoryTest extends TestCase
{
	protected $db;
	protected $userRepo;

    function __construct() {
    	parent:: __construct();
		$this->db = new MyDB();
		$this->userRepo = new UserRepository($this->db);
    }

   public function testCreateValidUser(): void
    {
    	  $user = new User(null,'fulano','fulano@email.com');
        $this->assertInstanceOf(
            User::class,
            $this->userRepo->insert($user)
        );
    }

    public function testUserGetById(): void
    {
        $this->assertInstanceOf(
            User::class,
            $this->userRepo->getByIdOrFail(1)
        );
    }
    public function testUserNotFoundById(): void
    {
        $this->expectException(Exception::class);
            $this->userRepo->getByIdOrFail(10);
    }

    public function testUserUpdate(): void
    {
    	  $user = $this->userRepo->getByIdOrFail(1);
    	  $user->setName('Mengano');
    	  $user->setEmail('mengano@otroemail.com');
    	  $user = $this->userRepo->update($user);
    	  $user = new User(1,'mengano','mengano@otroemail.com');
        $this->assertEquals(true,
        	$this->userRepo->update($user)
        );
    }
    public function testUserDelete(): void
    {
        $this->assertEquals(true,
        	$this->userRepo->delete(1)
        );
    }
    
}
