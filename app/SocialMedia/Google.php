<?php 
namespace App\SocialMedia;

class Google{
    private $client_id;
    private $client_secret;
    private $redirect_url;
    
    public function  getGoogleCred($google)
    {
      $this->client_id = $google['client_id']; 
      $this->client_secret = $google['client_secret'];
      $this->redirect_url = $google['redirect'];
    }
    public function getClientID()
    {
        return $this->client_id;
    }
    public function getClientSecret()
    {
        return $this->client_secret;
    }
    public function getRedirect()
    {
        return $this->redirect_url;
    }
}