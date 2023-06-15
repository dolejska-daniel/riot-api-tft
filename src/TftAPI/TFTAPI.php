<?php /** @noinspection PhpInternalEntityUsedInspection */

/**
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

namespace RiotAPI\TFTAPI;

use RiotAPI\Base\BaseAPI;
use RiotAPI\Base\Exceptions\GeneralException;
use RiotAPI\Base\Exceptions\RequestException;
use RiotAPI\Base\Exceptions\RequestParameterException;
use RiotAPI\Base\Exceptions\ServerException;
use RiotAPI\Base\Exceptions\ServerLimitException;
use RiotAPI\Base\Exceptions\SettingsException;
use RiotAPI\TFTAPI\Objects;

/**
 *   Class TFTAPI.
 *
 * @package RiotAPI\TFTAPI
 */
class TFTAPI extends BaseAPI
{
    /**
     * Settings constants.
     */
    const
        SET_STATICDATA_LINKING       = 'SET_STATICDATA_LINKING',
        SET_STATICDATA_LOCALE        = 'SET_STATICDATA_LOCALE',
        SET_STATICDATA_VERSION       = 'SET_STATICDATA_VERSION';

    /**
	 * Ladder queue constants.
	 */
    const
        QUEUE_RANKED_TFT_TURBO = 'RANKED_TFT_TURBO',
        QUEUE_RANKED_TFT = 'RANKED_TFT';


	const
		LADDER_ALLOWED_QUEUES = [
            self::QUEUE_RANKED_TFT_TURBO,
		];

	const
		//  List of required setting keys
		SETTINGS_REQUIRED = [],
		//  List of allowed setting keys
		SETTINGS_ALLOWED = [
			self::SET_STATICDATA_LINKING,
			self::SET_STATICDATA_LOCALE,
			self::SET_STATICDATA_VERSION,
    ],
		SETTINGS_INIT_ONLY = [];

	/**
	 *   Available resource list.
	 *
	 * @var array $resources
	 */
	protected array $resources = [
		self::RESOURCE_LEAGUE,
		self::RESOURCE_STATUS,
		self::RESOURCE_MATCH,
		self::RESOURCE_SUMMONER,
	];

	public function _setupCacheCalls(): void
    {
		if ($this->isSettingSet($this::SET_CACHE_CALLS_LENGTH) == false)
		{
			//  Value is not set, setting default values
			$this->setSetting($this::SET_CACHE_CALLS_LENGTH, [
				self::RESOURCE_LEAGUE           => 60 * 10,
				self::RESOURCE_MATCH            => 60,
				self::RESOURCE_STATUS           => 60,
				self::RESOURCE_SUMMONER         => 60 * 60,
			]);
		}
		else
		{
			parent::_setupCacheCalls();
		}
	}

	/**
	 * @internal
	 *
	 *   Returns dummy response filename based on current settings.
	 *
	 * @return string
	 */
	public function _getDummyDataFileName(): string
	{
		$method = $this->used_method;
		$endp = str_replace([ '/', '.' ], [ '-', '' ], substr($this->endpoint, 1));
		$quer = str_replace([ '&', '%26', '=', '%3D' ], [ '_', '_', '-', '-' ], http_build_query($this->query_data));
		$data = !empty($this->post_data) ? '_' . md5(http_build_query($this->query_data)) : '';
		if (strlen($quer))
			$quer = "_" . $quer;

		return __DIR__ . "/../../tests/DummyData/{$method}_$endp$quer$data.json";
	}

    /**
     * ==================================================================dd=
     *     League Endpoint Methods
     *     @link https://developer.riotgames.com/apis#tft-league-v1
     * ==================================================================dd=
     **/
    const RESOURCE_LEAGUE = '1484:league';
    const RESOURCE_LEAGUE_VERSION = 'v1';

