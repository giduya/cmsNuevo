<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class ConfigRequest extends FormRequest {

	public function authorize()
	{
		return true;
	}





	public function messages()
	{
	  return [
						'atributos.required' => 'Los "atributos" de la etiqueta META son obligatorios.',
						'atributos.max'      => 'Los "atributos" de la etiqueta META no pueden rebasar los 255 caracteres.',
						'bodyattributes.max' => 'Los "atributos" del body" no pueden rebasar los 255 caracteres.',
					 ];
	}





	public function rules()
	{
		if($this->method() == "POST")
		{
			return [
				'atributos' => 'required|max:255',
			];
		}


		if($this->method() == "PATCH")
		{
			return [
				'titulo'      => 'required|max:55',
				'descripcion' => 'required|max:255',
			];
		}


		if($this->method() == "PUT")
		{
			return [
				'bodyattributes' => 'max:255',
			];
		}

	}

}
