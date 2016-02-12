<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	//const ERROR_NOT_IN_ROLE=999;
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		Yii::log('username ' . $this->username);
		Yii::log('password ' . $this->password);
		$miembro = $this->validaAcceso($this->username);
		
		if(!$miembro)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(strcmp($this->password, $miembro->password)) 
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else 
		{
			$idcargo = $this->validaCargo($miembro);
			$this->_id=$miembro->idmiembro;
			$this->setState('cargo', $idcargo);
			
			//if($idcargo===0)
			//	$this->errorCode=self::ERROR_NOT_IN_ROLE;
			//else 
			$this->setState('elector', $this->validaElector($miembro));
			$this->errorCode=self::ERROR_NONE;
		}	
		Yii::log('errorCode ' . $this->errorCode);
		return !$this->errorCode;
	}
	
	private function validaAcceso($user) 
	{
		return Miembro::model()->find('email=:email',
				array(
						':email'=>$user
				));
		
	}
	
	private function validaCargo($miembro)
	{
		$idcargo = 0;
		$cargomiembro = Cargomiembro::model()->find(
				'idmiembro=:idmiembro',
				array(':idmiembro'=>$miembro->idmiembro));
		if(isset($cargomiembro)) 
		{
			$idcargo = 	$cargomiembro->idcargo;
		}
		return $idcargo;
	}
	
	private function validaElector($miembro) {
		$_esElector = false;
		$eleccion = Commons::eleccionVigente();
		$elector = Elector::model()->find(
				'idmiembro=:idmiembro AND ideleccion=:ideleccion AND estado=:estado',
				array(
						':idmiembro'=>$miembro->idmiembro,
						':ideleccion'=>$eleccion->ideleccion,
						':estado'=>'1',
				));
		if(isset($elector))
		{
			$_esElector = false;
		}
		return $_esElector;
	}
}