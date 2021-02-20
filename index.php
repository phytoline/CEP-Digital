<?php

require_once "vendor\autoload.php";

use Phytoline\CepDigital\Search;

$search = new Search;

$result = $search->getAddressFromZipcode('72650020');

/**
 * Use a fonte de sua preferência
 * ex.: $result['API_VIACEP']
 */
print_r($result);
