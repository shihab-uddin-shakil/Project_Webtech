<h1>Prescription Collection </h1>

<form action="submit.php" method="POST" id="paymentFrm">
	<p>
        <label>Patient ID :</label>
        <input type="text" name="name" size="5" />

    </p>
    <p>
        <label>Doctor ID :</label>
        <input type="text" name="name" size="5" />

    </p>
    <p>
        <label>Last Visit Date :(dd/MM/YYYY) :</label>
         <input type="text" name="exp_day" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
    </p>

     <p>
        <label>Current Date(dd/MM/YYYY) :</label>
         <input type="text" name="exp_day" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
    </p>

    

    <button type="collect" id="payBtn">Collect Prescription</button>
</form>