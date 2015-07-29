<?php
namespace Thru\TutumApi\Services;

use Thru\TutumApi\Client;

class BaseApi
{
    /** @var Client  */
    private $client;

    public function __construct(Client $client){
        $this->client = $client;
    }

    protected function getClient(){
        return $this->client;
    }



    /*
     * Ultimately, I am lazy, so I wrote a thing to make getters/setters based on the API response.
     */

    function _snakeToCamel($val, $notFirst = false) {
        $words = explode("_", strtolower($val));
        foreach($words as $i => &$word){
            if($i == 0 && $notFirst){

            }else {
                $word = ucfirst($word);
            }
        }
        return implode($words);
    }

    public function generateGettersSetters($response){

            echo "<pre>";
            foreach (get_object_vars($response) as $var => $a) {
                $variableName = $this->_snakeToCamel($var, true);

                echo "protected \${$variableName};\n";
            }
            echo "\n";
            foreach (get_object_vars($response) as $var => $a) {
                $variableName = $this->_snakeToCamel($var, true);
                $functionName = $this->_snakeToCamel($var, false);
                echo "public function get{$functionName}(){\n";
                echo "  return \$this->{$variableName};\n";
                echo "}\n\n";
                echo "public function set{$functionName}(\${$variableName}){\n";
                echo "  \$this->$variableName = \${$variableName};\n";
                echo "}\n\n";
            }

            echo "foreach(\$responses as \$response){\n";
            echo "  \$service = new Service();\n";
            foreach (get_object_vars($response) as $var => $a) {
                $variableName = $this->_snakeToCamel($var, true);
                $functionName = $this->_snakeToCamel($var, false);
                echo "  \$service->set{$functionName}(\$response->{$var});\n";
            }
            echo "}";
            exit;

    }
}