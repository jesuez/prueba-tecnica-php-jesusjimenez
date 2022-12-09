<?php
declare(strict_types=1);
class UserCaseUpdate
{
	protected UserRepository $userRepository;

    function __construct(UserRepository $repo) {
		$this->userRepository = $repo;
    }

    public function update(User $user): User {
		return $this->userRepository->update($user);
	 }
}
