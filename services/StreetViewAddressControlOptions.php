<?php
/**
 * @copyright Copyright (c) 2014 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace bmx591\yii2-google-maps\services;

use bmx591\yii2-google-maps\controls\ControlPosition;
use bmx591\yii2-google-maps\ObjectAbstract;
use bmx591\yii2-google-maps\OptionsTrait;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

/**
 * StreetViewAddressControlOptions
 *
 * Options for the rendering of the Street View address control.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package bmx591\yii2-google-maps\services
 */
class StreetViewAddressControlOptions extends ObjectAbstract
{
    use OptionsTrait;

    /**
     * @inheritdoc
     * @param array $config
     */
    function __construct($config = [])
    {
        $this->options = ArrayHelper::merge([
            'position' => null,
        ], $this->options);

        parent::__construct($config);
    }

    /**
     * Sets the position of the control.
     *
     * @param $value
     *
     * @throws \yii\base\InvalidConfigException
     */
    public function setPosition($value)
    {
        if (!ControlPosition::getIsValid($value)) {
            throw new InvalidConfigException('Unknown "position" value');
        }
        $this->options['position'] = new JsExpression($value);
    }
} 