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
    public function fillAndUpdateAssociationsFromFillArray()
    {
        $user = factory(User::class)->create(['is_mod' => 1]);
        $map = factory(Map::class)->create(['slug' => 'dust2']);
        $nade = factory(Nade::class)->states('unapproved')->create();

        $nade->fillAndAssociate($user, [
            'type' => 'smoke',
            'pop_spot' => 'a-site',
            'title' => 'a cool nade!',
            'imgur_album' => 'http://imgur.com/csnades',
            'youtube' => 'https://youtube.com/csnades',
            'tags' => 'xbox,goose',
            'is_working' => 1,
            'is_approved' => 1,
            'map' => 'dust2',
        ]);

        $this->assertEquals($nade->type, 'smoke');
        $this->assertEquals($nade->pop_spot, 'a-site');
        $this->assertEquals($nade->title, 'a cool nade!');
        $this->assertEquals($nade->imgur_album, 'http://imgur.com/csnades');
        $this->assertEquals($nade->youtube, 'https://youtube.com/csnades');
        $this->assertEquals($nade->tags, 'xbox,goose');
        $this->assertEquals($nade->is_working, 1);
        $this->assertEquals($nade->approved_by, $user->id);
        $this->assertEquals($nade->map_id, $map->id);
    }

    /** @test */
    public function nadesInDescendingOrderByTimeApprovedThenCreatedThenById()
    {
        $approvedAtHigh = '2017-04-10 10:00:00';
        $approvedAtLow = '2016-04-10 10:00:00';
        $createdAtHigh = '2017-03-10 20:00:00';
        $createdAtLow = '2016-03-10 20:00:00';

        $before = collect([
            factory(Nade::class)->create([
                'approved_at' => $approvedAtLow,
                'created_at' => $createdAtLow,
            ]),
            factory(Nade::class)->create([
                'approved_at' => $approvedAtLow,
                'created_at' => $createdAtHigh,
            ]),
            factory(Nade::class)->create([
                'approved_at' => $approvedAtHigh,
                'created_at' => $createdAtLow,
            ]),
            factory(Nade::class)->create([
                'approved_at' => $approvedAtHigh,
                'created_at' => $createdAtHigh,
            ]),
            factory(Nade::class)->create([
                'approved_at' => $approvedAtHigh,
                'created_at' => $createdAtHigh,
            ]),
        ]);

        $sorted = Nade::approved()->preferredOrder()->get();
        $this->assertEquals($before->reverse()->pluck('id'), $sorted->pluck('id'));
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
