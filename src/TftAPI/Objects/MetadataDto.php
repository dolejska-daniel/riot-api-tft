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
 *   Class MetadataDto
 *
 * Used in:
 *   tft-match (v1)
 *     - @see TFTAPI::getMatch
 *       @link https://developer.riotgames.com/apis#tft-match-v1/GET_getMatch
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class MetadataDto extends ApiObject
{
	/**
	 * Match data version.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var string $data_version
	 */
	public string $data_version;

	/**
	 * Match id.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var string $match_id
	 */
	public string $match_id;

	/**
	 * A list of participant PUUIDs.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var string[] $participants
	 */
	public array $participants;
}
