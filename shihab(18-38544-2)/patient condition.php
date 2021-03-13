<h1>Patient status</h1>

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
        <label>Condition :</label>
        <button type="well" id="payBtn">Well</button>
        <button type="Normal" id="payBtn">Normal</button>
        <button type="critical" id="payBtn">Critical</button>

    </p>

    <p>
        <label>Description :</label>
        <input type="text" name="name" size="80" />

    </p>

   

    <button type="Submit" id="payBtn">Submit</button>
</form>