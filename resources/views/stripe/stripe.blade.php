<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stripe Payment Getway</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center text-white">Make payment</h3>
                    </div>
                    <from method="POST" action="">
                        <div class="card-body">
                            <div class="my-1">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="my-1">
                                <label class="form-label">Shipping</label>
                                <input type="text" name="shipping" class="form-control">
                            </div>
                            <div class="my-1">
                                <label class="form-label">Total</label>
                                <input type="text" name="total" class="form-control">
                            </div>
                            <div class="mt-2">
                                <button class="btn btn-primary w-100" type="submit">Pay now</button>
                            </div>
                        </div>
                    </from>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
