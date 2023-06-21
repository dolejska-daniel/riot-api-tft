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

namespace RiotAPI\TFTAPI\Objects;

use RiotAPI\Base\Objects\ApiObject;

/**
 *   Class TraitDto
 *
 * Used in:
 *   tft-match (v1)
 *     - @see TFTAPI::getMatch
 *       @link https://developer.riotgames.com/apis#tft-match-v1/GET_getMatch
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class TraitDto extends ApiObject
{
	/**
	 * Trait name.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var string $name
	 */
	public string $name;

	/**
	 * Number of units with this trait.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $num_units
	 */
	public int $num_units;

	/**
	 * Current style for this trait. (0 = No style, 1 = Bronze, 2 = Silver, 3
	 * = Gold, 4 = Chromatic).
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $style
	 */
	public int $style;

	/**
	 * Current active tier for the trait.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $tier_current
	 */
	public int $tier_current;

	/**
	 * Total tiers for the trait.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $tier_total
	 */
	public int $tier_total;
}
