<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <?php require_once ("php/header.php"); ?>

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="my-4 text-dark">Shipping Information</h3>
            <form action="place_order.php" method="post">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="country">Country</label>
                        <select class="form-control" id="country" name="country" required>
                            <option value="">Select Country</option>
                            <option value="TR">Türkiye</option>
                            <option value="USA">United States Of America</option>
                            <option value="CA">Canada</option>
                            <option value="GB">United Kingdom</option>
                            <option value="DE">Germany</option>
                            <option value="FR">France</option>
                            <option value="JP">Japan</option>
                            <option value="CN">China</option>
                            <option value="IN">India</option>
                            <option value="BR">Brazil</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">City</label>
                        <select class="form-control" id="city" name="city" required>
                            <option value="">Select City</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Postal Code" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="phone">Phone Number</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="phoneCode">+1</span>
                            </div>
                            <input type="text" class="form-control" id="phone" name="phone" required pattern="\d{10}" maxlength="10" min="0" placeholder="Phone Number">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required placeholder="Address"></textarea>
                </div>

                <h4 class="my-4">Payment Method</h4>
                <div class="form-group">
                    <label for="paymentMethod">Select Payment Method</label>
                    <select class="form-control" id="paymentMethod" name="paymentMethod" required>
                        <option value="">Select Payment Method</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="gift_card">Digital Gift Card</option>
                    </select>
                </div>
                

                <div id="creditCardFields" style="display: none;">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="Card Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="text" class="form-control" id="expiryDate" name="expiryDate" placeholder="Expiry Date">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV">
                        </div>
                    </div>
                </div>


                <div id="giftCardFields" style="display: none;">
                    <div class="form-group">
                        <label for="giftCardCode">Gift Card Code</label>
                        <input type="text" class="form-control" id="giftCardCode" name="giftCardCode" placeholder="Gift Card Code">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Place Order</button>
            </form>
        </div>
    </div>
</div>


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

    const countryData = {
        "TR": {
            "cities": {
                "Ankara": "06000",
                "İstanbul": "34000"
            },
            "phoneCode": "+90"
        },
        "USA": {
            "cities": {
                "New York": "10001",
                "Los Angeles": "90001"
            },
            "phoneCode": "+1"
        },
        "CA": {
            "cities": {
                "Toronto": "M5H",
                "Vancouver": "V5K"
            },
            "phoneCode": "+1"
        },
        "GB": {
            "cities": {
                "London": "EC1A",
                "Manchester": "M1"
            },
            "phoneCode": "+44"
        },
        "DE": {
            "cities": {
                "Berlin": "10115",
                "Munich": "80331"
            },
            "phoneCode": "+49"
        },
        "FR": {
            "cities": {
                "Paris": "75000",
                "Lyon": "69000"
            },
            "phoneCode": "+33"
        },
        "JP": {
            "cities": {
                "Tokyo": "100-0001",
                "Osaka": "530-0001"
            },
            "phoneCode": "+81"
        },
        "CN": {
            "cities": {
                "Beijing": "100000",
                "Shanghai": "200000"
            },
            "phoneCode": "+86"
        },
        "IN": {
            "cities": {
                "Delhi": "110001",
                "Mumbai": "400001"
            },
            "phoneCode": "+91"
        },
        "BR": {
            "cities": {
                "São Paulo": "01000-000",
                "Rio de Janeiro": "20000-000"
            },
            "phoneCode": "+55"
        }
    };

    $('#country').change(function () {
        const country = $(this).val();
        const data = countryData[country];
        $('#phoneCode').text(data.phoneCode); 
        $('#city').empty(); 
        $('#city').append('<option value="">Select City</option>');
        $.each(data.cities, function(city, postalCode) {
            $('#city').append('<option value="' + city + '">' + city + '</option>');
        });
        $('#postalCode').val('');
    });

    $('#city').change(function () {
        const country = $('#country').val();
        const city = $(this).val();
        const postalCode = countryData[country].cities[city];
        $('#postalCode').val(postalCode);
    });

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

    $(document).ready(function() {
        const country = $('#country').val();
        if (country) {
            const data = countryData[country];
            $('#phoneCode').text(data.phoneCode); 
            $('#city').empty(); 
            $('#city').append('<option value="">Select City</option>');
            $.each(data.cities, function(city, postalCode) {
                $('#city').append('<option value="' + city + '">' + city + '</option>');
            });
        }
    });

    $('#phone').on('input', function () {
        this.value = this.value.replace(/\D/g, '').substring(0, 10);
    });

</script>
</body>
</html>
