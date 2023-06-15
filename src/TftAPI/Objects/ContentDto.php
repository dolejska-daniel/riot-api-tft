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
 *   Class ContentDto
 *
 * Used in:
 *   tft-status (v1)
 *     - @see TFTAPI::getPlatformData
 *       @link https://developer.riotgames.com/apis#tft-status-v1/GET_getPlatformData
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class ContentDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var string $locale
	 */
	public string $locale;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var string $content
	 */
	public string $content;
}
