<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class UserCaseInsertTest extends TestCase
{

	protected UserRepository $userRepo;
	protected UserCaseFindById $userCaseFindById;

    function __construct() {
    	parent:: __construct();
		$this->userRepo = new UserRepository(new MyDB());
		$this->userCaseFindById = new UserCaseFindById($this->userRepo);
    }

    public function testUserCaseInsert(): void
    {
    	  $user = new User(null,'fulano','fulano@email.com');
        $this->assertInstanceOf(
            User::class,
            $this->userRepo->insert($user)
        );
    }

}
