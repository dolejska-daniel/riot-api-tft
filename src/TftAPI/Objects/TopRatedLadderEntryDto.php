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
 *   Class TopRatedLadderEntryDto
 *
 * Used in:
 *   tft-league (v1)
 *     - @see TFTAPI::getTopRatedLadder
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getTopRatedLadder
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class TopRatedLadderEntryDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getTopRatedLadder
	 *
	 * @var string $summonerId
	 */
	public string $summonerId;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getTopRatedLadder
	 *
	 * @var string $summonerName
	 */
	public string $summonerName;

	/**
	 * (Legal values: ORANGE, PURPLE, BLUE, GREEN, GRAY).
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getTopRatedLadder
	 *
	 * @var string $ratedTier
	 */
	public string $ratedTier;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getTopRatedLadder
	 *
	 * @var int $ratedRating
	 */
	public int $ratedRating;

	/**
	 * First placement.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getTopRatedLadder
	 *
	 * @var int $wins
	 */
	public int $wins;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getTopRatedLadder
	 *
	 * @var int $previousUpdateLadderPosition
	 */
	public int $previousUpdateLadderPosition;
}
