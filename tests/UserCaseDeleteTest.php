<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class UserCaseDeleteTest extends TestCase
{

	protected UserRepository $userRepo;
	protected UserCaseFindById $userCaseFindById;

    function __construct() {
    	parent:: __construct();
		$this->userRepo = new UserRepository(new MyDB());
		$this->userCaseFindById = new UserCaseFindById($this->userRepo);
    }

    public function testUserCaseDelete(): void
    {
        $this->assertEquals(true,
        	$this->userRepo->delete(1)
        );
    }

}
