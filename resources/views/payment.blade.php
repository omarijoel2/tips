<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
</head>
<body>
    <h1>Payment Page</h1>
    <form action="{{ route('mpesa.payment') }}" method="POST">
        @csrf
        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>
        
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required>
        
        <button type="submit">Pay with M-Pesa</button>
    </form>

    <form action="{{ route('paypal.payment') }}" method="POST">
        @csrf
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required>
        
        <button type="submit">Pay with PayPal</button>
    </form>
</body>
</html>
