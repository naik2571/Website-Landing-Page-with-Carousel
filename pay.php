<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .payment-container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: teal;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input, .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group input[type="submit"] {
            background-color: teal;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: darkcyan;
        }

        .card-details {
            display: flex;
            justify-content: space-between;
        }

        .card-details .form-group {
            flex: 1;
            margin-right: 10px;
        }

        .card-details .form-group:last-child {
            margin-right: 0;
        }

        .security {
            margin-top: 10px;
            text-align: center;
            color: #777;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="payment-container">
    <h2>Payment Details</h2>
    <form id="paymentForm" action="/process-payment" method="POST"> <!-- Adjust this action to your server endpoint -->
        
        <!-- User Information -->
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <!-- Card Information -->
        <div class="form-group">
            <label for="card-number">Card Number</label>
            <input type="text" id="card-number" name="card-number" maxlength="16" pattern="\d*" placeholder="1234 5678 9012 3456" required>
        </div>

        <div class="card-details">
            <div class="form-group">
                <label for="expiry">Expiry Date</label>
                <input type="text" id="expiry" name="expiry" maxlength="5" placeholder="MM/YY" required>
            </div>

            <div class="form-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" maxlength="3" pattern="\d*" placeholder="123" required>
            </div>
        </div>

        <!-- Payment Amount -->
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" step="0.01" placeholder="$0.00" required>
            <div class="error" id="errorMessage"></div>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <input type="submit" value="Pay Now">
        </div>
        
        <!-- Security Notice -->
        <p class="security">Your payment is secure and encrypted.</p>
    </form>
</div>

<script>
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        const amount = parseFloat(document.getElementById('amount').value);
        const errorMessage = document.getElementById('errorMessage');
        errorMessage.textContent = '';

        if (amount < 50 && amount < 10000) {
            event.preventDefault();
            errorMessage.textContent = 'Minimum payment is $50 or ₹10,000.';
        }
    });
</script>

</body>
</html>
