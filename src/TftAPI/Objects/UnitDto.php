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
 *   Class UnitDto
 *
 * Used in:
 *   tft-match (v1)
 *     - @see TFTAPI::getMatch
 *       @link https://developer.riotgames.com/apis#tft-match-v1/GET_getMatch
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class UnitDto extends ApiObject
{
	/**
	 * A list of the unit's items. Please refer to the Teamfight Tactics
	 * documentation for item ids.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int[] $itemNames
	 */
	public array $itemNames;

	/**
	 * This field was introduced in patch 9.22 with data_version 2.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var string $character_id
	 */
	public string $character_id;

	/**
	 * If a unit is chosen as part of the Fates set mechanic, the chosen trait
	 * will be indicated by this field. Otherwise this field is excluded from
	 * the response.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var ?string $chosen
	 */
	public ?string $chosen = null;

	/**
	 * Unit name. This field is often left blank.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var string $name
	 */
	public string $name;

	/**
	 * Unit rarity. This doesn't equate to the unit cost.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $rarity
	 */
	public int $rarity;

	/**
	 * Unit tier.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $tier
	 */
	public int $tier;
}
