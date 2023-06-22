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
 *   Class LeagueItemDTO
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
 * @package RiotAPI\TFTAPI\Objects
 */
class LeagueItemDTO extends ApiObject
{
	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var bool $freshBlood
	 */
	public bool $freshBlood;

	/**
	 * Winning team on Summoners Rift.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var int $wins
	 */
	public int $wins;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var string $summonerName
	 */
	public string $summonerName;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var MiniSeriesDTO|null $miniSeries
	 */
	public ?MiniSeriesDTO $miniSeries = null;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var bool $inactive
	 */
	public bool $inactive;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var bool $veteran
	 */
	public bool $veteran;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var bool $hotStreak
	 */
	public bool $hotStreak;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var string $rank
	 */
	public string $rank;

	/**
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var int $leaguePoints
	 */
	public int $leaguePoints;

	/**
	 * Losing team on Summoners Rift.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var int $losses
	 */
	public int $losses;

	/**
	 * Player's encrypted summonerId.
	 *
	 * Available when received from:
	 *   - @see TFTAPI::getGrandmasterLeague
	 *   - @see TFTAPI::getLeagueById
	 *   - @see TFTAPI::getChallengerLeague
	 *   - @see TFTAPI::getMasterLeague
	 *
	 * @var string $summonerId
	 */
	public string $summonerId;
}
