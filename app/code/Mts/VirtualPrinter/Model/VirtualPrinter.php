<?php

declare(strict_types=1);

namespace Mts\VirtualPrinter\Model;

class VirtualPrinter
{
    private string $message;

    public function __construct(string $message = '')
    {
        $this->message = $message;
    }

    public function printIt(): void
    {
        echo $this->message . "\n";
    }
}
