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
 *   Class UpdateDto
 *
 * Used in:
 *   tft-status (v1)
 *     - @see TFTAPI::getPlatformData
 *       @link https://developer.riotgames.com/apis#tft-status-v1/GET_getPlatformData
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class UpdateDto extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var int $id
	 */
	public int $id;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var string $author
	 */
	public string $author;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var bool $publish
	 */
	public bool $publish;

	/**
	 * (Legal values: riotclient, riotstatus, game).
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var string[] $publish_locations
	 */
	public array $publish_locations;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var ContentDto[] $translations
	 */
	public array $translations;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var string $created_at
	 */
	public string $created_at;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getPlatformData
	 *
	 * @var string $updated_at
	 */
	public string $updated_at;
}
