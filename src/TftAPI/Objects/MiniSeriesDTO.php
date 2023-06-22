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
 *   Class MiniSeriesDTO
 *
 * Used in:
 *   tft-league (v1)
 *     - @see TFTAPI::getLeagueById
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueById
 *     - @see TFTAPI::getChallengerLeague
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getChallengerLeague
 *     - @see TFTAPI::getLeagueEntriesForSummoner
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueEntriesForSummoner
 *     - @see TFTAPI::getMasterLeague
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getMasterLeague
 *     - @see TFTAPI::getLeagueEntries
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueEntries
 *     - @see TFTAPI::getGrandmasterLeague
 *       @link https://developer.riotgames.com/apis#tft-league-v1/GET_getGrandmasterLeague
 *
 * @package RiotAPI\TFTAPI\Objects
 */
class MiniSeriesDTO extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getMasterLeague
	 *   - @see TFTAPI::getLeagueEntries
	 *   - @see TFTAPI::getGrandmasterLeague
	 *
	 * @var int $losses
	 */
	public int $losses;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getMasterLeague
	 *   - @see TFTAPI::getLeagueEntries
	 *   - @see TFTAPI::getGrandmasterLeague
	 *
	 * @var string $progress
	 */
	public string $progress;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getMasterLeague
	 *   - @see TFTAPI::getLeagueEntries
	 *   - @see TFTAPI::getGrandmasterLeague
	 *
	 * @var int $target
	 */
	public int $target;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getLeagueEntriesForSummoner
	 *   - @see TFTAPI::getMasterLeague
	 *   - @see TFTAPI::getLeagueEntries
	 *   - @see TFTAPI::getGrandmasterLeague
	 *
	 * @var int $wins
	 */
	public int $wins;
}
