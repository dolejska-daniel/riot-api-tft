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
 *   Class InfoDto
 *
 * Used in:
 *   tft-match (v1)
 *     - @see TFTAPI::getMatch
 *       @link https://developer.riotgames.com/apis#tft-match-v1/GET_getMatch
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class InfoDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var string $game_version
	 */
	public string $game_version;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var ParticipantDto[] $participants
	 */
	public array $participants;

	/**
	 * Unix timestamp.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $game_datetime
	 */
	public int $game_datetime;

	/**
	 * Game length in seconds.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var float $game_length
	 */
	public float $game_length;

	/**
	 * Game variation key. Game variations documented in TFT static data.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var ?string $game_variation
	 */
	public ?string $game_variation = null;

	/**
	 * Please refer to the League of Legends documentation.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $queue_id
	 */
	public int $queue_id;

	/**
	 * Teamfight Tactics set number.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $tft_set_number
	 */
	public int $tft_set_number;

    /**
     * Unknown property, not provided by API.
     *
     * Available when received from:
     *   - @see TFTAPI::getMatch
     *
     * @var string $tft_game_type
     */
    public string $tft_game_type;

    /**
     * Unknown property, not provided by API.
     *
     * Available when received from:
     *   - @see TFTAPI::getMatch
     *
     * @var string $tft_set_core_name
     */
    public string $tft_set_core_name;
}
