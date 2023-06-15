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

namespace RiotAPI\TFTAPI\Objects;


/**
 *   Class SummonerDto
 *
 * Used in:
 *   tft-summoner (v1)
 *     - @see TFTAPI::getBySummonerId
 *       @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getBySummonerId
 *     - @see TFTAPI::getBySummonerName
 *       @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getBySummonerName
 *     - @see TFTAPI::getByAccountId
 *       @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getByAccountId
 *     - @see TFTAPI::getByPUUID
 *       @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getByPUUID
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class SummonerDto extends ApiObject
{
	/**
	 * Encrypted account ID. Max length 56 characters.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getBySummonerId
	 *   - @see TFTAPI::getBySummonerName
	 *   - @see TFTAPI::getByAccountId
	 *   - @see TFTAPI::getByPUUID
	 *
	 * @var string $accountId
	 */
	public string $accountId;

	/**
	 * ID of the summoner icon associated with the summoner.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getBySummonerId
	 *   - @see TFTAPI::getBySummonerName
	 *   - @see TFTAPI::getByAccountId
	 *   - @see TFTAPI::getByPUUID
	 *
	 * @var int $profileIconId
	 */
	public int $profileIconId;

	/**
	 * Date summoner was last modified specified as epoch milliseconds. The
	 * following events will update this timestamp: profile icon change,
	 * playing the tutorial or advanced tutorial, finishing a game, summoner
	 * name change.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getBySummonerId
	 *   - @see TFTAPI::getBySummonerName
	 *   - @see TFTAPI::getByAccountId
	 *   - @see TFTAPI::getByPUUID
	 *
	 * @var int $revisionDate
	 */
	public int $revisionDate;

	/**
	 * Summoner name.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getBySummonerId
	 *   - @see TFTAPI::getBySummonerName
	 *   - @see TFTAPI::getByAccountId
	 *   - @see TFTAPI::getByPUUID
	 *
	 * @var string $name
	 */
	public string $name;

	/**
	 * Encrypted summoner ID. Max length 63 characters.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getBySummonerId
	 *   - @see TFTAPI::getBySummonerName
	 *   - @see TFTAPI::getByAccountId
	 *   - @see TFTAPI::getByPUUID
	 *
	 * @var string $id
	 */
	public string $id;

	/**
	 * Encrypted PUUID. Exact length of 78 characters.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getBySummonerId
	 *   - @see TFTAPI::getBySummonerName
	 *   - @see TFTAPI::getByAccountId
	 *   - @see TFTAPI::getByPUUID
	 *
	 * @var string $puuid
	 */
	public string $puuid;

	/**
	 * Summoner level associated with the summoner.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getBySummonerId
	 *   - @see TFTAPI::getBySummonerName
	 *   - @see TFTAPI::getByAccountId
	 *   - @see TFTAPI::getByPUUID
	 *
	 * @var int $summonerLevel
	 */
	public int $summonerLevel;
}
