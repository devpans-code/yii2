<?php

namespace app\models;

use yii\db\ActiveRecord;
/**
 * 
 */
class Person extends ActiveRecord
{
	private $name;
	private $email;
	private $password;
	private $image;

	public function rules()
	{
		return [
			[['name', 'email', 'password'], 'required'],
			['email', 'email'],
			[['image'], 'file', 'extensions' => 'png, jpg, jpeg']
		];
	}
}

?>