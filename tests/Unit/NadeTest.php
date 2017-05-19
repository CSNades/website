<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use App\Models\Map;
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

    /** @test */
    public function canSetMapForNade()
    {
        $nade = factory(Nade::class)->create();
        $map = factory(Map::class)->create();

        $nade->forMap($map);

        $this->assertEquals($map->id, $nade->map_id);
    }

    /** @test */
    public function canSetUserForNade()
    {
        $user = factory(User::class)->create();
        $nade = factory(Nade::class)->make(['user_id' => null]);

        $nade->maybeForUser($user);

        $this->assertEquals($user->id, $nade->user_id);
    }

    /** @test */
    public function cannotSetUserForNadeIfUserAlreadySet()
    {
        $user = factory(User::class)->create();
        $nade = factory(Nade::class)->make();

        $nade->maybeForUser($user);

        $this->assertNotEquals($user->id, $nade->user_id);
    }

    /** @test */
    public function approveNadeIfUserHasPermission()
    {
        $user = factory(User::class)->create(['is_mod' => 1]);
        $nade = factory(Nade::class)->states('unapproved')->create();

        $nade->maybeChangeApproved($user, true);

        $this->assertTrue($nade->isApproved());
    }

    /** @test */
    public function unapproveNadeIfUserHasPermission()
    {
        $user = factory(User::class)->create(['is_mod' => 1]);
        $nade = factory(Nade::class)->states('approved')->create();

        $nade->maybeChangeApproved($user, false);

        $this->assertFalse($nade->isApproved());
    }

    /** @test */
    public function dontOverwriteApprovedBy()
    {
        $userA = factory(User::class)->create(['is_mod' => 1]);
        $userB = factory(User::class)->create(['is_mod' => 1]);
        $nade = factory(Nade::class)->create(['approved_by' => $userB]);

        $nade->maybeChangeApproved($userA, true);

        $this->assertEquals($userB->id, $nade->approved_by);
    }
}
