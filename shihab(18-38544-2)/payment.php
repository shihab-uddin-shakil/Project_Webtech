<h1>Make Payment</h1>

<!-- display errors returned by createToken -->
<span class="payment-errors"></span>

<!-- stripe payment form -->
<form action="submit.php" method="POST" id="paymentFrm">
    <p>
        <label>Name :</label>
        <input type="text" name="name" size="50" />

    </p>

    <p>
        <label>Payment method :</label>
        <button type="bKash" id="payBtn">bKash</button>
         <span>  </span>
         <button type="Rocket" id="payBtn">Rocket</button>
         <span>  </span>
         <button type="Nagad" id="payBtn">Nagad</button>
         <span>  </span>

    </p>

    <p>
        <label>Select Bank :</label>
         <button type="IBBL" id="payBtn">IBBL</button>
         <span>  </span>
          <button type="DBBL" id="payBtn">DBBL</button>
         <span>  </span>
          <button type="City Bank" id="payBtn">City Bank</button>
         <span>  </span>
    </p>

    <p>
        <label>Card Number (VISA/CREDIT) :</label>
        <input type="text" name="card_num" size="20" autocomplete="off" class="card-number" />
    </p>


    <p>
        <label>Email :</label>
        <input type="text" name="email" size="50" />
    </p>

    <p>
        <label>Phone No :</label>
        <input type="text" name="phone" size="30" />
    </p>
    
    
    <p>
        <label>Date(dd/MM/YYYY) :</label>
         <input type="text" name="exp_day" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
    </p>
    <button type="confirm" id="payBtn">Confirm Payment</button>
</form>