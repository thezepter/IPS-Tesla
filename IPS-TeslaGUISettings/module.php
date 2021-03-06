<?
declare(strict_types=1);

class TeslaGUISettings extends IPSModule
{
    public function Create()
    {
        //Never delete this line!
        parent::Create();

        $this->ConnectParent('{0DE3226B-E63E-87DD-7D2F-46C1A17866D9}');

        $this->RegisterVariableBoolean('gui_24_hour_time','GUI 24 Hour Time');
        $this->RegisterVariableString('gui_charge_rate_units','GUI Charge Rate Units');
        $this->RegisterVariableString('gui_distance_units','GUI Distance Units');
        $this->RegisterVariableString('gui_range_display','GUI Range Display');
        $this->RegisterVariableString('gui_temperature_units','GUI Temperature Units');
        $this->RegisterVariableString('timestamp','timestamp');
    }

    public function ApplyChanges(){

        //Never delete this line!
        parent::ApplyChanges();
    }

    public function FetchData() {

        $Data['DataID'] = '{5147BF5F-95B4-BA79-CD98-F05D450F79CB}';

        $Buffer['Command'] = 'GUISettings';
        $Buffer['Params'] = '';

        $Data['Buffer'] = $Buffer;

        $Data = json_encode($Data);

        $Data = json_decode($this->SendDataToParent($Data),true);

        foreach ($Data['response'] as $key => $Value ) {
            $this->SetValue($key,$Value);
        }
    }
}

?>