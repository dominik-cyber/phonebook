<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Phonebook;
use Illuminate\Support\Collection;

class GenerateCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $phonebooks = Phonebook::get();
        
        //Gigaset Nx70
        $xml = "<YealinkIPPhoneDirectory>\n";
        foreach ($phonebooks as $phonebook){
            $xml.= "\t<DirectoryEntry>\n";
            $xml.= "\t\t<Name>" . $phonebook->name . " " . $phonebook->lastname . "</Name>\n";
            $xml.= "\t\t<Telephone>" . $phonebook->mobile . "</Telephone>\n";
            $xml.= "\t\t<Telephone>" . $phonebook->mobile2 . "</Telephone>\n";
            $xml.= "\t\t<Telephone>" . $phonebook->work . "</Telephone>\n";
            $xml.= "\t\t<Telephone>" . $phonebook->work2 . "</Telephone>\n";
            $xml.= "\t</DirectoryEntry>\n";
        }
        $xml .= "</YealinkIPPhoneDirectory>\n";;
        file_put_contents("phonebook/yealink.xml", $xml);
        
        //Yealink Generic
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<!DOCTYPE LocalDirectory>\n";
        $xml .= "<list>\n";
        foreach ($phonebooks as $phonebook){
            $xml.= "<entry home2=\"\" surname=\"" . $phonebook->lastname . "\" mobile1=\"" . $phonebook->mobile . "\" mobile2=\"" . $phonebook->mobile2 . "\" office1=\"" . $phonebook->work . "\" office2=\"" . $phonebook->work2 . "\" name=\"" . $phonebook->name . "\" home1\"\"/>\n";
        }
        $xml .= "</list>\n";    
        file_put_contents("phonebook/gigaset_Nx70.xml", $xml);

        //Grandstream Generic
        $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml .= "<AddressBook>\n";
        foreach ($phonebooks as $phonebook){
            $xml.= "\t<Contact>\n";
            $xml.= "\t\t<FirstName>" . $phonebook->name . "</FirstName>\n";
            $xml.= "\t\t<LastName>" . $phonebook->lastname . "</LastName>\n";
            $xml.= "\t\t<Phone type=\"Mobile\">\n";
            $xml.= "\t\t\t<phonenumber>" . $phonebook->mobile . "</phonenumber>\n";
            $xml.= "\t\t\t<accountindex>0</accountindex>\n";
            $xml.= "\t\t</Phone>\n";
            $xml.= "\t\t<Phone type=\"Work\">\n";
            $xml.= "\t\t\t<phonenumber>" . $phonebook->work . "</phonenumber>\n";
            $xml.= "\t\t\t<accountindex>0</accountindex>\n";
            $xml.= "\t\t</Phone>\n";
            $xml.= "\t</Contact>\n";
        }
        $xml .= "</AddressBook>\n";;
        file_put_contents("phonebook/grandstream.xml", $xml);

    }
}
