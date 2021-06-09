<?php
/**
 * This is email configuration file.
 *
 * Use it to configure email transports of Cake.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * In this file you set up your send email details.
 *
 * @package       cake.config
 */
/**
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *		Mail 		- Send using PHP mail function
 *		Smtp		- Send using SMTP
 *		Debug		- Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email.  Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	/*
	public $default = array(
		'transport' => 'Mail',
		'from' => 'info@dealershipperformance.com',
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
	*/


    public $support = array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'support@dp360crm.com',
        'password' => 'TK4756ty3663TK',
        'transport' => 'Smtp'
    );

	public $sender = array(
		/*
        'host' => 'ssl://smtp.gmail.com',
        'port' => 465,
        'username' => 'sender@dp360crm.com',
        'password' => '{X9qZ/Z03H',
        'transport' => 'Smtp'
        */
		'transport' => 'Smtp',
		//'from' => array('info@crmmain.com' => 'Mobile CRM'),
		'host' => 'smtp.sendgrid.net',
		'tls' => true,
		'port' => 25,
		'timeout' => 90000,
		'username' => 'tkilgore',
		'password' => '4756ty3663TK',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
    );

	public $sendgrid = array(
		'transport' => 'Smtp',
		//'from' => array('info@crmmain.com' => 'Mobile CRM'),
		'host' => 'smtp.sendgrid.net',
		'tls' => true,
		'port' => 25,
		'timeout' => 90000,
		'username' => 'tkilgore',
		'password' => '4756ty3663TK',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp_amazon = array(
		'transport' => 'Smtp',
		//'from' => array('info@crmmain.com' => 'Mobile CRM'),
		'host' => 'email-smtp.us-west-2.amazonaws.com',
		'tls' => true,
		'port' => 25,
		'timeout' => 90000,
		'username' => 'AKIAIJR3AOGBQDK7PSDQ',
		'password' => 'Ara+L1tDKSgG+S206wRgFZOf8JPltUfWA21eYkXRnOnm',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('site@localhost' => 'Mobile CRM'),
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 90000,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $fast = array(
		'from' => 'info@dealershipperformance.com',
		'sender' => 'info@dealershipperformance.com',
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Mail',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 90000,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);

	public $notifications_gmail = array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => 465,
			'username' => 'notifications@dp360crm.com',
			'password' => '61Bv8zr2*64&',
			'transport' => 'Smtp'
	);

}
