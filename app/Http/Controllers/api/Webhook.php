<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\BookingDate;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Webhook extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $stripe = new \Stripe\StripeClient(config('stripe.sk'));

        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env("STRIPE_WEBHOOK_KEY");

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload,
                $sig_header,
                $endpoint_secret
            );

            Log::info($event);

            switch ($event->type) {
                case "checkout.session.completed":
                    $metadata = $event->data->object->metadata; // contains a \Stripe\PaymentIntent
                    // Then define and call a method to handle the successful payment intent.
                    // handlePaymentIntentSucceeded($paymentIntent);
                    $book = BookingDate::findOrFail($metadata->order_id);
                    $book->paid = true;
                    $book->update();
                    break;
                case 'charge.succeeded':
                    $payment = $event->data->object; // contains a \Stripe\PaymentMethod

                    $paid = $payment->paid;

                    $orderId = $payment->metadata->order_id;
                    if (isset($orderId) && $paid) {
                        $book = BookingDate::findOrFail($orderId);
                        $book->paid = true;
                        $book->update();
                    }
                    break;
                // ... handle other event types
                default:
                    echo 'Received unknown event type ' . $event->type;
            }
            return response()->json(['message' => 'payment received']);
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            Log::error(json_encode($e));
            http_response_code(400);
            exit();
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::error("Invalid signature");
            // Invalid signature
            http_response_code(400);
            exit();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
