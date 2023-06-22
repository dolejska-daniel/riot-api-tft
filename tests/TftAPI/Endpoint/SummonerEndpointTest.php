<?php

/**
 * Copyright (C) 2016-2023  Daniel Dolejška
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
use RiotAPI\Base\Exceptions\RequestParameterException;
use RiotAPI\TFTAPI\TFTAPI;
use RiotAPI\TFTAPI\Objects;


class SummonerEndpointTest extends RiotAPITestCase
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
	public function testGetSummonerByAccountId(TFTAPI $api)
	{
		$accountId = "bKZYGaamqylFMxekuYtkIQnwGt_b-pwaOqHrXnPp2-f9K_E";

		//  Get library processed results
		/** @var Objects\SummonerDto $result */
		$result = $api->getSummonerByAccountId($accountId);

		$this->assertSame("jTKPiHa4gZKwrNYQgGuDHeYISfE6q8S-Cae0CQWehZQcr90", $result->id);
		$this->assertSame($accountId, $result->accountId);
		$this->assertSame("mFO8vix7Pmya3Rvyd1Ghybne-VmzEcL0DedT9Sd7BTqk8gQCGGSihyiTezA3rpkoc8obgRzKb0x8_g", $result->puuid);
		$this->assertSame('LoLFinderRu', $result->name);
		$this->assertIsInt($result->summonerLevel);
		$this->assertIsInt($result->profileIconId);
		$this->assertIsInt($result->revisionDate);
	}

    /**
     * @depends testInit
     *
     * @param TFTAPI $api
     */
    public function testGetSummonerByPUUID(TFTAPI $api )
    {
        $encrypted_puuid = "mFO8vix7Pmya3Rvyd1Ghybne-VmzEcL0DedT9Sd7BTqk8gQCGGSihyiTezA3rpkoc8obgRzKb0x8_g";

        //  Get library processed results
        /** @var Objects\SummonerDto $result */
        $result = $api->getSummonerByPUUID($encrypted_puuid);

        $this->assertSame("jTKPiHa4gZKwrNYQgGuDHeYISfE6q8S-Cae0CQWehZQcr90", $result->id);
        $this->assertSame("bKZYGaamqylFMxekuYtkIQnwGt_b-pwaOqHrXnPp2-f9K_E", $result->accountId);
        $this->assertSame($encrypted_puuid, $result->puuid);
        $this->assertSame('LoLFinderRu', $result->name);
        $this->assertIsInt($result->summonerLevel);
        $this->assertIsInt($result->profileIconId);
        $this->assertIsInt($result->revisionDate);
    }

	/**
	 * @depends testInit
	 *
	 * @param TFTAPI $api
	 */
	public function testGetSummonerByName(TFTAPI $api )
	{
		$summonerName = 'LoLFinderRu';

		//  Get library processed results
		/** @var Objects\SummonerDto $result */
		$result = $api->getSummonerByName($summonerName);

		$this->assertSame("jTKPiHa4gZKwrNYQgGuDHeYISfE6q8S-Cae0CQWehZQcr90", $result->id);
		$this->assertSame("bKZYGaamqylFMxekuYtkIQnwGt_b-pwaOqHrXnPp2-f9K_E", $result->accountId);
		$this->assertSame("mFO8vix7Pmya3Rvyd1Ghybne-VmzEcL0DedT9Sd7BTqk8gQCGGSihyiTezA3rpkoc8obgRzKb0x8_g", $result->puuid);
		$this->assertSame($summonerName, $result->name);
		$this->assertIsInt($result->summonerLevel);
		$this->assertIsInt($result->profileIconId);
		$this->assertIsInt($result->revisionDate);
	}

	public static function emptySummonerNameProvider(): array
	{
		return [
			'Empty string' => [
				'summonerName' => ''
			],
			'String containing one space' => [
				'summonerName' => ' '
			],
			'String containing two space' => [
				'summonerName' => '  '
			],
			'String containing multiple spaces' => [
				'summonerName' => '       '
			],
		];
	}

	/**
	 * @depends testInit
	 * @dataProvider emptySummonerNameProvider
	 *
	 * @param TFTAPI $api
	 */
	public function testGetSummonerByNameThrowsAnExceptionInCaseNoNameIsSubmitted(string $summonerName, TFTAPI $api)
	{
		$this->expectException(RequestParameterException::class);
		$this->expectExceptionMessage('Provided summoner name must not be empty');

		$api->getSummonerByName($summonerName);
	}

	/**
	 * @depends testInit
	 *
	 * @param TFTAPI $api
	 */
	public function testGetSummoner(TFTAPI $api )
	{
		$summonerId = "jTKPiHa4gZKwrNYQgGuDHeYISfE6q8S-Cae0CQWehZQcr90";

		//  Get library processed results
		/** @var Objects\SummonerDto $result */
		$result = $api->getSummoner($summonerId);

		$this->assertSame($summonerId, $result->id);
		$this->assertSame("bKZYGaamqylFMxekuYtkIQnwGt_b-pwaOqHrXnPp2-f9K_E", $result->accountId);
		$this->assertSame("mFO8vix7Pmya3Rvyd1Ghybne-VmzEcL0DedT9Sd7BTqk8gQCGGSihyiTezA3rpkoc8obgRzKb0x8_g", $result->puuid);
		$this->assertSame('LoLFinderRu', $result->name);
		$this->assertIsInt($result->summonerLevel);
		$this->assertIsInt($result->profileIconId);
		$this->assertIsInt($result->revisionDate);
	}
}
