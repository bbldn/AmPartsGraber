<?php

namespace App\Domain\Film\Application\Query;

use BBLDN\CQRS\QueryBus\Query;
use BBLDN\CQRSBundle\QueryBus\Annotation as CQRS;
use App\Domain\Film\Application\QueryHandler\ActressListAllJSON\Handler;

#[CQRS\QueryHandler(class: Handler::class)]
class ActressListAllJSON implements Query
{
}