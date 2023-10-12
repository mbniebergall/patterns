<?php

declare(strict_types=1);

namespace Pattern\Behavioral;

interface Observer
{
    public function notify(string $event, string $item): void;
}

class FileArchiver implements Observer
{
    public function notify(string $event, string $item): void
    {
        // archive file
    }
}

class FileUpload
{
    /** @var Observer[] */
    protected array $observers;
    public function __construct(array $observers)
    {
        $this->observers = $observers;
    }

    public function upload(string $filename): bool
    {
        // uploads a file
        foreach ($this->observers as $observer) {
            $observer->notify('file:upload', $filename);
        }

        return true;
    }
}


$uploader = new FileUpload([new FileArchiver()]);
$uploader->upload('/tmp/upload/file.txt');