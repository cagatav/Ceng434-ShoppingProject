<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="my-4">Shipping Information</h2>
            <form action="place_order.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="country">Country</label>
                        <select class="form-control" id="country" name="country" required>
                            <option value="">Select Country</option>
                            <option value="TR">Türkiye</option>
                            <option value="USA">United States Of America</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <select class="form-control" id="city" name="city" required>
                            <!-- City options will be populated based on the selected country -->
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="phoneCode">+1</span> <!-- Default country code -->
                            </div>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>

                <h2 class="my-4">Payment Method</h2>
                <div class="form-group">
                    <label for="paymentMethod">Select Payment Method</label>
                    <select class="form-control" id="paymentMethod" name="paymentMethod" required>
                        <option value="">Select Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="gift_card">Digital Gift Card</option>
                    </select>
                </div>
                
                <!-- Credit Card Information -->
                <div id="creditCardFields" style="display: none;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="text" class="form-control" id="expiryDate" name="expiryDate">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv">
                        </div>
                    </div>
                </div>

                <!-- Gift Card Information -->
                <div id="giftCardFields" style="display: none;">
                    <div class="form-group">
                        <label for="giftCardCode">Gift Card Code</label>
                        <input type="text" class="form-control" id="giftCardCode" name="giftCardCode">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Place Order</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script>
    // Object containing country codes, their corresponding cities, and phone codes
    const countryData = {
        "TR": {
            "cities": ["Ankara", "İstanbul"],
            "phoneCode": "+90"
        },
        "USA": {
            "cities": ["New York", "Los Angeles"],
            "phoneCode": "+1"
        }
        // Add more countries and their data here
    };

    // Function to update the city options and phone code when a country is selected
    $('#country').change(function () {
        const country = $(this).val();
        const data = countryData[country];
        $('#phoneCode').text(data.phoneCode); // Update phone code
        $('#city').empty(); // Clear previous options
        $.each(data.cities, function(index, city) {
            $('#city').append('<option value="' + city + '">' + city + '</option>');
        });
    });

    // Show relevant payment fields based on selected payment method
    $('#paymentMethod').change(function () {
        const method = $(this).val();
        if (method === "credit_card") {
            $('#creditCardFields').show();
            $('#giftCardFields').hide();
        } else if (method === "gift_card") {
            $('#creditCardFields').hide();
            $('#giftCardFields').show();
        } else {
            $('#creditCardFields').hide();
            $('#giftCardFields').hide();
        }
    });

    // Initial population of cities and phone code based on the selected country
    $(document).ready(function() {
        const country = $('#country').val();
        const data = countryData[country];
        $('#phoneCode').text(data.phoneCode); // Update phone code
        $.each(data.cities, function(index, city) {
            $('#city').append('<option value="' + city + '">' + city + '</option>');
        });
    });
</script>
</body>
</html>
