<?php

namespace Afpa\CatalogBundle\TauxChange;

class TauxChange
{
	protected $taux;
	protected $mailer;

	public function __construct(\Swift_Mailer $mailer, $taux)
	{
		$this->taux = $taux;
		$this->mailer = $mailer;
	}

	public function convertEuroToDollar($euro)
	{
		$dollar = $euro*$this->taux;
		$message = \Swift_Message::newInstance()
           			->setSubject('Conversion euro > dollar')
          			->setFrom('afpasymfony2@gmail.com')
          			->setTo('afpasymfony2@gmail.com')
          			->setBody($euro.'€ = '.$dollar.'$');

		$this->mailer->send($message);

		return $dollar;
	}

	public function convertDollarToEuro($dollar)
	{
		$euro = $dollar*(1/$this->taux);
		$message = \Swift_Message::newInstance()
   			->setSubject('Conversion dollar > euro')
  			->setFrom('afpasymfony2@gmail.com')
  			->setTo('afpasymfony2@gmail.com')
  			->setBody($dollar.'$ = '.$euro.'€');

  		$this->mailer->send($message);

		return $euro;
	}

}