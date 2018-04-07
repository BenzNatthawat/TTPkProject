<script src="https://www.paypalobjects.com/api/checkout.js"></script>

    @if($Book->payment != 'pay')
        <div style="float: right; margin-top: 10px;">
            <span style="font-size: 2em; color: blue; margin-right: 20px;">
                {{$total}}THB
            </span>
        <div id="paypal-button-container"></div>                              
        </div>
    @endif

<script>
paypal.Button.render({

    env: 'sandbox', // sandbox | production
    locale: 'th_TH',

    style: {
        label: 'paypal',
        size:  'medium',    // small | medium | large | responsive
        shape: 'rect',     // pill | rect
        color: 'blue',     // gold | blue | silver | black
        tagline: false    
    },

    // PayPal Client IDs - replace with your own
    // Create a PayPal app: https://developer.paypal.com/developer/applications/create
    client: {
        sandbox:    'ARbPs7gGc3bLP1bgLWU-0ZZYs_p-3ipTdO5-P2KbMTeM3IcUFOfhsvcj2rAoXuebbUL3Z-ZRvUkw7IKk',
    },

    // Show the buyer a 'Pay Now' button in the checkout flow
    commit: true,

    // payment() is called when the button is clicked
    payment: function(data, actions) {

        // Make a call to the REST api to create the payment
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        amount: { total: {{$total}} , currency: 'THB' }
                    }
                ]
            }
        });
    },

    // onAuthorize() is called when the buyer approves the payment
    onAuthorize: function(data, actions) {

        // Make a call to the REST api to execute the payment
        return actions.payment.execute().then(function() {
            window.alert('Payment Complete!');
        });
    }

}, '#paypal-button-container');

</script>