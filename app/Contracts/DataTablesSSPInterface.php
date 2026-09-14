<?php

declare(strict_types=1);

namespace App\Contracts;

interface DataTablesSSPInterface
{
    public static function rules(): array;

    public function handle(): void;

    public function getReturnedData(): array;
}
