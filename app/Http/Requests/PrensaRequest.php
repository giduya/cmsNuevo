<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrensaRequest extends Request {


	public function authorize()
	{
		return true;
	}





	public function messages()
	{
		return [
						'fecha.required'        => 'La "fecha" es obligatoria.',
						'fecha.date_format'     => 'La "fecha" no tiene el formato aceptado: (01/12/2019).',
	        	'dimensions'            => 'La :attribute debe tener mínimo 200px de ancho y/o alto y máximo 2500px de ancho y/o alto.',
	        	'mimetypes'             => 'El :attribute no es un archivo de audio mp3 válido. Si es un mp3, elimina las etiquetas IDV3.',
						'video1.required_if'    => 'El "vídeo" 1 es obligatorio.',
						'url'                   => 'El ":attribute" no es un link de youtube válido.',
						'video1.required_if'    => 'El link del vídeo 1 es obligatorio si la noticia es del tipo video.',
						'naudio1.required_if'   => 'El nombre del audio 1 y Mp3 1 es obligatorio si la noticia es del tipo audio.',
						'naudio1.required_with' => 'El nombre del audio 1 es obligatorio si el Mp3 1 está presente.',
						'naudio2.required_with' => 'El nombre del audio 2 es obligatorio si el Mp3 2 está presente.',
						'naudio3.required_with' => 'El nombre del audio 3 es obligatorio si el Mp3 3 está presente.',
						'aaudio1.required_if'   => 'El Mp3 1 es obligatorio si la noticia es del tipo audio.',
						'aaudio1.required_with' => 'El Mp3 1 es obligatorio si el nombre del audio 1 está presente.',
						'aaudio2.required_with' => 'El Mp3 2 es obligatorio si el nombre del audio 2 está presente.',
						'aaudio3.required_with' => 'El Mp3 3 es obligatorio si el nombre del audio 3 está presente.',

					 ];
	}





	public function rules()
	{
		$audio1file = null;
		$audio2file = null;
		$audio3file = null;

		if($this->method() == "POST")
		{
			$audio1file = '|required_if:tipo,audio|required_with:naudio1';
			$audio2file = '|required_with:naudio2';
			$audio3file = '|required_with:naudio3';
		}

		return [
			'titulo'    => 'required|max:100',
			'fecha'     => 'required|date|date_format:"d-m-Y"',
			'extracto'  => 'required|max:5000',
			'contenido' => 'required',
			'img1'      => 'image|dimensions:max_width=2500,max_height=2500,min_width=200,min_height=200',
			'img2'      => 'image|dimensions:max_width=2500,max_height=2500,min_width=200,min_height=200',
			'img3'      => 'image|dimensions:max_width=2500,max_height=2500,min_width=200,min_height=200',
			'img4'      => 'image|dimensions:max_width=2500,max_height=2500,min_width=200,min_height=200',
			'img5'      => 'image|dimensions:max_width=2500,max_height=2500,min_width=200,min_height=200',
			'img6'      => 'image|dimensions:max_width=2500,max_height=2500,min_width=200,min_height=200',
			'img7'      => 'image|dimensions:max_width=2500,max_height=2500,min_width=200,min_height=200',
			'video1'    => 'required_if:tipo,video|url|max:255',
			'video2'    => 'url|max:255',
			'video3'    => 'url|max:255',
			'naudio1'   => 'max:255|required_with:aaudio1|required_if:tipo,audio',
			'naudio2'   => 'max:255|required_with:aaudio2',
			'naudio3'   => 'max:255|required_with:aaudio3',
			'aaudio1'   => 'mimetypes:audio/mpeg3,audio/x-mpeg-3,video/mpeg,video/x-mpeg,audio/mpeg,audio/mp3|file'.$audio1file,
			'aaudio2'   => 'mimetypes:audio/mpeg3,audio/x-mpeg-3,video/mpeg,video/x-mpeg,audio/mpeg,audio/mp3|file'.$audio2file,
			'aaudio3'   => 'mimetypes:audio/mpeg3,audio/x-mpeg-3,video/mpeg,video/x-mpeg,audio/mpeg,audio/mp3|file'.$audio3file,
		];
	}

}
