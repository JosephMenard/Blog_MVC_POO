<?php

namespace App\Entity;

use App\Interfaces\PasswordProtectedInterface;
use App\Interfaces\UserInterface;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    private ?int $id;
    private string $lastName;
    private string $firstName;
    private string $mail;
    private string $password;
    private int $roles;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */

    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return User
     */
    public function setMail(string $mail): User
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return User
     */
    public function setFirstName(string $firstName): User
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return User
     */
    public function setLastName(string $lastName): User
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */

    public function getRoles(): int
    {
        $roles = $this->roles;
        return $roles;
    }

    /**
     * @param array $roles
     * @return User
     */
    public function setRoles(int $roles): User
    {
        $this->roles = $roles;
        return $this;
    }

    public function getHashedPassword(): string
    {
        return 'coucou';
    }

    public function passwordMatch(string $plainPwd): bool
    {
        return true;
    }




    // public function getUsername(): string
    // {
    //     return $this->username;
    // }

    // /**
    //  * @param string $username
    //  * @return User
    //  */
    // public function setUsername(string $username): User
    // {
    //     $this->username = $username;
    //     return $this;
    // }

    // /**
    //  * @return string
    //  */


    // public function getGender(): string
    // {
    //     return $this->gender;
    // }

    // /**
    //  * @param string $gender
    //  * @return User
    //  */
    // public function setGender(string $gender): User
    // {
    //     $this->gender = $gender;
    //     return $this;
    // }

    // /**
    //  * @return array
    //  */



}