    /**
     *   Get the challenger league.
     *
     * @cli-name get-league-challenger
     * @cli-namespace league
     *
     * @return Objects\LeagueListDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-league-v1/GET_getChallengerLeague
     */
    public function getLeagueChallenger(): ?Objects\LeagueListDto
    {
        $resultPromise = $this->setEndpoint("/tft/league/" . self::RESOURCE_LEAGUE_VERSION . "/challenger")
            ->setResource(self::RESOURCE_LEAGUE, "/challenger")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\LeagueListDto($result, $this);
        });
    }

    /**
     *   Get league entries for a given summoner ID.
     *
     * @cli-name get-league-entries-for-summoner
     * @cli-namespace league
     *
     * @param string $summoner_id
     *
     * @return Objects\LeagueEntryDto[]|null
     *
     * @throws GeneralException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws SettingsException
     *
     * @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueEntriesForSummoner
     */
    public function getLeagueEntriesForSummoner( string $summoner_id ): ?array
    {
        $resultPromise = $this->setEndpoint("/tft/league/" . self::RESOURCE_LEAGUE_VERSION . "/entries/by-summoner/$summoner_id")
            ->setResource(self::RESOURCE_LEAGUE, "/entries/by-summoner/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            foreach ($result as $leagueEntryDtoData)
                $r[] = new Objects\LeagueEntryDto($leagueEntryDtoData, $this);

            return $r ?? [];
        });
    }

    /**
     *   Get all the league entries.
     *
     * @cli-name get-league-entries
     * @cli-namespace league
     *
     * @param string $tier
     * @param string $division
     * @param int $page
     *
     * @return Objects\LeagueEntryDto[]|null
     *
     * @throws GeneralException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws SettingsException
     *
     * @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueEntries
     */
    public function getLeagueEntries(string $tier, string $division, int $page = 1 ): ?array
    {
        $resultPromise = $this->setEndpoint("/tft/league/" . self::RESOURCE_LEAGUE_VERSION . "/entries/$tier/$division")
            ->setResource(self::RESOURCE_LEAGUE, "/entries/%s/%s")
            ->addQuery('page', $page)
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            foreach ($result as $leagueEntryDtoData)
                $r[] = new Objects\LeagueEntryDto($leagueEntryDtoData, $this);

            return $r ?? [];
        });
    }

    /**
     *   Get the grandmaster leagues.
     *
     * @cli-name get-league-grandmaster
     * @cli-namespace league
     *
     * @return Objects\LeagueListDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-league-v1/GET_getGrandmasterLeague
     */
    public function getLeagueGrandmaster(): ?Objects\LeagueListDto
    {
        $resultPromise = $this->setEndpoint("/tft/league/" . self::RESOURCE_LEAGUE_VERSION . "/grandmaster")
            ->setResource(self::RESOURCE_LEAGUE, "/grandmaster")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\LeagueListDto($result, $this);
        });
    }

    /**
     *   Get league with given ID, including inactive entries.
     *
     * @cli-name get-by-id
     * @cli-namespace league
     *
     * @param string $league_id
     *
     * @return Objects\LeagueListDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-league-v1/GET_getLeagueById
     */
    public function getLeagueById( string $league_id ): ?Objects\LeagueListDto
    {
        $resultPromise = $this->setEndpoint("/tft/league/" . self::RESOURCE_LEAGUE_VERSION . "/leagues/$league_id")
            ->setResource(self::RESOURCE_LEAGUE, "/leagues/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\LeagueListDto($result, $this);
        });
    }

    /**
     *   Get the master leagues.
     *
     * @cli-name get-league-master
     * @cli-namespace league
     *
     * @param string $game_queue_type
     *
     * @return Objects\LeagueListDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-league-v1/GET_getMasterLeague
     */
    public function getLeagueMaster(): ?Objects\LeagueListDto
    {
        $resultPromise = $this->setEndpoint("/tft/league/" . self::RESOURCE_LEAGUE_VERSION . "/master")
            ->setResource(self::RESOURCE_LEAGUE, "/master")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\LeagueListDto($result, $this);
        });
    }

    /**
     *   Get the top rated ladder for given queue.
     *
     * @cli-name get-by-id
     * @cli-namespace league
     *
     * @param string $queue
     *
     * @return Objects\TopRatedLadderEntryDto[]|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-league-v1/GET_getTopRatedLadder
     */
    public function getTopRatedLadder( string $queue ): ?array
    {
        if (!in_array($queue, self::LADDER_ALLOWED_QUEUES))
            throw new RequestParameterException('Value of level is invalid. Allowed values: ' . implode(', ', self::LADDER_ALLOWED_QUEUES));

        $resultPromise = $this->setEndpoint("/tft/league/" . self::RESOURCE_LEAGUE_VERSION . "/rated-ladders/$queue/top")
            ->setResource(self::RESOURCE_LEAGUE, "/rated-ladders/%s/top")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			foreach ($result as $ident => $topRatedLadderEntryDtoData)
				$r[$ident] = new Objects\TopRatedLadderEntryDto($topRatedLadderEntryDtoData, $this);

			return $r ?? [];
		});
    }


	/**
	 * ==================================================================dd=
	 *     Match Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#tft-match-v1
	 * ==================================================================dd=
	 **/
	const RESOURCE_MATCH = '1481:match';
	const RESOURCE_MATCH_VERSION = 'v1';

	/**
	 *   Get a list of match ids by PUUID
	 *
	 * @cli-name get-ids-by-puuid
	 * @cli-namespace match
	 *
	 * @param string   $puuid
	 * @param int|null $start Defaults to 0. Start index.
	 * @param int|null $count Defaults to 20. Number of match ids to return.
	 * @param int|null $startTime Epoch timestamp in seconds. The matchlist started storing timestamps on June 16th, 2021. Any matches played before June 16th, 2021 won't be included in the results if the startTime filter is set.
	 * @param int|null $endTime Epoch timestamp in seconds.
	 *
	 * @return string[]|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tft-match-v1/GET_getMatchIdsByPUUID
	 */
	public function getMatchIdsByPUUID(string $puuid, int $start = null, int $count = null, int $startTime = null, int $endTime = null): ?array
	{
		if ($start && $start < 0)
			throw new RequestParameterException('Start index (start) must be greater than or equal to 0.');

		if ($count && $count < 0)
			throw new RequestParameterException('Count of results (count) must greater than 0.');

		$continent_region = $this->platforms->getCorrespondingContinentRegion($this->getSetting(self::SET_REGION));

		$resultPromise = $this->setEndpoint("/tft/match/" . self::RESOURCE_MATCH_VERSION . "/matches/by-puuid/$puuid/ids")
			->setResource(self::RESOURCE_MATCH, "/matches/by-puuid/%s/ids")
			->addQuery("start", $start)
			->addQuery("count", $count)
			->addQuery("startTime", $startTime)
			->addQuery("endTime", $endTime)
			->makeCall($continent_region);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return $result ?? [];
		});
	}

	/**
	 *   Get a match by match id
	 *
	 * @cli-name get
	 * @cli-namespace match
	 *
	 * @param string $match_id
	 *
	 * @return Objects\MatchDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tft-match-v1/GET_getMatch
	 */
	public function getMatch(string $match_id): ?Objects\MatchDto
	{
		$continent_region = $this->platforms->getCorrespondingContinentRegion($this->getSetting(self::SET_REGION));

		$resultPromise = $this->setEndpoint("/tft/match/" . self::RESOURCE_MATCH_VERSION . "/matches/$match_id")
			->setResource(self::RESOURCE_MATCH, "/matches/%s")
			->makeCall($continent_region);

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\MatchDto($result, $this);
		});
	}

    /**
     * ==================================================================dd=
     *     Status Endpoint Methods
     *     @link https://developer.riotgames.com/apis#tft-status-v1
     * ==================================================================dd=
     **/
    const RESOURCE_STATUS = '1516:tft-status';
    const RESOURCE_STATUS_VERSION = 'v1';

    /**
     *   Get Teamfight Tactics status for the given platform.
     *
     * @cli-name get
     * @cli-namespace status
     *
     * @param string|null $override_region
     *
     * @return Objects\PlatformDataDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-status-v1/GET_getPlatformData
     */
    public function getPlatformData( string $override_region = null ): ?Objects\PlatformDataDto
    {
        if ($override_region)
            $this->setTemporaryRegion($override_region);

        $resultPromise = $this->setEndpoint("/tft/status/" . self::RESOURCE_STATUS_VERSION . "/platform-data")
            ->setResource(self::RESOURCE_STATUS_VERSION, "/platform-data")
            ->makeCall();

        if ($override_region)
            $this->unsetTemporaryRegion();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\PlatformDataDto($result, $this);
        });
    }

	/**
	 * ==================================================================dd=
	 *     Summoner Endpoint Methods
	 *     @link https://developer.riotgames.com/apis#tft-summoner-v1
	 * ==================================================================dd=
	 **/
	const RESOURCE_SUMMONER = '1483:summoner';
	const RESOURCE_SUMMONER_VERSION = 'v1';

    /**
     *   Get a summoner by account ID.
     *
     * @cli-name get-by-account-id
     * @cli-namespace summoner
     *
     * @param string $encrypted_account_id
     *
     * @return Objects\SummonerDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getByAccountId
     */
    public function getSummonerByAccountId( string $encrypted_account_id ): ?Objects\SummonerDto
    {
        $resultPromise = $this->setEndpoint("/tft/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/by-account/$encrypted_account_id")
            ->setResource(self::RESOURCE_SUMMONER, "/summoners/by-account/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\SummonerDto($result, $this);
        });
    }

    /**
     *   Get a summoner by summoner name.
     *
     * @cli-name get-by-name
     * @cli-namespace summoner
     *
     * @param string $summoner_name
     *
     * @return Objects\SummonerDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getBySummonerName
     */
    public function getSummonerByName( string $summoner_name ): ?Objects\SummonerDto
    {
        if (trim($summoner_name) === '') {
            throw new RequestParameterException('Provided summoner name must not be empty');
        }

        $resultPromise = $this->setEndpoint("/tft/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/by-name/$summoner_name")
            ->setResource(self::RESOURCE_SUMMONER, "/summoners/by-name/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\SummonerDto($result, $this);
        });
    }

    /**
     *   Get a summoner by PUUID.
     *
     * @cli-name get-by-puuid
     * @cli-namespace summoner
     *
     * @param string $encrypted_puuid
     *
     * @return Objects\SummonerDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getByPUUID
     */
    public function getSummonerByPUUID( string $encrypted_puuid ): ?Objects\SummonerDto
    {
        $resultPromise = $this->setEndpoint("/tft/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/by-puuid/$encrypted_puuid")
            ->setResource(self::RESOURCE_SUMMONER, "/summoners/by-puuid/%s")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\SummonerDto($result, $this);
        });
    }

    /**
     *   Get a summoner by access token.
     *
     * @cli-name get-by-access-token
     * @cli-namespace summoner
     *
     * @return Objects\SummonerDto|null
     *
     * @throws SettingsException
     * @throws RequestException
     * @throws ServerException
     * @throws ServerLimitException
     * @throws GeneralException
     *
     * @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getByAccessToken
     */
    public function getSummonerByAccessToken(): ?Objects\SummonerDto
    {
        $resultPromise = $this->setEndpoint("/tft/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/me")
            ->setResource(self::RESOURCE_SUMMONER, "/summoners/me")
            ->makeCall();

        return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
            return new Objects\SummonerDto($result, $this);
        });
    }

	/**
	 *  Get a summoner by summoner ID.
	 *
	 * @cli-name get
	 * @cli-namespace summoner
	 *
	 * @param string $encrypted_summoner_id
	 *
	 * @return Objects\SummonerDto|null
	 *
	 * @throws SettingsException
	 * @throws RequestException
	 * @throws ServerException
	 * @throws ServerLimitException
	 * @throws GeneralException
	 *
	 * @link https://developer.riotgames.com/apis#tft-summoner-v1/GET_getBySummonerId
	 */
	public function getSummoner( string $encrypted_summoner_id ): ?Objects\SummonerDto
	{
		$resultPromise = $this->setEndpoint("/tft/summoner/" . self::RESOURCE_SUMMONER_VERSION . "/summoners/$encrypted_summoner_id")
			->setResource(self::RESOURCE_SUMMONER, "/summoners/%s")
			->makeCall();

		return $this->resolveOrEnqueuePromise($resultPromise, function(array $result) {
			return new Objects\SummonerDto($result, $this);
		});
	}
}
