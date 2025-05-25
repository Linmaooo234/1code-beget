<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Afisha;

class DeleteAfishaJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $afishaId;

    public function __construct($afishaId)
    {
        $this->afishaId = $afishaId;
    }

    public function handle()
    {
        Afisha::findOrFail($this->afishaId)->delete();
    }
}
