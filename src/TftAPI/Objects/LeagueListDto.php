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
 *   Class LeagueListDto
 *
 * Used in:
 *   tft-league (v1)
 *     - @see TFTAPI::getGrandmasterLeague
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getGrandmasterLeague
 *     - @see TFTAPI::getLeagueById
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueById
 *     - @see TFTAPI::getChallengerLeague
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getChallengerLeague
 *     - @see TFTAPI::getMasterLeague
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getMasterLeague
 *
 * @iterable $entries
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class LeagueListDto extends ApiObjectIterable
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var ?string $leagueId
	 */
	public ?string $leagueId = null;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var LeagueItemDTO[] $entries
	 */
	public array $entries;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var string $tier
	 */
	public string $tier;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var ?string $name
	 */
	public ?string $name = null;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var ?string $queue
	 */
	public ?string $queue = null;
}
