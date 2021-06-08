<?php 

/*
	task
	1. Напишите функцию подготовки строки, которая заполняет шаблон данными из указанного объекта
	2. Пришлите код целиком, чтобы можно его было проверить
	3. Придерживайтесь code style текущего задания
	4. По необходимости - можете дописать код, методы
	5. Разместите код в гите и пришлите ссылку
*/

/**
 * Класс для работы с API
 *
 * @author		User Name
 * @version		v.1.0 (dd/mm/yyyy)
 */

class Api
{
	private array $array;
	private  $template;
    

	public function __construct(array $array, $template )
	{
		$this->array= $array;
		$this->template = $this->validTemplate($template);
	}

    private function validTemplate ($template) {
		if(!is_string($template))
		{
			return implode(' ,', $template);
		} 
			
	}

	public function get_api_path(array $array, string $template) : string 
	{
		
		foreach($array as $k => $v)
		    {
		        if (strstr($template,$k) == true ) {
		            $result=(str_replace(array_keys($array), array_values($array), $template));
		        };
	        }
			return $result;
	}
	
}

$user =
[
	'id'		=> 20,
	'name'		=> 'John Dow',
	'role'		=> 'QA',
	'salary'	=> 100
];

$api_path_templates =
[
	"/api/items/%id%/%name%",
	"/api/items/%id%/%role%",
	"/api/items/%id%/%salary%"
];


$api = new Api($user, $api_path_templates);

var_dump($api);

echo json_encode($api_paths, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE);

$expected_result = ['/api/items/20/John%20Dow','/api/items/20/QA','/api/items/20/100'];


?>