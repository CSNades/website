<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Nade;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class NadeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function nadesWithApprovedByIdAreApproved()
    {
        $nadeA = factory(Nade::class)->states('approved')->create();
        $nadeB = factory(Nade::class)->states('unapproved')->create();
        $approvedNades = Nade::approved()->get();

        $this->assertTrue($approvedNades->contains($nadeA));
        $this->assertFalse($approvedNades->contains($nadeB));
    }
}
