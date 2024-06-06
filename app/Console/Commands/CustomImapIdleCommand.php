<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webklex\IMAP\Commands\ImapIdleCommand;
use Webklex\PHPIMAP\Message;

class CustomImapIdleCommand extends ImapIdleCommand
{
    protected $signature = 'app:custom-imap-idle-command';
    protected $description = 'Command description';
    protected $account='default';
    
    public function onNewMessage(Message $message) {  
        $this->info("New message received: " . $message->subject);  
    }  
}
