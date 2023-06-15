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
 *   Class LeagueEntryDto
 *
 * Used in:
 *   tft-league (v1)
 *     - @see TFTAPI::getLeagueEntriesForSummoner
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueEntriesForSummoner
 *     - @see TFTAPI::getLeagueEntries
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueEntries
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class LeagueEntryDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?string $leagueId
	 */
	public ?string $leagueId = null;

	/**
	 * Player's summonerId (Encrypted).
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var string $summonerId
	 */
	public string $summonerId;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var string $summonerName
	 */
	public string $summonerName;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var string $queueType
	 */
	public string $queueType;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?string $tier
	 */
	public ?string $tier = null;

	/**
	 * The player's division within a tier.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?string $rank
	 */
	public ?string $rank = null;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?int $leaguePoints
	 */
	public ?int $leaguePoints = null;

	/**
	 * Winning team on Summoners Rift. First placement in Teamfight Tactics.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var int $wins
	 */
	public int $wins;

	/**
	 * Losing team on Summoners Rift. Second through eighth placement in
	 * Teamfight Tactics.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var int $losses
	 */
	public int $losses;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?bool $hotStreak
	 */
	public ?bool $hotStreak = null;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?bool $veteran
	 */
	public ?bool $veteran = null;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?bool $freshBlood
	 */
	public ?bool $freshBlood = null;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?bool $inactive
	 */
	public ?bool $inactive = null;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var MiniSeriesDTO|null $miniSeries
	 */
	public ?MiniSeriesDTO $miniSeries = null;

	/**
	 * Only included for the RANKED_TFT_TURBO queueType. (Legal values:
	 * ORANGE, PURPLE, BLUE, GREEN, GRAY).
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?string $ratedTier
	 */
	public ?string $ratedTier = null;

	/**
	 * Only included for the RANKED_TFT_TURBO queueType.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getLeagueEntries
	 *
	 * @var ?int $ratedRating
	 */
	public ?int $ratedRating = null;
}
