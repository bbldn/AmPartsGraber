<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressValidator;

use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\DTO\Actress as ActressDTO;

class Validator
{
    /**
     * @var bool[]
     *
     * @psalm-var array<string, bool>
     */
    private array $bannedDay = [
        '01' => true,
        '30' => true,
    ];

    /**
     * @param ActressDTO $actressDTO
     * @return bool
     */
    public function validate(ActressDTO $actressDTO): bool
    {
        $fullName = $actressDTO->getFullName();
        if (null === $fullName) {
            return false;
        }

        $dob = $actressDTO->getDob();
        if (null === $dob) {
            return false;
        }

//        $day = $dob->format('d');
//        if (true === key_exists($day, $this->bannedDay)) {
//            return false;
//        }

        return true;
    }
}