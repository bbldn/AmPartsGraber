<?php

namespace App\Domain\Film\Application\CommandHandler\ParseByCategoryUrlHandler\ActressSaver;

use DateTimeImmutable;
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
     * @return Actress|null
     */
    public function save(ActressDTO $actressDTO): ?Actress
    {
        /** @var DateTimeImmutable $dob */
        $dob = $actressDTO->getDob();

        /** @var string $fullName */
        $fullName = $actressDTO->getFullName();

        $actress = $this->actressRepository->findOneByFullNameAndDob($fullName, $dob);
        if (null === $actress) {
            $actress = new Actress();
        }

        $actress->setDob($dob);
        $actress->setFullName($fullName);
        $actress->setRace($actressDTO->getRace());
        $actress->setBreast($actressDTO->getBreast());
        $actress->setHeight($actressDTO->getHeight());
        $actress->setWeight($actressDTO->getWeight());
        $actress->setStatus($actressDTO->getStatus());
        $actress->setTattoo($actressDTO->getTattoo());
        $actress->setEyeColor($actressDTO->getEyeColor());
        $actress->setPiercing($actressDTO->getPiercing());
        $actress->setShoeSize($actressDTO->getShoeSize());
        $actress->setHairColor($actressDTO->getHairColor());
        $actress->setYearStart($actressDTO->getYearStart());
        $actress->setBreastSize($actressDTO->getBreastSize());
        $actress->setZodiacSign($actressDTO->getZodiacSign());
        $actress->setNationality($actressDTO->getNationality());

        $this->entityManagerFilm->persist($actress);

        return $actress;
    }
}