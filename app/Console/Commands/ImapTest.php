<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Webklex\IMAP\Facades\Client;

class ImapTest extends Command
{
    /**  
     * The name and signature of the console command.
     *
	 * @var string  
     */
    protected $signature = 'imap:test';  
  
    /**  
     * The console command description.
     *
	 * @var string  
     */
     protected $description = 'Command description';  
  
    /**  
     * Execute the console command.
     *
	 * @return int  
     */
     public function handle() {
        $client = Client::account("default");  
        $client->connect();  
  
        /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */  
        $folders = $client->getFolders(false);  
  
        /** @var \Webklex\PHPIMAP\Folder $folder */  
        foreach($folders as $folder){  
            $this->info("Accessing folder: ".$folder->path);  
  
            $messages = $folder->messages()->all()->get();  
  
            $this->info("Number of messages: ".$messages->count());  
            
            /** @var \Webklex\PHPIMAP\Message $message */  
            foreach ($messages as $message) {  
                $this->info("\tMessage: ".$message->getSender());  
            }  
        }
            
		return 0;  
    }
}
