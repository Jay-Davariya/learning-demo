<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Customer;
use App\Models\customerproduct;

use Illuminate\Mail\Mailables\Attachment;


class UserLoginNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $customer;

    /**
     * Create a new message instance.
     *
     * @param Customer $customer
     * 
     *   
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'User Login Notification',
        );
    }
    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.registernotification',
            with: [
                'id' => $this->customer->id,
                'customer' => $this->customer->name,
                'email' => $this->customer->email,
                'shopkeeper' => $this->customer->shopkeepers,
                'products' => $this->customer->products,
                'product_name' => $this->customer->product_name,
                'mrp' => $this->customer->mrp,
                'sellprice' => $this->customer->sellprice,
                'expiry' => $this->customer->expiry,
                'country' => $this->customer->countryCustomer->country,
                'state' => $this->customer->stateCustomer->state,
                'city' => $this->customer->cityCustomer->city,
                'address' => $this->customer->address,
            ]
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // In Customer.php model
   
public function attachments()
{
    $attachments = [];
    
    foreach ($this->customer->products as $product) {
        $filePath = storage_path('public/product/' . $product->file_name);
        if (file_exists($filePath)) {
            $attachments[] = Attachment::fromPath($filePath);
        }
    }

    return $attachments;
}

    /**
     * Build the message.
     *
     * @return $this
     */
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Fetch the data needed for the email
        $customer = $this->customer->load('shopkeepers','products');
        $email = $this->subject('Login Notification')
            ->view('emails.registernotification')
            ->with([
                'id' => $customer->id,
                'customer' => $customer->name,
                'email' => $customer->email,
                'shopkeepers' => $customer->shopkeepers,
                'product_name' => $customer->product_name,
                'products' => $customer->products,
                'mrp' => $customer->mrp,
                'sellprice' => $customer->sellprice,
                'expiry' => $customer->expiry,
                'country' => $customer->countryCustomer['country'],
                'state' => $customer->stateCustomer['state'],
                'city' => $customer->cityCustomer['city'],
                'address' => $customer->address,

            ])->withAttachments($this->attachments());
            
        return $email;
    }
}

