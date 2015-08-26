<?php
/**
 * @copyright Copyright (c) 2014 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace bmwx591\google\maps\services;

use bmwx591\google\maps\ClientAbstract;
use bmwx591\google\maps\Encoder;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * ElevationClient
 *
 * Utility class to call Google's Elevation API. For further information, please visit
 * https://developers.google.com/maps/documentation/elevation/
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package bmwx591\google\maps
 */
class ElevationClient extends ClientAbstract
{
    /**
     * @inheritdoc
     */
    public function __construct($config = [])
    {

        $this->params = ArrayHelper::merge(
            [
                'locations' => null,
                'path' => null,
                'samples' => null
            ],
            $this->params
        );

        parent::__construct($config);
    }

    /**
     * Returns the api url
     * @return string
     */
    public function getUrl()
    {
        return 'http://maps.googleapis.com/maps/api/elevation/' . $this->format;
    }

    /**
     * Makes elevation request by locations
     *
     * @param \dosamigos\google\maps\LatLng[] $coords
     * @param bool $encode
     *
     * @return mixed|null
     */
    public function byLocations($coords, $encode = true)
    {
        $this->params['locations'] = $encode
            ? Encoder::encodeCoordinates($coords)
            : implode('|', $coords);

        return parent::request();
    }

    /**
     * Makes elevation request by paths
     *
     * @param \dosamigos\google\maps\LatLng[] $coords defines a path on the earth for which to return elevation data.
     * @param int $samples specifies the number of sample points along a path for which to return the elevation data.
     * @param bool $encode
     *
     * @return mixed|null
     */
    public function byPath($coords, $samples, $encode = true)
    {
        $this->params['path'] = $encode
            ? Encoder::encodeCoordinates($coords)
            : implode('|', $coords);

        $this->params['samples'] = $samples;

        return parent::request();
    }
} 