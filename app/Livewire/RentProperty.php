<?php

namespace App\Livewire;

use App\Models\BookingDate;
use App\Models\Property;
use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Request;

class RentProperty extends Component
{
    public $property;
    public $start;
    public $end;

    public $adult = 1;

    public $children = 0;

    public $booked;

    public $tabs = ['Desc', 'Facility'];

    public $selectedTab = 0;

    public $nights = 0;

    public $total = 0;

    public $bookedDate = [];

    public function mount(){
        $this->property = Property::where('slug', '=', str_replace("/", "", request()->getRequestUri()))->firstOrFail();
        if($this->property){
            $booked = $this->property->bookingdate;
            foreach($booked as $book){
                $periods = CarbonPeriod::create($book->start, $book->end);
                foreach($periods as $period){
                    $this->bookedDate[] = Carbon::parse($period)->format('Y-m-d');
                }
            }
        }
    }

    public function bookdate($start, $end){
        $this->start = $start;
        $this->end = $end;
    }

    public function getProperty(){
        if($this->property != null){
            return $this->property;
        }
    }

    public function increaseAdults(){
        if($this->adult < 4){
            $this->adult = $this->adult + 1;
        }
    }

    public function decreaseAdults(){
        if($this->adult > 1){
        $this->adult = $this->adult - 1;
        }
    }

    public function increaseChildrens(){
        if($this->children < 4){
        $this->children = $this->children + 1;
        }
    }

    public function decreaseChildrens(){
        if($this->children > 0){
        $this->children = $this->children - 1;}
    }

    public function setNights($night){
        $this->nights = $night;
        $this->total = $night * $this->property->price;
    }

    public function changeTab($index){
        $this->selectedTab = $index;
    }

    public function render()
    {
        return view('livewire.rent-property');
    }

    public function checkout(){
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $booking = new BookingDate();
        $booking->start = Carbon::createFromFormat('d-m-Y', $this->start)->format('Y-m-d');
        $booking->end = Carbon::createFromFormat('d-m-Y', $this->end)->format('Y-m-d');
        $booking->adult = $this->adult;
        $booking->kids = $this->children;
        $booking->total = $this->total;
        $booking->user_id = auth()->user()->id;
        $booking->property_id = $this->property->id;
        $booking->save();

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'usd',
                        'product_data' => [
                            'name' => $this->property->name . " x " . $this->nights . " Night(s)",
                            'images' => [$this->property->image]
                        ],
                        'unit_amount'  => $this->total*100,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'metadata' => [
                'order_id' => $booking->id
            ],
            'mode'        => 'payment',
            'success_url' => route('home'),
            'cancel_url'  => route('home'),
        ]);

        $this->redirect($session->url);
    }
}
