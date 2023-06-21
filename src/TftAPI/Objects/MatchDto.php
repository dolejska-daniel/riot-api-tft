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
 *   Class MatchDto
 *
 * Used in:
 *   tft-match (v1)
 *     - @see TFTAPI::getMatch
 *       @link https://developer.riotgames.com/apis#tft-match-v1/GET_getMatch
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class MatchDto extends ApiObject
{
	/**
	 * Match metadata.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var MetadataDto $metadata
	 */
	public MetadataDto $metadata;

	/**
	 * Match info.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var InfoDto $info
	 */
	public InfoDto $info;
}
