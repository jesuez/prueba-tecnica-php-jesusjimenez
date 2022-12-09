<?php
declare(strict_types=1);
class UserCaseInsert
{
	protected UserRepository $userRepository;

    function __construct(UserRepository $repo) {
		$this->userRepository = $repo;
    }

    public function insert(User $user): User {
		return $this->userRepository->insert($user);
	 }
}
