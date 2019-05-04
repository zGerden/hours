<?php

declare(strict_types=1);

namespace App\Commands\Concerns;

use App\Config;
use Carbon\CarbonInterval;
use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Date;

trait AcceptsDateRangeOptions
{
    abstract public function option($key = null);

    protected function getFromOption(): ?CarbonInterface
    {
        if ($this->option('from')) {
            return Date::parse($this->option('from'), $this->config()->timezone)->utc();
        }

        return null;
    }

    protected function getToOption(): ?CarbonInterface
    {
        if ($this->option('to')) {
            return Date::parse($this->option('to'), $this->config()->timezone)->utc();
        }

        if ($this->option('interval')) {
            return $this->getFromOption()
                ->add(CarbonInterval::fromString($this->option('interval')))
                ->utc();
        }

        return null;
    }

    private function config(): Config
    {
        return app(Config::class);
    }
}
