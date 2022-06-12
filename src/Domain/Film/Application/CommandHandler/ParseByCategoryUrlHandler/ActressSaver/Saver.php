<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressSaver;

use App\Domain\Common\Domain\Entity\Base\Film\Actress;
use Doctrine\ORM\EntityManagerInterface as EntityManagerFilm;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\DTO\Actress as ActressDTO;
use App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressSaver\Repository\Film\ActressRepository;

class Saver
{
    private ActressRepository $actressRepository;

    private EntityManagerFilm $entityManagerFilm;

    /**
     * @param ActressRepository $actressRepository
     * @param EntityManagerFilm $entityManagerFilm
     */
    public function __construct(
        ActressRepository $actressRepository,
        EntityManagerFilm $entityManagerFilm
    )
    {
        $this->actressRepository = $actressRepository;
        $this->entityManagerFilm = $entityManagerFilm;
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillRace(ActressDTO $actressDTO, Actress $actress): void
    {
        $race = trim((string)$actressDTO->getRace());
        if (mb_strlen($race) > 0 && 'Неизвестно' !== $race) {
            $actress->setRace($race);
        } else {
            $actress->setRace(null);
        }
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillBreast(ActressDTO $actressDTO, Actress $actress): void
    {
        $breast = trim((string)$actressDTO->getBreast());
        if (mb_strlen($breast) > 0 && 'Неизвестно' !== $breast) {
            $actress->setBreast($breast);
        } else {
            $actress->setBreast(null);
        }
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillHeight(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setHeight($actressDTO->getHeight());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillWeight(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setWeight($actressDTO->getWeight());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillStatus(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setStatus($actressDTO->getStatus());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillTattoo(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setTattoo($actressDTO->getTattoo());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillEyeColor(ActressDTO $actressDTO, Actress $actress): void
    {
        $eyeColor = trim((string)$actressDTO->getEyeColor());
        if (mb_strlen($eyeColor) > 0 && 'Неизвестно' !== $eyeColor) {
            $actress->setEyeColor($eyeColor);
        } else {
            $actress->setEyeColor(null);
        }
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillPiercing(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setPiercing($actressDTO->getPiercing());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillShoeSize(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setShoeSize($actressDTO->getShoeSize());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillHairColor(ActressDTO $actressDTO, Actress $actress): void
    {
        $hairColor = trim((string)$actressDTO->getHairColor());
        if (mb_strlen($hairColor) > 0 && 'Неизвестно' !== $hairColor) {
            $actress->setHairColor($hairColor);
        } else {
            $actress->setHairColor(null);
        }
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillYearStart(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setYearStart($actressDTO->getYearStart());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillBreastSize(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setBreastSize($actressDTO->getBreastSize());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillZodiacSign(ActressDTO $actressDTO, Actress $actress): void
    {
        $actress->setZodiacSign($actressDTO->getZodiacSign());
    }

    /**
     * @param ActressDTO $actressDTO
     * @param Actress $actress
     * @return void
     */
    private function fillNationality(ActressDTO $actressDTO, Actress $actress): void
    {
        $nationality = trim((string)$actressDTO->getNationality());
        if (mb_strlen($nationality) > 0 && 'Неизвестно' !== $nationality) {
            $actress->setNationality($nationality);
        } else {
            $actress->setNationality(null);
        }
    }


    /**
     * @param ActressDTO $actressDTO
     * @return Actress|null
     */
    public function save(ActressDTO $actressDTO): ?Actress
    {
        $dob = $actressDTO->getDob();
        if (null === $dob) {
            return null;
        }

        $fullName = $actressDTO->getFullName();
        if (null === $fullName) {
            return null;
        }

        $actress = $this->actressRepository->findOneByFullNameAndDob($fullName, $dob);
        if (null === $actress) {
            $actress = new Actress();
            $actress->setDob($dob);
            $actress->setFullName($fullName);
        }

        $this->fillRace($actressDTO, $actress);
        $this->fillBreast($actressDTO, $actress);
        $this->fillHeight($actressDTO, $actress);
        $this->fillWeight($actressDTO, $actress);
        $this->fillStatus($actressDTO, $actress);
        $this->fillTattoo($actressDTO, $actress);
        $this->fillEyeColor($actressDTO, $actress);
        $this->fillPiercing($actressDTO, $actress);
        $this->fillShoeSize($actressDTO, $actress);
        $this->fillHairColor($actressDTO, $actress);
        $this->fillYearStart($actressDTO, $actress);
        $this->fillBreastSize($actressDTO, $actress);
        $this->fillZodiacSign($actressDTO, $actress);
        $this->fillNationality($actressDTO, $actress);

        $this->entityManagerFilm->persist($actress);

        return $actress;
    }
}