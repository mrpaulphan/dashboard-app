<?php

namespace App\Http\Controllers;

use AJT\Toggl\TogglClient;

class TimesheetController extends Controller
{
    public function getTime()
    {
        $toggl_token = 'ca1f7dc50312a0a8f740822686bea1e1'; // Fill in your token here

          // if you want to see what is happening, add debug => true to the factory call
          $toggl_client = TogglClient::factory(array('api_key' => $toggl_token, 'debug' => true));


          //Retrieve the Command from Guzzle
          $command = $toggl_client->getCommand('GetWorkspaces', array());
          $command->prepare();

          $response = $command->execute();

          dd($response);

          $workspaces = $response['data'];

          foreach($workspaces as $workspace){
              $id = $workspace['id'];
              print $workspace['name'] . "\n";
          }
    }
}
