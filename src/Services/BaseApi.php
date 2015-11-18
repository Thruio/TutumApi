<?php
namespace Thru\TutumApi\Services;

use Thru\TutumApi\Client;

class BaseApi
{
    /** @var Client  */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function getClient()
    {
        return $this->client;
    }

    /*
     * Ultimately, I am lazy, so I wrote a thing to make getters/setters based on the API response.
     */

    function _snakeToCamel($val, $notFirst = false)
    {
        $words = explode("_", strtolower($val));
        foreach ($words as $i => &$word) {
            if ($i == 0 && $notFirst) {
            } else {
                $word = ucfirst($word);
            }
        }
        return implode($words);
    }

    public function generateGettersSetters($response)
    {
        $type = get_called_class();
        $bits = explode("\\", $type);
        $type = end($bits);
        $type = ucfirst($type);
        $type_lower = strtolower($type);
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
        echo "  \n";

        echo "public function get{$type}FromResponse(\$response, Models\\{$type} \${$type_lower} = null){\n";
        echo "  if(\${$type_lower} === null) {\n";
        echo "    \${$type_lower} = new Models\\{$type}();\n";
        echo "  }\n";
        echo "  \n";
        foreach (get_object_vars($response) as $var => $a) {
            $variableName = $this->_snakeToCamel($var, true);
            $functionName = $this->_snakeToCamel($var, false);
            echo "  \${$type_lower}->set{$functionName}(\$response->{$var});\n";
        }
        echo "  \n";
        echo "  return \${$type_lower};\n";
        echo "}\n";
        echo "\n";

        echo "/**\n";
        echo " * @depends \n";
        echo " * @param Models\\{$type} \${$type_lower}\n";
        echo " */\n";
        echo "public function test{$type}Parameters(Models\\{$type} \${$type_lower}){\n";
        foreach (get_object_vars($response) as $var => $a) {
            $variableName = $this->_snakeToCamel($var, true);
            $functionName = $this->_snakeToCamel($var, false);
            $comment = "get{$functionName} did not return expected result";
            if (is_object($a) || (is_array($a) && is_object(end($a)))) {
                echo "  \$this->assertEquals(" . var_export_compact(arrayify($a)) . ", arrayify(\${$type_lower}->get{$functionName}()), '{$comment}');\n";
            } else {
                echo "  \$this->assertEquals(" . var_export_compact($a) . ", \${$type_lower}->get{$functionName}(), '{$comment}');\n";
            }
        }
        echo "}\n";
        echo "\n";

        exit;

    }
}
