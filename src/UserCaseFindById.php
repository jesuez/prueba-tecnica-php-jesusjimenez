<?php
declare(strict_types=1);
class UserCaseFindById
{
	protected UserRepository $userRepository;

    function __construct(UserRepository $repo) {
		$this->userRepository = $repo;
    }

    public function invoke(int $id): User {
		return $this->userRepository->getByIdOrFail($id);
	 }
}
