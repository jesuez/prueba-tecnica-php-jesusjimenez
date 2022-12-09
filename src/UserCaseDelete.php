<?php
declare(strict_types=1);
class UserCaseUpdate
{
	protected UserRepository $userRepository;

    function __construct(UserRepository $repo) {
		$this->userRepository = $repo;
    }

    public function delete(int $id): User {
		return $this->userRepository->delete($id);
	 }
}
