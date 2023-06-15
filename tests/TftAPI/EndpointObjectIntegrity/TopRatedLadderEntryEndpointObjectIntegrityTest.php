<?php

/**
 * Copyright (C) 2023  Yaroslav Molchan
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

use RiotAPI\Tests\RiotAPITestCase;
use RiotAPI\Base\Definitions\Region;
use RiotAPI\TFTAPI\TFTAPI;
use RiotAPI\TFTAPI\Objects;


class TopRatedLadderEntryEndpointObjectIntegrityTest extends RiotAPITestCase
{
    public function testInit()
    {
        $api = new TFTAPI([
            TFTAPI::SET_KEY             => RiotAPITestCase::getApiKey(),
            TFTAPI::SET_REGION          => Region::RUSSIA,
            TFTAPI::SET_USE_DUMMY_DATA  => true,
        ]);

        $this->assertInstanceOf(TFTAPI::class, $api);

        return $api;
    }

    /**
     * @depends testInit
     *
     * @param TFTAPI $api
     */
    public function testGetTopRatedLadder(TFTAPI $api)
    {
        //  Get library processed results
        /** @var Objects\TopRatedLadderEntryDto[] $result */
        $result = $api->getTopRatedLadder(TFTAPI::QUEUE_RANKED_TFT_TURBO);
        //  Get raw result
        $rawResult = $api->getResult();

        $this->checkObjectPropertiesAndDataValidityOfObjectList($result, $rawResult, Objects\TopRatedLadderEntryDto::class);
    }
}
