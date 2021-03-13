<h1>Prescription </h1>

<form action="submit.php" method="POST" id="paymentFrm">
    <p>
        <label>Doctor Name :</label>
        <input type="text" name="name" size="5" />
         <label>Doctor ID:</label>
        <input type="text" name="name" size="5" />
         <label>Doctor Qualification :</label>
        <input type="text" name="name" size="5" />

    </p>

    <p>
        <label>Current Date(dd/MM/YYYY) :</label>
         <input type="text" name="exp_day" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
    </p>
	<p>
        <label>Patient Name :</label>
        <input type="text" name="name" size="5" />
         <label> Age:</label>
        <input type="text" name="name" size="5" />
         <label> Height:</label>
        <input type="text" name="name" size="5" />
        <label> weight:</label>
        <input type="text" name="name" size="5" />
        <label>Patient ID:</label>
        <input type="text" name="name" size="5" />

    </p>
    <p>
        <label>Deases Name :</label>
         <input type="text" name="exp_day" size="8"/>
    </p>
    <p>
        <label>Description :</label>
         <input type="text" name="exp_day" size="20" />
    </p>
    <p>
        <label>Suggested Medicine :</label>
         <input type="text" name="exp_day" size="25"/>
    </p>
    
     <p>
        <label>Next Meeting Date(dd/MM/YYYY) :</label>
         <input type="text" name="exp_day" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
    </p>
    <p>
        <label>Doctor's Signature :</label>
         <input type="text" name="exp_day" size="3" />
    </p>
    
   

    <button type="Confirm" id="payBtn">Confirm</button>
</form>