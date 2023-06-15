<?php

/**
 * Copyright (C) 2016-2023  Daniel Dolejška
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


class MatchEndpointObjectIntegrityTest extends RiotAPITestCase
{
	public function testInit()
	{
        $api = new TFTAPI([
            TFTAPI::SET_KEY            => RiotAPITestCase::getApiKey(),
            TFTAPI::SET_REGION         => Region::RUSSIA,
            TFTAPI::SET_USE_DUMMY_DATA => true,
        ]);

		$this->assertInstanceOf(TFTAPI::class, $api);

		return $api;
	}

	/**
	 * @depends testInit
	 *
	 * @param TFTAPI $api
	 */
	public function testGetMatch(TFTAPI $api )
	{
		//  Get library processed results
		$result = $api->getMatch('RU_433752910');
		//  Get raw result
		$rawResult = $api->getResult();

		$this->checkObjectPropertiesAndDataValidity($result, $rawResult, Objects\MatchDto::class);
	}

	/**
	 * @depends testInit
	 *
	 * @param TFTAPI $api
	 */
	public function testGetMatchIdsByPUUID(TFTAPI $api )
	{
		//  Get library processed results
		$result = $api->getMatchIdsByPUUID("mFO8vix7Pmya3Rvyd1Ghybne-VmzEcL0DedT9Sd7BTqk8gQCGGSihyiTezA3rpkoc8obgRzKb0x8_g");
		//  Get raw result
		$rawResult = $api->getResult();

		$this->assertEquals($rawResult, $result);
	}
}
