<?php

namespace Phytoline\CepDigital;

/**
 * Search
 */
class Search
{    
    /**
     * url
     *
     * @var array
     */
    private $url = [
        "API_VIACEP" => "https://viacep.com.br/ws/",
        "API_CEPLA" => "http://cep.la/",
        "API_APICEP" => "https://ws.apicep.com/cep/"
    ];
    
    /**
     * getAddressFromZipcode
     *
     * @param  string $zipcode Recebe um cep brasileiro e retona a localidade
     * @return array
     */
    public function getAddressFromZipcode(string $zipcode): array
    {
        $zipcode = preg_replace('/[^0-9]/im', '', $zipcode);

        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "Accept: application/json"
            ]
        ];

        $context = stream_context_create($opts);

        $get = [
            "API_VIACEP" => (array) json_decode(file_get_contents($this->url["API_VIACEP"] . $zipcode . "/json")),
            "API_CEPLA" => (array) json_decode(file_get_contents($this->url["API_CEPLA"] . $zipcode, false, $context)),
            "API_APICEP" => (array) json_decode(file_get_contents($this->url["API_APICEP"] . $zipcode . ".json"))
        ];

        return $get;
    }
}
