<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class UserCaseUpdateTest extends TestCase
{

	protected UserRepository $userRepo;
	protected UserCaseFindById $userCaseFindById;

    function __construct() {
    	parent:: __construct();
		$this->userRepo = new UserRepository(new MyDB());
		$this->userCaseFindById = new UserCaseFindById($this->userRepo);
    }

    public function testUserCaseUpdate(): void
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

}
