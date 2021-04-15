<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Call;
use App\Models\UserContact;

class CallSearch extends Component
{

    public $sign = null;
    public $ham = null;

    public $provider = 'https://callook.info';
    public $format = 'json';


    public function render()
    {
        // Find it...
        if ($this->sign) {
            $response = Http::get($this->url())->json();
            $status = $response['status'] ?? 'nope';
            $status == 'VALID' ? $this->ham = $response : $this->ham = null;
        } else {
            $this->ham = null;
        }
        return view('livewire.call-search');
    }

    public function contact()
    {

        $call =  Call::find($this->sign);

        if (!$call && $this->ham) {

            $call = Call::updateOrCreate(
                [
                    'call' => $this->ham['current']['callsign']
                ],
                [
                    'frn' => $this->ham['otherInfo']['frn'],
                    'type' => $this->ham['type'],
                    'prev_sign' => $this->ham['previous']['callsign'],
                    'prev_class' => $this->ham['previous']['operClass'],
                    'prev_class' => $this->ham['previous']['operClass'],
                    'trustee_sign' => $this->ham['trustee']['callsign'],
                    'trustee_name' => $this->ham['trustee']['name'],
                    'operator_name' => $this->ham['name'],
                    'addr_1' => $this->ham['address']['line1'],
                    'addr_2' => $this->ham['address']['line2'],
                ]
            );
        }

        // log the touch
        $contact = UserContact::create([
            'user_id' => auth()->id(),
            'call' => $this->ham['current']['callsign'],
            'rx' => true,
            'tx' => true,
        ]);

        if ($contact) {
            $this->sign = null;
            $this->ham = null;
        }
    }

    public function url()
    {
        return $this->provider . '/' . $this->sign . '/' . $this->format;
    }
}
