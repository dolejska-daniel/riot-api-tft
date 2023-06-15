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
 *   Class ParticipantDto
 *
 * Used in:
 *   tft-match (v1)
 *     - @see TFTAPI::getMatch
 *       @link https://developer.riotgames.com/apis#tft-match-v1/GET_getMatch
 *
 * @linkable getStaticChampion($championId)
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class ParticipantDto extends ApiObjectLinkable
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var string $puuid
	 */
	public string $puuid;

    /**
     * Unknown property, not provided by API.
     *
     * Available when received from:
     *   - @see TFTAPI::getMatch
     *
     * @var array $augments
     */
    public array $augments;

	/**
	 * Participant's companion.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var CompanionDto $companion
	 */
	public CompanionDto $companion;

	/**
	 * Gold left after participant was eliminated.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $gold_left
	 */
	public int $gold_left;

	/**
	 * The round the participant was eliminated in. Note: If the player was
	 * eliminated in stage 2-1 their last_round would be 5.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $last_round
	 */
	public int $last_round;

	/**
	 * Participant Little Legend level. Note: This is not the number of active
	 * units.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $level
	 */
	public int $level;

	/**
	 * Participant placement upon elimination.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $placement
	 */
	public int $placement;

	/**
	 * Number of players the participant eliminated.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $players_eliminated
	 */
	public int $players_eliminated;

	/**
	 * The number of seconds before the participant was eliminated.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var float $time_eliminated
	 */
	public float $time_eliminated;

	/**
	 * Damage the participant dealt to other players.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var int $total_damage_to_players
	 */
	public int $total_damage_to_players;

	/**
	 * A complete list of traits for the participant's active units.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var TraitDto[] $traits
	 */
	public array $traits;

	/**
	 * A list of active units for the participant.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getMatch
	 *
	 * @var UnitDto[] $units
	 */
	public array $units;
}
