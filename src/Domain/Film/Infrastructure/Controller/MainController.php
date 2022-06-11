<?php

namespace App\Domain\Film\Infrastructure\Controller;

use BBLDN\CQRS\QueryBus\QueryBus;
use Symfony\Component\HttpFoundation\Response;
use App\Domain\Film\Application\Query\ActressListAllJSON;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @param QueryBus $queryBus
     * @return Response
     */
    public function indexAction(QueryBus $queryBus): Response
    {
        $json = $queryBus->execute(new ActressListAllJSON());

        return $this->render('film/index.html.twig', ['json' => $json]);
    }
}