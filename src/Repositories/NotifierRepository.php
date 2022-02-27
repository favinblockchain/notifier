<?php
namespace Favinblockchain\Notifier\Repositories;

class NotifierRepository
{

    public function dataDecryption($data)
    {
        if (config('notifier.decryption')){
            if (!is_null($data) && $data != ''){
                return decryptString($data);
            }
        }else{
            return $data;
        }
    }

    public function dataEncryption($data)
    {
        if (config('notifier.decryption')){
            if (!is_null($data) && $data != ''){
                return encryptString($data);
            }
        }else{
            return $data;
        }
    }
}
