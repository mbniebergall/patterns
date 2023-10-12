<?php

declare(strict_types=1);

namespace Pattern\Structural;

class TicketDto
{
    public function __construct(
        public ?int $id,
        public string $title,
    ) {}
}

class TicketingFacade
{
    public function createTicket(TicketDto $ticketDto): TicketDto
    {
        // creates a ticket in Ticketing System
        return $ticketDto;
    }
}


$ticketDto = new TicketDto(null, 'Test Ticket');
$ticketingFacade = new TicketingFacade();
$ticketingFacade->createTicket($ticketDto);