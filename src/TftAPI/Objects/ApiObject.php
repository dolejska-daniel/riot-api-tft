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

use ReflectionClass;
use ReflectionException;
use RiotAPI\Base\BaseAPI;
use RiotAPI\Base\Objects\ApiObject as BaseApiObject;
use RiotAPI\TFTAPI\TFTAPI;


/**
 *   Class ApiObject
 *
 * @package RiotAPI\TFTAPI\Objects
 */
abstract class ApiObject extends BaseApiObject
{
	/**
	 *   ApiObject constructor.
	 *
	 * @param array $data
	 * @param BaseAPI $api
	 */
	public function __construct(array $data, ?BaseAPI $api)
	{
		// pass data to base class constructor
		parent::__construct($data, $api);

		// Tries to assigns data to class properties
		$selfRef = new ReflectionClass($this);
		$linkableProp = $selfRef->hasProperty('staticData')
			? self::getLinkablePropertyData($selfRef->getDocComment())
			: [ 'function' => false, 'parameter' => false ];

		foreach ($data as $property => $value)
		{
			try
			{
				//  Is API reference passed?
				if ($api)
				{
					//  Should this property be linked and is it allowed?
					if ($linkableProp['parameter'] == $property && $api->getSetting(TFTAPI::SET_STATICDATA_LINKING, false))
					{
						$apiRef = new ReflectionClass(TFTAPI::class);
						$linkingFunctionRef = $apiRef->getMethod($linkableProp['function']);

						$params = [ $value ];
						foreach ($linkingFunctionRef->getParameters() as $parameter)
						{
							switch ($parameter->getName())
							{
								// Extended data fetch?
								case "extended":
									$params[] = true;
									break;

								// Data by key?
								case "data_by_key":
									$params[] = true;
									break;

								// Request locale
								case "locale":
									$params[] = $api->getSetting(TFTAPI::SET_STATICDATA_LOCALE, $parameter->getDefaultValue());
									break;

								// Static data version
								case "version":
									$params[] = $api->getSetting(TFTAPI::SET_STATICDATA_VERSION, $parameter->getDefaultValue());
									break;

								default:
									break;
							}
						}

						$this->staticData = $linkingFunctionRef->invokeArgs($api, $params);
					}
				}
			}
			//  If property does not exist
			catch (ReflectionException $ex) {}
		}
	}
}
