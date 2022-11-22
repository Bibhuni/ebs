<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    <link rel="stylesheet" href="css/payment.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script defer src="js/home.js"></script>
    <link rel="icon" href="img//icon.png">
</head>
<body>
    <form class="container" action="subscribe.php" id="form" name="paymentform" method="post">
        <h1>Confirm Your Payment</h1>
        <div class="first-row">
            <div class="owner">
                <h3>card Number</h3>
                <div class="input-field">
                    <input id="card_number" name="cardnumber" type="number">
                </div>
            </div>
            <div class="cvv">
                <h3>CVV</h3>
                <div class="input-field">
                    <input id="cvv" type="password">
                </div>
            </div>
        </div>
        <div class="second-row">
            <div class="card-number">
                <h3>Cardholders Name</h3>
                <div class="input-field">
                    <input id="c_name" type="text">
                </div>
            </div>
        </div>
        <div class="third-row">
            <h3>Card Number</h3>
            <div class="selection">
                <div class="date">
                    <select name="months" id="months">
                        <option value="Jan">Jan</option>
                        <option value="Feb">Feb</option>
                        <option value="Mar">Mar</option>
                        <option value="Apr">Apr</option>
                        <option value="May">May</option>
                        <option value="Jun">Jun</option>
                        <option value="Jul">Jul</option>
                        <option value="Aug">Aug</option>
                        <option value="Sep">Sep</option>
                        <option value="Oct">Oct</option>
                        <option value="Nov">Nov</option>
                        <option value="Dec">Dec</option>
                      </select>
                      <select name="years" id="years">
                        <option value="2027">2027</option>
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                      </select>
                </div>
                <div class="cards">
                    <img src="img/mc.png" alt="">
                    <img src="img/vi.png" alt="">
                    <img src="img/pp.png" alt="">
                </div>
            </div>    
        </div>
        <input type="text" value="business" class="invis-btn" name="subscriber">
        <button type="submit" name="business">Confirm</button>
        <div id="error" class="error" name="error"></div>
    </form>
</body>
</html>