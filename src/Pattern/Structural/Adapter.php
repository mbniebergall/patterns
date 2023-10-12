<?php

declare(strict_types=1);

namespace Pattern\Structural;

class EmailDto
{
    public function __construct(
        public string $to,
        public string $subject,
        public string $message
    ) {}
}

interface AdapterInterface {}

class EmailClient
{
    public function __construct(protected ?EmailAdapter $emailAdapter) {}

    public function send(EmailDto $emailDto): bool
    {
        return $this->emailAdapter->mail(
            $emailDto->to,
            $emailDto->subject,
            $emailDto->message
        );
    }
}

class EmailAdapter implements AdapterInterface
{
    public function mail(
        string $to,
        string $subject,
        string $message
    ): bool {
        return mail($to, $subject, $message);
    }
}

$emailDto = new EmailDto();
$emailClient = new EmailClient(new EmailAdapter());
$emailClient->send($emailDto);