<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class UserCaseFindByIdTest extends TestCase
{

	protected UserRepository $userRepo;
	protected UserCaseFindById $userCaseFindById;

    function __construct() {
    	parent:: __construct();
		$this->userRepo = new UserRepository(new MyDB());
		$this->userCaseFindById = new UserCaseFindById($this->userRepo);
    }

    public function testUserCaseFindById(): void
    {
    	$user = new User(null,'fulano','fulano@email.com');
    	$this->userRepo->insert($user);

        $this->assertInstanceOf(
            User::class,
            $this->userCaseFindById->invoke(1)
        );
    }
    public function testUserCaseFindByIdNotFound(): void
    {
    	  $this->userRepo->delete(1);
        $this->expectException(Exception::class);
            $this->userCaseFindById->invoke(1);
    }

}
