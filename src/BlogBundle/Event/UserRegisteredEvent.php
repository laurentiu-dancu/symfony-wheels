<?php

namespace BlogBundle\Event;

use BlogBundle\Entity\User;
use Symfony\Component\EventDispatcher\Event;

class UserRegisteredEvent extends Event {
    const NAME = 'user.registered';

    /**
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

}
