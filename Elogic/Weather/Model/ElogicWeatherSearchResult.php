<?php
declare(strict_types=1);

namespace Elogic\Weather\Model;

use Elogic\Weather\Api\Data\ElogicWeatherSearchResultInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Class ElogicWeatherSearchSearchResult
 * @package Elogic\Weather\Model
 */
class ElogicWeatherSearchResult extends SearchResults implements ElogicWeatherSearchResultInterface
{

}
